<?php
include 'db.php';

// Search
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Count total records
$countSql = "SELECT COUNT(*) AS total FROM buku WHERE judul LIKE '%$search%'";
$countResult = mysqli_query($conn, $countSql);
$countRow = mysqli_fetch_assoc($countResult);
$total = $countRow['total'];
$pages = ceil($total / $limit);

// Fetch records
$sql = "SELECT * FROM buku WHERE judul LIKE '%$search%' LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);
?>

<form method='GET'>
  <input type='text' name='search' placeholder='Search by name...' value='<?php echo $search; ?>'>
  <button type='submit'>Search</button>
</form>

<a href='add.php'>+ Tambah buku baru</a>

<table border='1' cellpadding='10'>
  <tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Penerbit</th>
    <th>Tahun_terbit</th>
    <th>Image</th>
    <th>Action</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['judul']; ?></td>
    <td><?php echo $row['penerbit']; ?></td>
    <td><?php echo $row['tahun_terbit']; ?></td>
    <td><img src='uploads/<?php echo $row['image']; ?>' width='80'></td>
    <td>
      <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a> |
      <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
    </td>
  </tr>
  <?php } ?>
</table>

<?php for ($i = 1; $i <= $pages; $i++) { ?>
  <a href='?page=<?php echo $i; ?>&search=<?php echo $search; ?>'><?php echo $i; ?></a>
<?php } ?>
