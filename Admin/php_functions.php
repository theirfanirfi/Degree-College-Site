<?php

function fileIcons($image_extension) {
if($image_extension == 'doc' || $image_extension == 'dot' || $image_extension == 'docx'|| $image_extension == 'docm'|| $image_extension == 'dotx'|| $image_extension == 'dotm'|| $image_extension == 'docb') {
        return '<img src="img/Word.png" width="50" height="50" border="0" alt="Document"/>' ;
       
    }else if($image_extension == 'pdf'){
        return '<img src="img/pdf_logo.png" width="50" height="50" border="0" alt="Document"/> ';  
    }else if ($image_extension == 'xls' || $image_extension == 'xlt' || $image_extension == 'xlm' || $image_extension == 'xlsx' || $image_extension == 'xlsm' || $image_extension == 'xltx' || $image_extension == 'xltm' || $image_extension == 'xlsb' || $image_extension == 'xla' || $image_extension == 'xlam' || $image_extension == 'xll' || $image_extension == 'xlw'){
        return ' <img src="img/Excel-icon.png" width="50" height="50" border="0" alt="Document"/>';
    }
}
function fileExtension($file_extension){
    if($file_extension != "pdf" && $file_extension != "doc" && $file_extension != "dot" && $file_extension != "docx" && $file_extension != "docm" && $file_extension != "dotx" && $file_extension != "dotm" && $file_extension != "docb"
            && $file_extension != "xls" && $file_extension != "xlt" && $file_extension != "xlm" && $file_extension != "xlsx" && $file_extension != "xlsm" && $file_extension != "xltx" && $file_extension != "xltm" && $file_extension != "xlsb"
            && $file_extension != "xla" && $file_extension != "xlam" && $file_extension != "xll" && $file_extension != "xlw"){
        return true;
    }else{
        return false;
    }
}

function cleanInput($input) {
    $a = trim($input);
    $a = strip_tags($a);
    $a = implode("", explode("/", $a));
    $a = implode("", explode("\\", $a));
    $a = implode("", explode("?", $a));
    $a = implode("", explode('"', $a));
    $a = implode("", explode("'", $a));
    $a = stripslashes($a);
    $a = htmlspecialchars($a);
    return $a;
}

function cleanTextDetails($input) {
    $a = trim($input);
    $a = strip_tags($a);
    return $a;
}

function url($input) {
    $a = trim($input);
    $a = strip_tags($input);
    $a = implode("", explode("/", $a));
    $a = implode("", explode("\\", $a));
    $a = implode("", explode("?", $a));
    $a = implode("", explode('"', $a));
    $a = implode("", explode("'", $a));
    $a = implode("", explode("(", $a));
    $a = implode("", explode(")", $a));
    $a = implode("", explode("=", $a));
    $a = stripcslashes($a);
    $a = htmlspecialchars($a);
    return $a;
}

function message($alert_type, $alert_msg) {
    $type = $alert_type;
    $msg = $alert_msg;
    switch ($type) {
        case 'danger':
            ?>
            <div class='alert alert-danger alert-dismissibl' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Alert!</strong> <?php echo $msg ?>
            </div>
            <?php
            break;
        case 'success':
            ?>
            <div class='alert alert-success alert-dismissibl' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Alert!</strong> <?php echo $msg ?>
            </div>
            <?php
            break;
        case 'info':
            ?>
            <div class='alert alert-info alert-dismissibl' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Alert!</strong> <?php echo $msg ?>
            </div>
            <?php
            break;
        case 'warning':
            ?>
            <div class='alert alert-warning alert-dismissibl' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Alert!</strong> <?php echo $msg ?>
            </div>
            <?php
            break;
        default:
            echo "<div class='alert alert-danger'><strong>Alert!</strong> Invalid Alert Class Name</div>";
            break;
    }
}
