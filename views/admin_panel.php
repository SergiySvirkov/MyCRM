<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Admin Panel</title>
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

        <h2>Admin Panel</h2>

        <!-- Display a table of operators with reset password option -->
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through operators and display each row -->
                <?php foreach ($operators as $operator): ?>
                    <tr>
                        <td><?= $operator['username']; ?></td>
                        <td>
                            <!-- Add reset password button with a link -->
                            <a href="../index.php?action=reset_password&id=<?= $operator['id']; ?>">Reset Password</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 CRM System</p>
        </div>
    </footer>

</body>
</html>

