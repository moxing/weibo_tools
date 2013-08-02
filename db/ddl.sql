CREATE TABLE `wb_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wb_id` varchar(30) NOT NULL,
  `wb_ori_id` varchar(30) DEFAULT NULL,
  `uid` varchar(30) NOT NULL,
  `text` varchar(300) NOT NULL,
  `status_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `thumbnail_pic` varchar(100) DEFAULT NULL,
  `bmiddle_pic` varchar(100) DEFAULT NULL,
  `original_pic` varchar(100) DEFAULT NULL,
  `pic_urls` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_id` (`wb_id`) USING BTREE,
  KEY `idx_t` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `wb_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `since_id` varchar(30) NOT NULL,
  `current_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wb_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `expires_in` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`uid`),
  KEY `idx_t` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `wb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) NOT NULL,
  `expires_in` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`uid`),
  KEY `idx_t` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;