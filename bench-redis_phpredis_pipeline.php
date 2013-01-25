<?php
include("config.php");
$time_start = microtime( true );

// 接続
$r = new Redis();
$r->connect(SERVER);

// セット
$pipe = $r->multi(Redis::PIPELINE);
for ($i = 1; $i <= 10000; $i++) {
	$pipe->set("key" . $i ,$i);
}
$pipe->exec();
$time_set = microtime(true);

// 取得
for ($i = 1; $i <= 10000; $i++) {
	$r->get("key".rand(1, 10000)) . "\n";
}
$time_end = microtime(true);

// バルス！
exec('redis-cli FLUSHALL');

// 時間
include('./inc/printTime.php');
