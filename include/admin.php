<?php
require('../include/db.php');
if(isset($_POST['update-section'])){
    $home=$_POST['home'] ?? 0;
    $about=$_POST['about'] ?? 0;
    $portfolio=$_POST['portfolio'] ?? 0;
    $resume=$_POST['resume'] ?? 0;
    $services=$_POST['services']??0;
    $contact=$_POST['contact'] ?? 0;

    $query="UPDATE section_control SET ";
    $query.="home_section='$home',";
    $query.="about_section='$about',";
    $query.="resume_section='$resume',";
    $query.="services_section='$services',";
    $query.="portfolio_section='$portfolio',";
    $query.="contact_section='$contact' WHERE id=1";

    $run=mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php';</script>";  
    }


}

if(isset($_POST['update-home'])){
   $title=mysqli_real_escape_string($db,$_POST['title']);
    $subtitle=mysqli_real_escape_string($db,$_POST['subtitle']) ;
    $showicons=$_POST['showicons'] ?? 0;
   
    $query="UPDATE home SET ";
    $query.="title='$title',";
    $query.="subtitle='$subtitle',";
    $query.="showicons='$showicons' WHERE id=1";

    $run=mysqli_query($db,$query);
    if($run){
      echo "<script>window.location.href = '../admin/index.php?homesetting=true';</script>";  
    }


}

if(isset($_POST['update-about'])){
    $title=mysqli_real_escape_string($db,$_POST['abouttitle']);
     $subtitle=mysqli_real_escape_string($db,$_POST['aboutsubtitle']) ;
     $desc=mysqli_real_escape_string($db,$_POST['aboutdesc']) ;
     $imagename=time().$_FILES['profile']['name'];
     $imgtemp=$_FILES['profile']['tmp_name'];
     

     if($imgtemp== ''){
        $q = "SELECT * FROM about WHERE 1";
        $r=mysqli_query($db,$q);
        $d=mysqli_fetch_array($r);
        $imagename=$d['profile_pic'];
     }
move_uploaded_file($imgtemp,"../images/$imagename");

 $query="UPDATE about SET ";
  $query.="about_title='$title',";
  $query.="about_subtitle='$subtitle',";
 $query.="profile_pic='$imagename' ,";

 

 $query.="about_desc='$desc' WHERE id=1";

    $run=mysqli_query($db,$query);
    if($run){
  echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";  
    } 
   
 
 }




 if(isset($_POST['add-skill'])){



   $skillname=$_POST['skillname'];
   $skilllevel=$_POST['skilllevel'];
   

 


$query="INSERT INTO skills (skill_name,skill_level) VALUES('$skillname','$skilllevel')";



  $run=mysqli_query($db,$query);
  if($run){
echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";  
  } 
 

}


if(isset($_POST['add-pi'])){



  $label=$_POST['label'];
  $value=$_POST['value'];
$query="INSERT INTO personal_info (label,value) VALUES('$label','$value')";
 $run=mysqli_query($db,$query);
 if($run){
echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";  
 } 


}



if(isset($_POST['add-resume'])){
  
 $type =$_POST['type'];
 $title= $_POST['title'];
 $org=$_POST['org'];
 $time=$_POST['time'];
 $about=$_POST['about'];

$query="INSERT INTO resume (type,title,time,org,about_exp) VALUES('$type','$title','$time','$org','$about')";
$run=mysqli_query($db,$query);
 if($run){
echo "<script>window.location.href = '../admin/index.php?resumesetting=true';</script>";  
 } 


}


if(isset($_POST['add-services'])){
  
  $subject_title =$_POST['subject_title'];
  $subject_subtitle= $_POST['subject_subtitle'];

 
 $query="INSERT INTO services (subject_title,subject_subtitle) VALUES('$subject_title','$subject_subtitle')";
 $run=mysqli_query($db,$query);
  if($run){
 echo "<script>window.location.href = '../admin/index.php?servicessetting=true';</script>";  
  } 
 
 
 }


 
if(isset($_POST['add-project'])){
  

  $type =$_POST['type'];
  $project_name= $_POST['project_name'];
  $project_link=$_POST['project_link'];
  $project_image=$_FILES['project_pic']['name'];

  move_uploaded_file($_FILES['project_pic']['tmp_name'],"../images/$project_image");


 
 $query="INSERT INTO portfolio (project_type,project_pic,project_name,project_link) VALUES('$type','$project_image','$project_name','$project_link')";
 $run=mysqli_query($db,$query);
  if($run){
 echo "<script>window.location.href = '../admin/index.php?portfoliosetting=true';</script>";  
 } 
 
 
 }


 if(isset($_POST['update-contact'])){
  

  $address=mysqli_real_escape_string($db,$_POST['address']);
 
   $email=$_POST['email'];
   $mobile=$_POST['mobile'];
   
   $query="UPDATE contact SET ";
   $query.="address='$address',";
   $query.="email='$email',";
   $query.="mobile='$mobile' WHERE id=1";

   $run=mysqli_query($db,$query);
   if($run){
     echo "<script>window.location.href = '../admin/index.php?contactsetting=true';</script>";  
   }


}

if(isset($_POST['update-socialmedia'])){
 
 
   $twitter=$_POST['twitter'];
   $facebook=$_POST['facebook'];
   $instagram=$_POST['instagram'];
   $linkedin=$_POST['linkedin'];
   
   $query="UPDATE social_media SET ";
   $query.="twitter='$twitter',";
   $query.="facebook='$facebook',";
   $query.="instagram='$instagram',";
   $query.="linkedin='$linkedin' WHERE id=1";

   $run=mysqli_query($db,$query);
   if($run){
     echo "<script>window.location.href = '../admin/index.php?contactsetting=true';</script>";  
   }


}




if(isset($_POST['update-background'])){
  //print_r($_FILES);
 
   $imagename=time().$_FILES['background']['name'];
   $imgtemp=$_FILES['background']['tmp_name'];
   


move_uploaded_file($imgtemp,"../images/$imagename");

$query="UPDATE site_background SET ";
$query.="background_img='$imagename' WHERE id=1";

  $run=mysqli_query($db,$query);
  if($run){
echo "<script>window.location.href = '../admin/index.php?changebackgroundsetting=true';</script>";  
  } 
 

}



?>
