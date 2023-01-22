<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'conn.php';
$title = "Strong minds";
include "header.php";
?>
<html lang="en">
  <head>
    <script>
        function ageCalculator() {  
                var userinput = document.getElementById("DOB").value;  
                var dob = new Date(userinput);  
                if(userinput==null || userinput=='') {  
                  document.getElementById("message").innerHTML = "**Choose a date please!";    
                  return false;   
                } else {                   
                //calculate month difference from current date in time  
                var month_diff = Date.now() - dob.getTime();                  
                //convert the calculated difference in date format  
                var age_dt = new Date(month_diff);                  
                //extract year from date      
                var year = age_dt.getUTCFullYear();                    
                //now calculate the age of the user  
                var age = Math.abs(year - 1970);                   
                //display the calculated age  
                return document.getElementById("age").value = age;  
                }  
        } 
        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('noCheck').checked=false;
                document.getElementById('ifYes').style.visibility = 'visible';

            } else if (document.getElementById('noCheck').checked) {
              document.getElementById('yesCheck').checked=false;
                document.getElementById('ifYes').style.visibility  = 'hidden';
            }
          }
      </script>      
    <link href="assets/paint.css" rel="stylesheet">
    <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
     integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> 
    <title>Strong minds form</title>
  </head>
  <?php
                include 'nav.php';
?>
  <body>
    <div class="container">
    <?php
$errors = [];
if (isset(
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['date'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['dob'],
    $_POST['age'],
    $_POST['allergies'],
    $_POST['pregnant'],
    $_POST['gender'],
)) {
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $allergies = mysqli_real_escape_string($con, $_POST['allergies']);
    $pregnant = mysqli_real_escape_string($con, $_POST['pregnant']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = $_POST['age'] ?? '';
    $yesallergy = $_POST['yesallergy'] ?? '';
    $prefered_contact = implode(",", $_POST['prefered_contact']);
    $conditions = implode(",", $_POST['conditions']);
    $medication = implode(",", $_POST['medication']);

    if ((empty($firstName)) || empty($lastName) || empty($date)
    || empty($email) || empty($phone) || empty($dob)
    || empty($age) || empty($prefered_contact) || empty($allergies)
    || empty($pregnant) || empty($gender) || empty($conditions)
    || empty($medication)) {
        $errors[] = 'All Fields should not be blank';
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            ?>
                               <div class="alert alert-danger"><?php echo $error; ?></div>
                             <?php
        }
    } else {
        mysqli_query($con, "INSERT INTO patient_information(
                              first_name,last_name,date,email,phone,prefered_contact,
                              dob,age,gender,conditions,allergies,pregnant,on_medications,explain_allergy
                              ) VALUES('$firstName','$lastName','$date','$email','$phone','$prefered_contact','$dob','$age',
                              '$gender', '$conditions','$allergies','$pregnant','$medication','$yesallergy')")
                                 or die(mysqli_error($con));
        ?>
                            <div class="alert alert-success">
                              <i class="fa fa-check">                                
                              </i>Patient Information Successfully Added. </div>
                    <?php
    }
}
?>
        <form  method="post" name='form' class="form-horizontal" action="" 
        enctype="multipart/form-data">
        <fieldset>
              <legend><h1>Health</h1></legend>
        <hr/>
        <!-- These are text inputs 0773535857 -->
        <label>First Name:  </label>  <br/>
        <input type="text" name="firstName" placeholder="First Name"  class="form-control"  /> 
        <br/>
        <label>Last Name:  </label>  <br/>
        <input type="text" name="lastName" placeholder="Last Name"  class="form-control" />
      <br/>
      <!-- this is a date input -->
        <label>Date:  </label><br/>  
        <input type="date" name="date" class="form-control" />
      <br/>
        <label>Email:</label><br/>
        <input type="text"  name="email" class="form-control" placeholder="Email"/>
        <br/>
        <label>Phone:</label><br/>
        <input type="mobile"  name="phone" class="form-control" placeholder="(000)-000-000"/>
        <br/>
        <label>Prefered contact: </label><br/>
        <input type="checkbox" name="prefered_contact[]" value="Phone call" id="phone_call"/> Phone call
        <input type="checkbox" name="prefered_contact[]"  value="text message" id="text_messages"/> Text Messages
        <input type="checkbox" name="prefered_contact[]"  value="prefered email" id="prefered_email"/> Email
        <br/>
        <br/>
        <label>Date of Birth </label><br/>  
        <input type="date" name="dob" class="form-control" id="DOB" onChange="ageCalculator()"/>
      <br/>
      <!-- Age is a calculated and numbers field -->
        <label>Age: </label><br/>
        <input type="text" name="age" id="age" class="form-control" readonly />
      <br/>
        <label>Gender </label><br/>
        <select name="gender" class="form-control" id="gender">
          <option value="Male" >Male</option>
          <option value="Female" >Female</option>
          <option value="Other" >Other</option>
      </select>
      <br/>
      <br/>
      <h2>Medical</h2>
      <hr/>
      <label>
        <!-- these are multiple answer checkbox and radio     buttonns  -->
          Do you have any of the following conditions?  </label><br/>
          <input type="checkbox" name="conditions[]" value="High Blood Pressure"/> High Blood Pressure 
          <input type="checkbox" name="conditions[]" value="Diabetes Type 1"/> Diabetes Type 1 <br/>
          <input type="checkbox" name="conditions[]" value="Diabetes Type 2"/> Diabetes Type 2
          <input type="checkbox" name="conditions[]" value="Gout"/> Gout 
      <br/>
      <br/>
      <label>
          Are you taking medication for?  </label><br/>
          <input type="checkbox" name="medication[]"  value="High Blood Pressure"/> High Blood Pressure 
          <input type="checkbox" name="medication[]" value="Diabetes Type 1"/> Diabetes Type 1 <br/>
          <input type="checkbox" name="medication[]" value="Diabetes Type 2"/> Diabetes Type 2
          <input type="checkbox" name="medication[]" value="Gout "/> Gout 
      <br/>
      <br/>
      <label>
          Are you Pregnant? </label><br/>
          <input type="radio" name="pregnant" id="yes_pregnant" value="Yes" /> Yes
          <input type="radio" name="pregnant"  id="no_pregnant" value="No" /> No
          <input type="radio" name="pregnant"  id="na_pregnant" value="N/A" /> N/A
      <br/>
      <br/>
      <label>
        <!-- at this point i am able to show the input field to explain how your allergies are
        when you say you have them , -->
          Do you have for allergies? </label><br/>
          <input type="radio" value="yes" name="allergies" onclick="yesnoCheck()" id="yesCheck"/> Yes
          <input type="radio" value="no" name="allergies" onclick="yesnoCheck()" id="noCheck"/> No
          <div id="ifYes" style="visibility:hidden">If yes, explain you allergy:
          <input type='text' id='yes' name='yesallergy'/>    
      </div>
      <br/>
      <button class="btn btn-primary" type="submit">Save Info</button>
      </fieldset>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

