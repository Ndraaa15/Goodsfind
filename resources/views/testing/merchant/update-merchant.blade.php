<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Merchant</title>
</head>

<body>
    <form method="POST" action="{{ url('/merchant') }}">
        @csrf
        @method('PATCH')
        <label for="service-price">Service Price:</label><br>
        <input type="text" id="service-price" name="service-price"><br><br>

        <label for="shipping-price">Shipping Price:</label><br>
        <input type="text" id="shipping-price" name="shipping-price"><br><br>

        <label for="account-number">Account Number:</label><br>
        <input type="text" id="account-number" name="account-number"><br><br>

        <label for="bank-name">Bank Name:</label><br>
        <input type="text" id="bank-name" name="bank-name"><br><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location"><br><br>

        <button type="submit">Submit</button>
    </form>

</body>

</html>
