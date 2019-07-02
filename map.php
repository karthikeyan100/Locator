<?php
session_start();
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

?>
<!DOCTYPE html>
<html>
<head><title>Locating</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.checked {
  color: orange;
}
body
{
background-color:#E5E8E8 ;
}
.ex1
{
    padding-right: 90px;
 
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>

   <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width: 70%;
        float:left;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
  </style></head>
<body>
  <div id="map" style="width:100%"></div>

<?php
$latitude=$_POST["lat"];
$longitude=$_POST["lon"];
// function passing($i,j) {
// $_SESSION["lat"]=$latitude;
// $_SESSION["lon"]=$longitude;
// header('Location: http://kalamsdream.000webhostapp.com/mailer.php');}
?>
<script>
  //function mylanlon() {
  var i = "<?php echo $latitude; ?>";
  var j = "<?php echo $longitude; ?>";
  var array = <?php echo $json; ?>;
  var acc_i = i;
  var acc_j = j;
  
      function initMap() {
        var myLatlng = new google.maps.LatLng(parseFloat(i),parseFloat(j));
       
        
        var contentString = '<h1>Accident location</h1>';
      
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: myLatlng,
                  });
        var infowindow = {};
        infowindow['accident'] = new google.maps.InfoWindow({content: contentString});

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Click to zoom',
          icon:'ex.png'
        });
        
        marker.addListener('click', function() {
                
                map.setZoom(10);
                map.setCenter(marker.getPosition());
                infowindow['accident'].open(map, marker);
                
            });
        
        var people = {}
        var contentstring = {}
        for(var details in array) {
            
            
             
              i = parseFloat(array[details]['lat']);
              j = parseFloat(array[details]['lon']);
              
              var lat =  new google.maps.LatLng(i,j);
              people[details] = new google.maps.Marker({
                position: lat,
                map: map,
                title: details,
                icon:'avatar.png'
              });
              
                people[details].addListener('click', function() {
                    var detail = this.getTitle();
                    contentstring[detail] = '<div id ="profile"><div class="card"><img src="data:image/png;base64,'+array[detail]['image']+'" alt="John" style="width:100%"><h1>'+array[detail]['name']+'</h1><form action = "http://kalamsdream.000webhostapp.com/mailer1.php" method="post"><p><input type = "submit" value = "Assign"><input id= 1 style = "display: none;" type = "text" name = "lat"/><input id= 2 style = "display: none;" type = "text" name = "lon" /></p></form><br><table id="tb"><tr><td class="ex1">Anti-violence</td><td>'+'<span class="fa fa-star checked"></span>'.repeat(parseInt(array[detail]['violence']))+'<span class="fa fa-star"></span>'.repeat(5-parseInt(array[detail]['violence']))+'</td></tr><tr><td class="ex1">Analysis</td><td>'+'<span class="fa fa-star checked"></span>'.repeat(parseInt(array[detail]['analaysis']))+'<span class="fa fa-star"></span>'.repeat(5-parseInt(array[detail]['analaysis']))+'</td></tr><tr><td class="ex1">Paramedics</td><td>'+'<span class="fa fa-star checked"></span>'.repeat(parseInt(array[detail]['paramedics']))+'<span class="fa fa-star"></span>'.repeat(5-parseInt(array[detail]['paramedics']))+'</td></tr></table></div></div>';
                infowindow[detail] = new google.maps.InfoWindow({content: contentstring[detail]});
                    infowindow[detail].open(map, this);
                    map.setZoom(10);
                    map.setCenter(this.getPosition());
                    
                });
        }
              
    

        

        
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjORXfPym4bAvYMOz7CaG5hEoYCubYoTE&callback=initMap">
    </script>
    


<!--<div align="right" style="background-color: white;float:right;visibility: visible;" id ="profile">-->
<!--<div class="card">-->
<!--  <img src="profileiccon.png" alt="John" style="width:100%">-->
<!--<h1>Rathnavel</h1>-->
<!--<form action = "http://kalamsdream.000webhostapp.com/mailer.php" method="post">-->
<!--<p><input type = "submit" value = "Assign">-->

<!--  <input id= 1 style = "display: none;" type = "text" name = "lat"/>-->
<!--  <input id= 2 style = "display: none;" type = "text" name = "lon" />-->
<!--</p>-->
<!--</form>-->
<!--<br>-->
<!--  <table id="tb">-->
<!--  <tr>-->
<!--  <tr>-->
<!--  <td class="ex1">Service Type</td>-->
<!--  <td>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--    <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  </td>-->
<!--  </tr>-->
<!--  <tr>-->
<!--  <td class="ex1">Paramedic</td>-->
<!--  <td>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--    <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  </td>-->
<!--  </tr>-->
<!--  <tr>-->
<!--  <td class="ex1">Fire Control</td>-->
<!--    <td>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--    <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star "></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  </td>-->
<!--  <tr>-->
<!--  <td class="ex1">Anti-violence</td>-->
<!--  <td>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--    <span class="fa fa-star"></span>-->
<!--  <span class="fa fa-star "></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  </td> -->
<!--  </tr>-->
<!--        <tr>-->
<!--  <td class="ex1">Theft Analysis</td>-->
<!--  <td>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--    <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star checked"></span>-->
<!--  <span class="fa fa-star"></span>-->
<!--  </td>-->
<!--  </tr>-->
<!--  </table>-->
<!--</div>-->
<!--</div>-->
<script>
  document.getElementById(1).value=i;
  document.getElementById(2).value = j;
    </script>
</body>
</html>