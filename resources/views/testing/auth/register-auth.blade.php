<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="{{ url('/auth/register') }}" method="POST">
        @csrf
        @method('POST')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="register-name"><br>

        <label for="display-name">Display Name:</label><br>
        <input type="text" id="display-name" name="register-display-name"><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="register-email"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="register-password"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
