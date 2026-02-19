<?php
// checkout.php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cart_data'])) {
    // Decode the cart JSON from POST
    $cart = json_decode($_POST['cart_data'], true);
} else {
    echo "Your cart is empty!";
    exit;
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout - Sportz Arena</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Russo+One&display=swap" rel="stylesheet">
<style>
body {
    margin:0;
    font-family:Montserrat;
    background:url("stadium.jpg") no-repeat center center/cover;
    color:white;
}
.overlay {
    background:rgba(0,0,0,0.75);
    min-height:100vh;
    padding:40px;
}
.header {
    font-family:'Russo One';
    font-size:40px;
    color:orange;
    margin-bottom:20px;
}
.bill-box {
    background:rgba(30,30,30,0.9);
    padding:30px;
    border-radius:15px;
    width:600px;
    margin:auto;
    box-shadow:0 0 15px orange;
}
table {
    width:100%;
    border-collapse:collapse;
}
th,td {
    padding:12px;
    border-bottom:1px solid gray;
}
th {
    color:orange;
}
.total {
    text-align:right;
    font-size:22px;
    margin-top:15px;
    color:orange;
}
.btn {
    width:48%;
    padding:15px;
    margin-top:20px;
    background:orange;
    border:none;
    font-size:18px;
    font-weight:bold;
    border-radius:10px;
    cursor:pointer;
    display:inline-block;
}
.btn + .btn {
    margin-left:4%;
}
@media print {
    body * {
        visibility: hidden;
    }
    .bill-box, .bill-box * {
        visibility: visible;
    }
    .bill-box {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        box-shadow: none;
    }
}
</style>
</head>

<body>
<div class="overlay">
<div class="header">Sportz Arena</div>

<div class="bill-box" id="bill-box">
<h2>Your Receipt</h2>
<table>
<tr>
<th>Item</th>
<th>Price</th>
</tr>

<?php foreach($cart as $item): ?>
<tr>
<td><?php echo htmlspecialchars($item['name']); ?></td>
<td>Rs. <?php echo intval($item['price']); ?></td>
</tr>
<?php $total += intval($item['price']); endforeach; ?>

</table>

<div class="total">
Total: Rs. <?php echo $total; ?>
</div>

<!-- Buttons: Back to Shop & Print Bill -->
<form action="webpage.php" method="get" style="display:inline-block;">
    <button type="submit" class="btn">Back to Shop</button>
</form>

<button class="btn" onclick="printBill()">Print Bill</button>

</div>
</div>

<script>
function printBill() {
    window.print();
}
</script>

</body>
</html>
