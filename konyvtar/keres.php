<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="hu">
<head><meta charset="UTF-8"><title>Keresés</title></head>
<body>
<h1>Könyv keresése szerző alapján</h1>
<form method="get">
    Szerző neve: <input type="text" name="szerzo">
    <button type="submit">Keresés</button>
</form>
<?php
if (isset($_GET['szerzo'])) {
    $szerzo = $conn->real_escape_string($_GET['szerzo']);
    $sql = "SELECT * FROM konyvek WHERE szerzo LIKE '%$szerzo%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['cim']} – {$row['szerzo']} ({$row['kiadas_eve']})</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nincs találat.</p>";
    }
}
?>
</body>
</html>
