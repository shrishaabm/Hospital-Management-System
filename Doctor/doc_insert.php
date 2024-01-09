<html>
<body>
<?php
   $con = mysqli_connect("localhost", "root", "");
   if (!$con) {
       die("Connection failed: " . mysqli_connect_error());
   }
   mysqli_select_db($con, "Hospital");
   if($_SERVER["REQUEST_METHOD"]=="POST"){

    $First_Name = mysqli_real_escape_string($con, $_POST['First_Name']);
    $Last_Name = mysqli_real_escape_string($con, $_POST['Last_Name']);
    $Specialization = mysqli_real_escape_string($con, $_POST['Specialization']);
    $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
    $Contact_Number = mysqli_real_escape_string($con, $_POST['Contact_Number']);
   }

   $sql = "INSERT INTO doctors ( First_Name, Last_Name, Specialization, Contact_Number, Gender)
           VALUES ( '$First_Name', '$Last_Name', '$Specialization','$Contact_Number', '$Gender')";

   if (mysqli_query($con, $sql)) {
       echo "1 record added";
   } else {
       echo "Error: " . mysqli_error($con);
   }

   mysqli_close($con);


?>
</body>
</html>
