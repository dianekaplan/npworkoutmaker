-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 06:37 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `media_link` varchar(100) DEFAULT NULL,
  `self_pairing` tinyint(1) NOT NULL DEFAULT '0',
  `travelling` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `description`, `media_link`, `self_pairing`, `travelling`) VALUES
(1, 'push ups', 'Keep your back straight, lower your chest to the floor, and push all the way back up', '/img/exercises/pushups.jpg', 0, 0),
(2, 'alternating lunges', 'Keeping your body straight, lunge forward on one leg so your knee does not pass your toes, push off with heel to starting position and repeat on the other side', NULL, 0, 0),
(3, 'Bojans', 'Partner 1 into child pose, partner 2 jumps over.  Then partner 1 into downward dog, partner 2 crawls under the V.  Repeat 10 times and switch jobs', '/img/exercises/bojans.jpg', 1, 0),
(4, 'run', 'sprint or jog (a) to a point and back or (b) around perimeter of your space', '/img/exercises/run.jpg', 0, 1),
(5, 'wall sit', 'With your back against a wall or tree, sit down in an imaginary chair and hold that position', '/img/exercises/wall_sit.jpg', 0, 0),
(6, 'v-ups', 'Keeping shoulders back, bring your body to a 90 degree V, engaging your lower abs', '/img/exercises/Vup.jpg', 0, 0),
(7, 'sit ups', 'Engage your abs and lift your chest forward, fingers resting behind your head, or arms up and coming at your sides', '/img/exercises/situps_2.jpg', 0, 0),
(8, 'bicycles', 'Sit up position, engage your abs and raise your opposite elbow to opposite knee', '/img/exercises/bicycles.jpg', 0, 0),
(9, 'jump squats', 'Hands behind your head, squat back, keeping your chest up.  Now jump up, land back down into a squat.  Repeat', NULL, 0, 0),
(10, 'bodyweight squats', 'Feet shoulder width apart, sit back in an imaginary chair, counterbalancing with arms in front. Push up through your heels to stand back up.', '/img/exercises/bodyweight_squats.jpg', 0, 0),
(11, 'bear crawl', 'body low to the ground, walk using opposite hands and feet', '/img/exercises/bear_crawl.jpg', 0, 1),
(12, 'crab walk', 'from grade school: belly facing the sky, walk backwards on hands and feet', NULL, 0, 1),
(13, 'walking lunges', 'Raise right knee, lunge forward keeping right knee behind right toes. Bright left knee up and repeat on that side, travelling to your destination', '/img/exercises/walking_lunges.jpg', 0, 1),
(14, 'grapevines', 'Run sideways with crossovers: back foot crossing in front of the other, then behind', NULL, 0, 1),
(15, 'frog jumps', 'Crouch down like a frog with your hands between your feet, jump forward and land in frog position.  Hop to your destination and back.  Croaking optional', '/img/exercises/frog_jumps.jpg', 0, 1),
(16, 'hoisties', 'Partners face each other, standing toe to toe, cross your arms and hold hands. Keeping hands held, squat down and sit back (touching butt to the ground if you can), then push yourself back up with jump at the top, shouting hoisties!', 'https://www.youtube.com/watch?v=4Nmyd38eIPs', 1, 0),
(17, 'partner planks', 'Hold a plank position facing partner, with one hand on their shoulder. Switch sides halfway', '/img/exercises/partner_plank.jpg', 1, 0),
(18, 'partner situps', 'Hook feet with your partner for stability, and do situps', '/img/exercises/partner_situps.jpg', 1, 0),
(19, 'partner pushups', 'Do pushups facing each other, slap hands at the top', '/img/exercises/partner_pushups.jpg', 1, 0),
(20, 'tricep dips', 'Sit on bench/low wall (facing away from it), palms down on it beside you. Lift up your hips so you feel your weight pressing your hands into the bench. Bend your arms to lower your body down, then use your tricep muscles to raise back up, repeat lowering ', '/img/exercises/tricep_dips.jpg', 0, 0),
(21, 'alternating step ups', 'Facing a bench or low wall, step up onto it with one foot and push your body up.  The other foot comes up to meet it and steps back down. Repeat on the other side, always pushing from that top foot. ', '/img/exercises/alternating_step_ups.jpg', 0, 0),
(22, 'decline pushups', 'Elevate your feet (on bench, low wall, curved wall), and do pushups', '/img/exercises/decline_pushups.jpg', 0, 0),
(23, 'box jumps', 'Facing a bench or low wall, jump up onto it with both feet at once. Hop back down and repeat.', '/img/exercises/stair_jumps.jpg', 0, 0),
(24, 'run up and down steps', 'Run up the steps, run down the steps, and repeat if once is too easy', '/img/exercises/run_up_stairs.jpg', 0, 1),
(25, 'jump up steps', 'Both feet together, jump up the steps.  Jog back down and repeat', '/img/exercises/stair_jumps.jpg', 0, 1),
(26, 'pull ups/chin ups/hang', 'With your bar/jungle gym, do pullups, chin ups, hold your body up and hold that position, or just hang', '/img/exercises/pull_ups.jpg', 0, 0),
(28, 'burpees', '(aka squat thrust) Jump up and clap your hands, quickly drop into squat, hands on the ground, and lay body on the ground. Hop back up, clap hands at he top, repeat', '/img/exercises/burpees.jpg', 0, 0),
(29, 'piggyback', 'One partner piggybacks other to a spot, switch places and piggyback home', '/img/exercises/piggyback.jpg', 1, 1),
(30, 'wheelbarrow', 'Wheelbarrow to a spot, switch places and wheelbarrow home', '/img/exercises/wheelbarrow.jpg', 1, 1),
(31, 'plank, jump over', 'One partner holds plank, the other jumps over them 10 times, then switch', NULL, 1, 0),
(32, 'leg raises pushing feet', 'Partner 1: stand with feet shoulder width apart. Partner 2: lay in front of your partner, on your back, holding partner sneakers for support. Raise your legs together to the sky. Parter 1: push those feet back toward the ground.  Partner 2 uses abs to kee', '/img/exercises/feet_push.jpg', 1, 0),
(33, 'mountain climbers', 'Start in pushup position, step right foot up under your chest, switch feet (that makes one count), repeat as fast as you can', NULL, 0, 0),
(34, 'spider man planks', 'Start in plank position, bring right knee to right elbows like spiderman, then left, repeat', NULL, 0, 0),
(35, 'jumping jacks', 'Do not make me describe jumping jacks', NULL, 0, 0),
(36, 'plank', 'Start in pushup position, or as a variation bring your forearms to the ground.  Hold your body steady in a straight line. ', '/img/exercises/planks.jpg', 0, 0),
(37, 'side planks', 'Start with right foot and right hand (or elbow) touching the ground, lift your body up to make a triangle with the ground. Extend left arm up and hold body in a straight line.  Swtich to the other side half-way through', '/img/exercises/side_plank.jpg', 0, 0),
(38, 'Up and down planks', 'Start in plank on your elbows, go up to hands, down to elbows', NULL, 0, 0),
(39, 'skipping', 'Like on the schoolyard: bring right knee to chest and hop on left foot, switch and repeat, travelling to your destination', 'img/exercises/skipping.jpg', 0, 1),
(40, 'jump lunges', 'go into a lunge, jump up and switch legs into lunge on other side', 'img/exercises/jump_lunges.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_resource`
--

CREATE TABLE IF NOT EXISTS `exercise_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exercise_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ex_resource` (`exercise_id`,`resource_id`),
  UNIQUE KEY `id` (`id`),
  KEY `resource_id` (`resource_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `exercise_resource`
--

INSERT INTO `exercise_resource` (`id`, `exercise_id`, `resource_id`) VALUES
(1, 3, 1),
(2, 4, 2),
(3, 5, 3),
(4, 17, 1),
(5, 18, 1),
(6, 19, 1),
(7, 20, 4),
(8, 21, 4),
(9, 22, 4),
(10, 23, 4),
(11, 24, 5),
(12, 25, 5),
(13, 26, 6),
(14, 27, 6),
(15, 29, 1),
(16, 30, 1),
(17, 31, 1),
(18, 32, 1),
(19, 16, 1),
(20, 11, 2),
(21, 12, 2),
(22, 13, 2),
(23, 14, 2),
(24, 15, 2),
(25, 29, 2),
(26, 30, 2),
(27, 39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`) VALUES
(1, 'partner'),
(2, 'space'),
(3, 'wall'),
(4, 'bench'),
(5, 'steps'),
(6, 'pullup');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(8) NOT NULL,
  `resources` tinyblob NOT NULL,
  `workout_array` blob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=452 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
