drop table if exists `menu`;
create table `menu`
(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(128),
    `parent` int(11),
    `route` varchar(256),
    `order` int(11),
    `data`   blob,
    foreign key (`parent`) references `menu`(`id`)  ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop table if exists `user` cascade;
create table `user`
(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(32) NOT NULL,
    `auth_key` varchar(32) NOT NULL,
    `password_hash` varchar(256) NOT NULL,
    `password_reset_token` varchar(256),
    `email` varchar(256) NOT NULL,
    `status` integer not null default 10,
    `created_at` integer not null,
    `updated_at` integer not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


drop table if exists `auth_rule`;
create table `auth_rule`
(
   `name`                 varchar(64) not null,
   `data`                 text,
   `created_at`           integer,
   `updated_at`           integer,
    primary key (`name`)
) engine InnoDB;

drop table if exists `auth_item`;
create table `auth_item`
(
   `name`                 varchar(64) not null,
   `type`                 integer not null,
   `description`          text,
   `rule_name`            varchar(64),
   `data`                 text,
   `created_at`           integer,
   `updated_at`           integer,
   primary key (`name`),
   foreign key (`rule_name`) references `auth_rule` (`name`) on delete set null on update cascade,
   key `type` (`type`)
) engine InnoDB;

drop table if exists `auth_item_child`;
create table `auth_item_child`
(
   `parent`               varchar(64) not null,
   `child`                varchar(64) not null,
   primary key (`parent`, `child`),
   foreign key (`parent`) references `auth_item` (`name`) on delete cascade on update cascade,
   foreign key (`child`) references `auth_item` (`name`) on delete cascade on update cascade
) engine InnoDB;

drop table if exists `auth_assignment`;
create table `auth_assignment`
(
   `item_name`            varchar(64) not null,
   `user_id`              varchar(64) not null,
   `created_at`           integer,
   primary key (`item_name`, `user_id`),
   foreign key (`item_name`) references `auth_item` (`name`) on delete cascade on update cascade
) engine InnoDB;

drop table if exists `images`;
CREATE TABLE `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bucket` varchar(10) NOT NULL DEFAULT 'pic1' COMMENT '图片来源',
  `hash_key` varchar(40) NOT NULL DEFAULT '' COMMENT '文件内容的md5',
  `filepath` varchar(100) NOT NULL DEFAULT '' COMMENT '文件路径',
  `filename` varchar(50) NOT NULL DEFAULT '' COMMENT '文件名称',
  `file_url` varchar(500) NOT NULL DEFAULT '' COMMENT '文件url',
  `target_id` int(11) NOT NULL COMMENT '目标ID,最好可以定位到id',
  `created_time` int(11) NOT NULL DEFAULT '0' COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片表';

drop table if exists `posts`;
CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT 'uid',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 文章，2图片 3 视频 4 音频',
  `original` tinyint(1) NOT NULL DEFAULT '0' COMMENT '原创否 1原创 0 不是',
  `hot` int(11) NOT NULL DEFAULT '0' COMMENT '热门',
  `content` text NOT NULL COMMENT '内容',
  `tags` varchar(250) NOT NULL DEFAULT '' COMMENT 'tag',
  `image_url` varchar(256) NOT NULL DEFAULT '' COMMENT '封面图片''',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 无效 1 有效',
  `comment_count` int(11) NOT NULL DEFAULT '0' COMMENT '评论总数',
  `updated_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `created_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_hot` (`hot`),
  KEY `idx_original` (`original`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

drop table if exists `posts_tags`;
CREATE TABLE `posts_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `posts_id` int(11) NOT NULL DEFAULT '0' COMMENT '博文id',
  `tag` varchar(64) NOT NULL DEFAULT '' COMMENT '博文tag',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_unique` (`posts_id`,`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章标签表';
