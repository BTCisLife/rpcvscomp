<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - RPS</title>
    <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="login-bg">
    <h2>Login</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES) ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=user&action=login">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>
        Don't have an account?
        <a href="index.php?controller=user&action=register">Register here</a>
    </p>
    <p>
        <a href="index.php?controller=game&action=rules">View Rules</a>
    </p>
</body>
</html>
