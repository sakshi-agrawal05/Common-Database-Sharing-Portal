<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Database</title>
    <link rel="stylesheet" href="main.css">


    <style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
  </head>
  <body>
      <header>
        <h1>Common Database Sharing Portal</h1>

      </header>
      <ul class="option">

<div style="width:100%;height:50px;background:#4CAF50;  ">
  <div class="dropdown" style="float:left;">
  <button class="dropbtn">Training and Placement</button>
  <div class="dropdown-content" style="left:0;">

  </div>
</div>

<div class="dropdown" style="float:left;">
<button class="dropbtn">Events</button>
<div class="dropdown-content" style="left:0;">

</div>
</div>

<div class="dropdown" style="float:left;">
<button class="dropbtn">R and D</button>
<div class="dropdown-content" style="left:0;">
  <a href="sid1.php">International Journal</a>
  <a href="#">National Journal</a>
  <a href="#">International Conference</a>
  <a href="#">National Conference</a>
  <a href="#">Sttp-Workshop attend</a>
  <a href="#">Sttp-Workshop Organized</a>
</div>
</div>

<div class="dropdown" style="float:left;">
<button class="dropbtn">Feedback</button>
<div class="dropdown-content" style="left:0;">
</div>
</div>

<div class="dropdown" style="float:left;">
<button class="dropbtn">Result and Analysis</button>
<div class="dropdown-content" style="left:0;">
</div>
</div>


<div class="dropdown" style="float:left;">
<button class="dropbtn">Options</button>
<div class="dropdown-content" style="left:0;">
<?php
session_start();
if($_SESSION['username']=="admin"){
  echo   "<a href='cuser.php'>Create Users</a>";
}else{
  echo   "<a href='per.php'>Permission</a>";
}
?>


  <a href="index.php">Logout</a>
</div>
</div>


</div>
      </ul>
      <section style="display:block; width:100%; ">




              <table>
                    <form action="per.php" method="POST">

                        <tr>
                          <th style="border-radius:0;padding:5px;"><center>Name</center></th>
                            <th style="border-radius:0;padding:5px;"><center>Write</center></th>
                        </tr>

                        <?php
                        include('dbconnect.php');
                          $sql="select * from userdata where username='".$_SESSION['username']."'";
                          $res=mysqli_query($con,$sql);
                          $row=array();

                          while($row=mysqli_fetch_assoc($res)){

                                $sql2="select * from userdata where designation='faculty' and type='".$row['type']."'";
                                $res2=mysqli_query($con,$sql2);
                                $row2=array();
                                while($row2=mysqli_fetch_assoc($res2)){
                                  echo"<tr><td>".$row2['username']."</td><td><select name='c1_".$row2['id']."'>";
                                  if($row2['w']==1){
                                    echo"<option value='1'>Yes</option><option value='0'>No</option></select></td></tr>";
                                  }else{
                                    echo"<option value='0'>NO</option><option value='1'>Yes</option></select></td></tr>";



                                  }


                                }

                          }
                        ?>

                        <tr>
                          <td colspan="2">
                            <center><input type="submit" name="submit" value="Submit"></center>
                          </td>

                        </tr>


                    </form>
              </table>

        </section>
  </body>
</html>

<?php
if(isset($_POST['submit'])){
$sql="select * from userdata where username='".$_SESSION['username']."'";
$res=mysqli_query($con,$sql);
$row=array();

while($row=mysqli_fetch_assoc($res)){

      $sql2="select * from userdata where designation='faculty' and type='".$row['type']."'";
      $res2=mysqli_query($con,$sql2);
      $row2=array();
      while($row2=mysqli_fetch_assoc($res2)){
                $sql3="update userdata set w=".$_POST['c1_'.$row2['id']]." where id=".$row2['id'];
                $res3=mysqli_query($con,$sql3);
                //echo $sql3;


        }

        echo"<script >  window.location.href='per.php';</script>";

      }


}
?>
