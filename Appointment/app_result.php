<html>
    <head>
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #4caf50;
      color: white;
    }

    a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 8px;
      background-color:#4caf50 ;
      margin-top: 5px;
    }

    a:hover {
      text-decoration: underline;
    }

    .delete-icon {
        cursor: pointer;
        color: red;
    }
    </style>
    </head>
<body>
<?php
    $con = mysqli_connect("localhost","root","");
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db ($con, "Hospital");
    if (!mysqli_select_db($con, "Hospital")) {
        die("Database selection failed: " . mysqli_error($con));
    }
    
    $sql = "select * from appointments";

   if ($res = mysqli_query($con, $sql))
   {	
         echo "";
   }
			
    echo "<table border='1'>
	<tr>
	<th>Appointment_ID</th>
	<th>Doctor_ID</th>
  <th>Paitent_ID</th>
	<th>AppointmentDate</th>
  <th>AppointmentTime</th>
  <th>Symptoms</th>
	</tr>";
   
   while($row = mysqli_fetch_array($res))
    {
	    echo "<tr>";
	    echo "<td>" . $row['Appointment_ID'] . "</td>";
      echo "<td>" . $row['Doctor_ID'] . "</td>";
      echo "<td>" . $row['Paitent_ID'] . "</td>";
	    echo "<td>" . $row['AppointmentDate'] . "</td>";
      echo "<td>" . $row['AppointmentTime'] . "</td>";
	    echo "<td>" . $row['Symptoms'] . "</td>";
	    echo "</tr>";
    }

    echo "</table>";
    mysqli_close($con);
?> 


</body>
</html> 