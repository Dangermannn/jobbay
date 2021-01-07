<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/user-info.css">
    <title>Document</title>
</head>
<body>

    <?php include('public/templates/navbar.php'); ?>

    <div class="container">
        <div class="user">
                <h1>About user</h1>
                <hr>
                <div class="details">
                    <?php 
                        echo '<div class="item"><span>Username:</span> '.$data->getName().'</div>';
                        echo '<div class="item"><span>Email:</span> '.$data->getEmail().'</div>';
                        echo '<div class="item"><span>City:</span> '.$data->getCity().'y</div>';
                    ?>
                </div>
                <hr>
                <h1>DESCRIPTION</h1>
                <hr>
                <div class="description">
                    <?php
                        echo '<p>'.$data->getDescription().'</p>';
                    ?>
                </div>

                <div class="btn">
                    <button name="show-cv">Show CV</button>
                </div>
            </div>
            
        </div>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/cvLoad.js"></script>
</body>
</html>