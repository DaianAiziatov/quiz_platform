-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 16 2019 г., 15:55
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `quiz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `is_right` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `answer`, `is_right`) VALUES
(1, 1, 'Private Home Page\r\n', 0),
(2, 1, 'Personal Hypertext Processor', 1),
(3, 1, 'PHP: Hypertext Preprocessor', 0),
(4, 2, '&lt?php&gt...&lt/?&gt\"', 0),
(5, 2, '&lt?php...?&gt', 1),
(6, 2, '&lt&amp&gt...&lt/&amp&gt', 0),
(7, 2, '&ltscript&gt...&lt/script&gt', 0),
(8, 3, '\"Hello World\";', 0),
(9, 3, 'Document.Write(\"Hello World\")', 0),
(10, 3, 'echo \"Hello World\"', 1),
(11, 4, '$', 1),
(12, 4, '&', 0),
(13, 4, '!', 0),
(14, 5, ';', 1),
(15, 5, 'New line', 0),
(16, 5, '&lt/php&gt', 0),
(17, 5, '.', 0),
(18, 6, 'VBScript', 0),
(19, 6, 'JavaScript', 0),
(20, 6, 'Perl and C ', 1),
(21, 7, 'Request.QueryString;', 0),
(22, 7, '$_GET[];', 1),
(23, 7, 'Request.Form;', 0),
(24, 8, 'FALSE', 1),
(25, 8, 'TRUE', 0),
(26, 9, 'FALSE', 0),
(27, 9, 'TRUE', 1),
(28, 10, 'FALSE', 1),
(29, 10, 'TRUE', 0),
(30, 11, '&lt!-- include file=\"time.inc\" --&gt', 0),
(31, 11, '&lt?php include \"time.inc\"; ?&gt ', 1),
(32, 11, '&lt?php include file=\"time.inc\"; ?&gt', 0),
(33, 11, '&lt?php include:\"time.inc\"; ?&gt', 0),
(34, 12, 'function myFunction()', 1),
(35, 12, 'new_function myFunction()', 0),
(36, 12, 'create myFunction()', 0),
(37, 13, 'fopen(\"time.txt\",\"r\")', 1),
(38, 13, 'open(\"time.txt\")', 0),
(39, 13, 'fopen(\"time.txt\",\"r+\")', 0),
(40, 13, 'open(\"time.txt\",\"read\")', 0),
(41, 14, 'TRUE', 1),
(42, 14, 'FALSE', 0),
(43, 15, '$_SESSION', 0),
(44, 15, '$_GET', 0),
(45, 15, '$_SERVER', 1),
(46, 15, '$_GLOBALS', 0),
(47, 16, 'count++;', 0),
(48, 16, '++count;', 0),
(49, 16, '$count++; ', 1),
(50, 17, '*...*', 1),
(51, 17, '&lt!--...--&gt', 0),
(52, 17, '/*...*/', 0),
(53, 17, '&ltcomment&gt...&lt/comment&gt', 0),
(54, 18, 'FALSE', 0),
(55, 18, 'TRUE; ', 1),
(56, 19, 'FALSE', 0),
(57, 19, 'TRUE; ', 1),
(58, 20, '$my_Var', 0),
(59, 20, '$my-Var', 1),
(60, 20, '$myVar', 0),
(61, 21, 'createcookie', 0),
(62, 21, 'setcookie()', 1),
(63, 21, 'makecookie()', 0),
(64, 22, 'FALSE', 1),
(65, 22, 'TRUE; ', 0),
(66, 23, '$cars = \"Volvo\", \"BMW\", \"Toyota\";', 0),
(67, 23, '$cars = array[\"Volvo\", \"BMW\", \"Toyota\"];', 0),
(68, 23, '$cars = array(\"Volvo\", \"BMW\", \"Toyota\");', 1),
(69, 24, 'FALSE', 0),
(70, 24, 'TRUE; ', 1),
(71, 25, '===', 1),
(72, 25, '=', 0),
(73, 25, '==', 0),
(74, 25, '!=', 0),
(314, 26, '&ltscript&gt', 1),
(315, 26, '&ltscripting&gt', 0),
(316, 26, '&ltjs&gt', 0),
(317, 26, '&ltjavascript&gt', 0),
(318, 27, '#demo.innerHTML = \"Hello World!\";', 0),
(319, 27, 'document.getElementById(\"demo\").innerHTML = \"Hello World!\";', 1),
(320, 27, 'document.getElement(\"p\").innerHTML = \"Hello World!\";', 0),
(321, 27, 'document.getElementByName(\"p\").innerHTML = \"Hello World!\";', 0),
(322, 28, 'The &lthead&gt section', 0),
(323, 28, 'Both the &lthead&gt section and the &ltbody&gt section are correct', 1),
(324, 28, 'The &ltbody&gt section', 0),
(325, 29, '&ltscript href=\"xxx.js\"&gt', 0),
(326, 29, '&ltscript name=\"xxx.js\"&gt', 0),
(327, 29, '&ltscript src=\"xxx.js\"&gt', 1),
(328, 30, 'True', 0),
(329, 30, 'False', 1),
(330, 31, 'msg(\"Hello World\");', 0),
(331, 31, 'msgBox(\"Hello World\");', 0),
(332, 31, 'alert(\"Hello World\");', 1),
(333, 31, 'alertBox(\"Hello World\");', 0),
(334, 32, 'function myFunction()', 1),
(335, 32, 'function = myFunction()', 0),
(336, 32, 'function:myFunction()', 0),
(337, 33, 'myFunction()', 1),
(338, 33, 'call function myFunction()', 0),
(339, 33, 'call myFunction()', 0),
(340, 34, 'if i = 5', 0),
(341, 34, 'if i = 5 then', 0),
(342, 34, 'if (i == 5)', 1),
(343, 34, 'if i == 5 then', 0),
(344, 35, 'if i =! 5 then', 0),
(345, 35, 'if (i &lt&gt 5)', 0),
(346, 35, 'if (i != 5)', 1),
(347, 35, 'if i &lt&gt 5', 0),
(348, 36, 'while (i &lt= 10)', 1),
(349, 36, 'while i = 1 to 10', 0),
(350, 36, 'while (i &lt= 10; i++)', 0),
(351, 37, 'for (i &lt= 5; i++)', 0),
(352, 37, 'for (i = 0; i &lt= 5)', 0),
(353, 37, 'for (i = 0; i &lt= 5; i++)', 1),
(354, 37, 'for i = 1 to 5', 0),
(355, 38, '&lt!--This is a comment--&gt', 0),
(356, 38, '//This is a comment', 1),
(357, 38, '\'This is a comment', 0),
(358, 39, '//This comment has more than one line//', 0),
(359, 39, '/*This comment has more than one line*/', 1),
(360, 39, '&lt!--This comment has more than one line--&gt', 0),
(361, 40, 'var colors = [\"red\", \"green\", \"blue\"]', 1),
(362, 40, 'var colors = 1 = (\"red\"), 2 = (\"green\"), 3 = (\"blue\")', 0),
(363, 40, 'var colors = (1:\"red\", 2:\"green\", 3:\"blue\")', 0),
(364, 40, 'var colors =\"red\", \"green\", \"blue\"', 0),
(365, 41, 'Math.rnd(7.25)', 0),
(366, 41, 'Math.round(7.25)', 1),
(367, 41, 'round(7.25)', 0),
(368, 41, 'rnd(7.25)', 0),
(369, 42, 'top(x, y)', 0),
(370, 42, 'ceil(x, y)', 0),
(371, 42, 'Math.ceil(x, y)', 0),
(372, 42, 'Math.max(x, y)', 1),
(373, 43, 'w2 = window.open(\"http://www.w3schools.com\");', 1),
(374, 43, 'w2 = window.new(\"http://www.w3schools.com\");', 0),
(375, 44, 'True', 0),
(376, 44, 'False', 1),
(377, 45, 'browser.name', 0),
(378, 45, 'client.navName', 0),
(379, 45, 'navigator.appName', 1),
(380, 46, 'onchange', 0),
(381, 46, 'onclick', 1),
(382, 46, 'onmouseclick', 0),
(383, 46, 'onmouseover', 0),
(384, 47, 'var carName;', 1),
(385, 47, 'v carName;', 0),
(386, 47, 'variable carName;', 0),
(387, 48, '=', 1),
(388, 48, '*', 0),
(389, 48, '-', 0),
(390, 48, 'X', 0),
(391, 49, 'true', 1),
(392, 49, 'NaN', 0),
(393, 49, 'False', 0),
(394, 50, 'Yes', 1),
(395, 50, 'No', 0);


-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `description`) VALUES
(1, 'PHP', 'PHP is a popular general-purpose scripting language that is especially suited to web development.\r\n\r\nFast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.'),
(2, 'JavaScript', 'Javascript (JS) is a scripting languages, primarily used on the Web. It is used to enhance HTML pages and is commonly found embedded in HTML code. JavaScript is an interpreted language. Thus, it doesn\'t need to be compiled. JavaScript renders web pages in an interactive and dynamic fashion. This allowing the pages to react to events, exhibit special effects, accept variable text, validate data, create cookies, detect a user’s browser, etc.');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`question_id`, `test_id`, `question`) VALUES
(1, 1, 'What does PHP stand for?\r\n'),
(2, 1, 'PHP server scripts are surrounded by delimiters, which?\r\n'),
(3, 1, 'How do you write \"Hello World\" in PHP'),
(4, 1, 'All variables in PHP start with which symbol?'),
(5, 1, 'What is the correct way to end a PHP statement?'),
(6, 1, 'The PHP syntax is most similar to:'),
(7, 1, 'How do you get information from a form that is submitted using the \"get\" method?'),
(8, 1, 'When using the POST method, variables are displayed in the URL:'),
(9, 1, 'In PHP you can use both single quotes (\'\') and double quotes (\"\") for strings:'),
(10, 1, 'Include files must have the file extension \".inc\"'),
(11, 1, 'What is the correct way to include the file \"time.inc\"?'),
(12, 1, 'What is the correct way to create a function in PHP?'),
(13, 1, 'What is the correct way to open the file \"time.txt\" as readable?'),
(14, 1, 'PHP allows you to send emails directly from a script'),
(15, 1, 'Which superglobal variable holds information about headers, paths, and script locations?'),
(16, 1, 'What is the correct way to add 1 to the $count variable?'),
(17, 1, 'What is a correct way to add a comment in PHP?'),
(18, 1, 'PHP can be run on Microsoft Windows IIS(Internet Information Server)'),
(19, 1, 'The die() and exit() functions do the exact same thing.'),
(20, 1, 'Which one of these variables has an illegal name?'),
(21, 1, 'How do you create a cookie in PHP?'),
(22, 1, 'In PHP, the only way to output text is with echo.'),
(23, 1, 'How do you create an array in PHP?'),
(24, 1, 'The if statement is used to execute some code only if a specified condition is true'),
(25, 1, 'Which operator is used to check if two values are equal and of same data type?'),
(26, 2, 'Inside which HTML element do we put the JavaScript?'),
(27, 2, 'What is the correct JavaScript syntax to change the content of the HTML element below?'),
(28, 2, 'Where is the correct place to insert a JavaScript?'),
(29, 2, 'What is the correct syntax for referring to an external script called “xxx.js”?'),
(30, 2, 'The external JavaScript file must contain the &ltscript&gt tag.'),
(31, 2, 'How do you write “Hello World”in an alert box?'),
(32, 2, 'How do you create a function in JavaScript?'),
(33, 2, 'How do you call a function named “myFunction”?'),
(34, 2, 'How to write an IF statement in JavaScript?'),
(35, 2, 'How to write an IF statement for executing some code if “I” is NOT equal to 5?'),
(36, 2, 'How does a WHILE loop start?'),
(37, 2, 'How does a FOR loop start?'),
(38, 2, 'How can you add a comment in a JavaScript?'),
(39, 2, 'How to insert a comment that has more than one line?'),
(40, 2, 'What is the correct way to write a JavaScript array?'),
(41, 2, 'How do you round the number 7.25, to the nearest integer?'),
(42, 2, 'How do you find the number with the highest value of x and y?'),
(43, 2, 'What is the correct JavaScript syntax for opening a new window called “w2” ?'),
(44, 2, 'JavaScript is the same as Java.'),
(45, 2, 'How can you detect the client\'s browser name?'),
(46, 2, 'Which event occurs when the user clicks on an HTML element?'),
(47, 2, 'How do you declare a JavaScript variable?'),
(48, 2, 'Which operator is used to assign a value to a variable?'),
(49, 2, 'What will the following code return: Boolean(10 &gt 9)'),
(50, 2, 'Is JavaScript case-sensitive?');

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `results`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `theme` varchar(100) NOT NULL,
  `is_disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`test_id`, `category_id`, `theme`, `is_disabled`) VALUES
(1, 1, 'PHP pt. 1', 0),
(2, 2, 'JavaScript pt. 1', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT для таблицы `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
