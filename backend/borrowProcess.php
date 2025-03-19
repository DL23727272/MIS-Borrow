<?php
header("Content-Type: application/json");
include '../backend/myConnection.php';

$jsonInput = file_get_contents("php://input");
$data = json_decode($jsonInput, true);

error_log("RAW JSON: $jsonInput");
error_log("PARSED DATA: " . print_r($data, true));

// Validate input
if (!isset($data['idNumber']) || !isset($data['itemCart']) || !is_array($data['itemCart'])) {
    echo json_encode(["success" => false, "error" => "Missing required data."]);
    exit();
}

$idNumber = $data['idNumber'];
$itemCart = $data['itemCart'];

// Find userID based on idNumber
$queryUser = "SELECT userID FROM users WHERE idNumber = ?";
$stmtUser = $con->prepare($queryUser);

if (!$stmtUser) {
    error_log("Error preparing queryUser: " . $con->error);
    echo json_encode(["success" => false, "error" => "Database error."]);
    exit();
}

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

// Process borrowing and update item status
$insertSuccess = true;

foreach ($itemCart as $itemID) {
    // Insert into borrowed_items table
    $query = "INSERT INTO borrowed_items (userID, itemID, borrowDate) VALUES (?, ?, NOW())";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ii", $userID, $itemID);
        if (!$stmt->execute()) {
            $insertSuccess = false;
            error_log("Insert Error for Item $itemID: " . $stmt->error);
        }
        $stmt->close();
    } else {
        $insertSuccess = false;
        error_log("Error preparing INSERT query: " . $con->error);
    }

    // Update itemStatus
    $updateQuery = "UPDATE items SET itemStatus = 'Borrowed' WHERE itemID = ?";
    $stmtUpdate = $con->prepare($updateQuery);

    if ($stmtUpdate) {
        $stmtUpdate->bind_param("i", $itemID);
        if (!$stmtUpdate->execute()) {
            $insertSuccess = false;
            error_log("Update Error for Item $itemID: " . $stmtUpdate->error);
        }
        $stmtUpdate->close();
    } else {
        $insertSuccess = false;
        error_log("Error preparing UPDATE query: " . $con->error);
    }
}

if ($insertSuccess) {
    echo json_encode(["success" => true, "message" => "Borrow request saved and items marked as borrowed."]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to save borrow request or update item status."]);
}

$con->close();
?>