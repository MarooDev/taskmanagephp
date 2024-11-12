<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
</head>
<body>
<h1>
    Add new task
</h1>
<?php if (!empty($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
<?php if (!empty($success)) { echo "<p style='color: green;'>$success</p>"; }
//$success;
//$error;
?>
<br>
<br>
<form action="" method="POST">
    <label for="title">Title: </label>
    <input type="text" id="title" name="title"><br><br>
    <label for="description">Description: </label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>
    <input type="submit">
</form>

</body>
</html>
