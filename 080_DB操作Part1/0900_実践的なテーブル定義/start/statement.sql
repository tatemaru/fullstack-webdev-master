/*
実践的なテーブル構成
■ トランザクションテーブルとマスタテーブルの識別

- トランザクションテーブル
アプリからデータを頻繁に挿入、更新するようなテーブル。
エントリーテーブルとも呼ぶ。

例）オーダー情報、顧客情報、請求情報など

先頭にENT, TXN, TRNなどを付ける場合が多い。

- マスタテーブル
参照値を保持する用のテーブル。
アプリからは基本的に値を挿入、変更しない。

例）商品一覧、店舗一覧など

先頭にMSTとつけることが多い。
　
■ 論理削除フラグの導入(delete_flg)
レコードの有効性を識別するためのフラグ

例）delete_flg = 1の場合には無効レコードとして扱う。

■ 更新日、更新者の導入(updated_at, updated_by)
レコードがいつ、誰によって変更されたのかの証跡を保持するための属性

■ 外部キー制約はつける場合とつけない場合がある
*/
use test_db;

drop table stocks;
drop table products;
drop table shops;
drop table prefs;

create table mst_products (
  id int(10) unsigned auto_increment primary key,
  name varchar(20) not null,
  delete_flg inf(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null
);

create table mst_prefs (
  id int(2) unsigned auto_increment primary key,
  name varchar(10) not null,
  delete_flg inf(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null
);

create table mst_shops (
  id int(10) unsigned auto_increment primary key,
  name varchar(50) not null,
  pref_id int(2) unsigned not null,
    delete_flg inf(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null,
  constraint fk_pref_id
    foreign key(pref_id)
    references mst_prefs (id)
    on update cascade 
);

create table txn_stocks (
  product_id int unsigned,
  shop_id int unsigned,
  amount int unsigned not null,
    delete_flg inf(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null,
  primary key (product_id, shop_id),
  constraint fk_product_id
    foreign key (product_id)
    references mst_products (id)
    on update cascade,
  constraint fk_shop_id
    foreign key (shop_id)
    references mst_shops (id)
    on update cascade
);

CREATE table test_db.test_table (
    id int(6) not null default 0 comment 'ID',
    val varchar(20) unique default 'hello' comment '値'
);

show full columns from test_db.test_table;

drop table test_db.test_table;

create table test_db.test_table (
    key1 int auto_increment  primary key
);


create table test_db.test_table (
    key1 int, 
    key2 int,
    primary key(key1, key2)
);

show index from test_db.test_table;

alter table test_db.test_table
add column key2 varchar(20) not null,
add column key3 varchar(20) not null;

alter table test_db.test_table
add column key5 varchar(20) first;

alter table test_db.test_table
modify column key5 int not null;

alter table test_db.test_table
drop column key5;

alter table test_db.test_table
drop primary key;

alter table test_db.test_table
modify column key1 int(11) not null;

show create table test_db.test_table;

use test_db;

CREATE table products(
id int(10) unsigned primary key,
name varchar(20) not null
);

ALTER TABLE products CHANGE id id INT(10) AUTO_INCREMENT;

CREATE table prefs(
id int(2) unsigned primary key,
name varchar(10) not null
);

ALTER TABLE prefs CHANGE id id INT(2) AUTO_INCREMENT;

CREATE table shops(
id int(10) unsigned primary key,
name varchar(50) not null,
pref_id int(2) unsigned not null
);

ALTER TABLE shops CHANGE id id INT(2) AUTO_INCREMENT;

CREATE table stocks(
product_id int(10) unsigned,
shop_id int(10) unsigned,
amount int(10) unsigned not null,
primary key(product_id, shop_id)
);

alter table test_db.shops 
add constraint fk_pref_id
foreign key (pref_id)
references prefs(id)
on update cascade
on delete restrict;

SHOW ENGINE INNODB STATUS;
show index from prefs;

show create table test_db.shops ;
show create table test_db.prefs ;
show create table test_db.products ;
show create table test_db.stocks ;

ALTER TABLE products CHANGE id id INT(10) unsigned AUTO_INCREMENT;
ALTER TABLE shops CHANGE id id INT(2) unsigned AUTO_INCREMENT;

alter table test_db.stocks 
add constraint fk_product_id
foreign key (product_id)
references products(id)
on update cascade
on delete restrict,
add constraint fk_shop_id
foreign key (shop_id)
references shops(id)
on update cascade
on delete restrict


use test_db;

drop table stocks;
drop table products;
drop table shops;
drop table prefs;

create table mst_products (
  id int(10) unsigned auto_increment primary key,
  name varchar(20) not null,
  delete_flg int(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null
);

create table mst_prefs (
  id int(2) unsigned auto_increment primary key,
  name varchar(10) not null,
  delete_flg int(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null
);

create table mst_shops (
  id int(10) unsigned auto_increment primary key,
  name varchar(50) not null,
  pref_id int(2) unsigned not null,
  delete_flg int(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null,
  constraint fk_pref_id
    foreign key(pref_id)
    references mst_prefs (id)
    on update cascade 
);

create table txn_stocks (
  product_id int unsigned,
  shop_id int unsigned,
  amount int unsigned not null,
  delete_flg int(1) not null default 0,
  updated_at timestamp default current_timestamp on update current_timestamp,
  updated_by varchar(20) not null,
  primary key (product_id, shop_id),
  constraint fk_product_id
    foreign key (product_id)
    references mst_products (id)
    on update cascade,
  constraint fk_shop_id
    foreign key (shop_id)
    references mst_shops (id)
    on update cascade
);



