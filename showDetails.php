<html>
	<head><title>Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;">
<link rel="stylesheet" type="text/css" href="theaterShow.css">
<script language="javascript" type="text/javascript"></script>
	</head>
</html>
<?php
	require_once 'dblib.php';
	
	$showName= $_GET['fselectshow'];
	
	 $y = 1;
	 if ($_GET['y']) {
	 $y = $_GET['y']; 
	 }
	// $y=$_GET['y'];
	//if($y =""){
	//$y=1;
	//}else{
    	//$y = $_GET['y']; 
    	
    	$query=mysql_query("SELECT s_id FROM theatershow where s_name ='$showName' ");
    	$result=mysql_fetch_assoc($query);
    	$id=$result['s_id'];
    	$query=mysql_query("SELECT * FROM showImage where i_show_id='$id' and i_y='$y' order by i_x limit 100");
    	$rows=mysql_num_rows($query);
	$cols=mysql_num_fields($query);
	
	
		if ($rows==0)
			
			echo"<div> <a style='float:left;' href='index.php'>index</a>&nbsp;<a style='float:right;' href='help.html'>help</a></div><input  type='button'  value='BACK' onclick='window.history.back();'></center>";
		else {
			echo"<div> <a style='float:left;' href='index.php'>index - </a><a href='javascript:window.history.back();'> back</a><a style='float:right;' href='help.html'>help</a></div>";
			echo "<div class='scroll'>";
			echo"<table border=1 cellspacing=1 cellpadding=1%>\n<tr align=center>";
			

			for($i=0;$i<$rows;$i++)
			echo"<th align =\"bottom\">
		
			<img onclick=\"document.getElementById('big_image_element').src='showImage.php?id=" 
			. mysql_result($query,$i,0)."&size=full';document.getElementById('id_element').innerHTML="
			. mysql_result($query,$i,4). ";\" src=showImage.php?id=" 
			.mysql_result($query,$i,0)."&size=thumbnail\" />";
			echo "<tr>\n</tr>";
			for($i=0;$i<$rows;$i++)
				echo"<th>" .htmlentities(mysql_result($query,$i,3)).
			"</th>";
			echo "<tr>\n</tr>";
			for($i=0;$i<$rows;$i++)
				echo"<th>" .mysql_result($query,$i,4)."</th>";
			echo "<tr>\n</tr>";
			for($i=0;$i<$rows;$i++)
				echo"<th>" .mysql_result($query,$i,8)."</th>";
			echo "<tr>\n</tr>";
			for($i=0;$i<$rows;$i++)
				echo"<th>" .htmlentities(mysql_result($query,$i,9)).
			"</th>";
			echo "<tr>\n</tr>";
			for($i=0;$i<$rows;$i++)
				echo"<th>" .htmlentities(mysql_result($query,$i,10)).
			"</th>";		
			echo"</tr>\n</table>\n";
			echo "</div>";			
			
			# ja tämä css tiedostoon z-index <iso luku> ja position:absolute
			#echo "<center><img width='350' heigth='300'  onclick='var bigimg =document.createElement('img');bigimg.href=this.htrf; document.body.appendElement(bigimg); '   />";
			
			#echo bigimg.setAttribute('onclick','this.parentNode.remuveChild(this)');
			echo "<center><img width='350' onclick='this.width=950;' ondblclick='this.width=350;' id='big_image_element'  /><span id='id_element'></center></span>";
			
			echo "<center><table><tr>";
			if ($y > 0) {
			  echo "<td>";
			  echo "<form method='get'>";
			  echo "<input type='hidden' name='fselectshow' value='" . $_GET['fselectshow'] . "'>";
			  echo "<input type='hidden' name='y' value='" . ($y - 1) . "'>";
			  echo "<input type='submit' value='PREV'>";
			  echo "</form>";
			  echo "</td>";
			}
			
			echo "<td>";
			echo "<form method='get'>";
			echo "<input type='hidden' name='fselectshow' value='" . $_GET['fselectshow'] . "'>";
			echo "<input type='hidden' name='y' value='" . ($y + 1) . "'>";
			echo "<input type='submit' value='NEXT'>";
			echo "</form>";
			echo "</td>";
			
			echo "<td>";
			echo "<form action='modifyShow.php' method='get'>";
			echo "<input type='hidden' name='modifyshow' value='" . $_GET['fselectshow'] . "' >";
			echo "<input type='hidden' name='y' value=' " .$y. " '   >";
			
			
		#	echo "<input type='hidden' name=' ' value=' " " '   >";
			
			echo "<input type='submit' value='Modify image on the line'>";
			echo "</tr></table>";
			echo "<div class='rights'>DOCU by Kaj Qvickström</div>";			
			
			#echo "<input type='hidden' value='" . $y . "' id='y'>";
			#echo "<script src='helper.js'></script>";
			#echo "<center><input value=\"PREV\" type=\"button\"";
			#echo " onclick=\"window.location = updateY();\"></button></center>";
	
			
		}    	
?>

