<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <title>Login page</title>
</head>
<body>
    <div class="container header">
        <div class="logo">
            <img src="public/img/logo.svg" alt="">
        </div>
        <div class="login-form">
            <form class="register" action="registerUser" method="POST">
                <h2>Email</h2>
                <input name="email" type="text" placeholder="email@email.com">
                <h2>Password</h2>
                <input name="password" type="password" placeholder="password">
                <h2>Confirm password</h2>
                <input name="confirm-password" type="password" placeholder="password">
                <h2>City</h2>
                <input name="city" type="text" placeholder="city">
                <h2>Profile name</h2>
                <input name="profile-name" type="text" placeholder="profile name">
                <h2>Profile description</h2>
                <textarea name="profile-description" id="" cols="30" rows="10" maxlength="300" placeholder="Description (min. 40 characters)"></textarea>
                <button class="transparent-button" type="submit" name="sign-up" disabled>Sign up</button>
            </form>
            <button class="transparent-button" name="login" onclick="routeToLogin()">Login</button>
        </div>
    </div>

    <script src="public/js/registerValidation.js"></script>
</body>
</html>