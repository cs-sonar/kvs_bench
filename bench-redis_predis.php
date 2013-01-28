<?php
include("config.php");
$time_start = microtime( true );
require 'lib/predis-0.8/autoload.php';
Predis\Autoloader::register();

// 接続
$r = new Predis\Client('tcp://'.SERVER.':'.REDIS_PORT);

// セット
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$r->set("key" . $i ,$i);
}
$time_set = microtime(true);

// セット数の検証
$row = $r->DBSIZE();
echo validate_setnum($row);

// 取得
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$r->get("key".rand(1, LOOP_NUM)) . "\n";
}
$time_end = microtime(true);

//バルス
$r->flushall();

// 時間
include('./inc/printTime.php');
