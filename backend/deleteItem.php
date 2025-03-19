<?php
include '../backend/myConnection.php';
header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemID'])) {
    $itemID = $_POST['itemID'];

    // Delete query for items_table
    $sql = "DELETE FROM items WHERE itemID = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $itemID);
        if (mysqli_stmt_execute($stmt)) {
            $response['success'] = true;
            $response['message'] = "Item deleted successfully";
        } else {
            $response['success'] = false;
            $response['message'] = "Error deleting item: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    } else {
        $response['success'] = false;
        $response['message'] = "Failed to prepare the statement.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request";
}

echo json_encode($response);
mysqli_close($con);
?>
