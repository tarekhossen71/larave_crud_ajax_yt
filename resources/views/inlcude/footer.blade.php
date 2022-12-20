<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    {{-- Toastr --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {{-- Laravel Ajax --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            // Insert 
            $(document).on('click', '.add_product', function(e){
                e.preventDefault(); //Page No Load
                let name = $('#name').val();
                let price = $('#price').val();
                // console.log(name+price);
                $.ajax({
                    url: "{{ route('products.store') }}",
                    method: 'post',
                    data: {name:name, price:price}, //first name is index and 2nd name id value
                    success:function(res){
                        if (res.status=='success') {
                            $('#addProductModel').modal('hide');
                            $('#addProductFrom')[0].reset();
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Product Added!", "Success")
                                    toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                        }
                    },
                    error:function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function (index, value) { 
                             $('.errorMessage').append('<span class="text-danger d-block">'+value+'</span>');
                        });
                    },
                });
            });

            // Show Value in Update from
            $(document).on('click', '.showValueUpdateFrom', function (e) { 
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_price').val(price);

                // Update
                $(document).on('click', '.update_product', function(e){
                    e.preventDefault(); //Page No Load
                    let up_id = $('#up_id').val();
                    let up_name = $('#up_name').val();
                    let up_price = $('#up_price').val();
                    // console.log(name+price);
                    $.ajax({
                        url: "{{ route('products.update') }}",
                        method: 'post',
                        data: {up_id:up_id, up_name:up_name, up_price:up_price}, //first name is index and 2nd name id value
                        success:function(res){
                            if (res.status=='success') {
                                $('#editProductModel').modal('hide');
                                $('#editProductFrom')[0].reset();
                                $('.table').load(location.href+' .table');
                                Command: toastr["success"]("Product Updated!", "Success")
                                    toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                            }
                        },
                        error:function(err) {
                            let error = err.responseJSON;
                            $.each(error.errors, function (index, value) { 
                                $('.errorMessage').append('<span class="text-danger d-block">'+value+'</span>');
                            });
                        },
                    });
                });
            });

            // delete
            $(document).on('click', '.delete_product', function(e){
                e.preventDefault(); //Page No Load
                let product_id = $(this).data('id');
                if (confirm('Are You Sure You Want To Detele??')) {
                    $.ajax({
                    url: "{{ route('products.destroy') }}",
                    method: 'post',
                    data: {product_id:product_id}, //first name is index and 2nd name id value
                    success:function(res){
                        if (res.status=='success') {
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Product Deleted!", "Success")
                                toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
                }
            });

            // Pagination
            $(document).on('click', '.pagination a', function (e){ 
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                product(page);
            });

            function product(page) {
                $.ajax({
                    url: "pagination/pagination-data?page="+page,
                    success:function(res){
                        $('.card-body').html(res);
                    }
                });
            }

            // Search product 
            $(document).on('keyup', function (e) {
                e.preventDefault();
                let searchString = $('#search').val();

                $.ajax({
                    url: "{{ route('products.search') }}",
                    method: 'get',
                    data: {searchString:searchString},
                    success:function(res){
                        $('.card-body').html(res);
                        if (res.status == 'nothing_found') {
                            $('.card-body').html('<span class="text-danger d-block text-center">'+'Sorry, Nothing Found!'+'</span>');
                        }
                        $('#search')[0].reset();
                    }
                });
            });
        });
    </script>