<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>
    <form action="{{ route('update-status-order', ['order_item_id' => 1]) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="status-order">Status Order:</label><br>
        <input type="text" id="status-order" name="status-order"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
