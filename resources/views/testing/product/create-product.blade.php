<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <form action="{{ url('/product')
    }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>

        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category"><br>

        <label for="condition">Condition:</label><br>
        <input type="text" id="condition" name="condition"><br>

        <label for="stock">Stock:</label><br>
        <input type="text" id="stock" name="stock"><br>

        <label for="discount">Discount:</label><br>
        <input type="text" id="discount" name="discount"><br>

        <label for="time_usage">Time Usage:</label><br>
        <input type="text" id="time_usage" name="time_usage"><br>

        <label for="is_promotion">Is Promotion:</label><br>
        <input type="checkbox" id="is_promotion" name="is_promotion" value="1"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
