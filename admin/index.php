<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Control Panel</title>
</head>
<body>

    <?php
    $message = 'I am a genius!';
    $message2 = 'I am a genius!';
    echo $message;
    ?>
    <form action="controller.php", method="post">
        admin: <input name='admin' type="text"><br />
        password: <input name='psw' type="password"><br />
        <input type="submit" value="Submit">
    </form>
    <a href="controller.php?message=<?php $message?>">123</a>

</body>
</html>