--
-- Table structure for table `hack`
--

CREATE TABLE IF NOT EXISTS `hack` (
`sno` int(20) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `story` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;


ALTER TABLE `hack`
 ADD PRIMARY KEY (`sno`), ADD KEY `message` (`message`(767)), ADD FULLTEXT KEY `index_name` (`description`), ADD FULLTEXT KEY `description_2` (`description`), ADD FULLTEXT KEY `message_2` (`message`), ADD FULLTEXT KEY `message_3` (`message`), ADD FULLTEXT KEY `message_4` (`message`);
