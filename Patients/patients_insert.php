<html>
<body>
<?php
   $con = mysqli_connect("localhost", "root", "");
   if (!$con) {
       die("Connection failed: " . mysqli_connect_error());
   }
   mysqli_select_db($con, "Hospital");
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $Patient_id = mysqli_real_escape_string($con, $_POST['Patient_id']);
    $First_Name = mysqli_real_escape_string($con, $_POST['First_Name']);
    $Last_Name = mysqli_real_escape_string($con, $_POST['Last_Name']);
    $Date_Of_Birth = mysqli_real_escape_string($con, $_POST['Date_Of_Birth']);
    $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
    $Contact_Number = mysqli_real_escape_string($con, $_POST['Contact_Number']);
    $Problem = mysqli_real_escape_string($con, $_POST['Problem']);
    $Doc=mysqli_real_escape_string($con,$_POST['Doc']);
    $Doc_id=mysqli_real_escape_string($con,$_POST['Doc_id']);
   }

   $sql = "INSERT INTO patients ( Patient_id,First_Name, Last_Name, Date_Of_Birth, Gender, Contact_Number, Problem, Doctor,Doctor_id)
           VALUES ('$Patient_id','$First_Name', '$Last_Name', '$Date_Of_Birth', '$Gender', '$Contact_Number', '$Problem','$Doc','$Doc_id')";

   if (mysqli_query($con, $sql)) {
       echo "1 record added";
   } else {
       echo "Error: " . mysqli_error($con);
   }

   mysqli_close($con);
 
   
?>
</body>
</html>
