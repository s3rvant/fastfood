<?php

// Autoload classes on first use
spl_autoload_register(
    function ($class) {
        global $private;
        include $private.'classes/'.$class.'.php';
    }
);

// Connect to database
$text = 'Bootstrap';
$db = new database();
if($db->error){
    $text .= ' | '.$db->error_msg;
    return;
}
$text .= ' | Connected';

// Test query
$s = $db->query('select * from `test`');
if($s->num_rows == 0){
    $text .= ' | No records';
    return;
}
while($r = $s->fetch_object()){
    $text .= ' | '.$r->text;
}

?>
