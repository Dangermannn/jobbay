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
        <div class="button">
            <button class="violet-button" onclick="routeToAddingAnnouncement()">Add announcement</button>
        </div>
        <section class="my-announcements">
            <h1>My announcements</h1>
            <table class="styled-table">
                <thead>
                    <th>Title</th>
                    <th>Localization</th>
                    <th>Experience</th>
                    <th>Added</th>
                    <th>Details</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                    <?php
                        if(isset($shared))
                        {
                            foreach($shared as $shared){
                                echo '<tr id="'.$shared->getId().'">';
                                echo '<td>'.$shared->getTitle().'</td>';
                                echo '<td>'.$shared->getLocalization().'</td>';
                                echo '<td>'.$shared->getExperience().'y</td>';
                                echo '<td>'.$shared->getAdded().'</td>';
                                echo '<td><a href="announcementDetails?id='.$shared->getId().'">link</a></td>';
                                echo '<td><button name="remove" class="removeButton">Remove</button></td>';
                                echo '</tr>';
                            }
                        }
                        else
                            echo '<tr><td colspan="6">You do not share any job offers</td></tr>'
                    ?>  
                </tbody>
            </table>
        </section>

        <section class="applied-jobs">
            <h1>Jobs I applied for</h1>
            <table class="styled-table">
                <thead>
                    <th>Title</th>
                    <th>Localization</th>
                    <th>Experience</th>
                    <th>Added</th>
                    <th>Details</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                    <?php
                        if(isset($applied))
                        {
                            foreach($applied as $applied){
                                echo '<tr id="'.$applied->getId().'">';
                                echo '<td>'.$applied->getTitle().'</td>';
                                echo '<td>'.$applied->getLocalization().'</td>';
                                echo '<td>'.$applied->getExperience().'y</td>';
                                echo '<td>'.$applied->getAdded().'</td>';
                                echo '<td><a href="announcementDetails?id='.$applied->getId().'">link</a></td>';
                                echo '<td><button name="disapply" class="removeButton">Remove</button></td>';
                                echo '</tr>';
                            }
                        }
                        else
                            echo '<tr><td colspan="6">You have not applied to any job</td></tr>'
                    ?>
                    
                </tbody>
            </table>
        </section>

        <div class="settings">
            <a href="accountSettings">Settings</a>
        </div>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/removeAdOrApply.js"></script>
</body>
</html>