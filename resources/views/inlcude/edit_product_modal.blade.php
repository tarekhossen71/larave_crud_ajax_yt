
  <!-- Modal -->
  <div class="modal fade" id="editProductModel" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <form action="" method="POST" id="editProductFrom">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errorMessage mb-3">

                </div>
                <div class="mb-3">
                    <label for="name">Product Name :</label>
                    <input type="text" name="up_name" class="form-control" id="up_name">
                </div>
                <div class="mb-3">
                    <label for="price">Product Price :</label>
                    <input type="text" name="up_price" class="form-control" id="up_price">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success update_product">Update Product</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
    </form>
  </div>
  