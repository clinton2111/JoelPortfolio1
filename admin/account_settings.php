<?php
include_once 'sessionchecker.php';
include('connection.php');

$status = "<div></div>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $id = $_SESSION['id'];
    $sql = "SELECT password FROM `users` WHERE `id`='$id'";
    $result = mysql_query($sql) or die(mysql_error());
    $count = mysql_num_rows($result);

    if ($count == 1) {
        $row = mysql_fetch_assoc($result);
        if ($old_password == $row['password']) {
            $sql = "UPDATE users SET password='$new_password' WHERE id=$id";
            $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);
            $status = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> Data has been updated successfully.
    </div>';

        } else {
            $status = '
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> Old Password does not match.
    </div>';

        }
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
    <title>Account Settings</title>

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
                    <h1 class="page-header"> Account Settings </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-gear"></i> Account Settings</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Update Password</h2>

                    <div> <?php echo $status ?></div>
                    <form role="updatepassword" method="post" action="account_settings.php" id="updatepassword">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input class="form-control" name="old_password" type="password">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input class="form-control" name="new_password" type="password">
                        </div>

                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input class="form-control" name="new_password_again" type="password">
                        </div>


                        <button type="submit" class="btn btn-default"> Update Password</button>
                        <button type="reset" class="btn btn-default"> Reset</button>
                    </form>
                </div>
            </div>
            <hr/>

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
<script>
    $(document).ready(function () {
        $('#updatepassword').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                old_password: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your old password'
                        }
                    }
                },
                new_password: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your new password '
                        },
                        stringLength: {
                            min: 6,
                            message: 'The password must be more than 6 characters long'
                        },
                    }
                },
                new_password_again: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your new password again'
                        },
                        identical: {
                            field: 'new_password',
                            message: 'The password and its confirm are not the same'
                        },
                    }
                }
            }
        });
    });

</script>

</body>
</html>