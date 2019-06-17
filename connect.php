<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$db = "biodiversity";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$db = "biodiversity";

$connection = new mysqli($dbhost, $dbuser, $dbpass,$db);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'biodiversity');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

?>