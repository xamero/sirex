<?php
require_once 'connect.php';
// Unescape the string values in the JSON array
$tableData = $_POST['ptabledata'];

// Decode the JSON array
$tableData = json_decode($tableData,TRUE);

// now $tableData can be accessed like a PHP array
//echo $_POST['name'];
$data =  "";

foreach($tableData as $row){
    $data .= "(".$_POST['name']."," .$row['id']."),";
    //echo $row['id'];
}

$sql = "insert into clientservice(client,service) values " . $data;
$sql = rtrim($sql,",");
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Your Information has been saved!";
} else {
    echo "An errored occured. Pls. try again" . $conn->error;
}

$conn->close();


//echo $tableData[0]['id'];
