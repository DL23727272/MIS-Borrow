$(document).ready(function () {
    const idNumber = sessionStorage.getItem('idNumber');

    if (!idNumber) {
        Swal.fire('Error', 'User ID not found. Please log in.', 'error');
        return;
    }

    fetchBorrowedItems(idNumber);
});

function fetchBorrowedItems(idNumber) {
    $.ajax({
        type: 'GET',
        url: 'backend/getBorrowedItems.php',
        data: { idNumber },
        dataType: 'json',
        success: function (response) {
            const tableBody = $('#borrowedTableBody');
            tableBody.empty();

            if (response.success) {
                // Sort to move 'Not Returned' items to the top
                response.borrowedItems.sort((a, b) => {
                    const returnA = a.returnDate ? 1 : 0;
                    const returnB = b.returnDate ? 1 : 0;
                    return returnA - returnB; // Not Returned comes first
                });

                response.borrowedItems.forEach(item => {
                    const returnDate = item.returnDate || "Not Returned";
                    const returnButton = returnDate === "Not Returned"
                        ? `<button class="btn btn-warning btn-sm return-btn" data-itemid="${item.itemID}">Return</button>`
                        : 'Returned';

                    tableBody.append(`
                        <tr>
                            <td>${item.itemName}</td>
                            <td>${item.borrowDate}</td>
                            <td>${returnDate}</td>
                            <td>${returnButton}</td>
                        </tr>
                    `);
                });
                
            } else {
                tableBody.append('<tr><td colspan="4">No items borrowed.</td></tr>');
            }
        },
        error: function () {
            Swal.fire('Error', 'Failed to fetch borrowed items.', 'error');
        }
    });
}



$(document).on('click', '.return-btn', function() {
    const itemID = $(this).data('itemid');
    const idNumber = sessionStorage.getItem('idNumber');

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
                url: 'backend/returnItem.php',
                data: JSON.stringify({ itemID, idNumber }),
                contentType: 'application/json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire('Returned!', response.message, 'success');
                        fetchBorrowedItems(idNumber); // Refresh the table
                    } else {
                        Swal.fire('Error', response.error, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Failed to process the return request.', 'error');
                }
            });
        }
    });
});
