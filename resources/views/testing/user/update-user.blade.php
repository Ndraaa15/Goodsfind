<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="{{ url('/user') }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="display-name">Display Name:</label><br>
        <input type="text" id="display-name" name="display-name"><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="new-password">New Password:</label><br>
        <input type="new-password" id="new-password" name="register-new-password"><br>

        <label for="confirm-password">Confirm Password:</label><br>
        <input type="confirm-password" id="confirm-password" name="confirm-password"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
