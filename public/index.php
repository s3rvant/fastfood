<?php

// Path alias
$public = __DIR__.'/';
$private = substr(__DIR__,0,-6).'private/';

// Bootstrap
include $private.'bootstrap.php';

// Output
echo '
<html>
<head>
<style>';
include $public.'style.css';
echo '
</style>
</head>
<body>
'.$text.'
</body>
</html>';

?>
