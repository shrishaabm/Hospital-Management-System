<?php
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($con, "Hospital");

    if (isset($_GET['patientId'])) {
        $patientId = mysqli_real_escape_string($con, $_GET['patientId']);

        $sql = "DELETE FROM patients WHERE Patient_id = '$patientId'";
        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        echo "Patient ID not provided.";
    }

    mysqli_close($con);
?>

<script>
    setTimeout(function() {
        window.location.href = document.referrer;
    }, 1000);
</script>
