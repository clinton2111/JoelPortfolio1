<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['gig_id'];
    $title = $_POST['gig_title'];
    $location = $_POST['gig_location'];
    $date = $_POST['gig_date'];
    $fb_page = $_POST['gig_url'];
    $sql = "UPDATE gigs SET title='$title',location='$location',date='$date',fb_page='$fb_page' WHERE id=$id";
    $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);
    if ($result == 1) {
        echo '<h2 class="page-header">Your data has been updated.Close this window to continue</h2>';
    } else {
        echo "<script>alert('ERROR');</script>";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT id,title,location,date,fb_page FROM gigs where id=$id";
    $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);

    while ($row = mysql_fetch_array($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $location = $row['location'];
        $date = $row['date'];
        $fb_page = $row['fb_page'];
    }
    ?>
    <html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-datetimepicker.min.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <form role="form" method="post" action="update_event.php">
                        <div class="form-group">
                            <input class="form-control" name="gig_id" value="<?php echo $id; ?>" type="hidden">
                        </div>
                        <div class="form-group">
                            <label>Gig Title:</label>
                            <input class="form-control" name="gig_title" value="<?php echo $title; ?>">
                        </div>
                        <div class="form-group">
                            <label>Location:</label>
                            <input class="form-control" name="gig_location" value="<?php echo $location; ?>">
                        </div>
                        <div class="form-group">
                            <label>Date and Time:</label>

                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' value="<?php echo $date; ?>" class="form-control" name="gig_date"
                                       data-date-format="DD-MM-YYYY hh:mm A"/>
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span> </span></div>
                        </div>
                        <div class="form-group">
                            <label>Facebook URL:</label>
                            <input class="form-control" name="gig_url" value="<?php echo $fb_page; ?>">
                        </div>
                        <button type="submit" class="btn btn-default"> Update Data</button>
                        <button type="reset" class="btn btn-default"> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker();
        });
    </script>
    </body>
    </html>
<?php } ?>