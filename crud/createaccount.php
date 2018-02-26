<?php
require_once 'connect.php';

SESSION_start();
session_unset();
session_destroy();

$siribschcode = $_POST["scode"];
$username = $_POST["uname"];
$pass = $_POST["pass"];
$fullname = $_POST["fname"];
$contactnum = $_POST["cnum"];

$sql = "INSERT INTO clientinfo(siribschcode,username, userpass, fullname, contactnum ) " .
        "VALUES ('$siribschcode','$username','$pass','$fullname','$contactnum') ";

if ($conn->query($sql) === TRUE) {
    $id = mysqli_insert_id($conn);
    session_start();
    $_SESSION["fullname"] = $fullname;
    $_SESSION["contact"] = $contactnum;
    $_SESSION["id"] = $id;
    $_SESSION["schcode"] = $siribschcode;
    echo "Account created successfully" . $id;
} else {
    echo "An errored occured. Pls. try again";
}

$conn->close();

?>
