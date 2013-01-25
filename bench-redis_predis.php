<?php
include("config.php");
$time_start = microtime( true );
require 'lib/predis-0.8/autoload.php';
Predis\Autoloader::register();

// 接続
$r = new Predis\Client('tcp://'.SERVER.':'.REDIS_PORT);

// セット
for ($i = 1; $i <= 10000; $i++) {
	$r->set("key" . $i ,$i);
}
$time_set = microtime(true);

// 取得
for ($i = 1; $i <= 10000; $i++) {
	$r->get("key".rand(1, 10000)) . "\n";
}
$time_end = microtime(true);

//バルス
exec('redis-cli FLUSHALL');

// 時間
include('./inc/printTime.php');
