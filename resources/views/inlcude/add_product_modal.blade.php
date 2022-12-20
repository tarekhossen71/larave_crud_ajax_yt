
  <!-- Modal -->
  <div class="modal fade" id="addProductModel" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addProductFrom">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errorMessage mb-3">

                </div>
                <div class="mb-3">
                    <label for="name">Product Name :</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="price">Product Price :</label>
                    <input type="text" name="price" class="form-control" id="price">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success add_product">Add Product</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
    </form>
  </div>
  