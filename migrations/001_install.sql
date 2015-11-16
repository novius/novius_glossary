CREATE TABLE IF NOT EXISTS `novius_glossary_word` (
    `word_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `word_title` varchar(255) NOT NULL,
    `word_publication_status` tinyint(1) NOT NULL,
    `word_publication_start` datetime DEFAULT NULL,
    `word_publication_end` datetime DEFAULT NULL,
    `word_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `word_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`word_id`),
    KEY `word_created_at` (`word_created_at`),
    KEY `word_updated_at` (`word_updated_at`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

