<?php
// if(isset($_POST['get_option']))
// {
require_once 'connect.php';
//$sql = "select * from session";
//$session = $_POST['get_option'];
SESSION_start();

$id = "29";

$sql = "select " .
    "c.fullname, c.addrsmun, c.addrsbrgy, " .
    "c.bday, c.contactnum, c.gender, " .
    "c.school, c.gradelevel, c.course, " .
    "s.service,s.officeFull " .
    "from clientinfo c INNER JOIN clientservice cl ON " .
    "c.id = cl.client inner JOIN services s on cl.service = s.id " .
    "where c.id = " . $id ;

$result = $conn->query($sql);

$service = array();

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<option value = '" .$row['sessionid'] . "'>".$row['sessiontitle']."</option>";

        $service[] = array(
            'fullname' => $row['fullname'],
            'service' => $row['service'],
            'officefull' => $row['officeFull']);
    }
    //echo json_encode($service);
} else {
    //echo json_encode($service);;
}

$_SESSION['datos'] = $service;

$conn->close();


?>



