<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register - RPS</title>
    <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="register-bg">
    <h2>Register</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES) ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=user&action=register">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>

    <p>
        Already have an account?
        <a href="index.php?controller=user&action=login">Login</a>
    </p>
    <p>
        <a href="index.php?controller=game&action=rules">View Rules</a>
    </p>
</body>
</html>
