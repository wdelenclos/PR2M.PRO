<?php

    $dir = "../data/tests_uploads/lexical/img/".$_POST['type'];

// Sort in ascending order - this is default
$a = scandir($dir);
$data = json_encode($a);
print($data);

