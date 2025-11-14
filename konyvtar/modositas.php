<?php include 'db.php'; ?>
<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = $conn->query("SELECT * FROM konyvek WHERE id = $id");
    $konyv = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST['id'];
    $cim = $_POST['cim'];
    $szerzo = $_POST['szerzo'];
    $ev = $_POST['ev'];

    $stmt = $conn->prepare("UPDATE konyvek SET cim=?, szerzo=?, kiadas_eve=? WHERE id=?");
    $stmt->bind_param("ssii", $cim, $szerzo, $ev, $id);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="hu">
<head><meta charset="UTF-8"><title>Módosítás</title></head>
<body>
<h1>Könyv módosítása</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $konyv['id'] ?>">
    Cím: <input type="text" name="cim" value="<?= $konyv['cim'] ?>" required><br>
    Szerző: <input type="text" name="szerzo" value="<?= $konyv['szerzo'] ?>" required><br>
    Kiadás éve: <input type="number" name="ev" value="<?= $konyv['kiadas_eve'] ?>" required><br>
    <button type="submit">Mentés</button>
</form>
</body>
</html>