-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 29 2020 г., 20:55
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `wb_db`
--
-- DROP SCHEMA IF EXISTS `wb_db` ;

CREATE SCHEMA IF NOT EXISTS `wb_db` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `wb_db` ;
-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `model` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Модель',
  `GosNum` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Гос.номер',
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Тип'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `model`, `GosNum`, `type`) VALUES
(1, 'ГАЗ-2705', 'АЕ 3670-2', 'грузопассажирский'),
(2, 'ГАЗ-2705', 'АЕ 5698-2', 'грузопассажирский'),
(3, 'Lada Largus R-90', '2961EX-2', 'легковой специальный'),
(4, 'УАЗ-3163', '9847ЕВ-2', 'легковой специальный');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Группа',
  `cod` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Код доступа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `cod`) VALUES
(1, 'пользователь', 'user'),
(2, 'гость', 'guest'),
(3, 'администратор', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `id` int NOT NULL,
  `tabNum` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Табельный №',
  `position` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Должность',
  `firstName` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Фамилия',
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
  `fatherName` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Отчество',
  `driver` tinyint(1) NOT NULL COMMENT 'Водитель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`id`, `tabNum`, `position`, `firstName`, `name`, `fatherName`, `driver`) VALUES
(1, '500709', 'ведущий инженер СР и ТВ', 'Прядкин', 'Дмитрий', 'Николаевич', 0),
(2, '500887', 'водитель автомобиля 4 разряда', 'Агеев', 'Сергей', 'Михайлович', 1),
(3, '501814', 'антенщик-мачтовик 5 разряда', 'Архипенко', 'Игорь', 'Сергеевич', 1),
(4, '501812', 'инженер по ремонту и обслуживанию ЭПУ связи', 'Бучкин', 'Вадим', 'Григорьевич', 0),
(5, '501633', 'инженер СР и ТВ', 'Демиденко', 'Роман', 'Андреевич', 0),
(6, '500837', 'инженер СР и ТВ', 'Зимянин', 'Александр', 'Юрьевич', 1),
(7, '501631', 'водитель автомобиля 4 разряда', 'Квач', 'Юрий', 'Викеньтевич', 1),
(8, '501817', 'инженер СР и ТВ 1 категории', 'Косый', 'Юрий', 'Иванович', 0),
(9, '501627', 'антенщик мачтовик 3 разряда', 'Пушнев', 'Александр', 'Евгеньевич', 0),
(10, '501632', 'инженер СР и ТВ 2 категории', 'Торбенко', 'Валерий', 'Владимирович', 0),
(11, '501862', 'инженер СР и ТВ', 'Чемурако', 'Наталья', 'Ивановна', 0),
(12, '500782', 'инженер СР и ТВ', 'Чириков', 'Александр', 'Викторович', 1),
(13, '500682', 'водитель автомобиля 4 разряда', 'Шибеко', 'Виктор', 'Васильевич', 1),
(14, '500696', 'инженер СР и ТВ', 'Юпатов', 'Леонид', 'Романович', 0),
(15, '501650', 'инженер СР и ТВ', 'Юрченко', 'Юрий', 'Михайлович', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Название',
  `FullName` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Полное название'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `name`, `FullName`) VALUES
(1, 'АРТПС Богданово', 'Автоматизированная радиотелевизионная станция Богданово'),
(2, 'АРТПС Бычиха', 'Автоматизированная радиотелевизионная станция Бычиха'),
(3, 'АРТПС Городок', 'Автоматизированная радиотелевизионная станция Городок'),
(4, 'АРТПС Лиозно', 'Автоматизированная радиотелевизионная станция Лиозно'),
(5, 'АРТПС Лялевщина', 'Автоматизированная радиотелевизионная станция Лялевщина'),
(6, 'АРТПС Мишневичи', 'Автоматизированная радиотелевизионная станция Мишневичи'),
(7, 'АРТПС Обухово', 'Автоматизированная радиотелевизионная станция Обухово (Орша)'),
(8, 'АРТПС Озерцы', 'Автоматизированная радиотелевизионная станция Озерцы'),
(9, 'АРТПС Сенно', 'Автоматизированная радиотелевизионная станция Сенно'),
(10, 'РРС Богушевск', 'Радиорелейная станция Богушевск (Заветное)'),
(11, 'РРС Ловша', 'Радиорелейная станция Ловша (Добрино)'),
(12, 'Витебск (АПГ-1)', 'База аварийно-профилактической группы №1'),
(13, 'Витебск (ОРТПС)', 'Областная радиотелевизионная передающая станция Витебск');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `status` tinyint UNSIGNED NOT NULL COMMENT 'Статус',
  `date` date NOT NULL COMMENT 'Дата',
  `places_id` int NOT NULL COMMENT 'Локация',
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Задание',
  `comment` text CHARACTER SET utf8 COLLATE utf8_bin COMMENT 'Примечание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `status`, `date`, `places_id`, `content`, `comment`) VALUES
(1, 4, '2020-07-08', 2, 'ППР на оборудовании', ''),
(2, 3, '2020-07-13', 12, 'Ремонт РПУ', ''),
(3, 2, '2020-07-11', 1, 'Ремонт ДУМ', 'Замена блока UniPing'),
(4, 1, '2020-07-14', 10, 'Хоз.работы: обкашивание территории и анкеров оттяжек', ''),
(5, 1, '2020-07-13', 8, 'Работы на АМС', 'Покраска мачты');

-- --------------------------------------------------------

--
-- Структура таблицы `taskstates`
--

CREATE TABLE `taskstates` (
  `id` tinyint UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `taskstates`
--

INSERT INTO `taskstates` (`id`, `name`) VALUES
(1, 'запланировано'),
(2, 'выполняется'),
(3, 'приостановлено'),
(4, 'выполнено');

-- --------------------------------------------------------

--
-- Структура таблицы `trips`
--

CREATE TABLE `trips` (
  `id` int NOT NULL,
  `people_id` int NOT NULL COMMENT 'Водитель',
  `task_id` int NOT NULL COMMENT 'Задача',
  `car_id` int NOT NULL COMMENT 'Автомашина',
  `PutNum` int NOT NULL COMMENT 'Путевой лист',
  `timeStart` datetime NOT NULL COMMENT 'Время выезда',
  `timeFinish` datetime NOT NULL COMMENT 'Время возвращения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Логин',
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Пароль',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'e-mail',
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'ФИО',
  `group_id` int NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `group_id`) VALUES
(1, 'admin', '2ba833da9cae94b164a7dbb31d4c8866', 'dme@tut.by', 'Прядкин Дмитрий', 3),
(2, 'atu', 'ba509877b1918c3503b5ddc58e7f3860', '', 'Диспетчер', 1),
(3, 'guest', '72eb55db4c1b2a17c2196dc3a56497e0', '', 'Гость', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int NOT NULL,
  `people_id` int NOT NULL,
  `tasks_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `people_id`, `tasks_id`) VALUES
(21, 3, 86),
(22, 4, 86),
(23, 5, 86),
(24, 12, 87),
(25, 13, 87),
(26, 14, 87);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idcars_UNIQUE` (`id`),
  ADD UNIQUE KEY `GNum_UNIQUE` (`GosNum`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_name` (`name`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TabNum_UNIQUE` (`tabNum`),
  ADD UNIQUE KEY `idPeople_UNIQUE` (`id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idplaces_UNIQUE` (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idTask_UNIQUE` (`id`);

--
-- Индексы таблицы `taskstates`
--
ALTER TABLE `taskstates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idtrips_UNIQUE` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idworkers_UNIQUE` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `taskstates`
--
ALTER TABLE `taskstates`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
