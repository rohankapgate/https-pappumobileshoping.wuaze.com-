<?php
session_start();
include('../config/dbcon.php');

if (isset($_POST['returnbutton'])) {
    $reason = $_POST['reason'];
    $price = $_POST['price'];
    $customername = $_POST['customername'];
    $orderdate = date('Y-m-d', strtotime($_POST['orderdate']));
    $warrenty = $_POST['warrenty'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Use placeholders in the prepared statement
    $stmt = $con->prepare("INSERT INTO `returndata` (reason, price, customername, orderdate, warrenty, address, contact) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        // Determine the correct data types
        // Example: If price and contact are integers, and others are strings:
        $stmt->bind_param("sissssi", $reason, $price, $customername, $orderdate, $warrenty, $address, $contact);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error in SQL query: " . $con->error;
    }
}


?>