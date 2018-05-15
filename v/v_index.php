<!DOCTYPE html>
<html lang="ru">
  <head>
  	<meta charset="utf-8">
    <title>Создание таблиц</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
	<body>
		<div class="container">
			<div class="alert alert-primary">
				<h1>Создание таблиц</h1>
	        </div>
			<div class="alert alert-warning">
			  <h4>Доступные таблицы</h4>
				<ul class="nav nav-pills">
					<?php foreach ($queryTables as $oneTables) : ?>
						<li class="nav-item">
							<a class="nav-link" href="?table=<?=htmlspecialchars($oneTables[0]); ?>">
								<?=htmlspecialchars($oneTables[0]); ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
				<form method="POST">
					<h4>Новая таблица</h4>
					<input type="text" name="table_name" placeholder="имя таблицы">
					<input type="submit" name="create_table" value="Создать таблицу">
				</form>
			</div>
      <?php if (!empty($_GET['table'])) : ?>
			<form method="POST">
				<table class="table table-bordered">
					<tr>
						<th></th>
						<th>Field</th>
						<th>Type</th>
						<th>Null</th>
						<th>Key</th>
						<th>Default</th>
						<th>Extra</th>
					</tr>
					<?php while ($oneTable = $queryTable->fetch(PDO::FETCH_ASSOC)) : ?>
					<tr>
						<td>
							<input type="radio" name="name_field" value="<?=htmlspecialchars($oneTable['Field']); ?>" value="">
						</td>	
						<td><?=htmlspecialchars($oneTable['Field']); ?></td>
						<td><?=htmlspecialchars($oneTable['Type']); ?></td>
						<td><?=htmlspecialchars($oneTable['Null']); ?></td>
						<td><?=htmlspecialchars($oneTable['Key']); ?></td>
						<td><?=htmlspecialchars($oneTable['Default']); ?></td>
						<td><?=htmlspecialchars($oneTable['Extra']); ?></td>				
					</tr>
					<?php endwhile ?>
				</table>
				<div>
					<input type="text" name="name_field_new" placeholder="имя поля">
					<input type="text" name="typeofdata" placeholder="тип данных">
					<input class="btn btn-primary" type="submit" name="add" value="добавить">
					<input class="btn btn-primary" type="submit" name="change" value="изменить">
					<input class="btn btn-primary" type="submit" name="delete" value="удалить">				
				</div>
				<input class="btn btn-primary" type="reset">
			</form>
			<?php endif ?>
			</div>
	</body>
</html>
