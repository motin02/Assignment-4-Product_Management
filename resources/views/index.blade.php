@extends(
    'layouts.app'
)

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Product List</h2>
    <div class="d-flex justify-content-between">
		<a href="{{route('products.create')}}" class="btn btn-primary">Create a new product </a>
		<div>
			<form action="{{route('products.index')}}" method="GET">
				<div class="input-group border border-primary border-2 rounded">
					<input type="text" name="search" placeholder="Search by product id or description" value="{{old('search',$search)}}" aria-label="Search" aria-describedby="searchButton" id="searchButton" style="width: 400px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

					<button type="submit" class="btn input-group-text bg-primary text-light" id="inputGroup-sizing-default">Search</button>

				</div>
			</form>

		</div>
	</div>
    <br><br>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product_Id</th>
                <th scope="col">
                    <a href="{{route('products.index',['sort_by' => 'name', 'sort_order'=>$sortBy == 'name' && $sortOrder =='asc' ? 'desc':'asc'])}}">Name
                    @if($sortBy == 'name')
                        @if($sortOrder == 'asc')↑ @else ↓ @endif
                    @endif
            	   </a>
                 </th>
                <th scope="col">Description</th>
                <th scope="col">
                 <a href="{{route('products.index',['sort_by' => 'price', 'sort_order'=>$sortBy == 'price' && $sortOrder =='asc' ? 'desc':'asc'])}}">
                    Price
                    @if($sortBy == 'price')
                        @if($sortOrder == 'asc')↑ @else ↓ @endif
                    @endif
            	   </a>
                </th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Show</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample Data Row -->
            @foreach($products as $product)
            <tr>
                <th >{{$loop->iteration}}</th>
                <td>{{$product->product_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><img src="{{ asset('storage/'.$product->image) }}" style="height: 50px; width: 50px" alt="Product Image"class="img-fluid" ></td>
                <td><a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>

                </td>
                <td><a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Show</a></td>

                <td><form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form></td>
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
        {{ $products->links('pagination::bootstrap-5') }}
    </table>
</div>
@endsection
