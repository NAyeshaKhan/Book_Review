<!DOCTYPE html>
<html lang="en">
<head>
  <title>About BookRev</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>
<body>

</body>
<?php 
if(isset($_POST['save'])){
extract($_POST);
$search=$_POST['search'];
$page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q='$search'");

$data = json_decode($page, true);

//print_r($data);
for ($i = 0; $i < 10; $i++) {
  echo "Title = " . $data['items'][$i]['volumeInfo']['title'];
  echo ", Authors = " . @implode(",", $data['items'][$i]['volumeInfo']['authors']);
  echo ", ID = " . $data['items'][$i]['id'];
  echo "--------";
} 
}   


?>