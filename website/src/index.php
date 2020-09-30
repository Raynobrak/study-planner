<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Redirecting</title>
</head>
<body>
    <p>Redirecting, click <a href="home.php">here</a> if it takes too long.</p>
    <?php header('Location: home.php'); ?>
</body>
</html>