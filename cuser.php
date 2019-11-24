<?php
session_start();
if($_SESSION['username']!="admin"){
  echo"<script > alert('Not Admin User'); window.location.href='index.php';</script>";
}
?>
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
  <a href="#">International Journal</a>
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
  <a href="cuser.php">Create Users</a>
  <a href="index.php">Logout</a>
</div>
</div>


</div>
      </ul>
      <section style="width:100%; ">




        <table>
              <form action="cuser.php" method="POST">
                  <tr>
                    <th><center>Create User</center></th>
                  </tr>
                  <tr>
                    <td>
                      <center>
                    <label for="">Type:</label><br><br>
                    <select class="" name="type" style="padding:10px;width:240px;">
                      <option value="tandp">T and P</option>
                      <option value="rand">R and D</option>
                      <option value="event">Event </option>
                      <option value="Brach">Brach</option>

                    </select>
                    </center>
                  </td>

                  </tr>


                  <tr>
                    <td>
                      <center>
                    <label for="">Designation:</label><br><br>
                    <select class="" name="designation" style="padding:10px;width:240px;">
                      <option value="faculty">Faculty</option>
                      <option value="hod">HOD</option>
                    </select>
                    </center>
                  </td>

                  </tr>


                  <tr>
                    <td>
                      <center>
                    <label for="">Enter Username:</label><br><br>
                    <input type="text" name="username" value="" placeholder="Usernamme">
                    </center>
                    </td>

                  </tr>

                  <tr>
                    <td>
                      <center>
                    <label for="">Enter Password:</label><br><br>
                    <input type="password" name="password" value="" placeholder="Password">
                    </center>
                    </td>

                  </tr>



                  <tr>
                    <td>
                      <center><input type="submit" name="submit" value="Login"></center>
                    </td>

                  </tr>


              </form>
        </table>

        </section>
  </body>
</html>

<?php
  if(isset($_POST['submit']))
  {
    $type=$_POST['type'];
    $designation=$_POST['designation'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username==""|| $password=="")
    {
        echo"<script > alert('Please enter username or password'); </script>";
    }else
    {
      include('dbconnect.php');
      $sql="insert into userdata(username,password,type,designation)values('".$username."','".$password ."','".$type."','".$designation."');";
      $res=mysqli_query($con,$sql);
      if($res){
          echo"<script > alert('Created Succesfully'); window.location.href='cuser.php';</script>";
      }else{
          echo"<script > alert('Created Failed'); window.location.href='cuser.php';</script>";
      }
    }
  }

?>
