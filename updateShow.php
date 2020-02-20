<?php

	if (isset($_FILES['fmimage'])) {
	
	
	
                // Temporary file name stored on the server
                
        $tmpName=	$_FILES['fmimage']['tmp_name'];  
	$orgName=	$_FILES['fmimage']['name'];
	$imageName=	$_POST['fmimagename'];
	$showName=	$_POST['fmshowname'];
	$lampNumber=	$_POST['fmlamp'];
	$description=	$_POST['fmdesc'];
	$posX=		$_POST['fmx'];
	$posY=		$_POST['fmy'];
	
		
			
		
	 
	require_once 'dblib.php';
	$sql="select * from theatershow where s_name='$showName'";
	$result = mysql_query($sql) or die('Error, get album info failed. ' . mysql_error());
	
	$row=mysql_fetch_assoc($result);
		$s_name=$row['s_name'];
		$id=$row['s_id'];
		if($s_name==$showName){
			#require_once 'dblib.php';
			#$query="insert into theatershow(s_name,s_date)values('$showName',NOW())";
			#mysql_query($query,$db);
			#$id=(int) mysql_insert_id($db);
		
		
		
	
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
	require_once 'dblib.php';
	$query="update showImage SET i_name='$imageName',
		 i_lamp='$lampNumber',
		 i_image='$data',
		 i_thumbnail='$binaryThumbnail',
		 i_desc='$description',
		 i_date=NOW() where i_x='$posX' and i_y='$posY' and i_lamp='$lampNumber'";
	mysql_query($query);
#	$query="insert into showImage(i_show_id,i_orginalname,i_name,i_lamp,i_desc,i_image,i_thumbnail,i_x,i_y,i_date)values('$id','$orgName','$imageName','$lampNumber','$description','$data','$binaryThumbnail','$posX','$posY',NOW())";
	
	
                
                fclose($fp);
                
                header("location: showDetails.php?y=".$posY."&fselectshow=".$showName);  
                echo "<script>alert('Thank you, your file has been uploaded.');</script>";
                
               
               
       	   
       	  	}else{
       	  		?><script>alert=("error 404");</script><?php
          	}
          	
          	}else{
          		echo "fill all forms";
          	}
        
