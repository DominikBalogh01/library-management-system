<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Könyvtár</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Könyvek listája</h1>
    <nav>
        <a href="uj.php">Új könyv hozzáadása</a> |
        <a href="keres.php">Keresés</a>
    </nav>
    <table>
        <tr><th>Cím</th><th>Szerző</th><th>Kiadás éve</th><th>Műveletek</th></tr>
        <?php
        $sql = "SELECT * FROM konyvek";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['cim']}</td>
                <td>{$row['szerzo']}</td>
                <td>{$row['kiadas_eve']}</td>
                <td>
                    <a href='modositas.php?id={$row['id']}'>Módosít</a> |
                    <a href='torles.php?id={$row['id']}'>Töröl</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>