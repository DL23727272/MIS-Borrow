$(document).ready(function () {
    $('#modalContainer').load('modal.html');

    // Function to update cart count in navbar
    function displayCartCount() {
        var itemCart = JSON.parse(localStorage.getItem("itemCart")) || [];
        $('#cartCount').text(itemCart.length);
        localStorage.setItem("cartCount", itemCart.length);
    }

    // Function to get student info from session storage
    function getStudentInfo() {
        return {
            userID: sessionStorage.getItem('userID'),
            studentName: sessionStorage.getItem('studentName')
        };
    }

    // Function to get cart items
    function getCartItems() {
        try {
            return JSON.parse(localStorage.getItem("itemCart")) || [];
        } catch (error) {
            console.error("Error parsing cart data:", error);
            return [];
        }
    }

    // Function to clear the cart after borrowing
    function clearCart() {
        localStorage.removeItem('itemCart');
        displayCartCount();
        displayCartItems();
    }

    // Function to display cart items in table
    function displayCartItems() {
        var cartItems = getCartItems();
        var cartTableBody = $("#cartTableBody");
        var totalItemsElement = $("#totalItems");
        var cartStatus = $("#cartStatus");

        cartTableBody.html(""); // Clear table
        var totalItems = 0;
        var tableContent = "";

        cartItems.forEach((item, index) => {
            tableContent += `
                <tr>
                    
                    <td>${item.name || "Unknown"}</td>
                    <td><button class='btn btn-outline-danger cancel-btn' data-index="${index}">Cancel</button></td>
                </tr>
            `;
            totalItems++;
        });

        cartTableBody.html(tableContent);
        totalItemsElement.text(totalItems);
        cartStatus.toggle(cartItems.length === 0);
    }

    // Function to remove item from cart
    function cancelItem(index) {
        let cartItems = getCartItems();

        if (index >= 0 && index < cartItems.length) {
            cartItems.splice(index, 1); // Remove item
            localStorage.setItem("itemCart", JSON.stringify(cartItems));
            displayCartItems();
            displayCartCount();

            Swal.fire({
                icon: 'success',
                title: 'Item canceled successfully!',
                showConfirmButton: false,
                timer: 1500
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Invalid item!',
                text: 'Item could not be found.'
            });
        }
    }

    // Attach event listener to cancel buttons (event delegation)
    $("#cartTableBody").on("click", ".cancel-btn", function () {
        var index = $(this).data("index");
        cancelItem(index);
    });

   // Borrow button click event
    $('#borrowButton').click(function () {
        var studentInfo = getStudentInfo();
        var studentID = studentInfo.userID;
        var books = getCartItems();

        if (!studentID) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Student ID not found!' });
            return;
        }

        if (books.length === 0) {
            Swal.fire({ icon: 'warning', title: 'Empty Cart', text: 'No items in cart.' });
            return;
        }

        sendBorrowRequest(studentID, books);
    });

    function sendBorrowRequest(userID, itemCart) {
        if (!Array.isArray(itemCart)) {
            console.error("❌ itemCart is not an array!", itemCart);
            return;
        }
    
        var requestData = {
            idNumber: userID,
            itemCart: itemCart.map(item => item.id) // Convert item objects to IDs
        };
    
        console.log("🚀 Sending Data to PHP:", requestData);
    
        $.ajax({
            type: 'POST',
            url: 'backend/borrowProcess.php',
            data: JSON.stringify(requestData),
            contentType: 'application/json',
            dataType: 'json', // Ensure the response is treated as JSON
            success: function (response) {
                console.log("✅ Response Received:", response);
    
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Borrow Successful!',
                        text: response.message,
                    }).then(() => {
                        clearCart(); // Clear the cart on success
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error || 'Something went wrong!',
                    });
                }
            },
            error: function (xhr) {
                console.error("❌ AJAX Error:", xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing the request.',
                });
            }
        });
    }

    // Initial cart display
    displayCartItems();
    displayCartCount();
});
