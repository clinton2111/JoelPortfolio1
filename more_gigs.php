<?php
include "connection.php";

if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$result=mysql_query("select id from gigs where id <".$getLastContentId."  order by id desc limit 4");
$count=mysql_num_rows($result);
if($count>0){
	echo '<div class="row">';
while($row=mysql_fetch_array($result))
{
$id=$row['id'];
?>
<div class="col-md-3">
  <div class="gigs-item"> <a href="get_event.php?id=<?php echo $row['id'] ?>"  class="iframe"><img class="img-photos img-responsive"  src="gigpic.php?id=<?php echo $row['id'] ?>" ></a> </div>
</div>
<?php
}
echo '</div>';
?>
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
<?php

} else{
echo "<div class='row' align='center'><div class='all_loaded'>No More Content to Load</div></div>";
}
}
?>
<script src="js/jquery.colorbox.js"></script>
<!-- Bootstrap Core JavaScript -->

<!-- Custom Theme JavaScript -->
<script>
	//ColourBox Controls
	$(document).ready(function() {
		//Examples of how to assign the Colorbox event to elements
		$(".iframe").colorbox({
					iframe : true,
					width : "70%",
					height : "70%"
				});
	}); 
</script><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>