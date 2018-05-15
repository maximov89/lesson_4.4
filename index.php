<?php
require_once('m/functions.php');

//Подключение к базе данных
$db = connect_db();

// Создаем таблицу
if (!empty($_POST['create_table']) && !empty($_POST['table_name'])) {
		$sqlCreateTable = "CREATE TABLE {$_POST['table_name']} (id int(11) NOT NULL AUTO_INCREMENT, name VARCHAR(50) NOT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		$queryCreateTable = $db->prepare($sqlCreateTable);
		$queryCreateTable->execute();
}
// Добавляем новое поле
if (!empty($_GET['table']) && !empty($_POST['add']) && empty($_POST['name_field']) && !empty($_POST['name_field_new']) && !empty($_POST['typeofdata'])) {
		$sqlAddField = "ALTER TABLE {$_GET['table']} ADD {$_POST['name_field_new']} {$_POST['typeofdata']}";
		$queryAddField = $db->prepare($sqlAddField);
		$queryAddField->execute();
}
// Изменяем поле
if (!empty($_GET['table']) && !empty($_POST['change']) && !empty($_POST['name_field'])) {
		if (!empty($_POST['name_field_new'])) {
				// Изменяем имя поля
				$sqlChange = "ALTER TABLE {$_GET['table']} CHANGE {$_POST['name_field']} {$_POST['name_field_new']} INTEGER";//INTEGER
		} else {
			  // Изменяем только тип данных
				$sqlChange = "ALTER TABLE {$_GET['table']} MODIFY {$_POST['name_field']} {$_POST['typeofdata']}";
		}
				$queryChange = $db->prepare($sqlChange);
				$queryChange->execute();
}
// Удаляем поле
if (!empty($_GET['table']) && !empty($_POST['delete']) && !empty($_POST['name_field']) && empty($_POST['name_field_new']) && empty($_POST['typeofdata'])) {
		$sqlDelete = "ALTER TABLE {$_GET['table']} DROP COLUMN {$_POST['name_field']}";
		$queryDelete = $db->prepare($sqlDelete);
		$queryDelete->execute();
}
// Показываем все таблицы
$sqlTables = "SHOW TABLES";
$queryTables = $db->query($sqlTables);
// Показываем таблицу
if (!empty($_GET['table'])) {
		$sqlTable = "DESCRIBE {$_GET['table']}";
		$queryTable = $db->prepare($sqlTable);
		$queryTable->execute();
}
require_once('v/v_index.php');
