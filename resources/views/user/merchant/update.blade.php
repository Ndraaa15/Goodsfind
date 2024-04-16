<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <div class="form-tab">
                        <div class="tab-content" id="tab-content-5">
                            <form id="update-form" action="{{ route('update-product', ['id' => 'PRODUCT_ID'])}}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id" id="product-id" hidden>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="product-name" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" id="product-price" required>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" name="category" id="product-category" required>
                                </div>
                                <div class="form-group">
                                    <label>Condition</label>
                                    <input type="text" class="form-control" name="condition" id="product-condition" required>
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="stock" id="product-stock" required>
                                </div>
                                <div class="form-group">
                                    <label>Time usage</label>
                                    <input type="text" class="form-control" name="time-usage" id="product-time-usage" required>
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" class="form-control" name="Discount" id="product-discount" required>
                                </div>
                                <div class="form-group">
                                    <label>Is Promotion</label>
                                    <input type="radio" class="form-control" name="is_promotion" id="product-is-promotion">
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Edit</span>
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

<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const product = JSON.parse($(this).attr('data-product'));
            $('#product-id').val(product.id);
            $('#product-name').val(product.name);
            $('#product-price').val(product.price);
            $('#product-category').val(product.category);
            $('#product-condition').val(product.condition);
            $('#product-stock').val(product.stock);
            $('#product-discount').val(product.discount);
            $('#product-time-usage').val(product.time_usage);
            $('#product-is-promotion').val(product.is_promotion);

            let formAction = $('#update-form').attr('action');
            formAction = formAction.replace('PRODUCT_ID', product.id);
            $('#update-form').attr('action', formAction);
        });
    });
</script>
