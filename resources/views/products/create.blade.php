<x-layouts title="create">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="title">
        </div>
        <div>
            <input type="text" name="description">
        </div>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" name="submit">
        </div>
    </form>
</x-layouts>

