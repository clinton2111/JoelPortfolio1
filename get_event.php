<?php
include 'connection.php';
$id= $_GET['id'];
$sql = "SELECT title,location,date,fb_page FROM gigs where id = $id";
$result = mysql_query($sql) or trigger_error(mysql_error() . $sql);

while ($row = mysql_fetch_array($result)){
	
	$title= $row['title'];
	$location= $row['location'];
	$date= $row['date'];
	$fb_page= $row['fb_page'];
	
	}
$result = explode(" ", $date, 2);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Colour Box CSS-->
		<link href="css/colorbox.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/stylish-portfolio.css" rel="stylesheet">
		<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	</head>

	<body>
		<section id="about" class="about">
			<div class="container">
				<section class="callout-mod">
					<div class="text-vertical-center">
						<h1><?php echo $title;?></h1>
						<hr class="large">
					</div>
				</section>
				<div class="row">
					<div class="col-md-6"><img src="gigpic.php?id=<?php echo $id; ?>" class="img-about img-responsive" >
					</div>
					<h3><strong>Location</strong>: <?php echo $location;?></h3>
					<h3><strong>Date</strong>: <?php echo $result[0];?></h3>
					<h3><strong>Time</strong>: <?php echo $result[1];?></h3>
					<ul class="list-inline">
						<li>
							<h3><strong>Social Pages:</strong></h3>
						</li>
						<li>
							<a href="<?php echo $fb_page;?>" target="_blank"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
						</li>
					</ul>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>

		<!-- jQuery Version 1.11.0 -->
		<script src="js/jquery-1.11.0.js"></script>
		<!-- ColourBox Javascript-->
		<script src="js/jquery.colorbox.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
