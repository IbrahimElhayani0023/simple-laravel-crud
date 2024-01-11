<x-layouts title="edit">
    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="title" value="{{$product->title}}">
        </div>
        <div>
            <input type="text" name="description" value="{{$product->description}}">
        </div>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <img width="100px" src="{{asset('storage/'.$product->image)}}" alt="product image">
        </div>
        <div>
            <input type="submit" name="submit" value="update">
        </div>
    </form>
</x-layouts>

