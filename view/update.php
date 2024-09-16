<?php
require_once "../model/db.php";
    $id=$_GET["id"];
    $db= new Db('notes');
    $note=$db->getfirst('id',$id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Note</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: block;
            width: 100%;
            margin-top: 15px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Update Note</h2>
        <form action="../controller/update_back.php?id=<?= $id ?>" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $note['title'] ?>" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?= $note['description'] ?></textarea>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?= $note['date']?>" required>

            <label for="done">Done:</label>
            <select name="done" id="select">
                <option value="Yes" <?php if($note['done'] == 1) echo "selected";?>> Yes</option>
                <option value="No" <?php if($note['done'] == 0) echo "selected";?>> No</option>
            </select>
            
            <button type="submit">Update Note</button>
        </form>
    </div>

</body>

</html>