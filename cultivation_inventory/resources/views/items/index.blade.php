@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">🌿 Cultivation Treasures</h1>
<a href="{{ route('items.create') }}" class="bg-green-500 text-white px-3 py-1 rounded">+ Add Item</a>

<div class="mt-6 overflow-x-auto">
    <table class="min-w-full border border-gray-300 bg-white shadow-lg rounded-lg">
        <thead>
            <tr class="bg-green-200 text-left">
                <th class="px-4 py-2 border">
                    <a href="{{ route('items.index', ['sort' => 'name', 'direction' => $sort === 'name' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                        Name
                        <span class="ml-1">🔼 🔽</span>
                    </a>
                </th>
                <th class="px-4 py-2 border">
                    <a href="{{ route('items.index', ['sort' => 'category', 'direction' => $sort === 'category' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                        Category
                        <span class="ml-1">🔼 🔽</span>
                    </a>
                </th>
                <th class="px-4 py-2 border text-center">
                    <a href="{{ route('items.index', ['sort' => 'quantity', 'direction' => $sort === 'quantity' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                        Quantity
                        <span class="ml-1">🔼 🔽</span>
                    </a>
                </th>
                <th class="px-4 py-2 border text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($items as $item)
            <tr class="hover:bg-green-50" title="{{ $item->description ?? 'No description' }}">
                <td class="px-4 py-2 border">{{ $item->name }}</td>
                <td class="px-4 py-2 border">{{ $item->category->name }}</td>
                <td class="px-4 py-2 border text-center">{{ $item->quantity }}</td>
                <td class="px-4 py-2 border text-center">
                    <a href="{{ route('items.edit',$item) }}" class="text-blue-600 font-medium mr-2">✏️ Edit</a>
                    <form action="{{ route('items.destroy',$item) }}" method="POST" 
                          style="display:inline" 
                          onsubmit="return confirm('Are you sure you want to delete this item? ⚠️');">
                        @csrf @method('DELETE')
                        <button class="text-red-600 font-medium">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
