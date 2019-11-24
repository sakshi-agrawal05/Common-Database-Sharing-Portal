<?php
  session_start();
  $_SESSION['username']="";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Database</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
      <header>
        <h1>Common Database Sharing Portal</h1>
        <nav>
            <ul>
              <li><a>signup</a></li>

            </ul>
        </nav>
      </header>
      <section>
          <table>
                <form action="index.php" method="POST">
                    <tr>
                      <th><center>LOGIN</center></th>
                    </tr>
                    <tr>
                      <td>
                        <center>
                      <label for="">Username:</label><br><br>
                      <input type="text" name="username" value="" placeholder="Username">
                      </center>
                    </td>

                    </tr>
                    <tr>
                      <td>
                        <center>
                      <label for="">Password:</label><br><br>
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

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  if($username=="" || $password==""){
    echo"<script > alert('Please enter username or password'); </script>";
  }else{
    include('dbconnect.php');
    $sql="select * from userdata where username='".$username."' and password='".$password."'";

    $res=mysqli_query($con,$sql);
    if($res){
        echo"<script > alert('login Succesfull'); window.location.href='home.php';</script>";

        $_SESSION['username']=$username;
    }else{
      echo"<script > alert('Login failed'); </script>";
    }

      }

}

?>
