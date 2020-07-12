-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 13 2020 г., 00:08
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wb_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id` int NOT NULL,
  `GosNum` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Гос.номер',
  `model` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Модель',
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Тип'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `GosNum`, `model`, `type`) VALUES
(2, 'АЕ 5698-2', 'ГАЗ-2705', 'грузопассажирский'),
(3, '9847ЕВ-2', 'УАЗ-3163', 'легковой специальный'),
(4, '2961EX-2', 'Lada Largus R-90', 'легковой специальный'),
(5, '3486IB-2', 'Шкода Октавия', 'легковой специальный'),
(14, 'АЕ 3670-2', 'ГАЗ-2705', 'грузопассажирский');

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `id` int NOT NULL,
  `TabNum` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'табельный №',
  `position` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Должность',
  `FirstName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Фамилия',
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Имя',
  `FatherName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Отчество',
  `Driver` tinyint(1) NOT NULL COMMENT 'водитель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`id`, `TabNum`, `position`, `FirstName`, `name`, `FatherName`, `Driver`) VALUES
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
-- Структура таблицы `place`
--

CREATE TABLE `place` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Название',
  `FullName` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Полное название'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `name`, `FullName`) VALUES
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
  `place_id` int NOT NULL COMMENT 'Локация',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Задание',
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Примечание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `status`, `date`, `place_id`, `content`, `comment`) VALUES
(1, 4, '2020-07-08', 2, 'ППР на оборудовании', ''),
(3, 3, '2020-07-13', 12, 'Ремонт РПУ', ''),
(9, 2, '2020-07-11', 1, 'Ремонт ДУМ', 'Замена блока UniPing'),
(10, 1, '2020-07-14', 10, 'Хоз.работы: обкашивание территории и анкеров оттяжек', ''),
(13, 1, '2020-07-13', 8, 'Работы на АМС', 'Покраска мачты'),
(14, 1, '2020-07-14', 5, 'ППР на оборудовании', '');

-- --------------------------------------------------------

--
-- Структура таблицы `taskstate`
--

CREATE TABLE `taskstate` (
  `id` tinyint UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `taskstate`
--

INSERT INTO `taskstate` (`id`, `name`) VALUES
(1, 'запланировано'),
(2, 'выполняется'),
(3, 'приостановлено'),
(4, 'завершено');

-- --------------------------------------------------------

--
-- Структура таблицы `trip`
--

CREATE TABLE `trip` (
  `id` int NOT NULL,
  `fkDriver` int NOT NULL COMMENT 'водитель',
  `fkTask` int NOT NULL COMMENT 'задача',
  `fkCar` int NOT NULL COMMENT 'Автомашина',
  `PutNum` int NOT NULL COMMENT 'Путевой лист',
  `timeStart` datetime NOT NULL COMMENT 'Время выезда',
  `timeFinish` datetime NOT NULL COMMENT 'Время возвращения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `id` int NOT NULL,
  `fkPeople` int NOT NULL,
  `fkTask` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCar_UNIQUE` (`id`),
  ADD UNIQUE KEY `GNum_UNIQUE` (`GosNum`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TabNum_UNIQUE` (`TabNum`),
  ADD UNIQUE KEY `idPeople_UNIQUE` (`id`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idPlace_UNIQUE` (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idTask_UNIQUE` (`id`);

--
-- Индексы таблицы `taskstate`
--
ALTER TABLE `taskstate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idTrip_UNIQUE` (`id`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idWorker_UNIQUE` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `taskstate`
--
ALTER TABLE `taskstate`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
