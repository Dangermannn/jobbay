<?php
    echo '
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
                    <a href="accountDetails"><img src="public/img/account.svg" alt="">Account</a>
                </li>
                <li>                        
                    <a href="logout"><img src="public/img/logout.svg" alt="">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    </div>
    ';