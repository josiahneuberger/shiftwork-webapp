<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php

function setPattern() {
	
	$encrypt_for_password = "jdklsajdflkjdla;jsdflkjsdlkfjsdlkj;flksdj";
	$settings=simplexml_load_file("../../cal_scripts/settings.xml");
	echo '<script>';
	echo '$.jStorage.set("pattern", Tea.decrypt("' . $settings->pattern . '", ' . 'Tea.decrypt("' . $settings->password . '", "' . $encrypt_for_password . '")));';
	echo '$.jStorage.set("pattern_dates", Tea.decrypt("' . $settings->pattern_dates . '", ' . 'Tea.decrypt("' . $settings->password . '", "' . $encrypt_for_password . '")));';
	echo '</script>';	
}
	
?>

</head>
</html>