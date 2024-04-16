<div class="modal fade" id="merchant-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <div class="form-tab">
                        <div class="tab-content" id="tab-content-5">
                            <form action="{{ route('create-product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select id="category-dropdown" class="form-control" name="category">
                                        <option value="">Select a category</option>
                                        <option value="1">Electronics</option>
                                        <option value="2">Clothing</option>
                                        <option value="3">Books</option>
                                        <option value="4">Home & Garden</option>
                                        <option value="5">Health & Beauty</option>
                                        <option value="6">Toys & Games</option>
                                        <option value="7">Sports & Outdoors</option>
                                        <option value="8">Automotive</option>
                                        <option value="9">Music</option>
                                        <option value="10">Movies & TV</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Condition</label>
                                    <select id="category-dropdown" class="form-control" name="condition">
                                        <option value="">Select a category</option>
                                        <option value="Very Good">Very Good</option>
                                        <option value="Good">Good</option>
                                        <option value="Bad">Bad</option>
                                        <option value="Very Bad">Very Bad</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" class="form-control" name="stock" value="0" required>
                                </div>
                                <div class="form-group">
                                    <label>Time Usage (Day)</label>
                                    <input type="number" class="form-control" value="0" name="time-usage" required>
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="number" class="form-control" name="discount" value="0" required>
                                </div>
                                <div class="form-group">
                                    <label>Is Promotion</label>
                                    <input type="checkbox" class="form-control" name="is-promotion" value="1"><br>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Tambah</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
