<?php
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $path = "uploads/".$file_name;
      // $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $extensions= array("html","php","js");
      
      // if(in_array($file_ext,$extensions)=== true){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }
      
      if($file_size < 1){
         $errors[]='File size must be greater then 1byte';
      }
      
      if(empty($errors)==true){
         if(!file_exists($path)){
            move_uploaded_file($file_tmp,"uploads/".$file_name);
            echo "File Uploaded <a href='uploads/$file_name'>Here</a>";
         }
         else{
            echo "This file is already uploaded!";
         }
      }else{
         print_r($errors);
      }
   }
?>