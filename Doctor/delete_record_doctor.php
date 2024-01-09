<?php
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($con, "Hospital");

    if (isset($_GET['doctor'])) {
        $doctor = mysqli_real_escape_string($con, $_GET['doctor']);

        $sql = "DELETE FROM doctors WHERE Doctor_id = '$doctor'";
        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        echo "Doctor ID not provided.";
    }

    mysqli_close($con);
?>

<script>
    setTimeout(function() {
        window.location.href = document.referrer;
    }, 1000);
</script>
