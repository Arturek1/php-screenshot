<?php
require __DIR__ . '/vendor/autoload.php';

use Arturek1\Screenshot\Screenshot;

$key = "GOOGLE API KEY";

$url = "https://tvn24.pl";
$screenshot = new Screenshot($key);
$base64 = $screenshot->get($url);

echo $base64;