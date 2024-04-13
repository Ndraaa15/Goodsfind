<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <form action="{{ url('/wishlist', ['product_id' => 2]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>

</body>

</html>
