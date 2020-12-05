<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/settings.css">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <div class="nav-bar container">
            <div class="logo">
                <img src="public/img/logo.svg" alt="">
            </div>

            <div class="nav-list">
                <div class="hamburger"><div class="bar"></div></div>

                <ul>
                    <li class="search-bar">
                        <div>
                            <input name="search" type="text" placeholder="Search...">
                            <button><img src="public/img/search.svg" alt=""></button>
                        </div>
                    </li>
                    <li>
                        <a href=""><img src="public/img/home.svg" alt="">Home</a>
                    </li>
                    <li>
                        <a href=""><img src="public/img/message.svg" alt="">Messages</a>
                    </li>
                    <li>                        
                        <a href=""><img src="public/img/account.svg" alt="">Account</a>
                    </li>
                    <li>                        
                        <a href=""><img src="public/img/logout.svg" alt="">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

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

    <div class="footer">
        <div class="information">
            <div class="info-item">
                <p>Contact with an administrator</p>
                <p>artmalec666@gmail.com</p>
            </div>

            <div class="info-item">
                <p>497 Evergreen Rd. Roseville, CA 95673</p>
                <p>+44 345 678 903</p>
            </div>

            <div class="info-item">
                <p>We are always looking for talent</p>
                <p> adobexd@mail.com</p>
            </div>

            <a href="">Regulations</a>
            <a href="">Updates</a>
        </div>
        <div class="icons">
            <a href=""><img src="public/img/instagram.svg" alt=""></a>
            <a href=""><img src="public/img/twitter.svg" alt=""></a>
            <a href=""><img src="public/img/facebook.svg" alt=""></a>
        </div>
    </div>

    <script src="public/js/app.js"></script>
</body>
</html>