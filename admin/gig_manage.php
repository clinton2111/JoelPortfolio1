<?php
include_once 'sessionchecker.php';
include('connection.php');

$status = "<div></div>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['gig_title'];
    $location = $_POST['gig_location'];
    $date = $_POST['gig_date'];
    if ($_POST['gig_url'] != "") {
        $fb_page = $_POST['gig_url'];
    } else {
        $fb_page = '#';
    }
    $image = addslashes(file_get_contents($_FILES['poster_upload']['tmp_name']));
    $insert = "INSERT INTO gigs (title,location,date,fb_page,pic) VALUES ('" . $title . "','" . $location . "','" . $date . "','" . $fb_page . "','" . $image . "')";
    $result = mysql_query($insert) or die(mysql_error());
    if ($result == 1) {
        $status = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> Data has been uploaded successfully.
    </div>';
        unset($_FILES);
    } else {
        $status = '
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> Error in uploading Data.
    </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gig Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/colorbox.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-datetimepicker.min.css"/>
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrapValidator.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <?php
    include('nav.php');
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Gig Manager
                        <small>Manage all your Gigs from one place</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-headphones"></i> Gig Manager</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Upload New Data</h2>

                    <div> <?php echo $status ?></div>
                    <form role="form" enctype="multipart/form-data" method="post" action="#" id="gigform">
                        <div class="form-group">
                            <label>Gig Title:</label>
                            <input class="form-control" name="gig_title">
                        </div>
                        <div class="form-group">
                            <label>Location:</label>
                            <input class="form-control" name="gig_location">
                        </div>
                        <div class="form-group">
                            <label>Date and Time:</label>

                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" name="gig_date"
                                       data-date-format="DD-MM-YYYY hh:mm A"/>
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span> </span></div>
                        </div>
                        <div class="form-group">
                            <label>Facebook URL:</label>
                            <input class="form-control" name="gig_url">
                        </div>
                        <div class="form-group">
                            <label>Gig Poster</label>
                            <input type="file" name="poster_upload"/>
                        </div>
                        <button type="submit" class="btn btn-default"> Upload Data</button>
                        <button type="reset" class="btn btn-default"> Reset</button>
                    </form>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Previous Gigs</h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="gigtable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Date and Time</th>
                                <th>Facebook Link</th>
                                <th>Gig Poster</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT id,title,location,date,fb_page FROM gigs order by id desc ";
                            $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);

                            while ($row = mysql_fetch_array($result)) {
                                echo '<tr class="record">';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['title'] . '</td>';
                                echo '<td>' . $row['location'] . '</td>';
                                echo '<td>' . $row['date'] . '</td>';
                                echo '<td>' . $row['fb_page'] . '</td>';
                                echo '<td> <div><a href=gigpic.php?id=' . $row['id'] . ' class="group1"><img class="img-responsive"  src="gigpic.php?id=' . $row['id'] . '" height="200px" width="200px"></a></div> </td>';
                                ?>
                                <td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton"><i
                                            class="fa fa-trash-o fa-fw fa-3x"></i></a>

                                    <div><a href="update_event.php?id=<?php echo $row['id'] ?>" class="iframe"><i
                                                class="fa fa-refresh fa-fw fa-3x"></i></a></div>
                                </td>
                                <?php
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrapValidator.js"></script>
<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
<script src="js/jquery.colorbox.js"></script>
<script>
    $(document).ready(function () {
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({
            rel: 'group1',
            photo: true
        });
        $(".iframe").colorbox({
            iframe: true,
            width: "95%",
            height: "95%"
        });

    });
</script>
<script type="text/javascript">
    // Make ColorBox responsive
    jQuery.colorbox.settings.maxWidth = '95%';
    jQuery.colorbox.settings.maxHeight = '95%';

    // ColorBox resize function
    var resizeTimer;
    function resizeColorBox() {
        if (resizeTimer)
            clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            if (jQuery('#cboxOverlay').is(':visible')) {
                jQuery.colorbox.load(true);
            }
        }, 300);
    }

    // Resize ColorBox when resizing window or changing mobile device orientation
    jQuery(window).resize(resizeColorBox);
    window.addEventListener("orientationchange", resizeColorBox, false);
</script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#gigtable').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>
<script type="text/javascript">
    $(function () {

        $(".delbutton").click(function () {
            var del_id = $(this).attr("id");
            var info = 'id=' + del_id;
            if (confirm("Sure you want to delete this event? This cannot be undone later.")) {
                $.ajax({
                    type: "POST",
                    url: "delete_event.php",
                    data: info,
                    success: function () {
                    }
                });
                $(this).parents(".record").animate("fast").animate({
                    opacity: "hide"
                }, "slow");
            }
            return false;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#gigform').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                gig_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter the event name.'
                        }
                    }
                },
                gig_location: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter the event location.'
                        }
                    }
                },
                gig_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter the event date.'
                        }
                    }
                },
                poster_upload: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter the event poster.'
                        }
                    }
                },

            }
        });
    });

</script>

</body>
</html>