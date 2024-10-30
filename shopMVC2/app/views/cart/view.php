<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <script>
        function autoSubmit(form) {
            // Automatically submit the form when quantity changes
            form.submit();
        }
    </script>
</head>

<body>
    <h1>Your Shopping Cart</h1>
    <?php if (!empty($data['cartItems'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['cartItems'] as $id => $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td>
                            <form action="<?php echo URLROOT; ?>/carts/update/<?php echo $id; ?>" method="POST">
                                <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="0" required onchange="autoSubmit(this.form)">
                            </form>
                        </td>
                        <td><?php echo htmlspecialchars($item['price']); ?></td>
                        <td>
                            <a href="<?php echo URLROOT; ?>/carts/remove/<?php echo $id; ?>" 
                               onclick="return confirm('Are you sure you want to remove this item?');">
                                Remove
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total Items: <?php echo htmlspecialchars($data['totalItems']); ?></p>
        <p>Total Price: <?php echo htmlspecialchars($data['totalPrice']); ?></p>

        <!-- Buttons for navigation -->
        <a href="<?php echo URLROOT; ?>/products" style="text-decoration: none;">
            <button>Back to Products</button>
        </a>
        <a href="<?php echo URLROOT; ?>/checkout" style="text-decoration: none;">
            <button>Proceed to Checkout</button>
        </a>
    <?php else: ?>
        <p>Your cart is empty.</p>
        <a href="<?php echo URLROOT; ?>/products" style="text-decoration: none;">
            <button>Back to Products</button>
        </a>
    <?php endif; ?>
</body>
</html>
