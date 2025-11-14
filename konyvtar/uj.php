<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cim = $_POST['cim'];
    $szerzo = $_POST['szerzo'];
    $ev = $_POST['ev'];

    $stmt = $conn->prepare("INSERT INTO konyvek (cim, szerzo, kiadas_eve) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $cim, $szerzo, $ev);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="hu">
<head><meta charset="UTF-8"><title>Új könyv</title></head>
<body>
<h1>Új könyv hozzáadása</h1>
<form method="post">
    Cím: <input type="text" name="cim" required><br>
    Szerző: <input type="text" name="szerzo" required><br>
    Kiadás éve: <input type="number" name="ev" min="1000" max="2025" required><br>
    <button type="submit">Mentés</button>
</form>
</body>
</html>
