function add_home_details() {
    var form = document.home_form;
    var home_title = form.home_title.value;
    if (home_title.length == "") {
        document.getElementById('home_title_error').innerHTML = "Please Enter Message Title.";
        form.home_title.focus();
        return false;
    } else {
        document.getElementById('home_title_error').innerHTML = "";
    }
    var home_description = tinyMCE.get('textarea1').getContent();
    if (home_description == "") {
        document.getElementById('home_description_error').innerHTML = "Please Enter Message Description.";
        return false;


    } else {
        document.getElementById('home_description_error').innerHTML = "";
    }

    var home_image_name = form.home_image_name.value;
    if (home_image_name.length == "") {
        document.getElementById('home_image_error').innerHTML = "Please Choose Image File.";
        form.home_image_name.focus();
        return false;
    } else {
        document.getElementById('home_image_error').innerHTML = "";
    }
}
function edit_home_details() {
    var form = document.home_form;
    var home_title = form.home_title.value;
    if (home_title.length == "") {
        document.getElementById('home_title_error').innerHTML = "Please Enter Message Title.";
        form.home_title.focus();
        return false;
    } else {
        document.getElementById('home_title_error').innerHTML = "";
    }
    var home_description = tinyMCE.get('textarea1').getContent();
    if (home_description == "") {
        document.getElementById('home_description_error').innerHTML = "Please Enter Message Description.";
        return false;
        form.tinyMCE.get('textarea1').focus();

    } else {
        document.getElementById('home_description_error').innerHTML = "";
    }
}
function add_staff() {
    var form = document.staff_form;
    var te_name = form.te_name.value;
    if (te_name.length == "") {
        document.getElementById('teacher_name').innerHTML = "Please Enter Teacher Name.";
        form.te_name.focus();
        return false;
    } else {
        document.getElementById('teacher_name').innerHTML = "";
    }
    var te_designation = form.te_designation.value;
    if (te_designation.length == "") {
        document.getElementById('teacher_designation').innerHTML = "Please Enter Teacher Designation.";
        form.te_designation.focus();
        return false;
    } else {
        document.getElementById('teacher_designation').innerHTML = "";
    }
    var te_qualification = form.te_qualification.value;
    if (te_qualification.length == "") {
        document.getElementById('teacher_qualification').innerHTML = "Please Enter Qualification.";
        form.te_qualification.focus();
        return false;
    } else {
        document.getElementById('teacher_qualification').innerHTML = "";
    }
    var te_email = form.te_email.value;
    if (te_email.length == "") {
        document.getElementById('teacher_email').innerHTML = "Please Enter Email.";
        form.te_email.focus();
        return false;
    } else {
        document.getElementById('teacher_email').innerHTML = "";
    }
    var te_picture = form.te_picture.value;
    if (te_picture.length == "") {
        document.getElementById('teacher_picture').innerHTML = "Please Choose Image.";
        form.te_picture.focus();
        return false;
    } else {
        document.getElementById('teacher_picture').innerHTML = "";
    }
}
function edit_staff() {
    var form = document.staff_form;
    var te_name = form.te_name.value;
    if (te_name.length == "") {
        document.getElementById('teacher_name').innerHTML = "Please Enter Teacher Name.";
        form.te_name.focus();
        return false;
    } else {
        document.getElementById('teacher_name').innerHTML = "";
    }
    var te_designation = form.te_designation.value;
    if (te_designation.length == "") {
        document.getElementById('teacher_designation').innerHTML = "Please Enter Teacher Designation.";
        form.te_designation.focus();
        return false;
    } else {
        document.getElementById('teacher_designation').innerHTML = "";
    }
    var te_qualification = form.te_qualification.value;
    if (te_qualification.length == "") {
        document.getElementById('teacher_qualification').innerHTML = "Please Enter Qualification.";
        form.te_qualification.focus();
        return false;
    } else {
        document.getElementById('teacher_qualification').innerHTML = "";
    }
    var te_email = form.te_email.value;
    if (te_email.length == "") {
        document.getElementById('teacher_email').innerHTML = "Please Enter Email.";
        form.te_email.focus();
        return false;
    } else {
        document.getElementById('teacher_email').innerHTML = "";
    }
    /*var te_picture = form.te_picture.value;
     if (te_picture.length == "") {
     document.getElementById('teacher_picture').innerHTML = "Please Choose Image.";
     form.te_picture.focus();
     return false;
     } else {
     document.getElementById('teacher_picture').innerHTML = "";
     }*/
}
function add_academic() {
    var form = document.academic_form;
    var academic_level = form.academic_level.value;
    if (academic_level.length == "") {
        document.getElementById('academic_level_error').innerHTML = "Please Enter Academic Level.";
        form.academic_level.focus();
        return false;
    } else {
        document.getElementById('academic_level_error').innerHTML = "";
    }
}
function add_department() {
    var form = document.department_form;
    var dep_name = form.dep_name.value;
    if (dep_name.length == "") {
        document.getElementById('dep_name_error').innerHTML = "Please Enter Department Name.";
        form.dep_name.focus();
        return false;
    } else {
        document.getElementById('dep_name_error').innerHTML = "";
    }

    var academic_level = form.academic_level.value;
    if (academic_level == "0") {
        document.getElementById('academic_level_error').innerHTML = "Please Select Academic Level.";
        form.dep_name.focus();
        return false;
    } else {
        document.getElementById('academic_level_error').innerHTML = "";
    }
}
function add_program() {
    var form = document.program_form;
    var pro_name = form.pro_name.value;
    if (pro_name.length == "") {
        document.getElementById('pro_name_error').innerHTML = "Please Enter Program Name.";
        form.pro_name.focus();
        return false;
    } else {
        document.getElementById('pro_name_error').innerHTML = "";
    }
    var program_description = tinyMCE.get('programtext').getContent();
    if (program_description == "") {
        document.getElementById('program_description_error').innerHTML = "Please Enter Program Description.";
        return false;


    } else {
        document.getElementById('program_description_error').innerHTML = "";
    }
    var dep_id = form.dep_name.value;
    if (dep_id == "0") {
        document.getElementById('dep_id_error').innerHTML = "Please Select Department Name.";
        form.pro_name.focus();
        return false;
    } else {
        document.getElementById('pro_name_error').innerHTML = "";
    }
}
function add_picture() {
    var form = document.picture_form;
    var picture_name = form.picture_name.value;
    if (picture_name.length == "") {
        document.getElementById('picture_name_error').innerHTML = "Please Chose Picture.";
        form.picture_name.focus();
        return false;
    } else {
        document.getElementById('picture_name_error').innerHTML = "";
    }
    var picture_date = form.picture_date.value;
    if (picture_date.length == "") {
        document.getElementById('picture_date_error').innerHTML = "Please Enter Picture Date.";
        form.picture_date.focus();
        return false;
    } else {
        document.getElementById('picture_date_error').innerHTML = "";
    }

}
function edit_picture() {
    var form = document.picture_form;
    var picture_date = form.picture_date.value;
    if (picture_date.length == "") {
        document.getElementById('picture_date_error').innerHTML = "Please Enter Picture Date.";
        form.picture_date.focus();
        return false;
    } else {
        document.getElementById('picture_date_error').innerHTML = "";
    }

}
function add_news() {
    var form = document.news_form;
    var news_title = form.news_title.value;
    if (news_title.length == "") {
        document.getElementById('news_title_error').innerHTML = "Please Enter News Title.";
        form.news_title.focus();
        return false;
    } else {
        document.getElementById('news_title_error').innerHTML = "";
    }
    var news_details = tinyMCE.get('textarea').getContent();
    if (news_details.length == "") {
        document.getElementById('news_details_error').innerHTML = "Please Enter News Details.";
        return false;
    } else {
        document.getElementById('news_details_error').innerHTML = "";
    }
    var news_date = form.news_date.value;
    if (news_date.length == "") {
        document.getElementById('news_date_error').innerHTML = "Please Enter News Date.";
        form.news_date.focus();
        return false;
    } else {
        document.getElementById('news_date_error').innerHTML = "";
    }
}
function add_contact() {
    var form = document.contact_form;
    var job_title = form.job_title.value;
    if (job_title.length == "") {
        document.getElementById('job_title_error').innerHTML = "Please Enter Job Title";
        form.job_title.focus();
        return false;
    } else {
        document.getElementById('job_title_error').innerHTML = "";
    }
    var phone_no = form.phone_no.value;
    if (phone_no.length == "") {
        document.getElementById('phone_no_error').innerHTML = "Please Enter Phone Number.";
        form.phone_no.focus();
        return false;
    } else {
        document.getElementById('phone_no_error').innerHTML = "";
    }
    var mobile_no = form.mobile_no.value;
    if (mobile_no.length == "") {
        document.getElementById('mobile_no_error').innerHTML = "Please Enter Mobile Number.";
        form.mobile_no.focus();
        return false;
    } else {
        document.getElementById('mobile_no_error').innerHTML = "";
    }
    var email = form.email.value;
    if (email.length == "") {
        document.getElementById('email_error').innerHTML = "Please Enter Email.";
        form.email.focus();
        return false;
    } else {
        document.getElementById('email_error').innerHTML = "";
    }
}
function add_about(){
  var  form = document.about_form;
  var about_title = form.about_title.value;
  if(about_title.length == ""){
      document.getElementById('about_title_error').innerHTML = "Please Enter About Us Title";
      form.about_title.focus();
        return  false;
  }
  else{
      document.getElementById('about_title_error').innerHTML = "";
  }
   var about_description = tinyMCE.get('area').getContent();
    if (about_description == "") {
        document.getElementById('about_description_error').innerHTML = "Please Enter About Description.";
        return false;
} else {
        document.getElementById('about_description_error').innerHTML = "";
    }
 
}
function add_merit_list1() {
    var form = document.merit_list_form;
    var std_name = form.std_name.value;
    if (std_name.length == "") {
        document.getElementById('std_name_error').innerHTML = "Please Enter Student Name.";
        form.std_name.focus();
        return false;
    } else {
        document.getElementById('std_name_error').innerHTML = "";
    }
    var std_fname = form.std_fname.value;
    if (std_fname.length == "") {
        document.getElementById('std_fname_error').innerHTML = "Please Enter Student Father Name.";
        form.std_fname.focus();
        return false;
    } else {
        document.getElementById('std_fname_error').innerHTML = "";
    }
    var std_domicile = form.std_domicile.value;
    if (std_domicile.length == "") {
        document.getElementById('std_domicile_error').innerHTML = "Please Enter Student Domicile.";
        form.std_domicile.focus();
        return false;
    } else {
        document.getElementById('std_domicile_error').innerHTML = "";
    }
    var std_address = form.std_address.value;
    if (std_address.length == "") {
        document.getElementById('std_address_error').innerHTML = "Please Enter Student Address.";
        form.std_address.focus();
        return false;
    } else {
        document.getElementById('std_address_error').innerHTML = "";
    }
    var std_ob_marks = form.std_ob_marks.value;
    if (std_ob_marks.length == "") {
        document.getElementById('std_marks_error').innerHTML = "Please Enter Student Obtained Marks.";
        form.std_ob_marks.focus();
        return false;
    } else {
        document.getElementById('std_marks_error').innerHTML = "";
    }
    var programName = form.programName.value;
    if(programName == '0'){
       document.getElementById('academic_level_error').innerHTML = "Please Select Program Name.";
        form.programName.focus();
        return false;
    } else {
        document.getElementById('academic_level_error').innerHTML = "";
    }    
    
}
function add_merit_list() {
    var form = document.merit_form;
    var merit_list_title = form.merit_list_title.value;
    if (merit_list_title.length == "") {
        document.getElementById('merit_title_error').innerHTML = "Please Enter Merit List Title.";
        form.merit_list_title.focus();
        return false;
    } else {
        document.getElementById('merit_title_error').innerHTML = "";
    }
    var merit_description = tinyMCE.get('meritText').getContent();
    if (merit_description == "") {
        document.getElementById('merit_description_error').innerHTML = "Please Enter Merit List Description.";
        return false;

    } else {
        document.getElementById('merit_description_error').innerHTML = "";
    }

    var merit_file_name = form.merit_file_name.value;
    if (merit_file_name.length == "") {
        document.getElementById('merit_file_error').innerHTML = "Please Choose Image File.";
        form.merit_file_name.focus();
        return false;
    } else {
        document.getElementById('merit_file_error').innerHTML = "";
    }
    
    var merit_date = form.merit_date.value;
    if (merit_date.length == "") {
        document.getElementById('merit_date_error').innerHTML = "Please Enter Merit List Date.";
        form.merit_date.focus();
        return false;
    } else {
        document.getElementById('merit_date_error').innerHTML = "";
    }
}

function change_user_name(){
    var form = document.change_user_name_form;
    var current_user_name = form.current_user_name.value;
    if(user_name.length == ""){
        document.getElementById('user_name_error').innerHTML = "Please Enter User Name.";
        form.current_user_name.focus();
        return false;
    }
    else{
        document.getElementById('user_name_error').innerHTML = "";
    }
    var current_password = form.password.value;
    if(current_password.length == ""){
        document.getElementById('password_error').innerHTML = "Please Enter Password.";
        form.current_password.focus();
        return false;
    }
    else{
        document.getElementById('password_error').innerHTML = "";
    }
    var new_user_name = form.new_user_name.value;
    if(new_user_name.length == ""){
        document.getElementById('new_user_name_error').innerHTML = "Please Enter New User Name.";
        form.new_user_name.focus();
        return false;
    }
    else{
        document.getElementById('new_user_name_error').innerHTML = "";
    }
}

function change_password(){
    var form = document.change_password_form;
    var user_name = form.user_name.value;
    if(user_name.length == ""){
        document.getElementById('user_name_error').innerHTML = "Please Enter User Name.";
        form.user_name.focus();
        return false;
    }
    else{
        document.getElementById('user_name_error').innerHTML = "";
    }
    var old_password = form.old_password.value;
    if(old_password.length == ""){
        document.getElementById('password_error').innerHTML = "Please Enter Password.";
        form.old_password.focus();
        return false;
    }
    else{
        document.getElementById('password_error').innerHTML = "";
    }
    var new_password = form.new_password.value;
    if(new_password.length == ""){
        document.getElementById('new_password_error').innerHTML = "Please Enter New Password.";
        form.new_password.focus();
        return false;
    }
    else{
        document.getElementById('new_password_error').innerHTML = "";
    }
     var confirm_password = form.confirm_password.value;
    if(confirm_password.length == ""){
        document.getElementById('confirm_pass_error').innerHTML = "Please Enter Confirm Password.";
        form.confirm_password.focus();
        return false;
    }
    else{
        document.getElementById('confirm_pass_error').innerHTML = "";
    }
}
function add_slider() {
    var form = document.slider_form;
    var slider_img_title = form.slider_img_title.value;
    if (slider_img_title.length == "") {
        document.getElementById('slider_img_title_error').innerHTML = "Please Enter Slider Image Title.";
        form.slider_img_title.focus();
        return false;
    } else {
        document.getElementById('slider_img_title_error').innerHTML = "";
    }
    var slider_image = form.slider_image.value;
    if (slider_image.length == "") {
        document.getElementById('slider_img_error').innerHTML = "Please Choose Image.";
        form.slider_image.focus();
        return false;
    } else {
        document.getElementById('slider_img_error').innerHTML = "";
    }
}
function edit_slider() {
    var form = document.slider_form;
    var slider_img_title = form.slider_img_title.value;
    if (slider_img_title.length == "") {
        document.getElementById('slider_img_title_error').innerHTML = "Please Enter Slider Image Title.";
        form.slider_img_title.focus();
        return false;
    } else {
        document.getElementById('slider_img_title_error').innerHTML = "";
    }
}

function add_achievement() {
    var form = document.achievement_form;
    var achievement_title = form.achievement_title.value;
    if (achievement_title.length == "") {
        document.getElementById('achievement_title_error').innerHTML = "Please Enter Activities Title.";
        form.achievement_title.focus();
        return false;
    } else {
        document.getElementById('achievement_title_error').innerHTML = "";
    }
    var achievement_description = tinyMCE.get('achievementText').getContent();
    if (achievement_description == "") {
        document.getElementById('achievement_description_error').innerHTML = "Please Enter Activities Description.";
        return false;


    } else {
        document.getElementById('achievement_description_error').innerHTML = "";
    }

    var achievement_image_name = form.achievement_image_name.value;
    if (achievement_image_name.length == "") {
        document.getElementById('achievement_image_error').innerHTML = "Please Choose Image File.";
        form.achievement_image_name.focus();
        return false;
    } else {
        document.getElementById('achievement_image_error').innerHTML = "";
    }
}

function edit_achievement() {
    var form = document.achievement_form;
    var achievement_title = form.achievement_title.value;
    if (achievement_title.length == "") {
        document.getElementById('achievement_title_error').innerHTML = "Please Enter Activities Title.";
        form.achievement_title.focus();
        return false;
    } else {
        document.getElementById('achievement_title_error').innerHTML = "";
    }
    var achievement_description = tinyMCE.get('achievementText').getContent();
    if (achievement_description == "") {
        document.getElementById('achievement_description_error').innerHTML = "Please Enter Activities Description.";
        return false;


    } else {
        document.getElementById('achievement_description_error').innerHTML = "";
    }
}

    