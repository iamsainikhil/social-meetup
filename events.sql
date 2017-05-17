CREATE TABLE `events` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `event_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `event_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `org_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `date_time`  datetime NOT NULL,
 `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `url` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
