<?php
/*
 *
 *    Скрипт комментариев.
 *    Версия: 1.0 (beta)
 *    Дата: 10.02.2012
 *    Автор: Чернышов Роман
 *    Сайт: http://rche.ru
 *    Эл.почта: houseprog@ya.ru
 *
 */


define( '_RCHE', 1 );
// Настройки БД
$settings = array(
  'dbName' => 'olimpiada',
  'dbUser' => 'root',
  'dbPass' => '',
  'dbHost' => 'localhost'
 );


// Пути
//$paths['capcha'] = '/comments/capcha.php'; // вариант: /comments/capcha.php


error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once('class.registry.php');
require_once('class.dbsql.php');
require_once('class.controller.php');
require_once('class.comments.php');
require_once('functions.php');
require_once('markhtml.php');
session_start();
if($_SESSION['login']!=""&&$_SESSION['rights']!=-2){
	$DB=new DB_Engine('mysql', $settings['dbHost'], $settings['dbUser'], $settings['dbPass'], $settings['dbName']);
	$registry = new Registry;
	$registry->set('DB',$DB);
	$comments = new Comments($registry);
	$comments->admin=@($_SESSION['rights']==3)?true:false;
	$comments->login=true; // true - пользователь залогинен, передаем массив с данными пользователя ниже, false - не залогинен	
	$comments->user=array($_SESSION['userID'],$_SESSION['username'],$_SESSION['email'],$_SESSION['photo']);
	$comments->gravatar=true;
	$comments->paths=$paths;
	//$comments->capcha=true;
	$comments->index();	
}
else{
	
	$DB=new DB_Engine('mysql', $settings['dbHost'], $settings['dbUser'], $settings['dbPass'], $settings['dbName']);
	$registry = new Registry;
	$registry->set('DB',$DB);
	$comments = new Comments($registry);
	$comments->admin=@($_SESSION['rights']==3)?true:false;
	$comments->login=true; // true - пользователь залогинен, передаем массив с данными пользователя ниже, false - не залогинен	
	$comments->user=array($_SESSION['userID'],$_SESSION['username'],$_SESSION['email'],$_SESSION['photo']);
	$comments->gravatar=true;
	$comments->paths=$paths;
	//$comments->capcha=true;
	$comments->index();	
}
/* массив с данными пользователя
  `userID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL, -- путь к аватарке --
*/

?>