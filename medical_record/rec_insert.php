<html>
    <body>
        <?php
            $con=mysqli_connect("localhost","root","");
            if(!$con){
                die("Connection Failed" . mysqli_connect_error());
            }
            mysqli_select_db($con,"Hospital");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Record_id = mysqli_real_escape_string($con, $_POST['Record_id']);
                $Patient_id = mysqli_real_escape_string($con, $_POST['Patient_id']);
                $Doctor_id = mysqli_real_escape_string($con, $_POST['Doctor_id']);
                $Diagnosis = mysqli_real_escape_string($con, $_POST['Diagnosis']);
                $Prescription = mysqli_real_escape_string($con, $_POST['Prescription']);
                $Date_Created = mysqli_real_escape_string($con, $_POST['Date_created']);

                $sql = "INSERT INTO medical_record (Record_id, Patient_id, Doctor_id, Diagnosis, Prescription, Date_Created)
                        VALUES ('$Record_id', '$Patient_id', '$Doctor_id', '$Diagnosis', '$Prescription', '$Date_Created')";

                if (mysqli_query($con, $sql)) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            }

            mysqli_close($con);
        ?>
    </body>
</html>
