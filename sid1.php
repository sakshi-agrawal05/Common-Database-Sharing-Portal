<?php
include('dbconnect.php');
$se="select * from sheet where sid='sid1'";
$rse=mysqli_query($con,$se);
$re=array();
while($re=mysqli_fetch_assoc($rse)){

if($re['edit']==1){
 echo"<script > alert('Its Being Edited'); window.location.href='home.php';</script>";

}
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}

form input[type='text']{
  width: 100%;
  height: 100%;

}
input[type='submit']{
  padding: 10px 80px;
  background: #ccc;
  border: none;

  border-radius: 3px;
}


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
<link rel="stylesheet" href="main.css">
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
$_SESSION['edit']=0;
if($_SESSION['username']=="admin"){
echo   "<a href='cuser.php'>Create Users</a>";
}
?>


<a href="index.php">Logout</a>
</div>
</div>


</div>
  </ul>














<form action="sid1.php" method="POST">
  <?php

 $_SESSION['username'];
include('dbconnect.php');
$s="select * from userdata where username='".$_SESSION['username']."'";
$rs=mysqli_query($con,$s);
$r=array();
while($r=mysqli_fetch_assoc($rs)){
  if($r['w']==1){
    echo"<input type='submit' name='edit' value='Edit'>";
  }
}

  ?>



<table>
  <tr>
    <th>Sr No</th>
    <th>Name of the author</th>
    <th>Name(s) of the Author</th>
    <th>Title of the paper</th>
    <th>Name of the Journal</th>
    <th>ISSN No</th>
    <th>Month and Year of publication</th>
    <th>Impact Factor</th>

    <th>SCI /Scopus/ICI</th>
    <th>Unpaid/Paid</th>

  </tr>
  <?php
  include('dbconnect.php');
if(isset($_POST['edit'])){
  $sql="update sheet set edit=1  where sid='sid1'";
  $_SESSION['edit']=1;
  mysqli_query($con,$sql);

    $sql="select * from sid1";
    $res=mysqli_query($con,$sql);
    if($res){
      $row=array();
      while($row=mysqli_fetch_array($res,MYSQLI_NUM)){
        echo "<tr>
          <td><input type='text' value='".$row[1]."' name='c1_".$row[0]."' ></td>
          <td><input type='text' value='".$row[2]."' name='c2_".$row[0]."' ></td>
          <td><input type='text' value='".$row[3]."' name='c3_".$row[0]."'></td>
          <td><input type='text' value='".$row[4]."' name='c4_".$row[0]."'></td>
          <td><input type='text' value='".$row[5]."' name='c5_".$row[0]."'></td>
          <td><input type='text' value='".$row[6]."' name='c6_".$row[0]."'></td>
          <td><input type='text' value='".$row[7]."' name='c7_".$row[0]."'></td>
          <td><input type='text' value='".$row[8]."' name='c8_".$row[0]."'></td>
          <td><input type='text' value='".$row[9]."' name='c9_".$row[0]."'></td>
          <td><input type='text' value='".$row[10]."' name='c10_".$row[0]."'></td>



        </tr>";
      }
    }

}else{
  //$sql="update sheet set edit=0 where sid='sid1';";
  //$res=mysqli_query($con,$sql);

    $sql="select * from sid1";
    $res=mysqli_query($con,$sql);
    if($res){
      $row=array();
      while($row=mysqli_fetch_array($res,MYSQLI_NUM)){
        echo "<tr>
          <td>".$row[1]."</td>
          <td>".$row[2]."</td>
          <td>".$row[3]."</td>
          <td>".$row[4]."</td>
          <td>".$row[5]."</td>
          <td>".$row[6]."</td>
          <td>".$row[7]."</td>
          <td>".$row[8]."</td>
          <td>".$row[9]."</td>
          <td>".$row[10]."</td>


        </tr>";
      }
    }

}?>
<?php
if(isset($_POST['edit']))
echo "<input type='submit' name='save' value='Save'>";





include('dbconnect.php');
$se="select * from sheet where sid='sid1'";
$rse=mysqli_query($con,$se);
$re=array();
while($re=mysqli_fetch_assoc($rse)){

if($re['edit']==1){
if( $_SESSION['edit']==0)
{  echo"<script > alert('Its Updating'); window.location.href='home.php';</script>";}
else{

}

}
}


$s="select * from userdata where username='".$_SESSION['username']."'";
$rs=mysqli_query($con,$s);
$r=array();
while($r=mysqli_fetch_assoc($rs)){

if($r['w']==1){

  echo "<input type='submit' name='add' value='Add'>";
}
}


if(isset($_POST['add']))
{
  $c1=$_POST['c1'];
  $c2=$_POST['c2'];
  $c3=$_POST['c3'];
  $c4=$_POST['c4'];
  $c5=$_POST['c5'];
  $c6=$_POST['c6'];
  $c7=$_POST['c7'];
  $c8=$_POST['c8'];
  $c9=$_POST['c9'];
  $c10=$_POST['c10'];

if( $c1=="" || $c2=="" || $c3=="" || $c4=="" || $c5=="" || $c5=="" || $c6=="" || $c7=="" || $c8 =="" || $c9=="" || $c10=="")
{
  echo"<script > alert('Enter All fields'); window.location.href='sid1.php';</script>";

}else{
  $sql="INSERT INTO `sid1`( `sr_no`, `name_of_the_author`, `name_of_the_co_author`, `title_of_the_paper`, `name_of_the_journal`, `issn_no`, `month_and_year`, `impact_factor`, `sci_scopus_ici`, `unpaid_paid`) VALUES (".$c1.",'".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."')";
  $res=mysqli_query($con,$sql);
  if($res){
      echo"<script >  window.location.href='sid1.php';</script>";
  }else{
      echo"<script > alert('Error'); window.location.href='sid1.php';</script>";
  }
}
}





if(isset($_POST['save'])){
  $sql3="update sheet set edit=0 where sid='sid1';";
  $res2=mysqli_query($con,$sql3);
  $_SESSION['edit']=0;
  $sql3="select * from sid1";
  $res2=mysqli_query($con,$sql3);

  $row2=array();
  while($row2=mysqli_fetch_array($res2,MYSQLI_NUM)){
      $sql2="UPDATE `sid1` SET
      `sr_no`=".$_POST['c1_'.$row2[0]].",
      `name_of_the_author`='".$_POST['c2_'.$row2[0]]."',
      `name_of_the_co_author`='".$_POST['c3_'.$row2[0]]."',
      `title_of_the_paper`='".$_POST['c4_'.$row2[0]]."',
      `name_of_the_journal`='".$_POST['c5_'.$row2[0]]."',
      `issn_no`='".$_POST['c6_'.$row2[0]]."',
      `month_and_year`='".$_POST['c7_'.$row2[0]]."',
      `impact_factor`='".$_POST['c8_'.$row2[0]]."',
      `sci_scopus_ici`='".$_POST['c9_'.$row2[0]]."',
      `unpaid_paid`='".$_POST['c10_'.$row2[0]]."'

      WHERE id=".$row2[0];

      $res3=mysqli_query($con,$sql2);
      if($res3){

      }

  }
  echo"<script >  window.location.href='sid1.php';</script>";



}

?>

<tr>
  <td><input type='text' value='' name='c1' ></td>
  <td><input type='text' value='' name='c2' ></td>
  <td><input type='text' value='' name='c3'></td>
  <td><input type='text' value='' name='c4'></td>
  <td><input type='text' value='' name='c5'></td>
  <td><input type='text' value='' name='c6'></td>
  <td><input type='text' value='' name='c7'></td>
  <td><input type='text' value='' name='c8'></td>
  <td><input type='text' value='' name='c9'></td>
  <td><input type='text' value='' name='c10'></td>



</tr>

  <?php
    for($i=0;$i<10;$i++){
      echo"<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>";
    }  ?>

</table>
</form>
</section>
</body>
</html>
