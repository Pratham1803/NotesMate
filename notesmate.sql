-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 07:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` int(11) NOT NULL,
  `author` varchar(25) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`id`, `author`, `title`, `content`, `subject`) VALUES
(2, 'pratham', 'Drop box in HTML', 'Got it! If you want to display HTML code from another file as plain text without executing it, you can read the content of the file using PHP and then use htmlspecialchars to escape the HTML characters. Here’s an example:\r\n\r\nAssume you have a file named example.html containing some HTML code.\r\n\r\nhtml\r\n&lt;!-- example.html --&gt;\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n    &lt;title&gt;Example HTML&lt;/title&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n    &lt;h1&gt;This is a heading&lt;/h1&gt;\r\n    &lt;p&gt;This is a paragraph.&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\nNow, you can create a PHP script to read and display the content of example.html as plain text:\r\n\r\nphp\r\n&lt;?php\r\n// Read the content of the HTML file\r\n$html_code = file_get_contents(&#039;example.html&#039;);\r\n\r\n// Use htmlspecialchars to escape special characters\r\n$safe_html_code = htmlspecialchars($html_code, ENT_QUOTES);\r\n\r\n?&gt;\r\n\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n    &lt;title&gt;Display HTML Code&lt;/title&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n\r\n    &lt;h2&gt;HTML Code from example.html:&lt;/h2&gt;\r\n    &lt;pre&gt;&lt;?php echo $safe_html_code; ?&gt;&lt;/pre&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\nIn this example:\r\n\r\nThe file_get_contents function reads the content of the example.html file.\r\n\r\nThe htmlspecialchars function escapes special characters, making the HTML code safe for display as plain text.\r\n\r\nThe pre tag is used to maintain the formatting of the HTML code.\r\n\r\nThis will display the HTML code from example.html as plain text on the web page. Feel free to customize the code as needed! If you have any other questions or need further assistance, just let me know.', 'php'),
(3, 'pratham', 'Exception handling mechanism', 'Exception handling in Java is a mechanism that allows a program to deal with unexpected or \r\nexceptional situations during runtime. These exceptional situations are often referred to as \r\nexceptions. The Java programming language provides a robust and comprehensive exception \r\nhandling mechanism to improve the reliability and maintainability of code. \r\n• When executing Java code, different errors can occur: coding errors made by the \r\nprogrammer, errors due to wrong input, or other unforeseeable things. \r\n• When an error occurs, Java will normally stop and generate an error message. The \r\ntechnical term for this is: Java will throw an exception (throw an error). \r\n• The try statement allows you to define a block of code to be tested for errors while it is \r\nbeing executed. \r\n• The catch statement allows you to define a block of code to be executed, if an error \r\noccurs in the try block. \r\n• The try and catch keywords come in pairs: \r\ntry {  \r\n// Block of code to try  \r\n} \r\ncatch(Exception e) {  \r\n// Block of code to handle errors  \r\n}  \r\nAn exception in programming is an abnormal or erroneous event that occurs during the \r\nexecution of a program. Exceptions represent conditions that disrupt the normal flow of \r\nprogram execution. These conditions can range from simple errors, like dividing by zero, to \r\nmore complex issues such as attempting to access an array element that does not exist. \r\nIn Java, exceptions are objects that are instances of classes derived from the `Throwable` \r\nclass. There are two main types of exceptions in Java: \r\n1. Checked Exceptions: - These are exceptions that the compiler requires the programmer to handle explicitly. \r\nExamples include `IOException` and `SQLException`. They are subclasses of `Exception` (but \r\nnot of `RuntimeException`). \r\n2. Unchecked Exceptions (Runtime Exceptions): - These are exceptions that occur at runtime and are not checked by the compiler. Examples \r\ninclude \r\n`ArithmeticException`, \r\n`NullPointerException`, \r\n`ArrayIndexOutOfBoundsException`. They are subclasses of `RuntimeException`.', 'java'),
(4, 'pratham', ' Explain MVC Architecture.', '▪ The Model-View-Controller (MVC) is a well-known design pattern in the web \r\ndevelopment. \r\n◼ It is a common architectural pattern used to design and create an application’s interfaces \r\nand structure. \r\n◼ The model designs based on the MVC architecture follow MVC design pattern. \r\n◼ This pattern divides the application into three parts (Model, View, Controller) that are \r\ndependent and connected.    \r\n◼ The goal of the MVC architecture is to seprate the application (model) from the \r\nway it is represented to the user (view) from the way in which the user controls \r\nit (controller). \r\n◼ The Model defines the business layer of the application, the Controller manages the \r\nflow of the application, and the View defines the presentation layer of the \r\napplication. \r\n◼ Model: The model represents the enterprise data and the business rules that \r\ngovern  access to and updates of this data. Model is not aware about the presentation \r\nof data and how that data will be displayed to the browser. \r\n◼ View: The view is not dependent on the application logic. It access enterprise \r\ndata through the model and specifies how data should be presented. It remains same \r\nif there is any modification in the business logic. \r\n◼ Controller:  The controller is responsible for intercepting the request from view and \r\npasses it to model for appropriate action. After action has been taken on data, the \r\ncontroller is responsible for directing the appropriate view to the user. ', 'java'),
(5, 'pratham', 'Block Diagram of Pl/SQL.', 'PL/SQL Block Structure \r\nA PL/SQL block is the basic unit of a PL/SQL program. It consists of three main sections: \r\n1. Declaration Section: This is where you declare variables, constants, and other data \r\ntypes. \r\n2. Execution Section: This is the main part of the block where the actual code is written \r\nand executed. \r\n3. Exception Handling Section: This section handles any exceptions or errors that occur \r\nduring the execution of the block. \r\nBlock Diagram \r\nHere’s a basic block diagram of a PL/SQL block: \r\n+-------------------------------+ \r\n| DECLARE                  \r\n| \r\n| -- Variable declarations| \r\n+-------------------------------+ \r\n| BEGIN                    \r\n| \r\n| -- Execution statements | \r\n+------------------------+ \r\n| EXCEPTION              \r\n| \r\n| -- Exception handling   | \r\n+------------------------+ \r\n| END;                   \r\n| \r\n+------------------------+ \r\nExample \r\nDECLARE \r\nv_message VARCHAR2(50); \r\nBEGIN \r\nv_message := \'Hello, PL/SQL!\'; \r\nDBMS_OUTPUT.PUT_LINE(v_message); \r\nEXCEPTION \r\nWHEN OTHERS THEN \r\nDBMS_OUTPUT.PUT_LINE(\'An error occurred.\'); \r\nEND; \r\n/ \r\nIn this example: \r\n• The DECLARE section defines a variable v_message. \r\n• The BEGIN section assigns a value to v_message and prints it. \r\n• The EXCEPTION section handles any errors that might occur. ', 'rdbms'),
(6, 'pratham', 'What is NoSQL?', 'what is nosql\r\nNoSQL stands for \"Not Only SQL.\" It\'s a category of database management systems that provide a mechanism for storage and retrieval of data that is modeled in means other than the tabular relations used in relational databases (like SQL databases). Here are some key features and advantages of NoSQL databases:\r\n\r\nFlexibility: NoSQL databases can store structured, semi-structured, and unstructured data. This makes it easier to manage data that doesn\'t fit neatly into tables.\r\n\r\nScalability: NoSQL databases are designed to scale out by using distributed systems. They can handle large volumes of data and high levels of user traffic by distributing data across multiple servers.\r\n\r\nPerformance: NoSQL databases can provide fast read and write operations, making them suitable for applications that require low-latency data access.\r\n\r\nSchema-less: NoSQL databases often do not require a fixed schema, allowing for more agile development. This means that you can add new fields to your data without having to update a schema.\r\n\r\nVariety of Data Models:\r\n\r\nDocument Stores: Store data as JSON-like documents (e.g., MongoDB, CouchDB).\r\n\r\nKey-Value Stores: Store data as key-value pairs (e.g., Redis, DynamoDB).\r\n\r\nColumn-Family Stores: Store data in columns rather than rows (e.g., Cassandra, HBase).\r\n\r\nGraph Databases: Store data as nodes and edges (e.g., Neo4j, OrientDB).\r\n\r\nNoSQL databases are particularly useful for big data applications, real-time web applications, and situations where scalability and flexibility are important. However, they may not be the best choice for all scenarios, especially those requiring complex transactions and strong consistency guarantees.', 'nosql');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `psw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `psw`) VALUES
(1, 'pratham', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
