<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Keresés</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">
    <header>
        <h1>Könyv keresése szerző alapján</h1>
    </header>

    <form method="get" style="max-width:560px;margin:2rem auto;padding:2rem;background:var(--bg-surface);border-radius:16px;box-shadow:var(--shadow-md);border:1px solid var(--border);">
        <input type="text" name="szerzo" placeholder="Szerző neve..." value="<?=htmlspecialchars($_GET['szerzo']??'')?>" required style="width:100%;padding:.9rem 1rem;margin-bottom:1rem;border-radius:12px;border:1px solid var(--border);font:inherit;">
        <button type="submit" style="width:100%;padding:.9rem 1rem;background:linear-gradient(135deg,var(--accent),var(--accent-glow));color:white;border:none;border-radius:12px;font-weight:600;cursor:pointer;transition:var(--transition);">Keresés</button>
    </form>

    <?php if(isset($_GET['szerzo'])): 
        $szerzo = $conn->real_escape_string($_GET['szerzo']);
        $sql = "SELECT * FROM konyvek WHERE szerzo LIKE ? ORDER BY szerzo";
        $stmt = $conn->prepare($sql);
        $like = "%$szerzo%";
        $stmt->bind_param("s", $like);
        $stmt->execute();
        $result = $stmt->get_result();
    ?>
        <?php if($result->num_rows > 0): ?>
            <div style="margin:2rem;padding:1.5rem;background:var(--bg-surface);border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow-sm);">
                <ul style="list-style:none;padding:0;margin:0;">
                    <?php while($row = $result->fetch_assoc()): ?>
                        <li style="padding:.8rem 0;border-bottom:1px solid var(--border);font-size:.95rem;">
                            <strong><?=htmlspecialchars($row['cim'])?></strong> – 
                            <?=htmlspecialchars($row['szerzo'])?> (<?=$row['kiadas_eve']?>)
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php else: ?>
            <p style="text-align:center;color:#ef4444;font-weight:500;margin:2rem;">Nincs találat.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
