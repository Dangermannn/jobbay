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
            <div class="inputs">
                <span>
                    <h2>Password</h2>   
                    <input name="password" type="password" placeholder="password">
                </span>
                <span>
                    <h2>Confirm password</h2>
                    <input name="confirm-password" type="password" placeholder="password">
                </span>
                <span>
                    <h2>City</h2>
                    <input name="city" type="text" placeholder="city">
                </span>
                <span id="upload-cvvv">
                    <h2>Upload CV</h2>
                    <input id="upload-cv" type="file" name="file">
                </span>
            </div>

            <span class="description">
                <h2>Profile description</h2>
                <textarea name="profile-description" id="" maxlength="300" cols="30" rows="10"></textarea>
            </span>
                
            <div class="button">
                <button class="red-button" type="submit">Save</button>
            </div>
        </form>

    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>