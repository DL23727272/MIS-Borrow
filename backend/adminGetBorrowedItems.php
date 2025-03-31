<?php
header("Content-Type: application/json");
include '../backend/myConnection.php';

// Query to fetch all borrowed items with user and item details
$query = "
    SELECT b.borrowID, b.itemID, i.itemName, u.fullName, b.borrowDate, b.returnDate
    FROM borrowed_items b
    JOIN items i ON b.itemID = i.itemID
    JOIN users u ON b.userID = u.userID
";

$result = $con->query($query);

$borrowedItems = [];
while ($row = $result->fetch_assoc()) {
    $borrowedItems[] = $row;
}

if (count($borrowedItems) > 0) {
    echo json_encode(["success" => true, "borrowedItems" => $borrowedItems]);
} else {
    echo json_encode(["success" => false, "error" => "No borrowed items found."]);
}

$con->close();
?>
