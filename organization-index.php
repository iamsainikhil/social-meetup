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
.container-large {
    width: auto;
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
.container-large p {
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

iframe {
 margin-top:20px;
padding-bottom:30px;

  -moz-border-radius: 12px;
  -webkit-border-radius: 12px;
  border-radius: 12px;

  -moz-box-shadow: 4px 4px 14px #000;
  -webkit-box-shadow: 4px 4px 14px #000;
  box-shadow: 4px 4px 14px #000;
}
</style>
    <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'organization-class.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>
<div class="container-large" style="text-align:center;">
<a href="index.html"><img src="assets/images/site-logo.png"  style="width:200px;height:200px;"/></a>
</div>
<div class="container-large">
    <h1 style="text-align:center;color:black;">Welcome <?php echo $userData['first_name']; ?>!</h1>
</div>
<div class="container-large">
<h2 style="color:black;">My Profile</h2>
   <div class="regisFrm">
        <p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
        <p><b>Email: </b><?php echo $userData['email']; ?></p>
        <p><b>Phone: </b><?php echo $userData['phone']; ?></p>
        <a href="organization-update.php">Edit Profile</a>&nbsp;<span><a href="organization-account.php?logoutSubmit=1" class="logout">Logout</a></span>
    </div><br/>
</div>
<div class="container-large">
<h2 style="color:black;">Events</h2>
<p><iframe src="https://www.jotform.com/table/71162518106045" frameborder="0" style="width: 97%; height:auto; border:none;" scrolling="no"></iframe></p><br/>
<p><a href="javascript:void( window.open( 'https://form.jotform.us/71161677706157', 'blank', 'scrollbars=yes, toolbar=no, width=700, height=500' ) ) ">Create an  Event </a></p><br/>
<h2 style="color:black;">Give Feedback</h2>
 <iframe id="JotFormIFrame-71164496506157" onload="window.parent.scrollTo(0,0)" allowtransparency="true" src="https://form.jotform.us/71164496506157" frameborder="0" style="width:100%; height:0px; border:none;" scrolling="no"> </iframe> <script type="text/javascript"> var ifr = document.getElementById("JotFormIFrame-71164496506157"); if(window.location.href && window.location.href.indexOf("?") > -1) { var get = window.location.href.substr(window.location.href.indexOf("?") + 1); if(ifr && get.length > 0) { var src = ifr.src; src = src.indexOf("?") > -1 ? src + "&" + get : src + "?" + get; ifr.src = src; } } window.handleIFrameMessage = function(e) { var args = e.data.split(":"); if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[2]); } else { iframe = document.getElementById("JotFormIFrame"); } if (!iframe) return; switch (args[0]) { case "scrollIntoView": iframe.scrollIntoView(); break; case "setHeight": iframe.style.height = args[1] + "px"; break; case "collapseErrorPage": if (iframe.clientHeight > window.innerHeight) { iframe.style.height = window.innerHeight + "px"; } break; case "reloadPage": window.location.reload(); break; } var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false; if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) { var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)}; iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*"); } }; if (window.addEventListener) { window.addEventListener("message", handleIFrameMessage, false); } else if (window.attachEvent) { window.attachEvent("onmessage", handleIFrameMessage); } </script>
</div>    
<?php }else{ ?>
<div class="container" style="text-align:center;">
<a href="index.html"><img src="assets/images/site-logo.png"  style="width:200px;height:200px;"/></a>
</div>
<div class="container">
    <h2 style="text-align:center;color:black;">Login to Your Organization Account</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
        <form action="organization-account.php" method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <div class="send-button">
                <input type="submit" name="loginSubmit" value="LOGIN">
            </div>
        </form>
        <p>Don't have an account? <a href="organization-register.php">Register</a></p>
    </div>
</div>
    <?php } ?>