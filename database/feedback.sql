CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fac_id` varchar(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(75) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(7) NOT NULL,
  `name` char(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `year` int(1)NOT NULL,
  `sem` int (1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `subinfo` (
  `subcode` varchar(20) NOT NULL,
  `subject` char(40) NOT NULL,
  `facid` varchar(20) NOT NULL,
  `year` int(1) NOT NULL,
  `sem` int(1) NOT NULL,
  PRIMARY KEY (`subcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;