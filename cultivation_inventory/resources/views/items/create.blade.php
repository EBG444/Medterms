@extends('layout')

@section('content')
<h2 class="text-xl font-bold mb-4">✨ Add New Cultivation Item</h2>

<form action="{{ route('items.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium">Item Name</label>
        <input type="text" name="name" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium">Description</label>
        <textarea name="description" class="w-full border rounded p-2"></textarea>
    </div>

    <div>
        <label class="block font-medium">Quantity</label>
        <input type="number" name="quantity" class="w-full border rounded p-2" value="1" min="0" required>
    </div>

    <div>
        <label class="block font-medium">Category</label>
        <select name="category_id" class="w-full border rounded p-2" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            🌿 Save Item
        </button>
        <a href="{{ route('items.index') }}" class="ml-2 text-gray-700">Cancel</a>
    </div>
</form>
@endsection
