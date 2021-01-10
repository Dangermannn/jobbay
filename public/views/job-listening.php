<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/job-listening.css">
    <title>Jobs</title>
</head>
<body>

    <?php include('public/templates/navbar.php'); ?>    

    <div class="container main-content">
        <table>
            <thead>
                <th>Name</th>
                <th>Localization</th>
                <th>Experience</th>
                <th>Details</th>
            </thead>
            <tbody>
                <?php
                    if(isset($offers))
                    {
                        foreach($offers as $offer){
                            echo '<tr>';
                            echo '<td>'.$offer->getTitle().'</td>';
                            echo '<td>'.$offer->getLocalization().'</td>';
                            echo '<td>'.$offer->getExperience().'y</td>';
                            echo '<td><a href="announcementDetails?id='.$offer->getId().'">link</a></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>