<x-layouts title="show">
<table border="1" style="margin: auto;width:500px;">
    <tr>
    <th>image</th>
    <th>Title</th>
    <th>description</th>
    <th>options</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>   
            <img width="70px" src="{{asset('storage/'.$product->image)}}">
        </td>
        <td>{{$product->title}}</td>
        <td>{{$product->description}}</td>
        <td>
   
            <form action="{{route('products.show',$product->id)}}" method="GET">
                @csrf
                <button type="submit">show</button>
            </form>
             <form action="{{route('products.edit',$product->id)}}" method="GET">
                @csrf
                <button type="submit">update</button>
            </form>
            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



</x-layouts>

