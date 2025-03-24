<?php
header("Content-Type: application/json");
include '../backend/myConnection.php';

// Get raw JSON input
$jsonInput = file_get_contents("php://input");
$data = json_decode($jsonInput, true);

if (!isset($data['itemID']) || !isset($data['idNumber'])) {
    echo json_encode(["success" => false, "error" => "Invalid data provided."]);
    exit();
}

$itemID = $data['itemID'];
$idNumber = $data['idNumber'];

// Find the userID using idNumber
$queryUser = "SELECT userID FROM users WHERE idNumber = ?";
$stmtUser = $con->prepare($queryUser);
$stmtUser->bind_param("s", $idNumber);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();

if ($resultUser->num_rows == 0) {
    echo json_encode(["success" => false, "error" => "User not found."]);
    exit();
}

$userRow = $resultUser->fetch_assoc();
$userID = $userRow['userID'];
$stmtUser->close();

// Check if the item is already returned
$queryCheck = "SELECT returnDate FROM BORROWED_ITEMS WHERE itemID = ? AND userID = ? AND returnDate IS NULL";
$stmtCheck = $con->prepare($queryCheck);
$stmtCheck->bind_param("ii", $itemID, $userID);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows === 0) {
    echo json_encode(["success" => false, "error" => "Item already returned or not found."]);
    exit();
}
$stmtCheck->close();

// Mark the item as returned and update the status to 'Available'
$queryReturn = "UPDATE BORROWED_ITEMS SET returnDate = NOW() WHERE itemID = ? AND userID = ?";
$stmtReturn = $con->prepare($queryReturn);
$stmtReturn->bind_param("ii", $itemID, $userID);

$queryUpdateStatus = "UPDATE items SET itemStatus = 'Available' WHERE itemID = ?";
$stmtUpdateStatus = $con->prepare($queryUpdateStatus);
$stmtUpdateStatus->bind_param("i", $itemID);

if ($stmtReturn->execute() && $stmtUpdateStatus->execute()) {
    echo json_encode(["success" => true, "message" => "Item returned and marked as Available."]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to return item or update status."]);
}

$stmtReturn->close();
$stmtUpdateStatus->close();
$con->close();
?>
