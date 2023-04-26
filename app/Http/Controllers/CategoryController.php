<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list() {
        $categories = Category::paginate(15);

        return view('dashboard.categories.list', compact('categories'));
    }

    public function add() {
        return view('dashboard.categories.add');
    }

    public function edit($category_id) {
        $category = Category::findOrFail($category_id);

        return view('dashboard.categories.edit', compact('category'));
    }

    public function create(Request $request, Category $category) {
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'description' => ['nullable', 'string', 'min:20'],
            'slug' => ['nullable', 'string', 'min:3', 'unique:categories'],
            'status' => ['required', 'in:published,draft']
        ]);

        if($request->hasFile('image')) {
            $category->image = $request->image;
        }

        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->status = $request->status;

        if(!$request->filled('slug')) {
            $category->slug = Str::slug($request->title);
        }

        $meta = $category->meta()->create([
            'title' => $request->meta_title ?? $request->title,
            'description' => $request->meta_description ?? null,
            'no_index' => $request->no_index ?? false,
            'no_follow' => $request->no_follow ?? false
        ]);

        $category->meta_id = $meta->id;

        if($category->saveOrFail()) {
            return redirect()->route('dashboard.categories')->with('success', 'Категорія створена');
        }
    }

    public function update(Request $request, $category_id) {
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'description' => ['nullable', 'string', 'min:20'],
            'slug' => ['nullable', 'string', 'min:3', 'unique:categories,slug,' . $category_id],
            'status' => ['required', 'in:published,draft']
        ]);

        $category = Category::findOrFail($category_id);

        if($request->hasFile('image')) {
            $category->image = $request->image;
        }

        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->status = $request->status;

        if(!$request->filled('slug')) {
            $category->slug = Str::slug($request->title);
        }

        if($category->saveOrFail()) {
            $category->meta()->update([
                'title' => $request->meta_title ?? $request->title,
                'description' => $request->meta_description ?? null,
                'no_index' => $request->no_index ?? false,
                'no_follow' => $request->no_follow ?? false
            ]);

            return redirect()->route('dashboard.categories')->with('success', 'Категорія оновлена');
        }
    }

    public function delete($category_id) {
        $category = Category::findOrFail($category_id);

        if($category->delete()) {
            return redirect()->route('')->with('success', 'Категорія видалена');
        }
    }
}
