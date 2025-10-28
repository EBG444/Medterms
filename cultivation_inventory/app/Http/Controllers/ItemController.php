<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;

class ItemController extends Controller
{
public function index(Request $request)
{
    $sort = $request->get('sort', 'name');          // default column
    $direction = $request->get('direction', 'asc'); // default direction

    // Allowed sortable columns
    $sortable = ['name', 'quantity', 'category'];

    if (!in_array($sort, $sortable)) {
        $sort = 'name';
    }

    $items = Item::select('items.*')
        ->join('categories', 'categories.id', '=', 'items.category_id')
        ->with('category')
        ->orderBy(
            $sort === 'category' ? 'categories.name' : 'items.' . $sort,
            $direction
        )
        ->get();

    return view('items.index', compact('items', 'sort', 'direction'));
}



    public function create() {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request) {
        Item::create($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]));
        return redirect()->route('items.index');
    }

    public function edit(Item $item) {
        $categories = Category::all();
        return view('items.edit', compact('item','categories'));
    }

    public function update(Request $request, Item $item) {
        $item->update($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]));
        return redirect()->route('items.index');
    }

    public function destroy(Item $item) {
        $item->delete();
        return redirect()->route('items.index');
    }
}

