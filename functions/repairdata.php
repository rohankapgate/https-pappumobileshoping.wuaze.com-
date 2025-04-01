<?php
session_start();
include('../config/dbcon.php');



if (isset($_POST['repairbutton'])) {
    $productDefect = $_POST['productDefect'];
    $customerName = $_POST['customerName'];
    $contactNo = $_POST['contactNo'];
    $defectDescription = $_POST['defectDescription'];
    $address = $_POST['address'];

    // File upload handling
    $productImage = $_FILES['productImage'];
    $path = "../repairingimage/";

    if ($productImage['error'] === UPLOAD_ERR_OK) { // Check for upload errors
        $image_ext = pathinfo($productImage['name'], PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_ext;
        $destination = $path . $filename;

        if (move_uploaded_file($productImage['tmp_name'], $destination)) {
            // File upload successful, store the path in the database
            $stmt = $con->prepare("INSERT INTO repair (productDefect, customerName, contactNo, productImage, defectDescription, address) VALUES (?, ?, ?, ?, ?, ?)");

            if ($stmt) {
                $stmt->bind_param("ssisss", $productDefect, $customerName, $contactNo, $destination, $defectDescription, $address); //store destination

                if ($stmt->execute()) {
                    echo "Repair form submitted successfully";
                } else {
                    echo "Error submitting repair form: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error preparing statement: " . $con->error;
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "File upload error: " . $productImage['error'];
    }
}


?>