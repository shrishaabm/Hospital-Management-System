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
    
    $sql = "select * from medical_record";

   if ($res = mysqli_query($con, $sql))
   {	
         echo "";
   }
			
    echo "<table border='1'>
	<tr>
	<th>Record_id</th>
	<th>Patient_id</th>
	<th>Doctor_id</th>
	<th>Diagnosis</th>
  <th>Prescription</th>
  <th>Date_Created</th>

	</tr>";
   
   while($row = mysqli_fetch_array($res))
    {
	    echo "<tr>";
	    echo "<td>" . $row['Record_id'] . "</td>";
	    echo "<td>" . $row['Patient_id'] . "</td>";
      echo "<td>" . $row['Doctor_id'] . "</td>";
	    echo "<td>" . $row['Diagnosis'] . "</td>";
      echo "<td>" . $row['Prescription'] . "</td>";
	    echo "<td>" . $row['Date_Created'] . "</td>";
      
	    echo "</tr>";
    }

    echo "</table>";
    mysqli_close($con);
?> 




</body>
</html> 