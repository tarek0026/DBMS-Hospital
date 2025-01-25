<?php
include 'db.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['add_departments'])) {
            $name = $_POST['department_name'];
            $floor = $_POST['floor_number'];
            $conn->query("INSERT INTO Departments (department_name, floor_number) VALUES ('$name', '$floor')");
        } elseif (isset($_POST['add_doctors'])) {
            $name = $_POST['doctor_name'];
            $specialty = $_POST['specialty'];
            $phone = $_POST['phone_number'];
            $email = $_POST['email'];
            $conn->query("INSERT INTO Doctors (doctor_name, specialty, phone_number, email) VALUES ('$name', '$specialty', '$phone', '$email')");
        } elseif (isset($_POST['add_patients'])) {
            $name = $_POST['patient_name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone_number'];
            $address = $_POST['address'];
            $conn->query("INSERT INTO Patients (patient_name, age, gender, phone_number, address) VALUES ('$name', '$age', '$gender', '$phone', '$address')");
        } elseif (isset($_POST['add_nurses'])) {
            $name = $_POST['nurse_name'];
            $phone = $_POST['phone_number'];
            $dept_id = $_POST['department_id'];
            $conn->query("INSERT INTO Nurses (nurse_name, phone_number, department_id) VALUES ('$name', '$phone', '$dept_id')");
        } elseif (isset($_POST['add_appointments'])) {
            $patient_id = $_POST['patient_id'];
            $doctor_id = $_POST['doctor_id'];
            $date = $_POST['appointment_date'];
            $time = $_POST['appointment_time'];
            $status = $_POST['status'];
            $conn->query("INSERT INTO Appointments (patient_id, doctor_id, appointment_date, appointment_time, status) 
                          VALUES ('$patient_id', '$doctor_id', '$date', '$time', '$status')");
        } elseif (isset($_POST['add_billing'])) {
            $patient_id = $_POST['patient_id'];
            $date = $_POST['bill_date'];
            $amount = $_POST['total_amount'];
            $status = $_POST['payment_status'];
            $conn->query("INSERT INTO Billing (patient_id, bill_date, total_amount, payment_status) 
                          VALUES ('$patient_id', '$date', '$amount', '$status')");
        } elseif (isset($_POST['add_rooms'])) {
            $number = $_POST['room_number'];
            $dept_id = $_POST['department_id'];
            $occupied = isset($_POST['is_occupied']) ? 1 : 0;
            $conn->query("INSERT INTO Rooms (room_number, department_id, is_occupied) VALUES ('$number', '$dept_id', '$occupied')");
        } elseif (isset($_POST['add_medications'])) {
            $name = $_POST['medication_name'];
            $dosage = $_POST['dosage'];
            $price = $_POST['price'];
            $stock = $_POST['stock_quantity'];
            $conn->query("INSERT INTO Medications (medication_name, dosage, price, stock_quantity) 
                          VALUES ('$name', '$dosage', '$price', '$stock')");
        } elseif (isset($_POST['add_treatments'])) {
            $patient_id = $_POST['patient_id'];
            $doctor_id = $_POST['doctor_id'];
            $description = $_POST['treatment_description'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $conn->query("INSERT INTO Treatments (patient_id, doctor_id, treatment_description, start_date, end_date) 
                          VALUES ('$patient_id', '$doctor_id', '$description', '$start_date', '$end_date')");
        } elseif (isset($_POST['add_tests'])) {
            $patient_id = $_POST['patient_id'];
            $test_name = $_POST['test_name'];
            $date = $_POST['test_date'];
            $result = $_POST['result'];
            $conn->query("INSERT INTO LaboratoryTests (patient_id, test_name, test_date, result) 
                          VALUES ('$patient_id', '$test_name', '$date', '$result')");
        }








        echo "<script>window.location='dashboard.php';</script>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <h1>HOSPITAL MANGAMENT</h1>
    
    <?php
    // keys and value
    $tables = [
        'Departments' => ['department_name', 'floor_number'],
        'Doctors' => ['doctor_name', 'specialty', 'phone_number', 'email'],
        'Patients' => ['patient_name', 'age', 'gender', 'phone_number', 'address'],
        'Nurses' => ['nurse_name', 'phone_number', 'department_id'],
        'Appointments' => ['patient_id', 'doctor_id', 'appointment_date', 'appointment_time', 'status'],
        'Billing' => ['patient_id', 'bill_date', 'total_amount', 'payment_status'],
        'Rooms' => ['room_number', 'department_id', 'is_occupied'],
        'Medications' => ['medication_name', 'dosage', 'price', 'stock_quantity'],
        'Treatments' => ['patient_id', 'doctor_id', 'treatment_description', 'start_date', 'end_date'],
        'LaboratoryTests' => ['patient_id', 'test_name', 'test_date', 'result']
    ];

    foreach ($tables as $table => $fields) { //3adet 3la tabel tabel 3lshan a5od esm eltable
        echo "<h2>$table</h2><table><tr>";
        $result = $conn->query("SHOW COLUMNS FROM $table");
        while ($col = $result->fetch_assoc()) {
            echo "<th>{$col['Field']}</th>";
        }
        echo "</tr>";
        $result = $conn->query("SELECT * FROM $table"); //nafs elkalam k row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<form method='POST'>";

        foreach ($fields as $field) {
            echo "<input type='text' name='$field' placeholder='$field'>";
            //beta3t elzrayer
        }
        echo "<button type='submit' name='add_" . strtolower($table) . "'>Add</button>"; 
        echo "</form>";
    }
    ?>
    
</body>
</html> 


