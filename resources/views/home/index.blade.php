@extends('layouts.mainlayout')
@section('title', 'Index')
@section('content')
<h1>Alicia Maye Mondero</h1>

<a href="/create" class="button">+Create Product</a>
<table>
<tr>    
    <th></th>
    <th>Product Name</th>
    <th>Category</th>
    <th>Price</th>
</tr>

@forelse($product as $key => $product)
    <tr>
    <td>
		<a href="{{route('product.edit', ['product' => $product])}}" class="button" onclick="return confirm('Edit <?php echo $product->productname ?>?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		<form action="{{route('product.delete', ['product' => $product])}}" method="POST">
			@csrf
			@method('Delete')
            <input type="hidden" name="id" value="{{$product->id}}">
			<button class="button" onclick="return confirm('Delete <?php echo $product->productname ?>?')"><i class="fa fa-trash" aria-hidden="true" value="Delete"></i></button>
		</form>
	</td>
        <td>
            <p>{{ $product->productname }}</p>
        </td>
        <td>
            <p>{{  $product->category }}</p>
        </td>
        <td>
            <p>{{  $product->price }}</p>
        </td>
    </tr>
    
    @empty
    <tr>
        <td colspan = 4>
                <h1 align="center">No Data!</h1>
        </td>
    </tr>
    @endforelse
</table>
@endsection