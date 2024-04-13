<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <form method="POST" action="{{ url('/checkout') }}">
        @csrf <!-- CSRF token for Laravel form submission -->
        @method('POST')


        <!-- Shipping Address -->
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="company_name">Company Name:</label><br>
            <input type="text" name="company_name" id="company_name"">
        </div>
        <div>
            <label for="country">Country:</label><br>
            <input type="text" name="country" id="country">
        </div>
        <div>
            <label for="province">province:</label><br>
            <input type="text" name="province" id="province">
        </div>
        <div>
            <label for="city">city:</label><br>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <label for="postal_code">postal_code:</label><br>
            <input type="text" name="postal_code" id="postal_code">
        </div>
        <div>
            <label for="phone">phone:</label><br>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="email">email:</label><br>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="detail_address">detail_address:</label><br>
            <input type="text" name="detail_address" id="detail_address">
        </div>
        <!-- Add more fields for other shipping address details -->

        <!-- Payment Information -->
        <div>
            <label for="shipping_type">Shipping Type:</label><br>
            <select name="shipping_type" id="shipping_type">
                <option value="standard">Standard</option>
                <option value="express">Express</option>
            </select>
        </div>
        <div>
            <label for="payment_type">Payment Type:</label><br>
            <select name="payment_type" id="payment_type">
                <option value="bca">BCA</option>
                <option value="bri">BRI</option>
                <!-- Add more payment options as needed -->
            </select>
        </div>

        <!-- Other fields such as service price, total price, etc. can also be added -->

        <button type="submit">Submit</button>
    </form>
</body>

</html>
