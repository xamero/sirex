<?php
// if(isset($_POST['get_option']))
// {
require_once 'connect.php';
//$sql = "select * from session";
$session = $_POST['get_option'];

$sql = "select * from services";
$result = $conn->query($sql);

$service = array();

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<option value = '" .$row['sessionid'] . "'>".$row['sessiontitle']."</option>";

        $service[] = array('id' => $row['id'],
            'service' => $row['service'],
            'office' => $row['office'],
            'officefull' => $row['officeFull']);
    }
    echo json_encode($service);
} else {
    echo json_encode($service);;
}
$conn->close();

// }
?>