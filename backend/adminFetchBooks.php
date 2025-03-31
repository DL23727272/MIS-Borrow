<?php
include '../backend/myConnection.php';

$sql = "SELECT * FROM items";
$result = mysqli_query($con, $sql);

$productCount = 0;

echo '<div id="itemsContainer" class="row justify-content-center m-2">';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card mt-4 m-3 p-3 col-12 col-md-6 col-lg-3">';
    echo '<div class="d-flex justify-content-center">';
    echo '<img src="uploads/' . $row['itemImage'] . '" alt="Item Image" style="max-width: 100%; height: 200px; object-fit: cover; "/>';
    echo '</div>';
    echo '<hr class="border-success border-2"/>';
    echo '<div>';
    echo '<h4 class="card-title" id="name' . $row['itemID'] . '">' . $row['itemName'] . '</h4>';
    echo '<p class="card-text text-secondary" id="itemDescription">' . $row['itemDescription'] . '</p>';
    echo '<p class="card-text text-secondary" id="itemStatus">' . $row['itemStatus'] . '</p>';
    echo '</div>';

    echo '<button class="btn btn-secondary edit-item" 
            data-item-id="' . $row['itemID'] . '" 
            data-item-name="' . $row['itemName'] . '" 
            data-item-description="' . $row['itemDescription'] . '" 
            data-item-status="' . $row['itemStatus'] . '" 
            data-item-image="' . $row['itemImage'] . '" 
            data-bs-toggle="modal" data-bs-target="#editItemModal' . $row['itemID'] . '">
            Edit
          </button>';
    echo '<button class="btn btn-danger delete-item mt-3" data-item-id="' . $row['itemID'] . '">Delete</button>';

    // Modal
    echo '<div class="modal fade" id="editItemModal' . $row['itemID'] . '" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">';
    echo '    <div class="modal-dialog modal-dialog-centered" role="document">';
    echo '        <div class="modal-content" style="background: rgba(255, 255, 255, 0.449); backdrop-filter: blur(10px);">';
    echo '            <div class="modal-header custom-modal">';
    echo '                <div class="col-sm">';
    echo '                    <img src="img/logo.png" alt="" style="width: 70px;">';
    echo '                </div>';
    echo '                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '            </div>';
    echo '            <div class="container align-items-center justify-content-center">';
    echo '                <div class="row">';
    echo '                    <div class="col-sm content">';
    echo '                        <div class="w-100"></div>';
    echo '                        <br>';
    echo '                        <div class="col-sm">';
    echo '                            <h1 class="font-weight-bold text-light" style="font-size: 20px;">Edit Item</h1>';
    echo '                        </div>';
    echo '                        <br>';
    echo '                        <form enctype="multipart/form-data" id="editItemForm' . $row['itemID'] . '" class="edit-item-form">';
    echo '                            <input type="hidden" name="editItemID" id="editItemID' . $row['itemID'] . '" value="' . $row['itemID'] . '">';
    echo '                            <div class="form-group my-2">';
    echo '                                <input type="text" name="editItemName" id="editItemName' . $row['itemID'] . '" placeholder="Enter Item Name" class="form-control" value="' . $row['itemName'] . '" required>';
    echo '                            </div>';
    echo '                            <div class="form-group my-2">';
    echo '                                <textarea name="editItemDescription" id="editItemDescription' . $row['itemID'] . '" placeholder="Enter Item Description" class="form-control" required>' . $row['itemDescription'] . '</textarea>';
    echo '                            </div>';
    echo '                            <div class="form-group my-2">';
    echo '                                <select name="editItemStatus" id="editItemStatus' . $row['itemID'] . '" class="form-control" required>';
    echo '                                    <option value="Available"' . ($row['itemStatus'] == 'Available' ? ' selected' : '') . '>Available</option>';
    echo '                                    <option value="Borrowed"' . ($row['itemStatus'] == 'Borrowed' ? ' selected' : '') . '>Borrowed</option>';
    echo '                                </select>';
    echo '                            </div>';
    echo '                            <div class="form-group my-2">';
    echo '                                <input type="file" name="image" id="editItemImage' . $row['itemID'] . '" class="form-control">';
    echo '                            </div>';
    echo '                            <div class="form-group row justify-content-end">';
    echo '                                <div class="col-auto">';
    echo '                                    <button type="submit" id="editItemButton' . $row['itemID'] . '" class="btn btn-outline-light">Save Changes</button>';
    echo '                                </div>';
    echo '                            </div>';
    echo '                        </form>';
    echo '                        <br>';
    echo '                        <br>';
    echo '                    </div>';
    echo '                </div>';
    echo '            </div>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';

    echo '</div>';

    $productCount++;
    if ($productCount % 3 == 0) {
        echo '</div><div class="row justify-content-center m-2">';
    }
}

if ($productCount % 3 != 0) {
    echo '</div>';
}
?>
