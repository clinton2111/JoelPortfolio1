<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Validator CSS -->
    <link rel="stylesheet" href="css/bootstrapValidator.css"/>
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

    <section class="callout-mod">
        <div class="text-vertical-center">
            <h1>Login</h1>
            <hr class="large">
        </div>
    </section>
    <div id="box">
        <form id="LoginForm" class="form-horizontal contactForm" name="LoginForm">
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>

                <div class="col-sm-6">
                    <input type="email" class="form-control" id="emailid" name="emailid"
                           placeholder="Enter Email ID">
                </div>
            </div>
            <div class="form-group">
                <label for="subj" class="col-sm-3 control-label">Password</label>

                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Enter Password">
                </div>
            </div>
            <div id="error" align="center">

            </div>
            <div align="center" class="form-group">
                <button type="submit" id="login" class="btn btn-primary" name="login" value="Login">
                    Login
                </button>
            </div>
            <div align="right" class="col-sm-9">
                <a href="retrivepassword.php">Forgot Password</a>
            </div>
        </form>
    </div>

</div>

<script src="js/jquery-1.11.0.js"></script>
<script src="js/jquery.ui.shake.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function () {
        $('#LoginForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                emailid: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter a email address'
                        },
                        emailAddress: {
                            message: 'Please enter a valid email address'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your password'
                        }
                    }
                }
            }
        });
    });

</script>
<script>
    $(document).ready(function () {

        $('#login').click(function () {
            var emailid = $("#emailid").val();
            var password = $("#password").val();
            var dataString = 'emailid=' + emailid + '&password=' + password;
            if ($.trim(emailid).length > 0 && $.trim(password).length > 0) {

                $.ajax({
                    type: "POST",
                    url: "userlogin.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function () {
                        $("#login").val('Connecting...');
                    },
                    success: function (data) {
                        if (data) {
                            console.log(data);
                            window.location = "index.php";
                        } else {
                            $('#box').shake();
                            $("#login").val('Login')
                            $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid email id or password. ");
                        }
                    }
                });

            }
            return false;
        });

    });
</script>

</body>
</html>
