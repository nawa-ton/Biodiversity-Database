<?php 

function printEditDeleteTable($resultfromquery, $namesOfColumn, $userid){
	if($resultfromquery && mysqli_num_rows($resultfromquery) != 0){
		echo "<table class='resulttable'><tr>";
		foreach ($namesOfColumn as $name) {
			echo "<th>$name</th>";
		}
		echo "</tr>";
		while($row = mysqli_fetch_array($resultfromquery)){
			echo "<tr>";
			$string = "";

			for($i = 0; $i < sizeof($namesOfColumn); $i++){
				$string .= "<td class='resultrow'>" . $row["$i"] . "</td>";
			}

			echo $string;
			echo "<td><a class='inlinebutton' href='edit-single.php?sid=$row[0]'>Edit</a></td>";
      		echo "<td><a class='inlinebutton' href='edit-delete.php?sid=$row[0]'>Delete</a></td>";
			echo "</tr>";
      	}
      	echo "</table>";
	}
}

function printUserTable($resultfromquery, $namesOfColumn){
	if($resultfromquery && mysqli_num_rows($resultfromquery) != 0){
		echo "<table class='resulttable'><tr>";
		foreach ($namesOfColumn as $name) {
			echo "<th>$name</th>";
		}
		echo "</tr>";
		while($row = mysqli_fetch_array($resultfromquery)){
			echo "<tr>";
			$string = "";

			for($i = 0; $i < sizeof($namesOfColumn); $i++){
				$string .= "<td class='resultrow'>" . $row["$i"] . "</td>";
			}

			echo $string;
      		echo "<td><a class='inlinebutton' href='admin-users-account.php?user=$row[0]'>Delete</a></td>";
			echo "</tr>";
      	}
      	echo "</table>";
	}
}

function printTable($resultfromquery, $namesOfColumn){
	if($resultfromquery && mysqli_num_rows($resultfromquery) != 0){
		echo "<table class='resulttable'><tr>";
		foreach ($namesOfColumn as $name) {
			echo "<th>$name</th>";
		}
		echo "</tr>";
		while($row = mysqli_fetch_array($resultfromquery)){
			echo "<tr>";
			$string = "";

			for($i = 0; $i < sizeof($namesOfColumn); $i++){
				$string .= "<td class='resultrow'>" . $row["$i"] . "</td>";
			}

			echo $string;
			echo "</tr>";
      	}
      	echo "</table>";
	}
}

function checkOrganismType($type, $connection, $id){
	$query = "select organism.species from sighting_report, organism, $type where sighting_report.sid = " . $id . " and sighting_report.species = organism.species and $type.species = organism.species";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) > 0){
		return true;
	}
}

function printKeyVal($resultfromquery){
	if($resultfromquery){
	    while ($row = mysqli_fetch_array($resultfromquery)) {
	        $keys = array_keys($row);

	        for ($i = 0, $j = 1; $i < sizeof($keys)/2; $i++, $j+=2) {		    
		        echo "<p><span class='bold'>". $keys["$j"] .": </span>". $row["$i"] ."</p>";		        
		    }
		}
	}
}


function printResultFormAllEdit($resultfromquery, $actionvalue){
	if($resultfromquery){
		echo "<form method='POST' action=$actionvalue>";
	    while ($row = mysqli_fetch_array($resultfromquery)) {
	        $keys = array_keys($row);
	        $label = "";
	        $string = "";
	        for ($i = 0, $j = 1; $i < sizeof($keys)/2; $i++, $j+=2) {
	        	echo "<div>";
	        	$label = "<label>" . $keys["$j"] . ":</label>";
	        	$string = "<input type='text' name='" . $keys["$j"] . "' value='";
	        	if($row["$i"] == NULL){
	        		$string .= '----';
	        	}else{
	        		$string .= $row["$i"];
	        	}
	        	$string.="' size ='30'>";
	          
	           	echo $label;
		        echo $string;
		        echo "</div>";
	        }

	    }
	    echo "<input class ='button' type='submit' value='Update' name='updatesubmit'>";
	    echo "</form>"; 
	}
}

function printDropdown($resultfromquery, $selectname){

	if($resultfromquery){
		echo "<select id=$selectname name=$selectname>";
		while($row = mysqli_fetch_array($resultfromquery)){
			echo "<option value='$row[0]'>".$row[0]."</option>";
		}
		echo "</select>";

	}

}

?>
