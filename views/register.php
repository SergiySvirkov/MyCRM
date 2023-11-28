<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Register</title>
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

        <h2>Register</h2>

        <form action="../index.php?action=register" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="../index.php?action=login">Login here</a></p>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 CRM System</p>
        </div>
    </footer>

</body>
</html>

