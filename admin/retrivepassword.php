<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    $emailid = mysql_real_escape_string($_POST['emailid']);
    $sql = "SELECT id,username FROM `users` WHERE `email_id`='$emailid'";
    $result = mysql_query($sql) or die(mysql_error());
    $count = mysql_num_rows($result);

    if ($count == 1) {
        $row = mysql_fetch_assoc($result);
        $id = $row['id'];
        $username = $row['username'];
        $length = 60;
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);


        $subject = "DJ Joel Admin Panel Account Recovery";
        $from = "Password Recovery<noreply@djjoel.com>";
        $headers = "From:" . $from;
        $fields = array(
            'code' => $randomString, 'id' => $id, 'emailid' => $emailid

        );
        $URL = "http://www.localhost/joel/admin/recoverpass.php?" . http_build_query($fields, '', "&");
        $message = 'Hello ' . $username . '<br> You have recently requested to retrive your lost account password. Please click the link below to reset your password <br> <a href="' . $URL . '">Click Here</a>';

        if ((mail($emailid, $subject, $message, $headers)) == 1) {
            $sql = "UPDATE users SET password_temp='$randomString' WHERE id=$id";
            $result = mysql_query($sql) or trigger_error(mysql_error() . $sql);
            echo "Please check your email";
        }
    }

} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Recovery Email</title>

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

        <section class="callout-mod">
            <div class="text-vertical-center">
                <h1>Recover Account</h1>
                <hr class="large">
            </div>
        </section>
        <div id="box">
            <form id="RecoverForm" class="form-horizontal RecoverForm" name="RecoverForm" method="post"
                  action="retrivepassword.php">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="emailid" name="emailid"
                               placeholder="Enter Email ID">
                    </div>
                </div>

                <div align="center" class="form-group">
                    <button type="submit" id="sendemail" class="btn btn-primary" name="sendemail" value="Send Email">
                        Send Email
                    </button>
                </div>
                <div align="right" class="col-sm-9"></div>
            </form>
        </div>
    </div>

    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
    </html>

<?php
}
?>