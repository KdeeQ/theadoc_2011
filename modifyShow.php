<html>
	<head> <title align=center>Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;">
<link rel="stylesheet" type="text/css" href="theaterShow.css">
<script language="javascript" type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    document.fmupload.action="updateShow.php"
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(fmshowname,"name of the show must be filled out!")==false)
  {fmshowname.focus();return false;}
  
  if (validate_required(fmimagename,"name of the image must be filled out!")==false)
  {fmimagename.focus();return false;}

  if (validate_required(fmlamp,"number of the lamp must be filled out!")==false)
  {fmlamp.focus();return false;}

  if (validate_required(fmy,"number of the line must be filled out!")==false)
  {fmy.focus();return false;}

  if (validate_required(fmx,"position of the lamp must be filled out!")==false)
  {fmx.focus();return false;}

  if (validate_required(fmimage,"image must selected!")==false)
  {fmimage.focus();return false;}
  }
 
}
	</script>
	</head>
	
	<body>
	<div> <a style='float:left;' href='index.php'>index - </a><a href='javascript:window.history.back();'> images</a><a style='float:right;' href='help.html'>help</a></div>	
<form  method="post"  enctype="multipart/form-data" name="fmupload" onsubmit="return validate_form(this)">
<p><p><fieldset class="fieldset_blue"><center><h2>Modify</h2><h4>Modify lamp and image on the line<p><p></center></fieldset>
        <table width="100%" border="0" cellpadding="2" cellspacing="1" class="table_grey">
	
        <tr>
        	<th>Name of the Show</th>
        	<td><input value="<?php echo $_GET['modifyshow'];?>" type="txt" name="fmshowname" size="44"></td>
	</tr>
	<tr>
		<th>Name of the Image</th>
		<td><input value="<?php echo $_GET['x'];?>" name="fmimagename" type="txt" size="44" maxlength="50"></td>
	</tr>
	<tr>
		<th>Number of the Lamp</th>
		<td><input name="fmlamp" type="txt" size="44" maxlength="3"></td>
	</tr>
	<tr>
		<th>Number of the line</th>
		<td><input value="<?php echo $_GET['y'];?>" type="txt" size="44" name="fmy" ></td>
	</tr>
	<tr>
		<th>Position on the line</th>
		<td><input name="fmx" type="txt" size="44" maxlength="2"></td>
	</tr>
	<tr>
		<th>Description </th>
		<td><textarea name="fmdesc" cols="50" rows="5" ></textarea></td>
	</tr>
	<tr>	
		<th>Select Image </th>
		<td><input name="fmimage" size="20" accept="image/jpg" type="file" ></td>
	</tr>
        <tr>
        	<td>&nbsp;</td>
        	<td><input name="btnAddmody" value="Modify position of lamp and new image" type="submit" >
        	<input name="btnCancelmody" value="Cancel" type="button" onClick="window.history.back();"></td>
        </tr>
      
        </table>
        <div class="rights">DOCU by Kaj Qvickström</div>
          </form>

         </body>
</html>

