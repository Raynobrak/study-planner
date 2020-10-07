<!DOCTYPE html>
<html lang="fr">

<!--
    Index redirection page
    Rafael Félix
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Redirection</title>
</head>
<body>
    <p>Redirection, cliquez <a href="home.php">ici</a> si cela prend trop de temps.</p>
    <?php header('Location: home.php'); ?>
</body>
</html>