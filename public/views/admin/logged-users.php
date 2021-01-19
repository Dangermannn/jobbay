<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/all-users.css">
    <title>User</title>
</head>
<body>

    <?php include('public/templates/admin-navbar.php'); ?>

    <div class="container">
        <div class="container main-content">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Details</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                    <?php
                        if(isset($users))
                        {
                            foreach($users as $user){
                                echo '<tr id="'.$user->getEmail().'">';
                                echo '<td>'.$user->getId().'</td>';
                                echo '<td>'.$user->getEmail().'</td>';
                                echo '<td>'.$user->getName().'y</td>';
                                echo '<td>'.$user->getCity().'y</td>';
                                echo '<td><a href="announcementDetails?id='.$user->getId().'">link</a></td>';
                                echo '<td><button name="remove" class="removeButton">Remove</button></td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/removeUserAdmin.js"></script>
</body>
</html>