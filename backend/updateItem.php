<?php
include '../backend/myConnection.php';
header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $_POST['editItemID'];
    $itemName = $_POST['editItemName'];
    $itemDescription = $_POST['editItemDescription'];
    $itemStatus = $_POST['editItemStatus'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Handle image upload
        $image = $_FILES['image']['name'];
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $newImageName = uniqid('item_', true) . '.' . $extension;
        $uploadPath = "../uploads/" . $newImageName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
            $sql = "UPDATE items SET 
                    itemName = ?, 
                    itemDescription = ?, 
                    itemStatus = ?, 
                    itemImage = ?
                    WHERE itemID = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssi", $itemName, $itemDescription, $itemStatus, $newImageName, $itemID);
        } else {
            $response['success'] = false;
            $response['message'] = "Error uploading image.";
            echo json_encode($response);
            exit();
        }
    } else {
        // Update without image change
        $sql = "UPDATE items SET 
                itemName = ?, 
                itemDescription = ?, 
                itemStatus = ?
                WHERE itemID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssi", $itemName, $itemDescription, $itemStatus, $itemID);
    }

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Item updated successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error updating item: " . $stmt->error;
    }

    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request!";
}

echo json_encode($response);
$con->close();
?>
