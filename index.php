<?php
session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") {

header('Location: dashbord.php');

}

elseif (isset($_POST['username'] ) && isset($_POST['password']) && isset($_POST['ipaddress']) && isset($_POST['port']) && isset($_POST['security_number'])) {
    $security_number=$_POST['security_number'];
    $ipaddress=$_POST['ipaddress'];
    $port=$_POST['port'];
    $username=$_POST['username'];
    $password=$_POST['password'];

if ($con = ssh2_connect($ipaddress, $port)) {

if (function_exists("ssh2_connect")  && ssh2_auth_password($con, $username, $password) &&($security_number==$_SESSION['security_number'])) {

                // allright, we're in!
        $_SESSION['login_status']="logined";
        
        
    }

}}

if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") {

header('Location: dashbord.php');

}
  else{ 
    require_once('_include/config.php');
 
?>
           <!DOCTYPE html>
            <html xmlns="http://www.w3.org/1999/xhtml">

            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title>GP I/O</title>
                <link rel="stylesheet" href="_css/login.css">
                <!-- LIVICON -->
                <script src="_js/jquery-1.9.1.min.js"></script>
				<script src="_js/raphael-min.js"></script>
				<script src="_js/livicons-1.3.min.js"></script>
            </head>

            <body>
                <!-- content -->
                <div class="Content">
                    <!-- title -->
                    <div class="title">
                        <div class="product"><span id="lang_product_main"><?php echo version;?></span></div>
                        <div class="firmware"><span id="lang_firmware_main"></span></div>
                    </div>
                    <!-- logo -->
                    <div class="logo"><img src="_image/logo.jpg" alt="logo" /></div>
                    <!-- login background -->
                    <div class="login_bk">
                        <!-- login -->
                        <div class="login" style="height: 220px;">
                            <!-- login title -->
                            <div class="login_title" id="lang_title">LOGIN </div>
                            <!-- tips-->
                            <p id="lang_tips"><!--Input username and password--></p>
                            <!-- fom -->
                            <form id="uiPostForm" method="post" action="<?php $_PHP_SELF; ?>">
                                <!--server ip-->
                                <p>
                                    <p>
                                        <div class="div_left" id="lang_password"><span><i class="livicon" data-name="servers" data-size="24"
                                        ></i></span></div>
                                        <div class="div_right">
                                            <input name="ipaddress" type="text" style="width: 110px;" value="localhost" />
                                            <input name="port" type="text" style="width: 50px;" value="22" />
                                        </div>
                                        <!-- username/password -->
                                        <div class="div_left" id="lang_username"><span><i class="livicon" data-name="user" data-size="24"></i> </span></div>
                                        <div class="div_right">

                                            <input class="form-control" name="username" type="text" id="INPUT_Psd" />
                                        </div>
                                        
                                                <div class="div_left" id="lang_password"><span><i class="livicon" data-name="key" data-size="24" ></i></span></div>

                                                <div class="div_right">
                                                    <input name="password" type="password" placeholder="Password" />
                                                </div>


 <div class="div_left" id="lang_password"><span><i class="livicon" data-name="shield" data-size="24" ></i></span></div>

                                                <div class="div_right">
                                                    <input name="security_number" type="text" placeholder="Security Code" />
                                                </div>
                                                <!-- remember me -->
                                                
                                                        <div>
                                                           <img src="_include/image.php">
                                                        </div>
                                                        <!-- submit -->
                                                        <div class="div_button">
                                                            <input type="submit" name="uipostSubmit" id="uipostSubmit" value="Login" />
                                                        </div>
                        </div>
                        <!-- form -->
                        </form>
                        <!-- login failed -->
                    </div>
                    <!-- footer -->
                    <div class="footer footer_logo"><img style="display: block;margin-left: auto;margin-right: auto;" src="_image/RaspberryPi_Logo.png" /></div>
                </div>
                <!-- copyright -->

<?php require_once('_include/config.php'); ?>
<p id="copyright"><a href="http://ghahremany.ir/" target="_blank"><span class="livicon" data-c="#fffaf0" data-n="concrete5" data-s="20" data-hovercolor="false" ></span></a> <a href="https://github.com/ghahremany" target="_blank"><span class="livicon" data-c="#fffaf0" data-n="github" data-s="20" data-hovercolor="false" ></span></a> </p>
<p id="copyright"><?php echo version;?></p>
<p id="copyright"><?php echo date('Y');?></p>

            </body>

            </html>
            <?php } ?>
