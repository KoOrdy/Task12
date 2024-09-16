<?php
session_start();
require_once "../model/db.php";
$db = new Db('notes');
if (isset($_COOKIE['users']) && !empty($_COOKIE['users'])) {
    $user = json_decode($_COOKIE['users'], true);

    echo 'Hello, ' . $user['name'];

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Table with Update and Delete Buttons</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #74ebd5, #acb6e5);
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                height: 100vh;
                color: #333;
            }

            h1 {
                margin-bottom: 20px;
                font-size: 2rem;
                color: white;
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            }

            table {
                width: 85%;
                border-collapse: collapse;
                background-color: white;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                border-radius: 12px;
                overflow: hidden;
                margin-bottom: 20px;
            }

            thead {
                background-color: #4CAF50;
                color: white;
                text-transform: uppercase;
            }

            thead th {
                padding: 15px;
                text-align: left;
            }

            tbody td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #e0e0e0;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            button {
                padding: 10px 15px;
                border: none;
                cursor: pointer;
                border-radius: 4px;
                font-size: 14px;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .update-btn {
                background-color: #3498db;
                color: white;
                margin-right: 5px;
            }

            .update-btn:hover {
                background-color: #2980b9;
                transform: translateY(-3px);
            }

            .delete-btn {
                background-color: #e74c3c;
                color: white;
            }

            .delete-btn:hover {
                background-color: #c0392b;
                transform: translateY(-3px);
            }

            .done-message {
                width: 85%;
                margin: 20px auto;
                padding: 20px;
                background-color: greenyellow;
                color: white;
                font-weight: bold;
                text-align: center;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }

            a.btn {
                text-decoration: none;
                color: white;
                padding: 10px 20px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: bold;
                display: inline-block;
                transition: background-color 0.3s ease;
            }

            a.btn.create {
                background-color: #2ecc71;
                margin-top: 15px;
            }

            a.btn.create:hover {
                background-color: #27ae60;
            }

            a.btn.delete {
                background-color: #e74c3c;
            }

            a.btn.update {
                background-color: #3498db;
            }

            a.btn.delete:hover,
            a.btn.update:hover {
                opacity: 0.9;
                transition: opacity 0.3s ease;
            }
        </style>
    </head>

    <body>

        <?php
        if (isset($_SESSION['success'])) {
            echo '<p class="done-message">' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']);
        }
        ?>

        <h1>Notes List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Done</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($db->getAll()) > 0) {
                    foreach ($db->getAll() as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['title'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . $row['date'] . '</td>';
                        echo '<td>' . $row['done'] . '</td>';
                        echo '<td>';
                        echo "<a href='update.php?id=" . $row['id'] . "' class='btn update'>Update</a>";
                        echo "<a href='../controller/delete_back.php?id=" . $row['id'] . "' class='btn delete'>Delete</a>";
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="add.php" class="btn create">Create New Note</a>
        <a href="../controller/logout.php" class="btn create">Logout</a>

    </body>

    </html>
<?php } else {
    header('location:login.php');
} ?>