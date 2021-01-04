<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/announcement.css">
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
                        <form action="jobListening" method="POST">
                            <input name="keyword" type="text" placeholder="Search...">
                            <button type="submit"><img src="public/img/search.svg" alt=""></button>
                        </form>
                    </li>
                    <li>
                        <a href="home"><img src="public/img/home.svg" alt="">Home</a>
                    </li>
                    <li>
                        <a href="messages"><img src="public/img/message.svg" alt="">Messages</a>
                    </li>
                    <li>                        
                        <a href="accountSettings"><img src="public/img/account.svg" alt="">Account</a>
                    </li>
                    <li>                        
                        <a href="src/controllers/helpers/ClearSession.php"><img src="public/img/logout.svg" alt="">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="announcement">

                <div class="messages">
                    <?php
                    if(isset($data)){
                        //echo $temp;
                        echo "<h1>".$data['title']."</h1>";
                    }
                    ?>
                <div class="details">
                    <div class="item">LOCALIZATION</div>
                    <div class="item">LOCALIZATION</div>
                    <div class="item">LOCALIZATION</div>
                </div>
                
                <div class="description">
                    <h1>DESCRIPTION</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam vitae neque obcaecati. Dolore ipsam itaque alias necessitatibus mollitia possimus ut nostrum quod porro quaerat? Explicabo rerum sunt quos minima excepturi. Facere, recusandae? Tempora totam, magni error ratione, incidunt velit eum, aspernatur rem aut sapiente possimus aliquam dolorum facilis repellat asperiores!
                    </p>
                </div>
            </div>
            
            <button>Apply</button>
        </div>
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