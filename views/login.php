<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Login</title>
</head>
<body>

    <header>
        <div class="container">
            <h1>CRM System</h1>
        </div>
    </header>

    <div class="container">
        <nav>
            <!-- Navigation links, if needed -->
        </nav>

        <h2>Login</h2>

        <form action="../index.php?action=login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="../index.php?action=register">Register here</a></p>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 CRM System</p>
        </div>
    </footer>

</body>
</html>
