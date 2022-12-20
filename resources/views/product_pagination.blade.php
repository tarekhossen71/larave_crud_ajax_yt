<table class="table table-bordered">
    <thead>
        <th>Serial</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($products as $key=>$product)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="" 
                        class="btn btn-sm btn-primary showValueUpdateFrom" data-bs-toggle="modal" data-bs-target="#editProductModel" 
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        ><i class="las la-edit"></i>
                    </a>
                    <a href="" 
                        class="btn btn-sm btn-danger delete_product"
                        data-id="{{ $product->id }}"
                        >
                        <i class="las la-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}