# kvs test

いろんなkvsやDBに1万件の値をセット/取得するベンチ(php)

 * redis (predis / phpredis)
 * memcached ( libmemcached )
 * MySQL ( pdo )
 * SQLITE ( pdo )


## 準備
###全体
config.phpにて各種設定を行います。
またシェルから実行するので、PHPのパスを通してください。


###mysql
mysql.sqlにcreate table文のsqlがあるのでテーブル作成して下さい。

###redis
redisのPHP用クライアントを入れます。

phpredis
```sh
$ git clone https://github.com/nicolasff/phpredis.git
$ cd phpredis
$ phpize
$ ./configure
$ make
$ sudo make install
```

php.iniへredis.soを追加

```sh
$ vi /path/to/php.ini
extension=redis.so
```

###memcached
memcacheのPHP用クライアントを入れます。

libmemcached
```sh
# sudo pecl install libmemcached
```

php.iniへmemcached.soを追加

```sh
$ vi /path/to/php.ini
extension=memcached.so
```

###SQLite(備考)
以下のように作成しています。

```sh
$ sqlite3 bench.db
sqlite >CREATE TABLE `demo` (
...> `key` varchar(8) NOT NULL,
...> `value` varchar(5) NOT NULL,
...> PRIMARY KEY (`key`)
...> );

```

## 実行
一気に実行
```sh
./allcheck.sh
```
単体で実行
```sh
php bench-memcached.php
```


## 実行結果例
```

------------------- memcached -------------------

set : 0.37026000022888 sec
get : 0.36533117294312 sec
total : 0.735591173172 sec

------------------- mysql -------------------

set : 2.2048268318176 sec
get : 1.0155639648438 sec
total : 3.2203907966614 sec

------------------- mysql(pdo) -------------------

set : 1.852165222168 sec
get : 1.08043384552 sec
total : 2.932599067688 sec

------------------- mysql(pdo,transaction) -------------------

set : 0.042414903640747 sec
get : 0.87588000297546 sec
total : 0.91829490661621 sec

---------------- redis(phpredis) -------------------

set : 0.40152812004089 sec
get : 0.39414286613464 sec
total : 0.79567098617554 sec

------------------- redis(phpredis,transaction) -------------------

set : 0.054764986038208 sec
get : 0.3993968963623 sec
total : 0.45416188240051 sec

------------------- redis(predis) -------------------

set : 0.81693887710571 sec
get : 0.84718799591064 sec
total : 1.6641268730164 sec

------------------- sqlite(pdo) -------------------

set : 49.026143789291 sec
get : 10.010598182678 sec
total : 59.03674197197 sec

------------------- sqlite(pdo,transaction) -------------------

set : 0.18332195281982 sec
get : 10.179610967636 sec
total : 10.362932920456 sec

```
