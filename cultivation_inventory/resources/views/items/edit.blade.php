@extends('layout')

@section('content')
<h2 class="text-xl font-bold mb-4">⚒️ Edit Cultivation Item</h2>

<form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-medium">Item Name</label>
        <input type="text" name="name" value="{{ $item->name }}" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium">Description</label>
        <textarea name="description" class="w-full border rounded p-2">{{ $item->description }}</textarea>
    </div>

    <div>
        <label class="block font-medium">Quantity</label>
        <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-full border rounded p-2" min="0" required>
    </div>

    <div>
        <label class="block font-medium">Category</label>
        <select name="category_id" class="w-full border rounded p-2" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            💾 Update Item
        </button>
        <a href="{{ route('items.index') }}" class="ml-2 text-gray-700">Cancel</a>
    </div>
</form>
@endsection
