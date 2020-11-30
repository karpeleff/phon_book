<?php


require_once 'lib/Db.class.php';

use lib\Db;

$db = new Db();

$table = 'store';

if(isset($_POST['name'] )&& $_POST['name'] !== NULL)
{
$db->insert($table, [
       
        'fio' => $_POST['name'],
        'tel' => $_POST['tel']
    ]
);	
}



if(isset($_GET['id']))
{
	$db->delete($table, ['id' =>$_GET['id'] ]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Document</title>
</head>
<body>
<div  class="main" >
	<form method="post" action="/index.php" >
	<div class="form">
	<div class="header" >Добавить контакт</div>
	<hr>
<input  class="input" type="text" name="name">	


<input class="input" type="text" name="tel">
<br><br>
<button class="btn"   type="submit" >Добавить</button>
<br><br>		
	</div>	
	</form>

	<br>
	<div class="form">
	<div class="header" >Список контактов</div>	
	<hr>
	<div  class="output">

	<?php
	
	$result = $db->select('store');

foreach($result as $item)
{
  
?>
  

	<p><?=$item['fio']?> <a href="/index.php?id=<?=$item['id']?>"><i class="fa fa-times"></i></a> </p> 	
		<p><?= $item['tel']?></p>
	
	

<?php 
}	

?>
	</div>	
</div>
	
	</div>	
</div>

</body>
</html>


