<?php
include '../backend/myConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemName = $_POST['itemName'];
    $itemDescription = $_POST['itemDescription'];
    $itemStatus = $_POST['itemStatus'];

    // Handle file upload
    $targetDir = "../uploads/";
    $itemImage = $_FILES['image']['name'];
    $targetFilePath = $targetDir . basename($itemImage);
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

    // Insert into database
    $query = "INSERT INTO items (itemName, itemDescription, itemStatus, itemImage) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssss", $itemName, $itemDescription, $itemStatus, $itemImage);

    if ($stmt->execute()) {
        echo "Item inserted successfully";
    } else {
        echo "Failed to insert item";
    }

    $stmt->close();
    $con->close();
}
?>
