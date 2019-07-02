<!Doctype html>
<html>
<body>
  <style>
   input[type=submit] {
    background-color: #111111;
    color: white;
    bottom: 0;
    font-size: 1em;
    font-weight: bold;
    padding: 16px 8px;
    border-radius: 0px;
    border: none;
    cursor: pointer;
    width: 15%;
  </style>
  <div id="p2" style="background:#9400d3;">
<form action="map.php" method="post">
    LATITUDE:<input style="margin-right: 10% " type="text" name="lat" value = "13.088891">
    LONGITUDE:<input style="margin-right: 10%" type="text" name="lon" value = "80.209999">>
    <input style="margin-right: 10%;display:none" type="text" name="incident" value = "0">
    PROBLEM:
    <select style="margin-right: 10%">
    	 <option value="Accident">Accident</option>
  <option value="Burglary">Burglary</option>
  <option value="Murder">Murder</option>
  <option value="Fight">Fight</option>
    </select>
  <input style="margin: 0%" type="submit" value="submit">
</div>
<div id="googleMap" style="height:450px;padding-top: 10%;margin-top: 10px;"></div>
</form>
</section>
<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(44.968046,-94.420307),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjORXfPym4bAvYMOz7CaG5hEoYCubYoTE &callback=myMap"></script>

</body>
</html>