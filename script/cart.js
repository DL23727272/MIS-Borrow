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

    // Function to send borrow request
    function sendBorrowRequest(userID, itemCart) {
        if (!Array.isArray(itemCart)) {
            console.error("❌ itemCart is not an array!", itemCart);
            return;
        }

        var requestData = {
            idNumber: userID,
            itemCart: itemCart.map(item => item.id) // Extract only IDs
        };

        console.log("🚀 Sending Data to PHP:", requestData);

        $.ajax({
            type: 'POST',
            url: 'backend/borrowProcess.php',
            data: JSON.stringify(requestData),
            contentType: 'application/json',
            success: function (response) {
                console.log('✅ Borrow request successful:', response);
                clearCart();
            },
            error: function (xhr, status, error) {
                console.error('❌ Error sending borrow request:', error);
            }
        });
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
                    <td>${item.id || item.itemId}</td>
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

    // Initial cart display
    displayCartItems();
    displayCartCount();
});
