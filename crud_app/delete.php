<?php
require "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_select = "SELECT image FROM buku WHERE id = ?";
    $stmt_select = mysqli_prepare($conn, $sql_select);
    mysqli_stmt_bind_param($stmt_select, "i", $id);
    mysqli_stmt_execute($stmt_select);
    $result = mysqli_stmt_get_result($stmt_select);
    $row = mysqli_fetch_assoc($result);
    
    $image_name = '';
    if ($row) {
        $image_name = $row['image'];
    }
    mysqli_stmt_close($stmt_select);

    $sql_delete = "DELETE FROM buku WHERE id = ?";
    $stmt_delete = mysqli_prepare($conn, $sql_delete);
    mysqli_stmt_bind_param($stmt_delete, "i", $id);
    
    if (mysqli_stmt_execute($stmt_delete)) {
        if (!empty($image_name)) {
            $file_path = 'uploads/' . $image_name;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    } else {
        echo "Error: Gagal menghapus data. " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt_delete);
}

header("Location: index.php");
exit;
?>