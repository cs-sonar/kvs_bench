<?php
include("config.php");
$time_start = microtime( true );

// 接続
$m = new memcached();
$m->addServer('localhost', MEMCACHE_PORT);

// セット
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$m->set("key".$i, $i);
}
$time_set = microtime(true);

// セット数の検証
// $items = $m->getStats();
// echo validate_setnum();

// 取得
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$m->get("key".rand(1, LOOP_NUM)) . "\n";
}
$time_end = microtime(true);

// お掃除
$m->flush();

// 時間
include('./inc/printTime.php');

