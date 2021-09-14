CREATE table test_db.test_table (
    id int(6) unsigned default 0 comment 'ID',
    val varchar(20) default 'hello' comment '値'
);

DROP table test_db.test_table ;

describe test_db.test_table;
show full columns from test_db.test_table;

show create table test_db.test_table;

CREATE TABLE `test_table` (
  `id` int(6) unsigned DEFAULT '0' COMMENT 'ID',
  `val` varchar(20) DEFAULT 'hello' COMMENT '値'
) ENGINE=InnoDB DEFAULT CHARSET=utf8