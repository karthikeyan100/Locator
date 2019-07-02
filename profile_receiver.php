<?php
// if text data was posted
// if($_POST){
//     $id = $_POST["id"];
//      $name = $_POST["name"];
//       $r1 = $_POST["r1"];
//       $r2 = $_POST["r2"];
//         $r3 = $_POST["r3"];
//          $image = $_POST["image"];
// }
//$json = file_get_contents('php://input');
if($_POST)
$json = $_POST["json"];
else
$json = "sjson";
// $json = file_get_contents('php://input');

$obj = json_decode($json);

$id = $obj->id;
$name = $obj->name;
$r1 = $obj->r1;
$r2 = $obj->r2;
$r3 = $obj->r3;
$image = $obj->image;
$conn = null;

try 
{
    $conn = new PDO('mysql:host=localhost;dbname=id8665240_locate;charset=utf8', 'id8665240_kalamsdream', 'allama');
} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $conn->prepare("DELETE from location where id = :id");

$sql->execute(array(':id'=>$id));

$sql = $conn->prepare("INSERT INTO location VALUES (:name,:r1,:r2,:r3,:image,:id,0,0)");

$sql->execute(array(':name'=>$name,':r1'=>$r1,':r2'=>$r2,':r3'=>$r3,':image'=>$image,':id'=>$id));
// $sql = $conn->prepare("INSERT INTO location VALUES ('sample',2,2,:r3,:image,:id)");

// $sql->execute(array(':r3'=>$r3,':image'=>$json,':id'=>$id));


$conn = null;


?>