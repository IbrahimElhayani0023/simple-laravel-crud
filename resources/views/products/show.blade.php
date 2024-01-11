<x-layouts title="show">
    <div style="margin: auto;">
        <img src="{{asset('storage/'.$product->image)}}" alt="product image">
        <h1>{{$product->title}}</h1>
        <p>{{$product->description}}</p>
    </div>
</x-layouts>