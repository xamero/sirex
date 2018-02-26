<?php
SESSION_start();
//if($_SESSION['fullname']=="" or $_SESSION['contact']=="" or $_SESSION['id']==""){
//    header("location: /sirex");
//}
//
//session_unset();
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sirib Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <h2>SIREX</h2>
    <p>Take advantage of the different services of Sirib Express brought to you by the Provincial Government of Ilocos Norte.</p>

    <div class="col-md-6">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Information</a></li>
            <li><a data-toggle="tab" href="#menu1">Request</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Please Complete you Information</h3>
                <form role="form" id="updateinfo">
                    <div class="form-group">
                        <input type="hidden" id="cid" name="cid" value="<?= $_SESSION["id"] ?>">
                        <input type="hidden" class="form-control" id="scode" name="scode" value="<?= $_SESSION["schcode"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="fname">Full Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="<?= $_SESSION["fullname"] ?> " disabled>
                    </div>
                    <div class="form-group">
                        <label for="citymun">Address(Municipality)</label>
                        <input type="text" class="form-control" id="citymun" name="citymun">
                        <label for="brgy">Address(Barangay)</label>
                        <input type="text" class="form-control" id="brgy" name="brgy">
                    </div>
                    <div class="form-group">
                        <label for="bday">Birthday:</label>
                        <input type="date" class="form-control" id="bday" name="bday">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" class="form-control" id="gender" name="gender">
                    </div>
                    <div class="form-group">
                        <label for="cnum">Contact Number:</label>
                        <input type="text" class="form-control" id="cnum" name="cnum" value="<?= $_SESSION["contact"] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="school">School:</label>
                        <input type="text" class="form-control" id="school" name="school">
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade Level:</label>
                        <input type="text" class="form-control" id="grade" name="grade">
                    </div>
                    <div class="form-group">
                        <label for="course">Course(SHS/College):</label>
                        <input type="text" class="form-control" id="course" name="course">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                            Save
                        </button>
                    </div>
                </form>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Select Request</h3>
                <div class="form-group">
                    <select class="form-control" id="services" >
                    </select>
                </div>
                <div>
                    <table class="table table-hover" id="choosen">
                        <thead>
                        <td>SN</td>
                        <td>Service</td>
                        <td>Office</td>
                        </thead>
                    </table>
                </div>

                <div class="form-group">
                    <input type="Submit" class="form-control" id="savesubmit" value="Save and Exit">
                </div>
                <div class="form-group">
                    <input type="Submit" class="form-control" id="printreceipt" value="Print Receipt">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        Reminders:
        <ul>
            <li>You may choose more than one service.</li>
        </ul>
    </div>

</div>
<!--Scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/clientinfo.js"></script>
<!--End Scripts-->
</body>
</html>
