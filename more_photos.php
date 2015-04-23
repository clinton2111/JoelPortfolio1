<?php
include "connection.php";

if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$result=mysql_query("select id from photos where id <".$getLastContentId."  order by id desc limit 4");
$count=mysql_num_rows($result);
if($count>0){
	echo '<div class="row">';
while($row=mysql_fetch_array($result))
{
$id=$row['id'];
?>

<div class="col-md-3">
	<div class="photos-item">
		<a href="get_photos.php?id=<?php echo $row['id']; ?>" class="group1"> <img class="img-photos img-responsive"  src="get_photos.php?id=<?php echo $row['id']; ?>" > </a>
	</div>
</div>
<?php
}
echo '</div>';
?>
<div class="row" align="center">
	<a href="#">
	<div id="load_more_<?php echo $id; ?>" class="more_tab">
		<div id="<?php echo $id; ?>" class="more_button btn btn-light">
			Load More Pictures
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
		$(".group1").colorbox({
			rel : 'group1',
			photo : true
		});
	}); 
</script>