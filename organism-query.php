
<?php
	include('connect.php');
	if(isset($_POST['organismsubmit'])){

		$viewtype = $_POST['vieworganismtype'];
		if($viewtype=="all"){
			$viewtype="organism";
		}

		$projection="SELECT ";
		$selection="";

		//if query type is selection, then project on check boxes and select on input fields 
		if($_POST['querytype']=="selection"){
			//projection on checked boxes
			if(isset($_POST["cspecies"])){
				$projection.="t.species, ";
			}
			if(isset($_POST['cname'])){
				$projection.="t.organismname, ";
			}
			if(isset($_POST['chabitat'])){
				$projection.="t.habitat, ";
			}
			if(isset($_POST['cprimarycolor'])){
				$projection.="v.primarycolor, ";
			}
			if(isset($_POST['crarity'])){
				$projection.="v.rarity, ";
			}

			//get the values from input fields
			$organismname = (!empty($_POST['organismname']) ? $connection->real_escape_string($_POST['organismname']) : false);
			$species = (!empty($_POST['species']) ? $connection->real_escape_string($_POST['species']) : false);
			$habitat = (!empty($_POST['habitat']) ? $connection->real_escape_string($_POST['habitat']) : false);  
			$primarycolor = (!empty($_POST['primarycolor']) ? $connection->real_escape_string($_POST['primarycolor']) : false);       
			$rarity = (!empty($_POST['rarity']) ? $connection->real_escape_string($_POST['rarity']) : false); 

			//append selection statements 
			if($organismname){
				$selection.=" AND t.organismname LIKE '%$organismname%'";
			}
			if($species){
				$selection.=" AND t.species LIKE '%$species%'";
			}
			if($habitat){
				$selection.=" AND t.habitat LIKE '%$habitat%'";
			}
			if($primarycolor){
				$selection.=" AND v.primarycolor LIKE '%$primarycolor%'";
			}
			if($rarity){
				$selection.=" AND v.rarity LIKE '%$rarity%'";
			}
		}

		$group="";
		$groupname=$_POST['group'];
		$groupselection="";
		//if query type is aggregation, project the selected group and its count, only include groups with count>0
		if($_POST['querytype']=="aggregation"){
			//add projection
			if($_POST['group']=="primarycolor" || $_POST['group']=="rarity"){
				$group.="v.";
			}else{
				$group.="t.";
			}
			$group.=$_POST['group'];
			$projection.="$group, ";
			$projection.="count($group), ";	

			//add selection for count>0
			$groupselection.=" GROUP BY $group HAVING count($group)>0 ";

		}
		$projection=rtrim($projection,", ");
		$projection.=" ";

		$query="";
		$query.=$projection;
		//left join organism with organism_variation
		$query.="FROM organism t LEFT JOIN organism_variation v ON (t.species=v.species) 
			WHERE t.species IN (select species FROM $viewtype) ";

		$query.=$selection;
		$query.=$groupselection;

// echo "table query: ".$query;

		$result = mysqli_query($connection, $query);
		
		// aggregate query on count the number of results
		$countresultquery="";
		if($_POST['querytype']=="selection"){
			$countresultquery.="SELECT count(*) AS count ";
		}else{
			$countresultquery.="SELECT count(DISTINCT $group) AS count ";
		}
		$countresultquery.="FROM organism t LEFT JOIN organism_variation v ON (t.species=v.species) 
			WHERE t.species IN (select species FROM $viewtype)";
		$countresultquery.=$selection;
		$countresult=mysqli_query($connection,$countresultquery);
		$countrow =mysqli_fetch_array($countresult);
		echo "Results Found: ";
		echo '<td>'.$countrow['count']."</td>";

// echo "counter query: ".$countresultquery;

		//print out result table 
		if($result){
			$columnlabels='<table align ="left"
			cellspacing = "5" cell padding = "8"><tr>';

			//display the selected columns if query is selection
			if($_POST['querytype']=="selection"){
				if(isset($_POST['cspecies'])){
					$columnlabels.='<td align="left"><b>species</b></td>';
				}
				if(isset($_POST['cname'])){
					$columnlabels.= '<td align="left"><b>name</b></td>';
				}
				if(isset($_POST['chabitat'])){
					$columnlabels.= '<td align="left"><b>habitat</b></td>';
				}
				if(isset($_POST['cprimarycolor'])){
					$columnlabels.= '<td align="left"><b>primarycolor</b></td>';
				}
				if(isset($_POST['crarity'])){
					$columnlabels.= '<td align="left"><b>rarity</b></td>';
				}
			}
			//display just the group column and count if query is aggregation
			else {
				$columnlabels.='<td align="left"><b>'.$groupname.'</b></td>';
				$columnlabels.='<td align="left"><b>count</b></td>';
			}

			$columnlabels.='</tr>';
			echo $columnlabels;
			error_reporting(E_ERROR | E_PARSE);

			while($row=mysqli_fetch_array($result)){
				$rowfills='<tr><td align="left">';

				if($_POST['querytype']=="selection"){
					if(isset($_POST['cspecies'])){
						$rowfills.=$row['species'].'</td><td align="left">';
					}
					if(isset($_POST['cname'])){
						$rowfills.=$row['organismname'].'</td><td align="left">';
					}
					if(isset($_POST['chabitat'])){
						$rowfills.=$row['habitat'].'</td><td align="left">';
					}
					if(isset($_POST['cprimarycolor'])){
						$rowfills.=$row['primarycolor'].'</td><td align="left">';
					}
					if(isset($_POST['crarity'])){
						$rowfills.=$row['rarity'].'</td><td align="left">';
					}
				} else {
					$rowfills.=$row[$groupname].'</td><td align="left">';	
					$rowfills.=$row[count($group)].'</td><td align="left">';
				}
				echo $rowfills;
				echo'</tr>';
			}
			echo'</table>';
			
		} else {
			echo "Couldn't issue database query";
			echo mysqli_error($connection);
		}
		mysqli_close($connection);
	}
?>