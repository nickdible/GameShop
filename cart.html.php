<?php include_once 'helpers.inc.php'; ?>
<h1>Your Shopping Cart</h1>
<?php if (count($cart) > 0): ?>
<table>
<thead>
<tr> <th>Title</th> <th>Price</th> <th>Image</th> </tr>
</thead>
<tfoot>
<tr>
<td>Total:</td>
<td>$<?php echo number_format($total, 2); ?></td>
</tr>
</tfoot>
<tbody>
<?php foreach ($cart as $item): ?>
<tr><td><?php htmlout($item['title']); ?></td> <td>$<?php echo number_format($item['price'], 2); ?> </td>
<td>
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['imageData']); ?>" width="100" height="100" />
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<p>Your cart is empty!</p>
<?php endif; ?>
<form action="?" method="post">
<p> <a href="?">Continue shopping</a> or <input type="submit" name="action" value="Empty cart"> </p>
<p><input type="submit" name="action" value="Checkout"></p>
</form>