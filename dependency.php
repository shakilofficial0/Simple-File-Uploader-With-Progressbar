<?php
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_path = "uploads/".$file_name;
      $dir_path = "uploads";
   
      
      $extensions= array("html","php","js");
      
     
      if($file_size < 1){
         $errors ='Something went wrong! Please try another file.';
      }
      
      if(empty($errors)==true){
         if(!file_exists($dir_path)){
            if(!mkdir($dir_path, 0777, true)){
               die('Failed to create Folder \' Uploads\' ');
            }
            else{
               if(!file_exists($file_path)){
                  move_uploaded_file($file_tmp,"uploads/".$file_name);
                  echo "File Uploaded <a href='uploads/$file_name'>Here</a>";
               }
               else{
                  echo "This file is already uploaded!";
               }
            }
         }
      }else{
         print_r($errors);
      }
   }
?>