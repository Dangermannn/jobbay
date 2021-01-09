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
        <!-- Change account details -->
        <form class="register" action="addAnnouncement" method="POST">
            <span>
                <h2>Title</h2>
                <input name="title" type="text" placeholder="Title">
            </span>
            <span>
                <h2>Localization</h2>
                <input name="localization" type="text" placeholder="Localization">    
            </span>
            <span>
                <h2>Experience</h2>
                <input name="experience" type="text" placeholder="Experience">
            </span>
            <span>
                <h2>Announcement description</h2>
                <textarea name="announcement-description" id="" cols="30" rows="10" maxlength="300" placeholder="Description (min. 40 characters)"></textarea>
            </span>
            <div class="buttons">
                <button class="red-button" type="submit" name="addAnnouncement" disabled>Add</button>
            </div>
        </form>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/addingAnnouncementValidation.js"></script>
</body>
</html>