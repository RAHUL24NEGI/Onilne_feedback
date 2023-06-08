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
  `facname` varchar(20) NOT NULL,
  `year` int(1) NOT NULL,
  `sem` int(1) NOT NULL,
  `acyear` int(4) NOT NULL,
  `acsem` char(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `stufeedback` (
  `stuid` int(7) NOT NULL,
  `subject` char(20) NOT NULL,
  `que1` int(1) NOT NULL,
  `que2` int(1) NOT NULL,
  `que3` int(1) NOT NULL,
  `que4` int(1) NOT NULL,
  `que5` int(1) NOT NULL,
  `que6` int(1) NOT NULL,
  `que7` int(1) NOT NULL,
  `que8` int(1) NOT NULL,
  `que9` int(1) NOT NULL,
  `que10` int(1) NOT NULL,
  `acyear` int(4) NOT NULL,
  `acsem` char(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

