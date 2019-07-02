<?php
session_start();
$loc = $_POST["lat"]."".$_POST["lon"];


try 
{
    $conn = new PDO('mysql:host=localhost;dbname=id8665240_locate;charset=utf8', 'id8665240_kalamsdream', 'allama');
} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $conn->prepare("INSERT INTO time VALUES (:loc)");
$sql->execute(array(':loc'=>$loc));


try 
{
    $conn = new PDO('mysql:host=localhost;dbname=id8665240_locate;charset=utf8', 'id8665240_kalamsdream', 'allama');
} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $conn->query("select * from location");

$result = $sql->fetchAll();

$json = json_encode($result);


$suitability = array();
$td = array();
$array = json_decode($json,true);
$final = array();
foreach ($array as $a) {
    $suitability=file_get_contents('http://nareshbabu619.pythonanywhere.com/allocator/'.$_POST["incident"].','.$a[1].','.$a[2].','.$a[3].','.((int)(($a[1]+$a[2]+$a[3])/3)));
    
    
    // $url = "https://dev.virtualearth.net/REST/v1/Routes/DistanceMatrix?origins=".$_POST["lat"].",".$_POST["lon"]."&destinations=".$a[6].",".$a[7]."&travelMode=driving&key=AsVguET0ZU45DrFiqu8E7tqJaCND3U3CKmOI34kGdFWPKToPYn8CNRARKIlkYZgn ";
    
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_URL, $url);
    // $result = curl_exec($ch);
    // curl_close($ch);
    
    // $obj = json_decode($result);
    
    #array_push($td,$obj->resourceSets[0]->resources[0]->results[0]->travelDuration);
    $res = json_decode(file_get_contents("https://dev.virtualearth.net/REST/v1/Routes/DistanceMatrix?origins=".$_POST["lat"].",".$_POST["lon"]."&destinations=".$a[6].",".$a[7]."&travelMode=driving&key=AsVguET0ZU45DrFiqu8E7tqJaCND3U3CKmOI34kGdFWPKToPYn8CNRARKIlkYZgn "));
    
    $td=$res->resourceSets[0]->resources[0]->results[0]->travelDuration;
    $td = $td-$td*$suitability*0.1;
    
    array_push($final,array($a[0],$td));
    
}
function cmp($a, $b)
{
    return strcmp($a[1], $b[1]);
}

usort($final, "cmp");
$string = "Location: https://kalamsdream.000webhostapp.com/mailer.php?name1=".$final[0][0]."&name2=".$final[1][0]."&name3=".$final[2][0]."&lat=".$_POST["lat"]."&lon=".$_POST["lon"];

header($string);
echo $string;
echo "<h1>Activations have been sent</h1>";
exit()
?>
