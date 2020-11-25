<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/job-listening.css">
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
                            echo '<td><a href="">link</a></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
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