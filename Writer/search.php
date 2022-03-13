<?php
include '../config.php';

   if (isset($_POST['search'])) {
      $Name = $_POST['search'];

      $Query = "SELECT * FROM details WHERE title LIKE '%$Name%' OR genre LIKE '%$Name%' OR authorUsername LIKE '%$Name%'OR rating LIKE '%$Name%'";
      $ExecQuery = mysqli_query($conn, $Query);
      echo '<ul>';
      while ($Result = mysqli_fetch_array($ExecQuery)) {?>
      <li class="list">
      <a>
          <?php echo $Result['title']; ?>
      </a></li>
      <?php
   }}
   ?>
   </ul>

