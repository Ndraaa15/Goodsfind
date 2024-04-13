<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>

<body>
    <form action="{{ url('/auth/signin') }}" method="POST">
        @csrf
        @method('POST')
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="signin-email"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="signin-password"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
