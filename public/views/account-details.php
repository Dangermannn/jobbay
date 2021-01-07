<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/settings.css">
    <title>User</title>
</head>
<body>

    <?php include('public/templates/navbar.php'); ?>

    <div class="container">

        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>

        <section class="my-announcements">
            <h1>My announcements</h1>
            <!-- ADD TABLE WITH MY ANNOUNCEMENTS -->
        </section>

        <section class="applied-jobs">
            <h1>Jobs I applied for</h1>
            <!-- ADD TABLE WITH JOBS -->
        </section>


        <a class="link-button" href="">Change account details</a>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>