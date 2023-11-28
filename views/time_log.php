<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Time Log</title>
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

        <h2>Time Log</h2>

        <!-- Display time log entries in a table -->
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Number of Hours</th>
                    <th>Day</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through time log entries and display each row -->
                <?php foreach ($timeLogEntries as $entry): ?>
                    <tr>
                        <td><?= $entry['user']; ?></td>
                        <td><?= $entry['hours']; ?></td>
                        <td><?= $entry['day']; ?></td>
                        <td><?= $entry['comment']; ?></td>
                        <td>
                            <!-- Add edit and delete buttons with appropriate links -->
                            <a href="../index.php?action=edit_entry&id=<?= $entry['id']; ?>">Edit</a>
                            <a href="../index.php?action=delete_entry&id=<?= $entry['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Add new entry button with a link to the form for adding new entries -->
        <p><a href="../index.php?action=add_entry">Add New Entry</a></p>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 CRM System</p>
        </div>
    </footer>

</body>
</html>

