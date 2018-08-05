<?php
session_start();
require_once './connection.php';
require_once './php_functions.php';
if(isset($_SESSION['user_name']) || isset($_SESSION['user_pass'])){
    //session_destroy();
    //session_unset();
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nursing College</title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">

    </head>

    <body style="background:#F7F7F7;">

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper">
                
                <div id="login" class="animate form">
                    <section class="login_content">
                        <form method="post" action="login.php">
                            <h1>Login Here</h1>
                             <?php
                            if(isset($_POST['log_in'])){
                                $user_name = $_POST['username'];
                                $user_pass = $_POST['pass'];
                                $user_name = cleanInput($user_name);
                                $user_pass = cleanInput($user_pass);
                                $q = "select * from degree_admin";
                                $data = mysqli_query($link, $q);
                                $rs = mysqli_fetch_array($data);
                                if(empty($user_name)){
                                    message("info", "Please Enter User Name ");
                                }
                                else if(empty ($user_pass)){
                                    message("info", "Please Enter Password ");
                                }
                                else if($rs['admin_name'] == md5($user_name) && $rs['admin_pass'] == md5($user_pass)){
                                   $_SESSION['user_name'] = $rs['admin_name'];
                                   $_SESSION['user_pass'] = $rs['admin_pass'];
                                   header('location:index.php');
                                }
                                else{
                                    message("info", "Invalid User Name Or Password");
                                }
                            }
                            ?>
                             <div>
                                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" name="pass" required="" />
                            </div>
                            <div>
                                <input type="submit" class="btn btn-info pull-right" name="log_in" value="Log-In"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">

                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-university" style="font-size: 26px;"></i> Nursing College </h1>

                                    <p>All &copy; Rights Reserved <?php echo date('Y'); ?>.</p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>

            </div>
        </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </body>

</html>
