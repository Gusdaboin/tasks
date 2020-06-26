<?php

$info = new SplFileInfo($uri);
$extension = $info->getExtension();
$mime_type = json_decode(file_get_contents('./app/extensions.json'), true)['.'.$extension];
header('Content-Type: '.$mime_type);
// echo file_get_contents($uri);
include_once $uri;
