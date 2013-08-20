CREATE TABLE `wb_status` (
  `id` varchar(30) NOT NULL,
  `ori_id` varchar(30) DEFAULT NULL,
  `uid` varchar(30) NOT NULL,
  `text` varchar(300) NOT NULL,
  `status_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `thumbnail_pic` varchar(100) DEFAULT NULL,
  `bmiddle_pic` varchar(100) DEFAULT NULL,
  `original_pic` varchar(100) DEFAULT NULL,
  `pic_urls` text,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_id` (`id`) USING BTREE,
  KEY `idx_t` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wb_token` (
  `uid` varchar(30) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `expires_in` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `user_id` (`uid`),
  KEY `idx_t` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wb_user` (
  `id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile_image_url` varchar(100) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`id`),
  KEY `idx_t` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wb_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `since_id` varchar(30) NOT NULL,
  `current_id` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;