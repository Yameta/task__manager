<?php
if(isset($_POST["name"]) && isset($_POST["rating"]) && isset($_POST["text"])){
	require "systems.php";
	require "classes/Database.php";
	$Database = new Database();
	$qry = "INSERT INTO reviews (rating, name,text) VALUES (:rating, :name,:text)";
	$parm = array(
		"rating" => $_POST["rating"],
		"name" => $_POST["name"],
		"text" => $_POST["text"]
	);
	$Database->insert($qry, $parm);
	header("Location: 1index.php");
}
require "systems.php";
require "classes/Database.php";
$Database = new Database();
$qry = "SELECT * FROM reviews ORDER BY date DESC";
$reviews = $Database->getAll($qry);
if(!isset($_SESSION["id"])){
	saveAuth(4);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="styles/reviews.css" type=text/css>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php require "blocks/header.php"?>
<h1>Оставьте отзыв о нашей программе</h1>
<form method="post" action="">
	<label>Ваша оценка</label>
	<div class="rating-area">
		<input type="radio" id="star-5" name="rating" value="5">
		<label for="star-5" title="Оценка «5»"></label>	
		<input type="radio" id="star-4" name="rating" value="4">
		<label for="star-4" title="Оценка «4»"></label>    
		<input type="radio" id="star-3" name="rating" value="3">
		<label for="star-3" title="Оценка «3»"></label>  
		<input type="radio" id="star-2" name="rating" value="2">
		<label for="star-2" title="Оценка «2»"></label>    
		<input type="radio" id="star-1" name="rating" value="1">
		<label for="star-1" title="Оценка «1»"></label>
	</div>
	<input class="author" type="text" name="name" placeholder="Ваше имя" autocomplete="off" required>
	<textarea type="text" name="text" placeholder="Отзыв" autocomplete="off" required maxlength="150"> </textarea>
	<button  class="submit" type="submit">Отправить</button>
	</form>

<h1>Отзывы о нас</h1>
<?php foreach ($reviews as $item): ?>
<div class="rating-items">
<h2><?php echo $item['name']; ?></h2>
	<p><?php echo $item['text']; ?></p>	
	<div class="rating-mini">
		<span class="<?php if ($item['rating'] >= 1) echo 'active'; ?>"></span>	
		<span class="<?php if ($item['rating'] >= 2) echo 'active'; ?>"></span>    
		<span class="<?php if ($item['rating'] >= 3) echo 'active'; ?>"></span>  
		<span class="<?php if ($item['rating'] >= 4) echo 'active'; ?>"></span>    
		<span class="<?php if ($item['rating'] >= 5) echo 'active'; ?>"></span>
	</div>
	<p> <time datetime="<?=$item["date"]?>"><?=date("j F Y \г\. \в H:i", strtotime($item["date"]))?></time></p>
</div>
	</div>
	
<?php endforeach; ?>
<?php require "blocks/footer.php" ?> 
</body>
</html>