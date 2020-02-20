<?php
	require_once 'dblib.php';
	$sql = "SELECT  s_name
		FROM theatershow
		ORDER BY s_name";
$result = mysql_query($sql) or die('Error, get album list failed : ' . mysql_error());                    

$shows = '';
while ($row = mysql_fetch_assoc($result)) {
	$shows .= '<option value="' . $row['s_name'] . '"' ;
	
	if ($row[''] == $album) {
		$shows .= ' selected';
	}
	
	$shows .= '>' . $row['s_name'] . '</option>';	
}
?>
<html>
	<head><title>index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;">
<link rel="stylesheet" type="text/css" href="theaterShow.css">
<script language="javascript" type="text/javascript"></script>
</head>
	<body>
	
	<div>Please use Firefox Web Browser &nbsp;<a style='float:right;' href='help.html'>help</a></div>
	
	

<Form action="showDetails.php" method="get"> 
<p><p><fieldset class="fieldset_blue"><center><h1>This is a TheaterShow documentprototype DOCU<p></h1><h4>with this prototype you can LOAD and CREATE <h2>TheaterShow-imagegallery</h3><p></center><p><p>
	<center></fieldset>
        <table border=1 width="100%" border="0" cellpadding="2" cellspacing="1" class="table_grey">
	
        <tr>
        	<th>Select Show</th>
        	
        	<td>
        	<select name="fselectshow" type="txt"  onChange="index(this.value)" >
        <option value="">-- All Shows --</option>
        <?php echo $shows; ?> 
    </select>
    		
       		<input name="btmselect" type="submit" value="Select"></td> 	
       	</tr>
        
	<tr>
        	<th>Create a new Show </th>
        	
        	<td><input type="button" value="Create" onclick="window.location='createShow.php';"></td>
        	
        </tr>
        </table>
        <div class="rights">DOCU by Kaj Qvickström</div>
          </form>
          
         </body>
</html>
<?php

?>
