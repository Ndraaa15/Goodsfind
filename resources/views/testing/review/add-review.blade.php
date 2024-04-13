<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
</head>

<body>
    <form action="{{ url('/review', ['product_id' => 1])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="review">Review:</label><br>
        <input type="text" id="review" name="review"><br>

        <label for="sub_review">Sub Review:</label><br>
        <input type="text" id="sub_review" name="sub_review"><br>

        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating"><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
