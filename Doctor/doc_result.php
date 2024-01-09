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
    
    $sql = "select * from doctors";

   if ($res = mysqli_query($con, $sql))
   {	
         echo "";
   }
			
    echo "<table border='1'>
	<tr>
	<th>Doctor_id</th>
	<th>Fiest_Name</th>
	<th>Last_Name</th>
	<th>Specialization</th>
    <th>Contact_Number</th>
    <th>Gender</th>
    <th>Action</th>
	</tr>";
   
   while($row = mysqli_fetch_array($res))
    {
	    echo "<tr>";
	    echo "<td>" . $row['Doctor_id'] . "</td>";
	    echo "<td>" . $row['First_Name'] . "</td>";
      echo "<td>" . $row['Last_Name'] . "</td>";
	    echo "<td>" . $row['Specialization'] . "</td>";
      echo "<td>" . $row['Contact_Number'] . "</td>";
	    echo "<td>" . $row['Gender'] . "</td>";
      echo "<td><span class='delete-icon' onclick='deleteRow(" . $row['Doctor_id'] . ")'>&#10006;</span></td>";
	    echo "</tr>";
    }

    echo "</table>";
    mysqli_close($con);
?> 

<script>
    function deleteRow(doctor) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "delete_record_doctor.php?doctor=" + doctor;
        }
    }
</script>
</body>
</html> 