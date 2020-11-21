<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"type="text/css" href="public/css/style.css">
    <title>Login page</title>
</head>
<body>
    <div class="container header">
        <div class="logo">
            <img src="public/img/logo.svg" alt="">
        </div>
        <div class="login-form">
            <form class="login" action="login" method="POST">
                <div class="message">
                    <?php if(isset($messages))
                            foreach($messages as $message)
                                echo $message;
                    ?>
                </div>
                <h2>Email</h2>
                <input name="email" type="text" placeholder="email@email.com">
                <h2>Password</h2>
                <input name="password" type="password" placeholder="password">
                <div class="buttons">
                    <button>Sign up</button>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>