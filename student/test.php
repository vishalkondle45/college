<?php
$mystring = '@visha@l';
$findme   = '@';
// $pos = strpos($mystring, $findme);

$present = substr($mystring, 0, 1);
if ($present == '@') {
    echo "@";
} else {
    echo "Not";
}
