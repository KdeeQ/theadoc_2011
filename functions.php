<?php

	if (isset($_FILES['fimage'])) {
	
		
	
	
	
                // Temporary file name stored on the server
                
        $tmpName=	$_FILES['fimage']['tmp_name'];  
	$orgName=	$_FILES['fimage']['name'];
	$imageName=	$_POST['fimagename'];
	$showName=	$_POST['fshowname'];
	$lampNumber=	$_POST['flamp'];
	$description=	$_POST['fdesc'];
	$posX=		$_POST['fx'];
	$posY=		$_POST['fy'];
	
						
	
	require_once 'dblib.php';
	$sql="select * from theatershow where s_name='$showName'";
	$result = mysql_query($sql) or die('Error, get album info failed. ' . mysql_error());
	
	$row=mysql_fetch_assoc($result);
		$s_name=$row['s_name'];
		if(!$s_name==$showName){
			require_once 'dblib.php';
			$query="insert into theatershow(s_name,s_date)values('$showName',NOW())";
			mysql_query($query,$db);
			$id=(int) mysql_insert_id($db);
		}else{
		$id=$row['s_id'];
		
		require_once 'dblib.php';
		$sql="select * from showImage where i_show_id='$id' and i_x='$posX' and i_y='$posY' and i_lamp='$lampNumber'";
		$result = mysql_query($sql) or die('Error, get album info failed. ' . mysql_error());
	
		$row=mysql_fetch_assoc($result);
		if($row==""){
/*	echo	$orginalName=$row['i_orginalname'];
	echo	$name=$row['i_name'];
	echo	$xpos=$row['i_x'];
	echo	$ypos=$row['i_y'];
	echo	$lamp=$row['i_lamp'];
		
		if((!$orginalName==$orgName) && (!$name==$imageName) && (!$xpos==$posX) && (!$ypos==$posY))  {
	*/
                // Read the file
        $fp      = fopen($tmpName, 'r');
        $data = fread($fp, filesize($tmpName));    
        $sourceImage =imagecreatefromstring($data);
	
        $newWidth =imagesx($sourceImage);
	$newHeight =imagesy($sourceImage);

	$w=80;
	$h=60;
	$desImage=imagecreatetruecolor($w,$h);

imagecopyresampled($desImage,$sourceImage,0,0,0,0,$h,$w,$newWidth,$newHeight);

	ob_start();
	imageJPEG($desImage,Null,100);
	$binaryThumbnail=ob_get_contents();
	ob_end_clean();

	$data=addslashes($data);
	$binaryThumbnail=addslashes($binaryThumbnail);
	
	
	$query="insert into showImage(i_show_id,i_orginalname,i_name,i_lamp,i_desc,i_image,i_thumbnail,i_x,i_y,i_date)values('$id','$orgName','$imageName','$lampNumber','$description','$data','$binaryThumbnail','$posX','$posY',NOW())";
	$result=mysql_query($query);
	
                
                fclose($fp);
                
           //print "Thank you, your file has been uploaded.";
           header("location: createShow.php?showName=".$showName);  
                
               
                // Print results
               // print "Thank you, your file has been uploaded.";
                //echo" <a href='createShow.php'><h2>click</h2></a>";
               
          
                } else {
                echo "<script>alert('Image already exists Check input values');</script>";
                echo "<script>	window.history.back();</script>";
                
             }
        }
 }

   	
