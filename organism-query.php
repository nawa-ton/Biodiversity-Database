
<?php
	include('connect.php');
	if(isset($_POST['organismsubmit'])){

		$viewtype = $_POST['vieworganismtype'];
		if($viewtype=="all"){
			$viewtype="organism";
		}
		$organismname = (!empty($_POST['organismname']) ? $connection->real_escape_string($_POST['organismname']) : false);
        $species = (!empty($_POST['species']) ? $connection->real_escape_string($_POST['species']) : false);
		$habitat = (!empty($_POST['habitat']) ? $connection->real_escape_string($_POST['habitat']) : false);  
		$primarycolor = (!empty($_POST['primarycolor']) ? $connection->real_escape_string($_POST['primarycolor']) : false);       
		$rarity = (!empty($_POST['rarity']) ? $connection->real_escape_string($_POST['rarity']) : false); 

		//selection query on input fields
		$selection="";
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

		//projection on checked boxes
		$projection="SELECT ";
		if(isset($_POST['cspecies'])){
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
		$projection=rtrim($projection,", ");
		$projection.=" ";
		$query="";
		$query.=$projection;
		//left join organism with organism_variation
		$query.="FROM organism t LEFT JOIN organism_variation v ON (t.species=v.species) 
			WHERE t.species IN (select species FROM $viewtype)";
		$query.=$selection;
		// echo $query;
		$result = mysqli_query($connection, $query);
		
		// aggregate query on count the number of results
		$countresultquery="SELECT count(*) FROM organism t LEFT JOIN organism_variation v ON (t.species=v.species) 
			WHERE t.species IN (select species FROM $viewtype)";
		$countresultquery.=$selection;
		$countresult=mysqli_query($connection,$countresultquery);
		$countrow =mysqli_fetch_array($countresult);
		echo "Results Found: ";
		echo '<td>'.$countrow['count(*)']."</td>";

		//print out result table 
		if($result){
			$columnlabels='<table align ="left"
			cellspacing = "5" cell padding = "8"><tr>';
			if(isset($_POST['cspecies'])){
				$columnlabels.='<td align="left"><b>Species</b></td>';
			}
			if(isset($_POST['cname'])){
				$columnlabels.= '<td align="left"><b>Name</b></td>';
			}
			if(isset($_POST['chabitat'])){
				$columnlabels.= '<td align="left"><b>Habitat</b></td>';
			}
			if(isset($_POST['cprimarycolor'])){
				$columnlabels.= '<td align="left"><b>Primary Color</b></td>';
			}
			if(isset($_POST['crarity'])){
				$columnlabels.= '<td align="left"><b>Rarity</b></td>';
			}
			$columnlabels.='</tr>';
			echo $columnlabels;

			while($row=mysqli_fetch_array($result)){
				$rowfills='<tr><td align="left">';

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