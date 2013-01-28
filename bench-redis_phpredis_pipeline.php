<?php
include("config.php");
$time_start = microtime( true );

// 接続
$r = new Redis();
$r->connect(SERVER);

// セット
$pipe = $r->multi(Redis::PIPELINE);
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$pipe->set("key" . $i ,$i);
}
$pipe->exec();
$time_set = microtime(true);

// セット数の検証
$row = $r->DBSIZE();
echo validate_setnum($row);

// 取得
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$r->get("key".rand(1, LOOP_NUM)) . "\n";
}
$time_end = microtime(true);

// バルス
$r->flushall();

// 時間
include('./inc/printTime.php');
