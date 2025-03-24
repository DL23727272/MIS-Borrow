<?php
header("Content-Type: application/json");
include '../backend/myConnection.php';

if (!isset($_GET['idNumber'])) {
    echo json_encode(["success" => false, "error" => "Missing idNumber."]);
    exit();
}

$idNumber = $_GET['idNumber'];

// Query to fetch borrowed items using idNumber
$query = "
    SELECT b.itemID, i.itemName, b.borrowDate, b.returnDate
    FROM BORROWED_ITEMS b
    JOIN items i ON b.itemID = i.itemID
    JOIN users u ON b.userID = u.userID
    WHERE u.idNumber = ?
";

$stmt = $con->prepare($query);
$stmt->bind_param("s", $idNumber);
$stmt->execute();
$result = $stmt->get_result();

$borrowedItems = [];
while ($row = $result->fetch_assoc()) {
    $borrowedItems[] = $row;
}

if (count($borrowedItems) > 0) {
    echo json_encode(["success" => true, "borrowedItems" => $borrowedItems]);
} else {
    echo json_encode(["success" => false, "error" => "No borrowed items found."]);
}

$stmt->close();
$con->close();
?>
