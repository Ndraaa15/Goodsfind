<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>

<body>
    <form action="{{ url('/product', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="is_promotion" name="category" required>
                <option value="Shirt">Shirt</option>
                <option value="Shoes">Shoes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="condition">Condition</label>
            <select class="form-control" id="is_promotion" name="condition" required>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
            </select>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" class="form-control" id="discount" name="discount" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="time_usage">Time Usage</label>
            <input type="number" class="form-control" id="time_usage" name="time_usage" required>
        </div>
        <div class="form-group">
            <label for="is_promotion">Is Promotion?</label>
            <select class="form-control" id="is_promotion" name="is_promotion" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>
