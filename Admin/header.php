<?php
ob_start();
session_start();
require_once './connection.php';
require_once './php_functions.php';
if ((!isset($_SESSION['user_name'])) || (!isset($_SESSION['user_pass']))) {
    header("location:login.php");
    exit();
} else if (isset($_SESSION['user_name']) || isset($_SESSION['user_pass'])) {
    $username = $_SESSION['user_name'];
    $userpass = $_SESSION['user_pass'];
    $q = mysqli_query($link, "select * from degree_admin where admin_name = '$username' and admin_pass = '$userpass' ");
    if (mysqli_num_rows($q) <= 0) {
        header("location:login.php");
        exit();
    }
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
        <title>Nursing College  </title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/floatexamples.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/myStyle.css">
        <link rel="stylesheet" type="text/css" href="assets/alertify-js/alertify.core.css">
        <link rel="stylesheet" type="text/css" href="assets/alertify-js/alertify.default.css">
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({//tinymce are used for editor in text area.
                selector: ".editor",
                theme: "modern",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ]
            });
        </script>

        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title"><i class="fa fa-dashboard"></i> <span>NC DashBoard</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_home.php">Add Home Details</a>
                                            </li>
                                            <li><a href="all_home.php">All Home Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-user-plus"></i> Staff <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_staff.php">Add Staff</a>
                                            </li>
                                            <li><a href="all_staffs.php">All Staff</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-university"></i> Academics <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_academic.php">Add Academic</a>
                                            </li>
                                            <li><a href="all_academics.php">All Academics</a>
                                            </li>
                                            <li><a href="add_program.php">Add Program</a>
                                            </li>
                                            <li><a href="all_programs.php">All Programs</a>
                                            </li>
                                        </ul>
                                    </li>


                                     <li><a><i class="fa fa-university"></i> Experience & Affiliations <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_experience.php">Add Experience/Affiliation </a>
                                            </li>
                                            <li><a href="all_exp.php">All Experience Center</a>
                                            </li>
                                            <li><a href="add_expcenter.php">Add Experience/Affiliation Centers</a>
                                            </li>
                                            <li><a href="all_exp_aff.php">All Experience Centers</a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li><a><i class="fa fa-photo"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_picture.php">Add Picture </a>
                                            </li>
                                            <li><a href="all_pictures.php">All Pictures </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li><a><i class="fa fa-photo"></i> Programs' Pictures <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_program_picture.php">Add Picture </a>
                                            </li>
                                            <li><a href="all_program_pictures.php">All Pictures </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li><a><i class="fa fa-newspaper-o"></i> News <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_news.php">Add News </a>
                                            </li>
                                            <li><a href="all_news.php">All News </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-list-alt"></i> Merit List <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_merit_list.php">Add Merit List </a>
                                            </li>
                                            <li><a href="all_merit_list.php">All Merit List </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-image"></i> Slider Images <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_slider_img.php">Add Slider </a>
                                            </li>
                                            <li><a href="all_slider_img.php">All Slider </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-image"></i> Our Activities <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_activities.php">Add Activities </a>
                                            </li>
                                            <li><a href="all_activities.php">All Activities </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-phone-square"></i> Contact <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_contact.php">Add Contact </a>
                                            </li>
                                            <li><a href="all_contacts.php">All Contacts </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-table"></i> About Us <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="add_about.php">Add About Us </a>
                                            </li>
                                            <li><a href="all_abouts.php">All About Us </a>
                                            </li>
                                        </ul>
                                    </li>

                                     <li><a><i class="fa fa-table"></i> Footer <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="footer_details.php">Add Footer Details </a>
                                            </li>
                                            <li><a href="all_footer_details.php">Footer Details</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span style="color: #FFF;" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Dash Board" href="index.php">
                                <span style="color: #FFF;" class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="log_out.php">
                                <span style="color: #FFF;" class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear fa-2x"></i> Settings
                                        <i class=" fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="change_user_name.php"> Change User Name</a>
                                        </li>
                                        <li><a href="change_password.php"> Change Password</a>
                                        </li>
                                        <li><a href="log_out.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

