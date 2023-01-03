<?php

$firstName =  $_POST['firstName'];
$lastName =  $_POST['lastName'];
$email =  $_POST['email'];

$errors = [

    'firstNameError' => '',
    'lastNameError' => '',
    'firstNameError' => '',


];

if (isset($_POST['submit'])){





//echo $firstName . ' ' . $lastName . ' ' . $email;
 
 
   //تحقق الاسم الاول
   if(empty($firstName)){
    $errors['firstNameError'] = 'يرجى ادخال الاسم الاول';
  }

 //تحقق الاسم الاخير
  if(empty($lastName)){
   $errors['lastNameError'] = 'يرجى ادخال الاسم الاخير';
     }

    //تحقق الايميل
     if(empty($email)){
       $errors['emailError'] = 'ادخل الايميل ';
     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors['emailError'] = ' ادخل الايميل الصحيح';
     }

     //تحقق لايوجد اخطاء
     if(!array_filter($errors)){

    $firstName =  mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName =   mysqli_real_escape_string($conn, $_POST['lastName']);
    $email =      mysqli_real_escape_string($conn, $_POST['email']);
    $sql  =  "INSERT INTO users(firstName , lastName , email)

 VALUES ('$firstName', '$lastName', '$email')"; 


    if(mysqli_query($conn , $sql)){

        header('Location: ' .  $_SERVER['PHP_SELF']);
      }else{


         echo 'error: ' . mysqli_error($conn);

 }
 
 
 }

}