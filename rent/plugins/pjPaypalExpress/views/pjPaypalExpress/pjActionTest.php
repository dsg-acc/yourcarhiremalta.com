<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
$controller->requestAction(array(
	'controller' => 'pjPaypalExpress', 
	'action' => 'pjActionForm', 
	'params' => $tpl['params'],
));
?>
</body>
</html>