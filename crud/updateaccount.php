<?php
require_once 'connect.php';



$citymun = $_POST["citymun"];
$brgy = $_POST["brgy"];
$bday = $_POST["bday"];
$gender = $_POST["gender"];
$sch = $_POST["school"];
$grade = $_POST["grade"];
$course = $_POST["course"];
$id = $_POST["cid"];
$scode = $_POST["scode"];



$sql = "UPDATE clientinfo set addrsmun='$citymun', addrsbrgy='$brgy', bday='$bday', " .
        " gender='$gender', school='$sch', gradelevel='$grade', course='$course'" .
        " where id = '$id' and siribschcode='$scode'";

if ($conn->query($sql) === TRUE) {
    echo "Your Information has been saved!";
} else {
    echo "An errored occured. Pls. try again" . $conn->error;
}

$conn->close();

?>
