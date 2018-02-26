<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <?php
    session_start();
    $service = $_SESSION['datos'];
    ?>

    <table>
    <?php
        foreach($service as $serv) {
    ?>
        <tr>
            <td><?= $serv['fullname']?></td>
            <td><?= $serv['service']?></td>
            <td><?= $serv['officefull']?></td>
        </tr>
    <?php
        }
    ?>
    </table>


    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/clientinfo.js"></script>
    <!--End Scripts-->
</body>
</html>