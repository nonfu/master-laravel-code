<?php

echo '你好，学院君！';

$content = file_get_contents('car');
$object = unserialize($content);
var_dump($object);
