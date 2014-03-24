-- Adminer 4.0.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `comment` (`id`, `task`, `author`, `text`, `date`) VALUES
(1,	1,	1,	'potrebné vytvoriť logo',	'2014-03-17 15:00:00'),
(2,	2,	4,	'nefunkčná registrácia',	'2014-03-17 15:11:00'),
(3,	4,	2,	'neprestné časovanie ',	'2014-03-17 15:17:00');

INSERT INTO `project` (`id`, `name`, `description`, `owner`, `date`) VALUES
(1,	'Task manager',	'Projekt by mal byť vytvorený ako webový portál, kde by mohli pracovníci kordinovať prácu na rôznych projektoch.',	1,	'2014-03-17 12:26:00'),
(2,	'Notes',	'Úlha by mala slúžiť na zaznamenávanie poznámok a usporiadavať ich podľa doležitosti a signalizovať hodinu vopred ako sa poznámka stane aktuálou. ',	2,	'2014-03-17 12:30:00'),
(3,	'E-shop',	'Úloha je zameraná pre rozšírenie predaja v obchode Alza pomocou e-shopu. ',	3,	'2014-03-17 12:36:00'),
(4,	'E-learning tests',	'Ide testovanie vedomostí študentov pomocou elektronických testov. Úloha by mala mať vkladanie, upravovanie, mazanie úloh a samotné generovanie testov pre študentov.',	4,	'2014-03-17 12:37:23'),
(5,	'Virtual reality',	'Úloha je zameraná na virtuálnu realitu pri liečbe fóbií ako napríklad simulovanie výšok alebo malých priestorov čo by pomáhalo pri liečbe ľudí trpiacich fóbiou.',	5,	'2014-03-17 12:40:00');

INSERT INTO `project_member` (`user_id`, `project_id`) VALUES
(5,	1),
(6,	1),
(7,	2),
(8,	2),
(9,	3),
(9,	3),
(10,	4),
(2,	5),
(3,	5);

INSERT INTO `task` (`id`, `name`, `description`, `project_id`, `owner`, `worker`, `date`) VALUES
(1,	'Vytvorenie webu',	'vytvoriť web pre daný projekt (grafika)',	1,	1,	5,	'2014-03-17 12:51:00'),
(2,	'Vytvoriť web',	'php kód funkčnosť webu',	1,	1,	6,	'2014-03-17 13:00:00'),
(3,	'Vytvoriť zadávanie poznámok',	'spraviť funkčné zadávanie úloh do aplikácie.',	2,	2,	7,	'2014-03-17 13:05:00'),
(4,	'Časovanie',	'Vytvoriť funkčné časovanie aby hodinu vopred upozornilo da danú poznámku.',	2,	2,	8,	'2014-03-17 13:10:00'),
(5,	'Web',	'Spraviť funkčný web na pridávanie, úpravu a mazanie úloh + dizajn webu.',	4,	4,	10,	'2014-03-17 13:15:00');

INSERT INTO `task_status` (`id`, `name`, `task`, `author`, `date`) VALUES
(1,	'hotové',	5,	4,	'2014-03-17 17:00:00'),
(2,	'rieši sa',	1,	1,	'2014-03-17 17:23:00'),
(3,	'rieši sa',	3,	2,	'2014-03-17 17:46:00'),
(4,	'nový',	5,	4,	'2014-03-17 18:00:00');

INSERT INTO `users` (`id`, `mail`, `password`, `name`, `role`, `about_me`, `references`, `skills`, `date`) VALUES
(1,	'peter.francek@gmail.com',	'8dbcbb94600aa616e2c0dbe3667cab14',	'francek',	'user',	'študent UCM, UMB... skalolezectvo, dizajn, filmy, seriály, pc hry ',	'školské projekty',	'Skúsenosti so štandardnými nástrojmi informatiky a informačných technológií, ako programovacie jazyky (C++, Pascal, Delphi); operačné systémy (UNIX, Windows); kancelárske balíky (MS Office); databázové systémy (MY Sql); systémy pre projektovanie a návrh webových aplikácií (XHTML,CSS). Systémy pre návrh stavieb a interérov (AutoCad, SketchUp). ',	'2014-03-17 11:20:00'),
(2,	'peterherda11@gmail.com',	'75754c133d57fdc407df25c353a2f8eb',	'herda',	'user',	'študent UCM, UMB... literatúra, posilovanie ',	'školské projekty',	'Skúsenosti so štandardnými nástrojmi informatiky a informačných technológií, programovacie jazyky java aj pascal, OS Windows, kancelárse baliky MS Office, databázové systemy MySQL, pre webove aplikacie xhtml, php. ',	'2014-03-17 11:25:00'),
(3,	'josto111@gmail.com',	'ce4169bc347cd886db7e2f4cab98fafe',	'maar',	'user',	'študent UCM, UMB... airsoft, turistika,, sex, manga / anime ',	'školské projekty',	'So štandardnými nástrojmi informatiky a informačných technológií, napríklad grafik mysľou, rukou aj dušou, programovacie jazyky (C, C++, Pascal), operačné systémy (Linux/UNIX, Windows, MacOS), kancelárske balíky (MS Office), grafické editory (photoshop), systémy pre projektovanie a návrh webových aplikácií (XHTML,PHP). ',	'2014-03-17 11:29:00'),
(4,	'romanmatyus@romiix.org',	'70f9dc84ceb5e8e10e82187527aefc46',	'matyus',	'user',	'študent UCM, UMB...turistika, plávanie ',	'školské projekty',	'So štandardnými nástrojmi informatiky a informačných technológií, operačné systémy (telom aj dušou Linux/UNIX, Windows, MacOS); kancelárske balíky (Open Office); databázové systémy (MY Sql); systémy pre projektovanie a návrh webových aplikácií (XHTML,PHP, Nette). ',	'2014-03-17 11:31:00'),
(5,	'lubicaondriskova@gmail.com',	'56452a4749fc6daa6de9c99fea9aa04c',	'ondriskova',	'user',	'študent UCM, UMB... korčuľovanie, milovanie.',	'školské projekty',	'So štandardnými nástrojmi informatiky a informačných technológií, napríklad programovacie jazyky (C, C++, Pascal), operačné systémy (Linux/UNIX, Windows, MacOS), kancelárske balíky (MS Office), CAD systémy. ',	'2014-03-17 11:33:00'),
(6,	'Mark3D.marek@gmail.com',	'4cf570ad170ddbd3c9c10ac428484e21',	'palkovic',	'user',	'študent UCM, UMB, volejbal, filmy, seriály',	'školské projekty',	'So štandardnými nástrojmi informatiky a informačných technológií, napríklad programovacie jazyky (C, C++, Pascal), operačné systémy (Linux/UNIX, Windows, MacOS), kancelárske balíky (MS Office), 3D modelovanie, virtuálna realita. ',	'2014-03-17 11:42:00'),
(7,	'puskas.filip@gmail.com',	'3d7ed3484615d571537c23b461bdfe21',	'puskas',	'user',	'študent UCM, UMB...cyklistika, jumping, lyžovanie, fitness, video, programovanie ',	'školské projekty',	'So štandardnými nástrojmi informatiky a informačných technológií, napríklad programovaci jazyk (C#), operačné systémy (Linux/UNIX, Windows), kancelárske balíky (MS Office), databázové systémy (MY Sql); návrh webových aplikácií (PHP, Nette framework, HTML, CSS). ',	'2014-03-17 11:44:00'),
(8,	'slajfo@gmail.com',	'4c2f8b7a68556a3dd1ea28b30ccdd6e8',	'slajfercik',	'user',	'študent UCM, UMB...digitálne fotografie, počítače a informačné technológie, horská cyklistika, 2D a 3D grafika, 360° video ',	'školské projekty',	'Dobrá znalosť audiovizuálnej techniky (zabezpečenie videoprojekcie na akcii, 3D mapping projection, live photo/video streaming), servis výpočtovej techniky produktové fotografovanie a spracovanie grafiky, realizácia virtuálnych prehliadok interiérov a exteriérov, kamerovanie a spracovanie videa fotenie podujatí a akcií rôzneho charakteru, spravovanie operačných systémov Windows, MAC OS a Linux produktívna práca v programoch Kolor (spracovanie gigapixelových panorám a tvorba virtuálnych prehliadok), pokročilé ovládanie nástrojov Adobe®(Lr, Ps, Pr, Ae, Dw), základné znalosti v oblasti webových serverov, tvorby internetových stránok a eshopov dobrá znalosť kancelárskych balíkov Microsoft OfficeTMa OpenOfficeTM. ',	'2014-03-17 11:46:00'),
(9,	'erikurbancok@gmail.com',	'cc60830ecd676adc31fcf87a4bd0622f',	'urbancok',	'user',	'študent UCM, UMB...fotenie, posilovňa, cyklistika, plávanie',	'školské projekty',	'Skúsenosti so štandardnými nástrojmi informatiky a informačných technológií, ako programovacie jazyky (C, C++, Pascal,); operačné systémy (Linux/UNIX, Windows); kancelárske balíky (MS Office); spracovanie obrazu (adobe photoshop); práca s videom (adobre premiere); skúsenosti s fotením (tablo,oznamká,modeling,diskotéky); systémy pre projektovanie a návrh webových aplikácií (XHTML,CSS). ',	'2014-03-17 11:47:00'),
(10,	'1ns1.uradnik@gmail.com',	'724e76215ba95667c555463477368447',	'uradnik',	'user',	'študent UCM, UMB... motorky, cvičenie, popíjanie zeleného čaju, manga/ anime , seriály',	'školské projekty',	'So štandardnými nástrojmi informatiky a informačných technológií, napríklad programovacie jazyky (C, C++, Pascal), operačné systémy (Linux/UNIX, Windows, MacOS), kancelárske balíky (MS Office, Open office), databázové systémy (MY Sql); grafické editory (photoshop, gimp), systémy pre projektovanie a návrh webových aplikácií (XHTML,PHP). ',	'2014-03-17 11:48:00');

-- 2014-03-18 11:49:31
