<?php
include "mailer.php";

$mode = $_REQUEST['mode'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$areaname = $_REQUEST['areaname'];
$questype = $_REQUEST['questype'];
$content = $_REQUEST['content'];
$ip = $_SERVER['REMOTE_ADDR'];

$subject = "[Form_mail] $name ($areaname, $hp)";
$body = "";

$body .= "name: $name<br>";
$body .= "e-mail: $email<br>";
$body .= "Area: $areaname<br>";
$body .= "Question Type: $questype<br>";
$body .= "Content: $content<p>&nbsp;<p>";

$body2 = "<table border='0' cellspacing='1' cellpadding='3' bgcolor='#444'>";
$body2.= "<tr bgcolor='white'><td align='center' height='25'>Name</td><td align='left'>$name</td></tr>";
$body2.= "<tr bgcolor='white'><td align='center' height='25'>E-mail</td><td align='left'>$email</td></tr>";
$body2.= "<tr bgcolor='white'><td align='center' height='25'>Area</td><td align='left'>$areaname</td></tr>";
$body2.= "<tr bgcolor='white'><td align='center' height='25'>Question Type</td><td align='left'>$questype</td></tr>";
$body2.= "<tr bgcolor='white'><td align='center' height='25'>Content</td><td align='left'>$content</td></tr>";
$body2.= "</table>";

//$admin_email = "e-mail address";
$admin_email = "undfnd@undfnd.com";

if($mode == "send") {
	//Start attachment
	for($i=1;$i<=3;$i++) {
		$file[$i] = $_FILES['userfile'.$i]['name'];
		$target[$i] = "./temp/".$file[$i];

		if (move_uploaded_file($_FILES['userfile'.$i]['tmp_name'], $target[$i])) {
			chmod("$target[$i]", 0777);
		}
	}

	$ret = mailer($name, $email, "Admin", $admin_email, $subject, $body.$body2, $file);

	if($file[1] != "") @unlink($target[1]);
	if($file[2] != "") @unlink($target[2]);
	if($file[3] != "") @unlink($target[3]);
	if($ret) echo " <font color='red'>Contact Successful</font>";
	else echo " <font color='red'>Contact Failed</font>";
}

?>
