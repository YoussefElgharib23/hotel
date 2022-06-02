<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategryRequest;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => auth()->user()->categories()->paginate()
        ]);
    }

    public function store(CategryRequest $request)
    {
        auth()->user()->categories()->create($request->validated());
        return redirect()->route('user.categories.index');
    }

    public function edit(RoomCategory $category)
    {
        return view('category.modal', compact('category'));
    }

    public function update(CategryRequest $request, RoomCategory $category)
    {
        $category->update($request->validated());
        return redirect()->route('user.categories.index');
    }
}
