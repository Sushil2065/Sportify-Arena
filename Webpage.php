<?php
require("connection.php");
$sql = "SELECT * FROM items";
$records = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Russo+One&display=swap" rel="stylesheet">
    <title>Sportify Arena</title>
</head>

<body>

<div id="Containeer">

    <div id="Header">
        <h1>Sportify Arena</h1>
    </div>

    <div id="Body">

        <!-- ITEMS SECTION -->
        <div id="Items">

            <?php while ($row = mysqli_fetch_assoc($records)) { ?>
            <div class="SportItems">

                <div class="card-image">
                    <!-- placeholder image -->
                    <img src="placeholder.jpg">
                </div>

                <h3><?php echo $row['ItemName']; ?></h3><br>
                <h4>Brand: <?php echo $row['Brand']; ?></h4>

                <p class="price" data-price="<?php echo $row['ItemPrice']; ?>">
                    Rs. <?php echo $row['ItemPrice']; ?>
                </p>

                <button class="add-btn">Add to Cart</button>

            </div>
            <?php } ?>

        </div>

        <!-- CART SECTION -->
        <div id="Livecart">

            <div class="cart-header">
                <h2>Your Cart</h2>
                <span id="cart-count">0 Items</span>
            </div>

            <div class="cart-items-container">
                <p class="empty-msg">Your cart is empty. <br>Start recruiting!</p>
            </div>

            <div class="cart-footer">
                <div class="total-row">
                    <span>Total</span>
                    <span id="cart-total">Rs. 0</span>
                </div>
                <button class="checkout-btn">Checkout</button>
            </div>

        </div>

    </div>
</div>

<!-- CART SCRIPT -->
<script>
let total = 0;
let count = 0;

const cartContainer = document.querySelector(".cart-items-container");
const totalSpan = document.getElementById("cart-total");
const countSpan = document.getElementById("cart-count");
const emptyMsg = document.querySelector(".empty-msg");

document.querySelectorAll(".add-btn").forEach(btn => {
    btn.addEventListener("click", () => {

        const card = btn.parentElement;
        const name = card.querySelector("h3").innerText;
        const price = parseInt(card.querySelector(".price").dataset.price);

        if (emptyMsg) emptyMsg.style.display = "none";

        const cartItem = document.createElement("div");
        cartItem.className = "cart-item";
        cartItem.innerHTML = `<span>${name}</span><span>Rs. ${price}</span>`;

        cartContainer.appendChild(cartItem);

        total += price;
        count++;

        totalSpan.innerText = "Rs. " + total;
        countSpan.innerText = count + " Items";
    });
});
</script>

</body>
</html>
