<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sql extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 	}

	function index()
	{
		// Create tables
		$this->db->query("CREATE TABLE IF NOT EXISTS ci_sessions (
						  session_id varchar(40) NOT NULL DEFAULT '0',
						  ip_address varchar(45) NOT NULL DEFAULT '0',
						  user_agent varchar(120) NOT NULL,
						  last_activity int(10) unsigned NOT NULL DEFAULT '0',
						  user_data text NOT NULL,
						  PRIMARY KEY (session_id),
						  KEY last_activity_idx (last_activity)
						)");

		$this->db->query("CREATE TABLE IF NOT EXISTS users (
						  id int(11) NOT NULL AUTO_INCREMENT,
						  username varchar(15) NOT NULL,
						  password varchar(32) NOT NULL,
						  first_name varchar(40) NOT NULL,
						  last_name varchar(40) NOT NULL,
						  email varchar(50) NOT NULL,
						  PRIMARY KEY (id)
						)");

		$this->db->query("CREATE TABLE IF NOT EXISTS pages (
						  id int(11) NOT NULL AUTO_INCREMENT,
						  title varchar(128) NOT NULL,
						  page varchar(128) NOT NULL,
						  text text NOT NULL,
						  PRIMARY KEY (id)
						)");

		$this->db->query("CREATE TABLE IF NOT EXISTS faq (
						  id int(11) NOT NULL AUTO_INCREMENT,
						  question varchar(128) NOT NULL,
						  slug varchar(128) NOT NULL,
						  answer text NOT NULL,
						  PRIMARY KEY (id)
						)");

		$this->db->query("CREATE TABLE IF NOT EXISTS news (
						  id int(11) NOT NULL AUTO_INCREMENT,
						  title varchar(128) NOT NULL,
						  slug varchar(128) NOT NULL,
						  text text NOT NULL,
						  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
						  PRIMARY KEY (id)
						)");

		$this->db->query("CREATE TABLE IF NOT EXISTS courses (
						  short_name varchar(128) NOT NULL,
						  full_name varchar(255) NOT NULL,
						  PRIMARY KEY (short_name)
						)");

		$this->db->query("CREATE TABLE IF NOT EXISTS tests (
					  id int(11) NOT NULL AUTO_INCREMENT,
					  course_name varchar(128) NOT NULL,
					  year int(11) NOT NULL,
					  period int(11) NOT NULL,
					  test varchar(128) NOT NULL,
					  PRIMARY KEY (id),
					  FOREIGN KEY (course_name) REFERENCES courses (short_name)
					)");

		$this->db->query("CREATE TABLE IF NOT EXISTS signups (
					  id int(11) NOT NULL AUTO_INCREMENT,
					  test_id int(11) NOT NULL,
					  username varchar(128) NOT NULL,
					  course_name varchar(128) NOT NULL,
					  year int(11) NOT NULL,
					  period int(11) NOT NULL,
					  test varchar(128) NOT NULL,
					  PRIMARY KEY (id),
					  FOREIGN KEY (test_id) REFERENCES tests (id)
					)");


		$this->db->query("INSERT INTO courses (short_name, full_name) VALUES
			('Analyse', 'Analyse '),
			('CO1', 'Computer Organisatie 1 '),
			('Databases', 'Databases 1 '),
			('DiWi', 'Discrete Wiskunde '),
			('Engels', 'Engels'),
			('Programmeren1', 'Programmeren1'),
			('Programmeren2', 'Programmeren 2 '),
			('Programmeren3', 'Programmeren 3'),
			('Wiskunde', 'Wiskunde Basis ');"
		);

		
		// Insert data
		$this->db->query("INSERT INTO pages (id, title, page, text) VALUES
			(1, 'Home', 'home', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare sed purus imperdiet porttitor. Maecenas nec tortor varius turpis eleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl dapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque at malesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in metus sit amet, condimentum egestas lorem. Morbi vel elementum erat, pulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas ornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod nisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi ut augue odio.'),
			(2, 'Subscribe', 'subscribe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare sed purus imperdiet porttitor. Maecenas nec tortor varius turpis eleifend tempus. Proin auctor orci ut arcu consequat, et congue nisl dapibus. Integer quis rutrum tortor, vel adipiscing mi. Pellentesque at malesuada arcu, eget pulvinar sem. Maecenas ipsum ipsum, blandit in metus sit amet, condimentum egestas lorem. Morbi vel elementum erat, pulvinar placerat mauris. Vestibulum et metus sit amet nunc egestas ornare id vitae arcu. Nunc sollicitudin laoreet tellus, mollis euismod nisl eleifend a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi ut augue odio.');"
		);

		$this->db->query("INSERT INTO tests (id, course_name, year, period, test) VALUES
			(1, 'Analyse', 1, 1, 'Tentamen'),
			(2, 'Programmeren1', 1, 1, 'Tentamen'),
			(3, 'Databases', 1, 1, 'Tentamen'),
			(4, 'DiWi', 1, 1, 'Deeltoets 1'),
			(5, 'DiWi', 1, 2, 'Deeltoets 2'),
			(6, 'Programmeren2', 1, 2, 'Deeltoets 2'),
			(7, 'Wiskunde', 1, 1, 'Deeltoets 1'),
			(8, 'Wiskunde', 1, 2, 'Deeltoets 2'),
			(9, 'Wiskunde', 1, 3, 'Deeltoets 3'),
			(10, 'Programmeren3', 1, 3, 'Tentamen'),
			(11, 'CO1', 1, 1, 'Deeltoets 1'),
			(12, 'CO1', 1, 2, 'Deeltoets 2'),
			(13, 'CO1', 1, 3, 'Deeltoets 3'),
			(14, 'Engels', 1, 4, 'Tentamen'),
			(15, 'Analyse', 2, 1, 'Tentamen'),
			(16, 'Programmeren1', 2, 1, 'Tentamen'),
			(17, 'Databases', 2, 1, 'Tentamen'),
			(18, 'DiWi', 2, 1, 'Deeltoets 1'),
			(19, 'DiWi', 2, 2, 'Deeltoets 2'),
			(20, 'Programmeren2', 2, 2, 'Deeltoets 2'),
			(21, 'Wiskunde', 2, 1, 'Deeltoets 1'),
			(22, 'Wiskunde', 2, 2, 'Deeltoets 2'),
			(23, 'Wiskunde', 2, 3, 'Deeltoets 3'),
			(24, 'Programmeren3', 2, 3, 'Tentamen'),
			(25, 'CO1', 2, 1, 'Deeltoets 1'),
			(26, 'CO1', 2, 2, 'Deeltoets 2'),
			(27, 'CO1', 2, 3, 'Deeltoets 3'),
			(28, 'Engels', 2, 4, 'Tentamen'),
			(29, 'Analyse', 3, 1, 'Tentamen'),
			(30, 'Programmeren1', 3, 1, 'Tentamen'),
			(31, 'Databases', 3, 1, 'Tentamen'),
			(32, 'DiWi', 3, 1, 'Deeltoets 1'),
			(33, 'DiWi', 3, 2, 'Deeltoets 2'),
			(34, 'Programmeren2', 3, 2, 'Deeltoets 2'),
			(35, 'Wiskunde', 3, 1, 'Deeltoets 1'),
			(36, 'Wiskunde', 3, 2, 'Deeltoets 2'),
			(37, 'Wiskunde', 3, 3, 'Deeltoets 3'),
			(38, 'Programmeren3', 3, 3, 'Tentamen'),
			(39, 'CO1', 3, 1, 'Deeltoets 1'),
			(40, 'CO1', 3, 2, 'Deeltoets 2'),
			(41, 'CO1', 3, 3, 'Deeltoets 3'),
			(42, 'Engels', 3, 4, 'Tentamen'),
			(43, 'Analyse', 4, 1, 'Tentamen'),
			(44, 'Programmeren1', 4, 1, 'Tentamen'),
			(45, 'Databases', 4, 1, 'Tentamen'),
			(46, 'DiWi', 4, 1, 'Deeltoets 1'),
			(47, 'DiWi', 4, 2, 'Deeltoets 2'),
			(48, 'Programmeren2', 4, 2, 'Deeltoets 2'),
			(49, 'Wiskunde', 4, 1, 'Deeltoets 1'),
			(50, 'Wiskunde', 4, 2, 'Deeltoets 2'),
			(51, 'Wiskunde', 4, 3, 'Deeltoets 3'),
			(52, 'Programmeren3', 4, 3, 'Tentamen'),
			(53, 'CO1', 4, 1, 'Deeltoets 1'),
			(54, 'CO1', 4, 2, 'Deeltoets 2'),
			(55, 'CO1', 4, 3, 'Deeltoets 3'),
			(56, 'Engels', 1, 4, 'Tentamen');
		");

		$this->db->query("INSERT INTO users (id, username, password, first_name, last_name, email) VALUES
			(1, 'admin', '382e0360e4eb7b70034fbaa69bec5786', 'Admin', 'SubscribeMe', 'info@subscribeme.nl'),
			(2, 'personeel', '382e0360e4eb7b70034fbaa69bec5786', 'Personeel', 'SubscribeMe', 'info@subscribeme.nl'),
			(3, 'student', '382e0360e4eb7b70034fbaa69bec5786', 'Student', 'SubscribeMe', 'info@subscribeme.nl');"
		);
	}
}


