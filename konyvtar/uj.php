<?php include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cim = trim($_POST['cim']);
    $szerzo = trim($_POST['szerzo']);
    $ev = (int)$_POST['ev'];
    $stmt = $conn->prepare("INSERT INTO konyvek (cim, szerzo, kiadas_eve) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $cim, $szerzo, $ev);
    $stmt->execute();
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Új könyv</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">
    <header>
        <h1>Új könyv hozzáadása</h1>
    </header>

    <?php if(isset($success)): ?>
        <p style="text-align:center;color:#22c55e;font-weight:600;margin:1.5rem 0;">Könyv sikeresen hozzáadva!</p>
    <?php endif; ?>

    <form method="post" style="max-width:560px;margin:2rem auto;padding:2rem;background:var(--bg-surface);border-radius:16px;box-shadow:var(--shadow-md);border:1px solid var(--border);">
        <input type="text" name="cim" placeholder="Cím" required style="width:100%;padding:.9rem 1rem;margin-bottom:1rem;border-radius:12px;border:1px solid var(--border);font:inherit;">
        <input type="text" name="szerzo" placeholder="Szerző" required style="width:100%;padding:.9rem 1rem;margin-bottom:1rem;border-radius:12px;border:1px solid var(--border);font:inherit;">
        <input type="number" name="ev" placeholder="Kiadás éve" min="1000" max="2030" required style="width:100%;padding:.9rem 1rem;margin-bottom:1rem;border-radius:12px;border:1px solid var(--border);font:inherit;">
        <button type="submit" style="width:100%;padding:.9rem 1rem;background:linear-gradient(135deg,var(--accent),var(--accent-glow));color:white;border:none;border-radius:12px;font-weight:600;cursor:pointer;transition:var(--transition);">Mentés</button>
    </form>
</div>

</body>
</html>
