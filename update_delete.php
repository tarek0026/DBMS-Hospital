<?php
// Include the database connection file
include 'db.php';

// Retrieve: Fetch all patients
$retrieve_sql = "SELECT * FROM Patients";
$result = $conn->query($retrieve_sql);

if ($result->num_rows > 0) {
    echo "<h2>Patients List:</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['patient_id'] . "</td>
                <td>" . $row['patient_name'] . "</td>
                <td>" . $row['age'] . "</td>
                <td>" . $row['phone_number'] . "</td>
                <td>" . $row['address'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No patients found.<br>";
}

// Update: Update a patient's phone number by ID
$update_sql = "UPDATE Patients SET phone_number = '01098765432' WHERE patient_id = 2";

if ($conn->query($update_sql) === TRUE) {
    echo "Patient's phone number updated successfully.<br>";
} else {
    echo "Error updating record: " . $conn->error . "<br>";
}

// Delete: Delete a patient by ID
$delete_sql = "DELETE FROM Patients WHERE patient_id = 3";

if ($conn->query($delete_sql) === TRUE) {
    echo "Patient deleted successfully.<br>";
} else {
    echo "Error deleting record: " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
