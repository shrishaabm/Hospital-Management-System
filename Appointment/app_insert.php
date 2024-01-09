<html>
<body>
<?php
   $con = mysqli_connect("localhost", "root", "");
   if (!$con) {
       die("Connection failed: " . mysqli_connect_error());
   }
   mysqli_select_db($con, "Hospital");
   if($_SERVER["REQUEST_METHOD"]=="POST"){

    $Appointment_ID = mysqli_real_escape_string($con, $_POST['Appointment_ID']);
    $Doctor_ID = mysqli_real_escape_string($con, $_POST['Doctor_ID']);
    $Paitent_ID = mysqli_real_escape_string($con, $_POST['Paitent_ID']);
    $AppointmentDate = mysqli_real_escape_string($con, $_POST['AppointmentDate']);
    $AppointmentTime = mysqli_real_escape_string($con, $_POST['AppointmentTime']);
    $Symptoms = mysqli_real_escape_string($con, $_POST['Symptoms']);
   }

   $sql = "INSERT INTO appointments ( Appointment_ID, Doctor_ID, Paitent_ID, AppointmentDate, AppointmentTime,Symptoms)
           VALUES ( '$Appointment_ID', '$Doctor_ID', '$Paitent_ID','$AppointmentDate', '$AppointmentTime','$Symptoms')";

   if (mysqli_query($con, $sql)) {
       echo "1 record added";
   } else {
       echo "Error: " . mysqli_error($con);
   }

   mysqli_close($con);


?>
</body>
</html>
