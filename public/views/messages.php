<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include('public/templates/navbar.php'); ?>

    <div class="container">
        <?php
    
        if(isset($messages))
        {
            foreach($messages as $msg)
            {
                echo '<h1>'.$msg->getContent().'</h1>';
            }
        }
        else
            echo '<h1>There are no messages!</h1>';
    
        ?>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>