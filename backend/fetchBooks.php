<?php

include '../backend/myConnection.php';

$sql = "SELECT * FROM items";
$result = mysqli_query($con, $sql);

$itemCount = 0;

echo '<div class="row justify-content-center m-2">';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card mt-4 m-3 p-3 col-12 col-md-6 col-lg-3">';
    echo '<div class="d-flex justify-content-center">';
    echo '<img src="./uploads/'. $row['itemImage'] .'" alt="Item Image" style="max-width: 100%; height: 200px; object-fit: cover; "/>';
    echo '</div>';
    echo '<hr class="border-success border-2"/>';
    echo '<div>';
    echo '<h4 class="card-title" id="name'. $row['itemID'] .'">'. $row['itemName'] .'</h4>';
    echo '<p class="card-text text-secondary" id="itemDescription">'. $row['itemDescription'] .'</p>';
    echo '<p class="card-text text-secondary" id="itemStatus">'. $row['itemStatus'] .'</p>';
    echo '</div>';
    
    // Borrow button only if the item is available
    if ($row['itemStatus'] == 'Available') {
        echo '<button class="btn btn-primary borrow-item" data-item-id="'. $row['itemID'] .'" data-item-name="'. $row['itemName'] .'">Borrow</button>';
    }
    
    echo '</div>';

    $itemCount++;

    if ($itemCount % 3 == 0) {
        echo '</div>'; 
        echo '<div class="row justify-content-center m-2">'; 
    }
}

if ($itemCount % 3 != 0) {
    echo '</div>';
}
?>
