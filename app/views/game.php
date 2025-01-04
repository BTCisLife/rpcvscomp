<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rock Paper Scissors</title>
    <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="game-bg">
    <h1>Rock Paper Scissors</h1>

    <?php if (!empty($_SESSION['user_id'])): ?>
        <p>Logged in as: <?= htmlspecialchars($_SESSION['user_id'], ENT_QUOTES) ?></p>
        <p><a href="index.php?controller=user&action=logout">Logout</a></p>
    <?php else: ?>
        <p>
            <a href="index.php?controller=user&action=login">Login</a> | 
            <a href="index.php?controller=user&action=register">Register</a>
        </p>
    <?php endif; ?>

    <p>
        <a href="index.php?controller=game&action=rules">View Rules</a>
    </p>

    <form id="gameForm">
        <button type="button" onclick="playGame('rock')">Rock</button>
        <button type="button" onclick="playGame('paper')">Paper</button>
        <button type="button" onclick="playGame('scissors')">Scissors</button>
    </form>

    <div id="result"></div>

    <script src="public/js/game.js"></script>
</body>
</html>
