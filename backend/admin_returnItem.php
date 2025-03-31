<?php
header("Content-Type: application/json");
include '../backend/myConnection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['itemID']) || !isset($data['borrowID'])) {
    echo json_encode(["success" => false, "error" => "Invalid request data."]);
    exit();
}

$itemID = $data['itemID'];
$borrowID = $data['borrowID'];

// Update borrowed_items and set returnDate to current date
$query = "UPDATE borrowed_items SET returnDate = NOW() WHERE borrowID = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $borrowID);

if ($stmt->execute()) {
    // Mark the item as available again in items table
    $updateItem = "UPDATE items SET itemStatus = 'Available' WHERE itemID = ?";
    $itemStmt = $con->prepare($updateItem);
    $itemStmt->bind_param("i", $itemID);
    $itemStmt->execute();
    
    echo json_encode(["success" => true, "message" => "Item returned successfully."]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to return item."]);
}

$stmt->close();
$con->close();
?>
