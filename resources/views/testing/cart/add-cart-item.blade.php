<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <form action="{{ url('/cart', ['product_id' => 2]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
