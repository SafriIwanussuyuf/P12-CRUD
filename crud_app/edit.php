<?php
include 'db.php';

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $old_image = $_POST['old_image'];
    
    $new_image = $_FILES['image']['name'];

    $image_to_update = $old_image;
    if ($new_image != "") {

        $image_to_update = $new_image;
        $target = 'uploads/' . basename($new_image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

            if ($old_image != "" && file_exists('uploads/' . $old_image)) {
                unlink('uploads/' . $old_image);
            }
        } else {
            echo 'File upload failed!';
            exit;
        }
    }

    $sql = "UPDATE buku SET judul = ?, penerbit = ?, tahun_terbit = ?, image = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssssi", $judul, $penerbit, $tahun_terbit, $image_to_update, $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);

} else {

    $sql_select = "SELECT * FROM buku WHERE id = ?";
    $stmt_select = mysqli_prepare($conn, $sql_select);
    mysqli_stmt_bind_param($stmt_select, "i", $id);
    mysqli_stmt_execute($stmt_select);
    $result = mysqli_stmt_get_result($stmt_select);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Data tidak ditemukan!";
        exit;
    }
    mysqli_stmt_close($stmt_select);
}

?>

<form method='POST' enctype='multipart/form-data' action='edit.php?id=<?php echo $id; ?>'>
  
  <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
  <input type='hidden' name='old_image' value='<?php echo $row['image']; ?>'>

  Judul: <input type='text' name='judul' value='<?php echo $row['judul']; ?>' required><br>
  Penerbit: <input type='text' name='penerbit' value='<?php echo $row['penerbit']; ?>' required><br>
  Tahun terbit: <input type='text' name='tahun_terbit' value='<?php echo $row['tahun_terbit']; ?>' required><br>
  
  <p>Gambar Saat Ini:</p>
  <?php if ($row['image']): ?>
    <img src='uploads/<?php echo $row['image']; ?>' width='100'><br>
  <?php else: ?>
    <p>(Tidak ada gambar)</p>
  <?php endif; ?>
  
  Ganti Gambar (Opsional): <input type='file' name='image'><br>
  <br>
  
  <button type='submit' name='submit'>Update</button>
  <a href="index.php">Batal</a>
</form>