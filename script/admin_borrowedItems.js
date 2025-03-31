$(document).ready(function () {
    const idNumber = sessionStorage.getItem('idNumber');

    if (!idNumber) {
        Swal.fire('Error', 'User ID not found. Please log in.', 'error');
        return;
    }

    fetchBorrowedItemsForAdmin();
});

function fetchBorrowedItemsForAdmin() {
    $.ajax({
        type: 'GET',
        url: 'backend/adminGetBorrowedItems.php',
        dataType: 'json',
        success: function (response) {
            const tableBody = $('#borrowedTableBody');
            tableBody.empty();

            if (response.success) {
                response.borrowedItems.forEach(item => {
                    const returnDate = item.returnDate || "Not Returned";
                    const returnButton = returnDate === "Not Returned"
                        ? `<button class="btn btn-warning btn-sm return-btn" data-itemid="${item.itemID}" data-borrowid="${item.borrowID}">Return</button>`
                        : 'Returned';

                    tableBody.append(`
                        <tr>
                            <td>${item.itemName}</td>
                            <td>${item.fullName}</td>
                            <td>${item.borrowDate}</td>
                            <td>${returnDate}</td>
                            <td>${returnButton}</td>
                        </tr>
                    `);
                });

            } else {
                tableBody.append('<tr><td colspan="5">No borrowed items found.</td></tr>');
            }
        },
        error: function () {
            Swal.fire('Error', 'Failed to fetch borrowed items.', 'error');
        }
    });
}




$(document).on('click', '.return-btn', function() {
    const itemID = $(this).data('itemid');
    const borrowID = $(this).data('borrowid');

    if (!itemID || !borrowID) {
        Swal.fire('Error', 'Missing item ID or borrow ID.', 'error');
        return;
    }

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to return this item?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, return it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'backend/admin_returnItem.php',
                data: JSON.stringify({ itemID, borrowID }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire('Returned!', response.message, 'success');
                        fetchBorrowedItemsForAdmin(); // Refresh table
                    } else {
                        Swal.fire('Error', response.error, 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Failed to process the return request.', 'error');
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
