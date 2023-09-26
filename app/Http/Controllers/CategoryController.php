<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('categories.index', [
            'titleHeader' => 'List Categories',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create', [
            'titleHeader' => 'Create Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create($validation);

        session()->flash('success', 'Add category successfuly');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', [
            'titleHeader' => 'Edit Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('info', 'Updated category successfuly.');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->delete()) {
            return redirect()->route('categories.index')->with('error', 'Category Deleted');
        }

        return redirect()->route('categories.index')->with('error', 'Category Deleted Failed !');
    }
}
