<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/announcement.css">
    <title>Announcement</title>
</head>
<body>

    <?php include('public/templates/navbar.php'); ?>

    <div class="container">
        <div class="announcement">

                <div class="messages">
                    <?php
                    if(isset($data)){
                        //echo $temp;
                        echo "<h1>".$data->getTitle()."</h1>";
                    }
                    ?>
                    <hr>
                <div class="details">
                    <?php 
                        echo '<div class="item"><span>Username:</span> '.$data->getLocalization().'</div>';
                        echo '<div class="item"><span>Email:</span> <a href="/accountInfo?email='.$data->getAdvertiser().'">'.$data->getAdvertiser().'</a></div>';
                        echo '<div class="item"><span>Experience:</span> '.$data->getExperience().'y</div>';
                        echo '<div class="item"><span>Announcer:</span> '.$data->getAdvertiser().'</div>';
                        echo '<div class="item"><span>Added:</span> '.$data->getAdded().'</div>';
                    ?>
                </div>
                
                <hr>
                
                <div class="description">
                    <h1>DESCRIPTION</h1>
                    <hr>
                    <?php
                        echo '<p>'.$data->getDescription().'</p>';
                    ?>
                </div>
            </div>
            
            <button>Apply</button>
        </div>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>