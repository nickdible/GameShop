<?php include_once 'helpers.inc.php'; ?>
<div style="overflow-x: hidden; overflow-y: auto;">
<table border="1" id="catalogTable">
<thead>
<tr> <th>Title</th><th>Genre</th><th>Rating</th><th>System</th><th>Price</th><th>Image</th> </tr>
</thead>
<tbody>
<?php foreach ($items as $item): ?>
<tr> <td><?php htmlout($item['title']); ?></td><td><?php htmlout($item['genre']); ?></td><td><?php htmlout($item['rating']); ?></td><td><?php htmlout($item['console']); ?></td><td>$<?php echo number_format($item['price'], 2); ?></td>
<td style="width: 25%">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['imageData']); ?>" class="posterImg"/>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>