<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/settings.css">
    <title>Settings</title>
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

        <!-- Change account details -->
        <form action="updateAccount" method="POST" ENCTYPE="multipart/form-data">
            <h2>Password</h2>
            <input name="password" type="password" placeholder="password">
            <h2>Confirm password</h2>
            <input name="confirm-password" type="password" placeholder="password">
            <h2>City</h2>
            <input name="city" type="text" placeholder="city">
            <h2>Profile description</h2>
            <textarea name="profile-description" id="" cols="30" rows="10"></textarea>
            <input type="file" name="file">
            <button type="submit">Save</button>
        </form>

    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>