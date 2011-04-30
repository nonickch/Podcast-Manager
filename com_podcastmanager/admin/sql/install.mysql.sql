CREATE TABLE IF NOT EXISTS `#__podcastmanager` (
  `id` int(11) NOT NULL auto_increment,
  `filename` varchar(255) default NULL,
  `feedname` varchar(255) default NULL,
  `title` varchar(255) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` integer unsigned NOT NULL default '0',
  `checked_out` integer unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `itAuthor` varchar(255) NOT NULL default '',
  `itBlock` tinyint(1) NOT NULL default '0',
  `itCategory` varchar(255) NOT NULL default '',
  `itDuration` varchar(10) NOT NULL default '',
  `itExplicit` tinyint(1) NOT NULL default '0',
  `itKeywords` varchar(255) NOT NULL default '',
  `itSubtitle` varchar(255) NOT NULL default '',
  `itSummary` varchar(255) NOT NULL default '',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__podcastmanager_feeds` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` integer unsigned NOT NULL default '0',
  `checked_out` integer unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
