<!-- views/cart.php -->
<h1>Your Cart</h1>
<?php if (!empty($cartItems)): ?>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item->product_id); ?></td>
                <td><?php echo htmlspecialchars($item->quantity); ?></td>
                <td>
                    <a href="/cart/increase/<?php echo $item->user_id; ?>/<?php echo $item->product_id; ?>">Increase</a>
                    <a href="/cart/decrease/<?php echo $item->user_id; ?>/<?php echo $item->product_id; ?>">Decrease</a>
                    <a href="/cart/remove/<?php echo $item->user_id; ?>/<?php echo $item->product_id; ?>">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
