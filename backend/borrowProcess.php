<?php
header("Content-Type: application/json");
include '../backend/myConnection.php'; // Ensure database connection is included

// Get raw JSON input
$jsonInput = file_get_contents("php://input");
$data = json_decode($jsonInput, true);

// Debugging: Log raw JSON and parsed array
file_put_contents('debug.log', "RAW JSON:\n$jsonInput\n\nPARSED DATA:\n" . print_r($data, true), FILE_APPEND);

// Validate input
if (!isset($data['idNumber']) || !isset($data['itemCart']) || !is_array($data['itemCart'])) {
    echo json_encode(["success" => false, "error" => "Missing required data."]);
    exit();
}

$idNumber = $data['idNumber'];
$itemCart = $data['itemCart']; // Array of item IDs

// Find the userID from the users table based on idNumber
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

// Insert borrow requests into BORROWED_ITEMS and update itemStatus
$insertSuccess = true;
foreach ($itemCart as $itemID) {
    // Insert into borrowed_items table
    $query = "INSERT INTO BORROWED_ITEMS (userID, itemID, borrowDate) VALUES (?, ?, NOW())";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ii", $userID, $itemID);
        if (!$stmt->execute()) {
            $insertSuccess = false;
        }
        $stmt->close();
    } else {
        $insertSuccess = false;
    }

    // Update itemStatus to "Borrowed"
    $updateQuery = "UPDATE items SET itemStatus = 'Borrowed' WHERE itemID = ?";
    $stmtUpdate = $con->prepare($updateQuery);

    if ($stmtUpdate) {
        $stmtUpdate->bind_param("i", $itemID);
        if (!$stmtUpdate->execute()) {
            $insertSuccess = false;
        }
        $stmtUpdate->close();
    } else {
        $insertSuccess = false;
    }
}

// Check if insertion and update were successful
if ($insertSuccess) {
    echo json_encode(["success" => true, "message" => "Borrow request saved and items marked as borrowed.", "idNumber" => $idNumber, "items" => $itemCart]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to save borrow request or update item status."]);
}

$con->close();
?>
