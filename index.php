<!Doctype html>
<html>
    <head>
        <title>Locator
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
    
        #id01
        {
            
           
            padding: 18px 18px;
        }
        input[type=text]
        {
            border: 0px;
            height: 28px;
        }
        input[type=password]
        {
            border: 0px;
            height: 28px;
        }
        #cen
        {
            float: center;
        }
body {
  font-family: "Lato", sans-serif;
}
.top
{
    
    border:1px solid;
    width: 50%;
    padding: 10px;
    box-shadow: 5px 10px 18px white;
    float: none;
    margin-left: 375px;
    font-size: 20px;
    text-align: center;
    background: white;
}
.right
{
    text-decoration-color: white;
    border:1px solid;
    width: 10%;
    padding: 10px;
    box-shadow: 5px 10px 18px red;
    float: right;
    margin-left: 300px;
    font-size: 20px;
    text-align: center;
    background: red;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  
  top: 100;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 10;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
#head
{
    margin-left: 100px;
}
</style>
    
    </head>
        <body background="final.png">
            <div class="right">
                <font color="white">
<span style="font-size:25px;cursor:pointer;" onclick="openNav()">&#9776; login</span>
</font>
</div>
<div class="top">
<h3 id="head"><font color="black">Locator Services</font></h3>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <div id="id01">         
        <form  action="validate.php" method="post">
            <center>
            <font size="5">

            Group ID:
                 <input type="text" name="gid" style=" height:500px,border:0px">
                 <br>
                 <br>
            Password:
                 <input type="password" name="password" height=500px>
                 <br>
                 <br>
                 <button type="submit" value="Login">Login</button>
            </font>
             </center>
        </form>
    </div>
</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>