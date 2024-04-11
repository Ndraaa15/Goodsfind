<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>

<body>
    <form action="{{ url('/cart', ['product_id' => 2]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
