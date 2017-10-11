<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!-- Hotjar Tracking Code for www.metechgeek.ezyro.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:446112,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

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
   <h1 style="font-family:'Raleway',sans-serif;">ORGANIZATION REGISTRATION</h1>
    <h2>Create a New Account</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
        <form action="organization-account.php" method="post">
            <input type="text" name="first_name" placeholder="FIRST NAME&nbsp;&ast;" required="">
            <input type="text" name="last_name" placeholder="LAST NAME&nbsp;&ast;" required="">
            <input type="email" name="email" placeholder="EMAIL&nbsp;&ast;" required="">
            <input type="text" name="phone" placeholder="PHONE NUMBER WITH COUNTRY CODE&nbsp;&ast;" required="">
            <input type="password" name="password" placeholder="PASSWORD&nbsp;&ast;" required="">
            <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD&nbsp;&ast;" required="">
            <div class="send-button">
                <input type="submit" name="signupSubmit" value="CREATE ACCOUNT">
            </div>
        </form>
<p>Already have an Account?&nbsp;<a href="organization-index.php">Login</a></p>
    </div>
</div>