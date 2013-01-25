<?php
include("config.php");
$time_start = microtime( true );

// 接続
$m = new memcached();
$m->addServer(SERVER, MEMCACHE_PORT);

// セット
for ($i = 1; $i <= 10000; $i++) {
	$m->set("key".$i, $i);
}
$time_set = microtime(true);

// 取得
for ($i = 1; $i <= 10000; $i++) {
	$m->get("key".rand(1, 10000)) . "\n";
}
$time_end = microtime(true);

// 時間
include('./inc/printTime.php');

