<?php include 'db.php'; ?>
<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM konyvek WHERE id = $id");
}
header("Location: index.php");
?>