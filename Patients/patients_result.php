<html>
<head>
    <style>
    .delete-icon {
        cursor: pointer;
        color: red;
    }
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

    
    </style>
</head>
<body>
<?php
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($con, "Hospital");

    $sql = "SELECT * from patients";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<table border='1'>
        <tr>
        <th>Patient_id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Contact Number</th>
        <th>Problem</th>
        <th>Doctor</th>
        <th>Doctor Id</th>
        <th>Action</th>
        </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Patient_id'] . "</td>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['Date_Of_Birth'] . "</td>";
            echo "<td>" . $row['Gender'] . "</td>";
            echo "<td>" . $row['Contact_Number'] . "</td>";
            echo "<td>" . $row['Problem'] . "</td>";
            echo "<td>" . $row['Doctor'] . "</td>";
            echo "<td>" . $row['Doctor_id'] . "</td>";

            echo "<td><span class='delete-icon' onclick='deleteRow(" . $row['Patient_id'] . ")'>&#10006;</span></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
?>



<script>
    function deleteRow(patientId) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "delete_record.php?patientId=" + patientId;
        }
    }
</script>

</body>
</html>
