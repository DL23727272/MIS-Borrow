    document.addEventListener("DOMContentLoaded", function () {
        var studentID = sessionStorage.getItem('idNumber');
        var studentName = sessionStorage.getItem('studentName');
        var bookItems = JSON.parse(localStorage.getItem("bookItems")) || [];
        if (studentID) {
            document.getElementById('studentID').innerText = 'Student Name: ' + studentName;
            console.log('Customer ID ' + studentID);
            console.log('Customer Name ' + studentName);
            console.log(cartItems);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Access Denied',
                text: 'You are not logged in. Redirecting to login page...',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'index.php'; // Redirect to login page
            });
        }

        displayCartCount();
    });
  
     // ADD ITEM
    $(document).on('click', '#addItemButton', function () {
        console.log("Submit button clicked");

        var formData = new FormData();
        formData.append('itemName', $('#itemName').val());
        formData.append('itemDescription', $('#itemDescription').val());
        formData.append('itemStatus', $('#itemStatus').val());
        formData.append('image', $('#itemImage')[0].files[0]);

        console.log("Form data:", formData);

        $.ajax({
            type: 'POST',
            url: 'backend/addItems.php',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#addItemButton').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
            },
            success: function (response) {
                console.log("AJAX request successful");
                console.log("Response:", response);

                if (response.trim() === 'Item inserted successfully') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Item added successfully',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#addItemModal').modal('hide');
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to add item',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX request error:", xhr.responseText);
                alertify.error('Error: ' + xhr.responseText);
                $('#addItemButton').prop('disabled', false).html('Submit');
            }
        });
    });
    // END ADD ITEM


    // LOAD BOOKS
    function loadBooks() {
        $.ajax({
            url: 'backend/adminFetchBooks.php',
            success: function (data) {
                if (data.trim() === '') {
                    $('#bookContent').append('<div><p>NO PRODUCTS AVAILABLE</p></div>');
                } else {
                    $('#bookContent').append(data);
                }
            },
            error: function () {
                $('#bookContent').append('<div><p>Error loading products. Please try again later.</p></div>');
            }
        });
    }

    loadBooks();


    // EDIT ITEM
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.edit-item').forEach(button => {
            button.addEventListener('click', () => {
                const itemID = button.getAttribute('data-item-id');
                const itemName = button.getAttribute('data-item-name');
                const itemDescription = button.getAttribute('data-item-description');
                const itemStatus = button.getAttribute('data-item-status');

                document.getElementById('editItemID' + itemID).value = itemID;
                document.getElementById('editItemName' + itemID).value = itemName;
                document.getElementById('editItemDescription' + itemID).value = itemDescription;
                document.getElementById('editItemStatus' + itemID).value = itemStatus;
            });
        });

        $(document).on('submit', '.edit-item-form', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            var itemID = formData.get('editItemID');

            $.ajax({
                type: 'POST',
                url: 'backend/updateItem.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                        setTimeout(() => location.reload(), 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        });
                    }
                },
                error: function (xhr) {
                    console.error("Error:", xhr.responseText);
                }
            });
        });
    });

    // END EDIT ITEM

  
     // DELETE ITEM
    $(document).on('click', '.delete-item', function () {
        var itemID = $(this).data('item-id');

        // Confirm before deletion
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'backend/deleteItem.php',
                    data: { itemID: itemID },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                            });
                            setTimeout(() => location.reload(), 2000); 
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX request error:", xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while processing your request.',
                        });
                    }
                });
            }
        });
    });

    // END DELETE ITEM
