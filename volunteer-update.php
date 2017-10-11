<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'volunteer-class.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);

$con=mysqli_connect("dbhost","username","dbpassword","dbname");
}
if(isset($_POST['edit'])){
$first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $email= $_POST['email'];
 $phone = $_POST['phone'];
 $password = md5($_POST['password']);
$id = $userData['id'];
 
  $sql = "UPDATE volunteer SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', password = '$password' WHERE id = '$id' ";
  $result= mysqli_query($con, $sql);
if($result){
header("Location:volunteer-index.php");
echo "<h1>Profile Update Successful!</h1>";
  }

  else {
  echo error;
  } 
  mysqli_close($con);
}
?>
<style>
.container {
    width: 40%;
    margin: 0 auto;
    background-color: #f7f7f7;
    color: #757575;
    font-family: 'Raleway', sans-serif;
    text-align: left;
    padding: 30px;
}
h2 {
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 10px;
}
.container p {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 20px;
}
.regisFrm input[type="text"], .regisFrm input[type="email"], .regisFrm input[type="password"] {
    width: 94.5%;
    padding: 10px;
    margin: 10px 0;
    outline: none;
    color: #000;
    font-weight: 500;
    font-family: 'Roboto', sans-serif;
}
.send-button {
    text-align: center;
    margin-top: 20px;
}
.send-button input[type="submit"] {
    padding: 10px 0;
    width: 60%;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 500;
    border: none;
    outline: none;
    color: #FFF;
    background-color: #2196F3;
    cursor: pointer;
}
.send-button input[type="submit"]:hover {
    background-color: #055d54;
}
a.logout{float: right;}
p.success{color:#34A853;}
p.error{color:#EA4335;}
</style>
<div class="container" style="text-align:center;">
<a href="index.html"><img src="assets/images/site-logo.png"  style="width:200px;height:200px;"/></a>
</div>
<div class="container">
    <div class="regisFrm">
<form action="volunteer-update.php" method="post">
			<input type="text" name="first_name" placeholder="present first_name is &nbsp;<?php echo $userData['first_name']?>&nbsp;&ast;">
            <input type="text" name="last_name" placeholder="present lasst_name is &nbsp;<?php echo $userData['last_name']?>&nbsp;&ast;">
            <input type="email" name="email" placeholder="present email is &nbsp;<?php echo $userData['email']?>&nbsp;&ast;">
            <input type="text" name="phone" placeholder="present phone number is &nbsp;<?php echo $userData['phone']?>&nbsp;&ast;">
            <input type="password" name="password" placeholder="PASSWORD"&nbsp;&ast;>
<p><strong>NOTE:</strong>&nbsp;&ast;&nbsp;denotes REQUIRED fields.</p>
			<input type="submit" name="edit" value="Edit Profile">
</form>
</div>
<p>Click &nbsp;<a href="volunteer-index.php">here&nbsp;</a> to go back to your Profile page</p>
</div>