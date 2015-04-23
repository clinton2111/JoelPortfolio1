<?php
include_once 'sessionchecker.php';
include('connection.php');
$status = "<div></div>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["photo_upload"]["size"] != 0) {
        $image_name = addslashes($_FILES['photo_upload']['name']);
        $date = date("d-m-Y");
        $image = addslashes(file_get_contents($_FILES['photo_upload']['tmp_name']));
        $insert = "INSERT INTO photos (photo_image,date_uploaded,image_name) VALUES ('" . $image . "','" . $date . "','" . $image_name . "')";
        $result = mysql_query($insert) or die(mysql_error());
        if ($result == 1) {
            $status = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> ' . $image_name . ' has been uploaded successfully.
    </div>';
        } else {
            $status = '
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> Please attach an image to upload.
    </div>';
        }
        unset($_FILES);
    } else {
        $status = '
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> Please attach an image to upload.
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
    <title>Photo Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/colorbox.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrapValidator.css"/>
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <h1 class="page-header"> Photo Manager
                        <small>Manage all the Photos from one place</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file-image-o"></i> Photo Manager</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Upload Picture</h2>

                    <div> <?php echo $status ?></div>
                    <form role="form" enctype="multipart/form-data" method="post" action="photo_manage.php"
                          id="pic_upload">
                        <div class="form-group">
                            <label></label>
                            <input type="file" name="photo_upload"/>
                        </div>
                        <button type="submit" class="btn btn-default"> Upload Picture</button>
                        <button type="reset" class="btn btn-default"> Reset</button>
                    </form>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Uploaded Photos</h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="phototable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Date Uploaded</th>
                                <th>Image Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT id,date_uploaded,image_name FROM photos order by id desc ";
                            $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);

                            while ($row = mysql_fetch_array($result)) {
                                echo '<tr class="record">';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td> <a href=get_photos.php?id=' . $row['id'] . ' class="group1"><img class="img-responsive"  src=get_photos.php?id=' . $row['id'] . ' height="50%" width="50%"></a> </td>';
                                echo '<td>' . $row['date_uploaded'] . '</td>';
                                echo '<td>' . $row['image_name'] . '</td>';
                                ?>

                                <td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton"><i
                                            class="fa fa-trash-o fa-fw fa-3x"></i></a></td>
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
<script src="js/jquery.colorbox.js"></script>
<script>
    $(document).ready(function () {
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({
            rel: 'group1',
            photo: true
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
        $('#phototable').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>
<script type="text/javascript">
    $(function () {

        $(".delbutton").click(function () {
            var del_id = $(this).attr("id");
            var info = 'id=' + del_id;
            if (confirm("Sure you want to delete this photo? This cannot be undone later.")) {
                $.ajax({
                    type: "POST",
                    url: "delete_pic.php",
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
        $('#pic_upload').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

                photo_upload: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter a photo to upload.'
                        }
                    }
                },

            }
        });
    });

</script>
</body>
</html>