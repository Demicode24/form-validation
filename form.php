<?php

$NameError="";
$EmailError="";
$GenderError="";
$WebError="";

if(isset($_POST['submit'])){
  if(empty($_POST["name"])){
    $NameError="Name is Required";
  }
  else{
    $Name=Test_User_Input($_POST["name"]);
    if(!preg_match("/^[A-Za-z. ]*$/",$Name)){
      $NameError="Only letters and white space are allowed";
    }
  }

  if(empty($_POST["email"])){
    $EmailError="Email is Required";
  }
  else{
    $Email=Test_User_Input($_POST["email"]);
    if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)){
      $EmailError="Invalid Email Format";
    }
  }

  if(empty($_POST["gender"])){
    $GenderError="Gender is Required";
  }
  else{
    $Gender=Test_User_Input($_POST["gender"]);
  }

  if(empty($_POST["website"])){
    $WebError="Website is Required";
  }
  else{
    $Website=Test_User_Input($_POST["website"]);
    if(!preg_match("/[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$Website)){
      $WebError="Invalid Website Address Format";
    }
  }

  if(!empty($_POST["name"])&&!empty($_POST["email"])&&!empty($_POST["gender"])&&!empty($_POST["website"])){
    if((preg_match("/^[A-Za-z. ]*$/",$Name)==true)&&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)==true)&&(preg_match("/[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$Website)==true)){
  echo "<h2>Your Submit Information</h2> <br>";
  echo "Name:".ucwords ($_POST["name"])."<br>";
  echo "Email: {$_POST["email"]}<br>";
  echo "Gender: {$_POST["gender"]}<br>";
  echo "Website: {$_POST["website"]}<br>";
    }else{
      echo "Please Complete and Correct your Form again";
    }
  }
}



function Test_User_Input($data){
  return $data;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Validation</title>
</head>
<body>

  <h2>Form Validation with PHP</h2>

  <form action="form.php" method="post">
    <legend>* Please fill out the following fields.</legend>
    <fieldset>
      <label for="">Name:</label><br>
      <input type="text" name="name" class="input">*<?php echo $NameError; ?><br>
      <label for="">Email:</label><br>
      <input type="text" name="email" class="input">*<?php echo $EmailError; ?><br>
      <label for="">Gender:</label><br>
      <input type="radio" class="radio" name="gender" value="Male">
      <label for="">Male</label>
      <input type="radio" class="radio" name="gender" value="Female">
      <label for="">Female</label>*<?php echo $GenderError; ?><br>
      <label for="">Website:</label><br>
      <input type="text" class="input" name="website">*<?php echo $WebError; ?><br>
      <label for="">Comment:</label><br>
      <textarea name="comment" id="" cols="25" rows="5"></textarea><br><br>
      <input type="submit" name="submit" value="Submit Your Information">
    </fieldset>
  </form>
</body>
</html>