<?php
$lat=$_GET["lat"];
$lon=$_GET["lon"];
$name=$_GET["name"];
$loc=$lat."".$lon;
try 
{
    $conn = new PDO('mysql:host=localhost;dbname=id8665240_locate;charset=utf8', 'id8665240_kalamsdream', 'allama');
} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $conn->prepare("select count(latlon) from time where latlon = :loc");
$sql->execute(array(':loc'=>$loc));

$result = $sql->fetchAll();

if($result[0][0]=='1') {
    echo "<h1>You are Assigned</h1>";
    $sql = $conn->prepare("DELETE from time where latlon = :loc");
    $sql->execute(array(':loc'=>$loc));
    
    // file_get_contents("https://traffic-analyser.000webhostapp.com/locator/mailer1.php?lat=".$_GET["lat"].'&lon='.$_GET["lon"].'&name='.$_GET["name"]);
    
    $to      = 'nare16229.it@rmkec.ac.in';
    $subject = 'Your Assignment';
    $message = $_GET["name"].' has been successfully assigned for you.';
    $headers = 'From: ALLOCATOR' . "\r\n" .
        'Reply-To: nareshbabu1136619@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);
    

}
else    
    echo "Already assigned";
?>