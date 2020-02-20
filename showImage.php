<?php


	if (!isset($_GET['id'])) {	
	exit;
}
          $id = $_GET['id'];
          
	
//	$thumb_id = (int) mysql_insert_id($db);
	require_once('dblib.php');
	$query ="SELECT * FROM showImage WHERE i_id='$id'";
	$query=mysql_query($query);
	$row=mysql_fetch_object($query);
	
	
	header("Content-type:image/jpeg");
	if($_GET['size']=="full")	{
			echo $row->i_image;//jos käytän mysql_fetch_object
		}else{
			echo $row->i_thumbnail;
		}
		
	//jos haluat käytään mysql_fetch_array
       /*  $thumb = imagecreatefromstring($row['thumbnail']);
         $image = imagecreatefromstring($row['image']);
         if ($im !== false) {
          	  header('Content-Type: image/jpg');
          	if($_GET['size']=="full")	{
		imagejpeg($image);
          	imagedestroy($image);
		}else{
          	  imagejpeg($thumb);
          	  imagedestroy($thumb);
         }
         */
?>
