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
    document.fupload.action="functions.php"
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(fshowname,"name of the show must be filled out!")==false)
  {fshowname.focus();return false;}
  
  if (validate_required(fimagename,"name of the image must be filled out!")==false)
  {fimagename.focus();return false;}

  if (validate_required(flamp,"number of the lamp must be filled out!")==false)
  {flamp.focus();return false;}

  if (validate_required(fy,"number of the line must be filled out!")==false)
  {fy.focus();return false;}

  if (validate_required(fx,"position of the lamp must be filled out!")==false)
  {fx.focus();return false;}

  if (validate_required(fimage,"image must selected!")==false)
  {fimage.focus();return false;}
  }
 
}


</script>

	</head>
	
	<body>
	<div> <a style="float:left;" href="index.php">index</a>&nbsp;<a style="float:right;" href="help.html">help</a></div>

<form   method="post" enctype="multipart/form-data" name="fupload" onsubmit="return validate_form(this)">
<p><p><fieldset class="fieldset_blue"><p><p><center><h2>Create</h2><h4>Here you can create a new theaterShow Photo-gallery<p><p></center></fieldset>
        <table width="100%" border="0" cellpadding="2" cellspacing="1" class="table_grey">
	
        <tr>
        	<th>Name of the Show</th>
        	<td><input name="fshowname" value="<?php echo $_GET['showName'];?>" type="txt" size="44" maxlength="50" ></td>
	</tr>
	<tr>
		<th>Name of the Image</th>
		<td><input name="fimagename" type="txt" size="44" maxlength="50"></td>
	</tr>
	<tr>
		<th>Number of the Lamp</th>
		<td><input name="flamp" type="txt" size="44" maxlength="3"></td>
	</tr>
	<tr>
		<th>Number of the line</th>
		<td><input name="fy" type="txt" size ="44"maxlength="2"></td>
	</tr>
	<tr>
		<th>Position on the line</th>
		<td><input name="fx" type="txt" size="44" maxlength="4"></td>
	</tr>
	<tr>
		<th>Description </th>
		<td><textarea name="fdesc" cols="50" rows="5" ></textarea></td>
	</tr>
	<tr>	
		<th>Select Image </th>
		<td><input name="fimage" accept="image/jpg" type="file"></td>
	</tr>
        <tr>
        	<td>&nbsp;</td>
        	<td><input name="btnAdd" value="Create a new SHOW" type="submit">
        	<input name="btnCancel" value="Cancel" type="button" onClick="window.history.back();"></td>
        </tr>
        </table>
        <div class="rights">DOCU by Kaj Qvickström</div>
          </form>
          
         </body>
</html>

