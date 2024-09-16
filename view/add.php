<?php
if (isset($_COOKIE['users']) && !empty($_COOKIE['users'])) {
    $user = json_decode($_COOKIE['users'], true);

    echo 'Hello, ' . $user['name'];

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Note</title>
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
                height: 100vh;
                flex-direction: column;
                color: #333;
            }

            h1 {
                margin-bottom: 20px;
                font-size: 2rem;
                color: white;
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            }

            form {
                background-color: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                width: 350px;
            }

            label {
                font-weight: bold;
                margin-bottom: 10px;
                display: block;
                color: #333;
            }

            input[type="text"],
            textarea,
            input[type="date"],
            select {
                width: 100%;
                padding: 12px;
                margin-bottom: 15px;
                border-radius: 8px;
                border: 1px solid #ccc;
                box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
                font-size: 14px;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: #2ecc71;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #27ae60;
            }

            .back-link {
                margin-top: 15px;
                text-align: center;
            }

            .back-link a {
                text-decoration: none;
                color: #3498db;
                font-weight: bold;
            }

            .back-link a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>

        <h1>Add a New Note</h1>

        <form method="POST" action="../controller/add_back.php">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Note Title" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Note Description" required></textarea>

            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>

            <label for="done">Is Done?</label>
            <select id="done" name="done" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <button type="submit">Add Note</button>
        </form>

        <div class="back-link">
            <a href="index.php">Back to Notes List</a>
        </div>

    </body>

    </html>
<?php } else {
    header('location:login.php');
} ?>