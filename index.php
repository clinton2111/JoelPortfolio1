<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is the Offical Website of DJ Joel,one of the best and most happening DJ's on the Goan Party Scene">
		<meta name="keywords" content="DJ-Joel-Goa,DJ-Joel,Party,DJ,Goa,Club DJ,Event DJ,Bullfrog,Dubai">
		<meta name="author" content="">
		<title>DJ Joel Official Site</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Colour Box CSS-->
		<link href="css/colorbox.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/stylish-portfolio.css" rel="stylesheet">
		<!-- Validator CSS -->
		<link rel="stylesheet" href="css/bootstrapValidator.css"/>
		<!-- Custom Fonts -->
		<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>

		<!-- Navigation -->
		<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
		<nav id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
				<li class="sidebar-brand">
					<a href="#top">DJ Joel Official Site</a>
				</li>
				<li>
					<a href="#top">Home</a>
				</li>
				<li>
					<a href="#about">About</a>
				</li>
				<li>
					<a href="#gigs">Gigs</a>
				</li>
				<li>
					<a href="#mixes">Mixes</a>
				</li>
				<li>
					<a href="#photos">Photos</a>
				</li>
				<li>
					<a href="#contact">Contact</a>
				</li>
			</ul>
		</nav>

		<!-- Header -->
		<header id="top" class="header">
			<div class="text-vertical-center">
				<h1><img src="img/joellogo.gif"></h1>
				<h3>The Hottest Name on Goa's Party Scene.</h3>
				<br>
				<ul class="list-inline">
					<li>
						<a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-soundcloud fa-fw fa-3x"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-instagram fa-fw fa-3x"></i></a>
					</li>
				</ul>
				<a href="#about"><span class="fa-stack fa-3x"> <i class="fa fa-arrow-circle-down"></i> </span></a>
			</div>
		</header>

		<!-- About -->
		<section id="about" class="about">
			<div class="container">
				<section class="callout-mod">
					<div class="text-vertical-center">
						<h1>About</h1>
						<hr class="large">
					</div>
				</section>
				<div class="row">
					<div class="col-md-3 col-sm-6"><img src="img/joelpropic.jpg" class="img-photos img-responsive" >
					</div>
					<h2>DJ Joel known as one of the most popular members of the Goa Party scene. Other than being the co owner of Bullfrog Goa, DJ Joel has played at many parties and events in Goa and Dubai.</h2>
				</div>
				<hr class="small">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<h4><strong>DJ Since</strong>: 1996</h4>
						<h4><strong>Category</strong>: Club DJ / Event DJ</h4>
					</div>
					<div class="col-md-3 col-sm-6">
						<h4><strong>Equipment</strong>: Technics SL-1210 MK2, Allen & Heath Xone:92, Pioneer CDJ-2000 NXS, Pioneer EFX-1000, Pioneer RMX-1000</h4>
						<h4><strong>Residency</strong>: Indian</h4>
					</div>
					<div class="col-md-3 col-sm-6">
						<h4><strong>Venues played</strong>: Sinq, Cape Town Cafe, The Observartory(Dubai) </h4>
						<h4><strong>Set duration</strong>: 3-6 hours</h4>
					</div>
					<div class="col-md-3 col-sm-6">
						<h4><strong>Awards</strong>: MixMag DJ of the Year 2014, DJ Mag DJ of the Year 2013, DMC Championship Finalist 2013</h4>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>

		<!-- Gigs -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
		<section id="gigs" class="photos bg-primary">
			<div class="container">
				<section class="callout-mod2">
					<div class="text-vertical-center">
						<h1>GIGS</h1>
						<hr class="large">
					</div>
				</section>
				<div class="row">
					<ul class="load_content" id="load_more_ctnt2">
						<?php
						$sql = "SELECT id FROM gigs order by id desc LIMIT 4";
						$result = mysql_query($sql) or trigger_error(mysql_error() . $sql);
						echo '<div class="row">';
						while ($row = mysql_fetch_array($result)) {
							$id = $row['id'];
							echo '<div class="col-md-3">';
							echo '<div class="gigs-item"> <a href=get_event.php?id=' . $row['id'] . ' class="iframe"><img class="img-photos img-responsive"  src=gigpic.php?id=' . $row['id'] . ' ></a> </div>';
							echo '</div>';
						}
						echo '</div>';
						?>
					</ul>
				</div>
				<div class="row" align="center">
					<div class="more_div">
						<a href="#">
						<div id="load_more_2<?php echo $id; ?>" class="more_tab2">
							<div class="more_button2 btn btn-light" id="<?php echo $id; ?>">
								Load More Events
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /.container -->
		</section>

		<!--MIXES-->
		<section id="mixes" class="about">
			<div class="container">
				<section class="callout-mod">
					<div class="text-vertical-center">
						<h1>Mixes</h1>
						<hr class="large">
					</div>
				</section>
				<div class="row">
					<iframe id="sc-widget" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/clinton_dsouza/sets/my-plays" width="100%" height="465" scrolling="no" frameborder="no"></iframe>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>

		<!-- Photos -->
		<section id="photos" class="photos bg-primary">
			<div class="container">
				<section class="callout-mod2">
					<div class="text-vertical-center">
						<h1>PHOTOS</h1>
						<hr class="large">
					</div>
				</section>
				<div class="row">
					<ul class="load_content" id="load_more_ctnt">
						<?php
						$sql = "SELECT id FROM photos order by id desc LIMIT 4";
						$result = mysql_query($sql) or trigger_error(mysql_error() . $sql);
						echo '<div class="row">';
						while ($row = mysql_fetch_array($result)) {
							$id = $row['id'];
							echo '<div class="col-md-3">';
							echo '<div class="photos-item"> <a href=get_photos.php?id=' . $row['id'] . ' class="group1"><img class="img-photos img-responsive"  src=get_photos.php?id=' . $row['id'] . ' ></a> </div>';
							echo '</div>';
						}
						echo '</div>';
						?>
					</ul>
				</div>
				<div class="row" align="center">
					<div class="more_div">
						<a href="#">
						<div id="load_more_<?php echo $id; ?>" class="more_tab">
							<div class="more_button btn btn-light" id="<?php echo $id; ?>">
								Load More Pictures
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /.container -->
		</section>

		<!-- Contact -->
		<section id="contact" class="about">
			<div class="container">
				<section class="callout-mod">
					<div class="text-vertical-center">
						<h1>CONTACT</h1>
						<hr class="large">
					</div>
				</section>
				<form id="contactForm"  class="form-horizontal contactForm"  name="contactForm" action="mailer.php" method="post">
					<div class="form-group">
						<label for="sendername" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sendername" name="sendername"
							placeholder="Enter Name"  >
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="emailid"  type="email" name="emailid"
							placeholder="Enter Email ID" >
						</div>
					</div>
					<div class="form-group">
						<label for="subj" class="col-sm-2 control-label">Subject</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="subject"  type="subject" name="subject"
							placeholder="Enter Message Subject" >
						</div>
					</div>
					<div class="form-group">
						<label for="sendername" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="3" id="message" placeholder="Your Message Here"  name="message" ></textarea>
						</div>
					</div>
					<div align="center" class="form-group">
						<button type="submit" id="submit" class="btn btn-primary" name="submit" value="Send Message">
							Send Message
						</button>
						<button type="reset" class="btn btn-primary" name="reset" value="Reset Fields">
							Reset Fields
						</button>
					</div>
					<div id="status" align="center">
				</form>
			</div>
		</section>

		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1 text-center">
						<ul class="list-unstyled">
							<li>
								<i class="fa fa-phone fa-fw"></i> (123) 456-7890
							</li>
							<li>
								<i class="fa fa-envelope-o fa-fw"></i><a href="mailto:clinton92@gmail.com">clinton92@gmail.com</a>
							</li>
						</ul>
						<br>
						<ul class="list-inline">
							<li>
								<a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram fa-fw fa-3x"></i></a>
							</li>
						</ul>
						<hr class="small">
						<p class="text-muted">
							Copyright &copy; Clinton D'souza 2014
						</p>
					</div>
				</div>
			</div>
		</footer>

		<!-- jQuery Version 1.11.0 -->
		<script src="js/jquery-1.11.0.min.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script>
			var $j = jQuery.noConflict(true);
		</script>

		<!-- ColourBox Javascript-->
		<script src="js/jquery.colorbox.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/ajaxsubmit.js"></script>
		<script type="text/javascript" src="js/bootstrapValidator.js"></script>
		<!-- Custom Theme JavaScript -->
		<script>
			//ColourBox Controls
			$(document).ready(function() {
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({
					rel : 'group1',
					photo : true
				});
				$(".iframe").colorbox({
					iframe : true,
					width : "70%",
					height : "90%"
				});

			});

			// Closes the sidebar menu
			$("#menu-close").click(function(e) {
				e.preventDefault();
				$("#sidebar-wrapper").toggleClass("active");
			});

			// Opens the sidebar menu
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#sidebar-wrapper").toggleClass("active");
			});

			// Scrolls to the selected menu item on the page
			$(function() {
				$('a[href*=#]:not([href=#])').click(function() {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
						if (target.length) {
							$('html,body').animate({
								scrollTop : target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			});
		</script>
		<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
		<script type="text/javascript">
			( function() {
					var widgetIframe = document.getElementById('sc-widget'), widget = SC.Widget(widgetIframe);

					widget.bind(SC.Widget.Events.READY, function() {
						widget.bind(SC.Widget.Events.PLAY, function() {
							// get information about currently playing sound
							widget.getCurrentSound(function(currentSound) {
								console.log('sound ' + currentSound.get('') + 'began to play');
							});
						});
						// get current level of volume
						widget.getVolume(function(volume) {
							console.log('current volume value is ' + volume);
						});
						// set new volume level
						widget.setVolume(50);
						// get the value of the current position
					});

				}());
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
				resizeTimer = setTimeout(function() {
					if (jQuery('#cboxOverlay').is(':visible')) {
						jQuery.colorbox.load(true);
					}
				}, 300);
			}

			// Resize ColorBox when resizing window or changing mobile device orientation
			jQuery(window).resize(resizeColorBox);
			window.addEventListener("orientationchange", resizeColorBox, false);
		</script>
		<script type="text/javascript">
			$j(function() {

				$j('.more_button').live("click", function() {
					var getId = $(this).attr("id");
					if (getId) {
						$j("#load_more_" + getId).html('<i class="fa fa-circle-o-notch fa-spin fa-3x"></i>');
						$.ajax({
							type : "POST",
							url : "more_photos.php",
							data : "getLastContentId=" + getId,
							cache : false,
							success : function(html) {
								$("ul#load_more_ctnt").append(html);
								$("#load_more_" + getId).remove();
							}
						});
					} else {
						$j(".more_tab").html('The End');
					}
					return false;
				});
			});

		</script>
		<script type="text/javascript">
			$j(function() {

				$j('.more_button2').live("click", function() {
					var getId = $(this).attr("id");
					if (getId) {
						$j("#load_more_2" + getId).html('<i class="fa fa-circle-o-notch fa-spin fa-3x"></i>');
						$.ajax({
							type : "POST",
							url : "more_gigs.php",
							data : "getLastContentId=" + getId,
							cache : false,
							success : function(html) {
								$("ul#load_more_ctnt2").append(html);
								$("#load_more_2" + getId).remove();
							}
						});
					} else {
						$j(".more_tab2").html('The End');
					}
					return false;
				});
			});

		</script>
		<script>
			$(document).ready(function() {
				$('#contactForm').bootstrapValidator({
					feedbackIcons : {
						valid : 'glyphicon glyphicon-ok',
						invalid : 'glyphicon glyphicon-remove',
						validating : 'glyphicon glyphicon-refresh'
					},
					fields : {
						sendername : {
							validators : {
								notEmpty : {
									message : 'Please enter your name.'
								},
								regexp : {
									regexp : /^[a-z\s]+$/i,
									message : 'Name can consist of alphabetical characters only'
								}
							}
						},
						emailid : {
							validators : {
								notEmpty : {
									message : 'Please enter a email address'
								},
								emailAddress : {
									message : 'Please enter a valid email address'
								}
							}
						},
						subject : {
							validators : {
								notEmpty : {
									message : 'Please enter a subject'
								}
							}
						},
						message : {
							validators : {
								notEmpty : {
									message : 'Please enter your message'
								}
							}
						}
					}
				});
			});

		</script>
	</body>
</html>
