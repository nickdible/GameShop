<?php include_once 'helpers.inc.php'; ?>
<p>Your shopping cart contains <?php
echo count($_SESSION['cart']); ?> items.</p>
<p><a href="?cart">View your cart</a></p>
<p>Click on the table headings to sort by different parameters (title, genre, price, console, or rating). Click on the same heading again to change the sorting direction (ascending or descending).</p>
<input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search for games..">
<div style="overflow-x: hidden; overflow-y: auto;">
<table border="1" id="catalogTable">
<thead>
<tr> <th onclick="sortTable(0)">Title</th><th onclick="sortTable(1)">Genre</th><th onclick="sortTable(2)">Rating</th><th onclick="sortTable(3)">System</th><th onclick="sortTable(4)">Price</th><th>Image</th> </tr>
</thead>
<tbody>
<?php foreach ($items as $item): ?>
<tr> <td><?php htmlout($item['title']); ?></td><td><?php htmlout($item['genre']); ?></td><td><?php htmlout($item['rating']); ?></td><td><?php htmlout($item['console']); ?></td><td>$<?php echo number_format($item['price'], 2); ?></td>
<td style="width: 25%;">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['imageData']); ?>" class="posterImg"/>
</td>
<td>
<form action="" method="post">
<div>
<input type="hidden" name="id" value="<?php htmlout($item['id']); ?>">
<input type="submit" name="action" value="Buy">
</div>
</form>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("catalogTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function filterTable() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("catalogTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>