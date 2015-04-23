<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/bootstrapValidator.css"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Validator CSS -->
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
          rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $code = $_GET['code'];
        $id = $_GET['id'];
        $emailid = $_GET['emailid'];
        ?>

        <section class="callout-mod">
            <div class="text-vertical-center">
                <h1>Reset Password</h1>
                <hr class="large">
            </div>
        </section>
        <div id="box">
            <form id="ResetForm" class="form-horizontal ResetForm" name="ResetForm" method="post"
                  action="recoverpass.php">
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password_again" name="password_again"
                               placeholder="Enter Password again">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="code" name="code"
                               readonly="readonly" value="<?php echo $code; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="id" name="id"
                               readonly="readonly" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="emailid" name="emailid"
                               readonly="readonly" value="<?php echo $emailid; ?>">
                    </div>
                </div>

                <div align="center" class="form-group">
                    <button type="submit" id="resetpass" class="btn btn-primary" name="resetpass"
                            value="Reset Password">
                        Reset Password
                    </button>
                </div>

            </form>
        </div>

    <?php
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'connection.php';
        $code = $_POST['code'];
        $id = $_POST['id'];
        $emailid = $_POST['emailid'];
        $empty = "";
        $password = md5($_POST['password']);
        $sql = "UPDATE users SET `password`='$password' WHERE `id`='$id' and `email_id`='$emailid' and `password_temp`='$code' ";
        $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);
        $delete = "UPDATE users SET password_temp='$empty' WHERE id=$id";
        $result2 = mysql_query($delete) or die(mysql_error());
        ?>
        <section class="callout-mod">
            <div class="text-vertical">
                <h1>Your Password has been changed.<a href="localhost/joel/admin/login.php"><u>Click here</u></a> to
                    login with your new password.</h1>

            </div>
        </section>
    <?php
    }
    ?>

    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator.js"></script>
    <script>
        $(document).ready(function () {
            $('#ResetForm').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter your password'
                            },
                            stringLength: {
                                min: 6,
                                message: 'The password must be more than 6 characters long'
                            }
                        }
                    },
                    password_again: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter your password again'
                            },
                            identical: {
                                field: 'password',
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