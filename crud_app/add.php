<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $image = $_FILES['image']['name'];
    $target = 'uploads/' . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO buku (judul, penerbit,tahun_terbit, image) VALUES ('$judul', '$penerbit','$tahun_terbit', '$image')";
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo 'File upload failed!';
    }
}
?>

<form method='POST' enctype='multipart/form-data'>
  Judul: <input type='text' name='judul' required><br>
  Penerbit: <input type='text'  name='penerbit' required><br>
  Tahun terbit: <input type='text'  name='tahun_terbit' required><br>
  Image: <input type='file' name='image' required><br>
  <button type='submit' name='submit'>Save</button>
</form>
