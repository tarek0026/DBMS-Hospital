<?php
include 'db.php'; 

$sql = "SELECT * FROM Doctors";
$result = $conn->query($sql);
?>
<!-- doctors --> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital System</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1>Doctors List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Specialty</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['doctor_id'] . "</td>
                        <td>" . $row['doctor_name'] . "</td>
                        <td>" . $row['specialty'] . "</td>
                        <td>" . $row['phone_number'] . "</td>
                        <td>" . $row['email'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No doctors found</td></tr>";
        }
        ?>
    </table>

    <!-- Patients -->
    <h1>Patients List</h1>
    <?php
    $sql = "SELECT * FROM Patients";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Address</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['patient_id'] . "</td>
                        <td>" . $row['patient_name'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td>" . $row['gender'] . "</td>
                        <td>" . $row['phone_number'] . "</td>
                        <td>" . $row['address'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No patients found</td></tr>";
        }
        ?>
    </table>

    <!-- Appointments -->
    <h1>Appointments</h1>
    <?php
    $sql = "SELECT * FROM Appointments";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['appointment_id'] . "</td>
                        <td>" . $row['patient_id'] . "</td>
                        <td>" . $row['doctor_id'] . "</td>
                        <td>" . $row['appointment_date'] . "</td>
                        <td>" . $row['appointment_time'] . "</td>
                        <td>" . $row['status'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No appointments found</td></tr>";
        }
        ?>
    </table>

    <!-- Departments -->
    <h1>Departments</h1>
    <?php
    $sql = "SELECT * FROM Departments";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Floor Number</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['department_id'] . "</td>
                        <td>" . $row['department_name'] . "</td>
                        <td>" . $row['floor_number'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No departments found</td></tr>";
        }
        ?>
    </table>

    <!-- Rooms -->
    <h1>Rooms</h1>
    <?php
    $sql = "SELECT * FROM Rooms";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Room Number</th>
            <th>Department ID</th>
            <th>Occupied</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['room_id'] . "</td>
                        <td>" . $row['room_number'] . "</td>
                        <td>" . $row['department_id'] . "</td>
                        <td>" . ($row['is_occupied'] ? 'Yes' : 'No') . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No rooms found</td></tr>";
        }
        ?>
    </table>
    <!-- Treatments -->
    <h1>Treatments</h1>
    <?php
    $sql = "SELECT * FROM Treatments";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['treatment_id']}</td>
                        <td>{$row['patient_id']}</td>
                        <td>{$row['doctor_id']}</td>
                        <td>{$row['treatment_description']}</td>
                        <td>{$row['start_date']}</td>
                        <td>{$row['end_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No treatments found</td></tr>";
        }
        ?>
    </table>
        <!-- Laboratory Tests -->
        <h1>Laboratory Tests</h1>
    <?php
    $sql = "SELECT * FROM LaboratoryTests";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Test Name</th>
            <th>Test Date</th>
            <th>Result</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['test_id']}</td>
                        <td>{$row['patient_id']}</td>
                        <td>{$row['test_name']}</td>
                        <td>{$row['test_date']}</td>
                        <td>{$row['result']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No tests found</td></tr>";
        }
        ?>
    </table>
     <!-- Nurses -->
     <h1>Nurses</h1>
    <?php
   
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Department ID</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nurse_id']}</td>
                        <td>{$row['nurse_name']}</td>
                        <td>{$row['phone_number']}</td>
                        <td>{$row['department_id']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No nurses found</td></tr>";
        }
        ?>

    <!-- Billing -->
    <h1>Billing</h1>
    <?php
    $sql = "SELECT * FROM Billing";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Bill Date</th>
            <th>Total Amount</th>
            <th>Payment Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['bill_id'] . "</td>
                        <td>" . $row['patient_id'] . "</td>
                        <td>" . $row['bill_date'] . "</td>
                        <td>" . $row['total_amount'] . "</td>
                        <td>" . $row['payment_status'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No billing records found</td></tr>";
        }
        ?>
    </table>


    <h1>Medications</h1>
<?php
$sql = "SELECT * FROM Medications";
$result = $conn->query($sql);
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Dosage</th>
        <th>Price</th>
        <th>Stock Quantity</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['medication_id']}</td>
                    <td>{$row['medication_name']}</td>
                    <td>{$row['dosage']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['stock_quantity']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No medications found</td></tr>";
    }
    ?>
</table>
</body>
</html>
