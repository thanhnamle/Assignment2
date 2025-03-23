-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: Mar 21, 2025 at 02:33 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s105195040_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_reference_num` varchar(5) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_brief` text NOT NULL,
  `key_responsibilities` text NOT NULL,
  `essential_skills` text NOT NULL,
  `preferable_skills` text,
  `salary_range` text NOT NULL,
  `general_benefits` text,
  `position_benefits` text,
  `job_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `card_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_reference_num`, `job_title`, `job_brief`, `key_responsibilities`, `essential_skills`, `preferable_skills`, `salary_range`, `general_benefits`, `position_benefits`, `job_image`, `created_at`, `card_name`) VALUES
(1, 'D1100', 'Front-end Developer', 'You will be responsible for building the "client-side" of our web applications. Your role is to develop and optimize user-facing components, ensuring seamless user experiences through responsive and interactive designs.', 'Creating visually appealing and responsive web pages using HTML, CSS, or JavaScript;\r\n  Collaborating with UX/UI designers to implement design concepts;\r\n  Testing and validating web forms and interactive elements;\r\n  Debugging and troubleshooting web issues;\r\n  Collaborating with back-end developers to integrate front-end and back-end systems;\r\n  Keeping up with the latest industry trends and technologies.', 'Bachelor"s degree in Computer Science, Web Development, or relevant field;\r\n  Proficiency in HTML, CSS, JavaScript;\r\n  Familiarity with browser testing and debugging;\r\n  Stay up-to-date with evolving web technologies;\r\n  Basic understanding of at least one large-scale project in a modern framework (e.g., React, Vue).', 'Experience with version control (e.g., Git, GitHub);\r\n  Knowledge of SEO best practices;\r\n  Familiarity with Adobe Suite, Photoshop, and CMS.', 'Entry-level: approximately $75,000 per year;\r\n  Senior-level or 5+ years experience: $90,000 - $105,000 per year.', 'Social insurance, health insurance according to Labor Law;\r\n  Strong retirement plan, tuition reimbursement;\r\n  Access to a Microsoft 365 account.', 'Access to the latest UI/UX design tools and front-end frameworks;\r\n  15-20 paid leave days per year, depending on the position;\r\n  Career growth into leadership or full-stack development.', 'styles/images/front-end.png', '2025-03-18 16:50:50', 'Front-end Developer'),
(2, 'D1122', 'Back-end Developer', 'As a Back-End Developer, you will be responsible for managing the server-side logic and databases that power our web applications.', 'Collaborating with front-end developers to design and implement web applications;\r\n  Developing APIs for seamless front-end-back-end communication;\r\n  Troubleshoot and debug applications;\r\n  Build reusable code and libraries for future use;\r\n  Keeping up with the latest industry trends and technologies.', 'Bachelor"s degree in Computer Science, Software Engineering, or a related field;\r\n  Proficiency in at least two back-end programming languages (e.g., Java, Python, PHP);\r\n  Strong knowledge of database management systems (e.g., MySQL, PostgreSQL);\r\n  Familiarity with cloud computing platforms (e.g., AWS, Azure).', 'Strong problem-solving skills;\r\n  Version control using tools like Git;\r\n  Familiarity with security best practices.', 'Junior-level: around $120,000 per year;\r\n  Senior-level: up to $150,000 - $162,000 per year.', 'Social insurance, health insurance according to Labor Law;\r\n  Strong retirement plan, tuition reimbursement;\r\n  Access to a Microsoft 365 account.', '15-20 paid leave days per year, depending on the position;\r\nOpportunities for professional development, including workshops and courses;\r\n  Certification support for AWS, Azure, or Google Cloud services;\r\n  Career growth opportunities.', 'styles/images/back_end_developer.png', '2025-03-18 16:54:19', 'Back-end Developer'),
(3, 'DE110', 'Data Engineer', 'As a data engineer, you will be at the forefront of data infrastructure development. Your data engineering tasks include designing, constructing, installing, and maintaining the systems that allow for the seamless flow, availability, and reliability of data.', 'Developing and maintaining data pipelines for efficient data extraction, transformation, and loading (ETL) processes;\r\n  Performing data quality checks and troubleshooting;\r\n  Applying data engineering best practices;\r\n  Designing and optimizing data storage solutions.', 'A Master"s degree in Data Science, Information Systems, or a related field;\r\n Proficiency in designing and building complex data pipelines and data processing systems;\r\n  Expertise in implementing robust data security measures and access control.', 'Leadership and mentorship capabilities;\r\n  Deep understanding of statistical modeling (e.g., Bayesian inference, Markov Chains).', 'Junior-level: around $128,250 per year;\r\n  Senior-level: up to $180,000 per year.', 'Social insurance, health insurance according to Labor Law;\r\n  Strong retirement plan, tuition reimbursement;\r\n  Access to a Microsoft 365 account.', '22-30 paid leave days, depending on the position;\r\n Access to professional development and training opportunities;\r\n  Opportunities to move into Data Scientist or similar positions.', 'styles/images/data-engineer3.jpg', '2025-03-18 16:54:19', 'Data Engineer'),
(4, 'E1300', 'Quality Control Engineer', 'As a Quality Control Engineer, you will monitor and improve the quality of our operational processes and outputs.', 'Develop and implement quality control procedures;\r\n  Analyze quality data and generate reports;\r\n  Identify and implement corrective actions;\r\n  Ensure compliance with industry regulations;\r\n  Monitor and optimize manufacturing processes.', 'Master"s degree in Quality Engineering, Industrial Engineering, or related field;\r\n  Knowledge of ISO 9001, Six Sigma, and SPC;\r\n  Proficiency in quality management tools;\r\nStrong analytical and problem-solving skills;\r\nExperience in inspection and process validation', 'Business English Certification (BEC);\r\nTrain employees on quality standards;\r\n  Knowledge of Lean Manufacturing principles.', 'Junior-level: $60,000 - $80,000;\r\n  Senior-level: $130,000 - $160,000.', 'Social insurance, health insurance according to Labor Law;\r\n  Strong retirement plan, tuition reimbursement;\r\n  Access to a Microsoft 365 account.', '22-30 paid leave days, depending on the position;\r\n  Certification sponsorship (Six Sigma, CQE, ISO);\r\nHybrid work arrangements;\r\nEquipment allowances for testing tools\r\n  Career growth opportunities.', 'styles/images/quality_control.webp', '2025-03-18 16:54:19', 'Quality Control Engineer'),
(5, 'E1400', 'Automation Engineer', 'As an Automation Engineer, you will design, develop, and optimize automated systems to improve efficiency.', 'Design and implement automated systems;\r\n  Develop and maintain control software;\r\n  Troubleshoot and optimize automation processes;\r\n  Integrate robotics and industrial automation tools;\r\nConduct testing and validation of automated systems;\r\nEnsure compliance with industry safety standards;\r\nAnalyze system performance and improve efficiency', 'Master"s degree in Automation, Mechanical, or related field;\r\n  Experience with PLC, SCADA, and HMI systems;\r\n  Familiarity with robotics and industrial automation;\r\nUnderstanding of control systems and IoT integration;\r\nStrong problem-solving and analytical skills', 'Certification in PLC Programming (Siemens, Allen-Bradley);\r\n  Experience with AI-driven automation and predictive maintenance;\r\nFamiliarity with cloud-based automation tools (AWS, Azure IoT)', 'Junior-level: $65,000 - $85,000;\r\n  Senior-level: $110,000 - $140,000.', 'Social insurance, health insurance according to Labor Law;\r\n  Strong retirement plan, tuition reimbursement;\r\nAccess to a Microsoft 365 account.', '22-30 paid leave days;\r\nCertification sponsorship (PLC, Robotics, Six Sigma);\r\n  Hands-on training with cutting-edge automation tools;\r\nWork-from-home flexibility (for software-related tasks)\r\n  Career growth opportunities.', 'styles/images/automation.jpg', '2025-03-18 16:54:19', 'Automation Engineer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
