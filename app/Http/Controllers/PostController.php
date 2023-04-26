<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Services\Traits\ImageTrait;

class PostController extends Controller
{
    use ImageTrait;

    public function list() {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);

        return view('dashboard.posts.list', compact('posts'));
    }

    public function add() {
        $categories = Category::all();
        $users = User::all();

        return view('dashboard.posts.add', compact('categories', 'users'));
    }

    public function edit($post_id) {
        $post = Post::findOrFail($post_id);
        $categories = Category::all();
        $users = User::all();

        return view('dashboard.posts.edit', compact('post', 'categories', 'users'));
    }

    public function create(Request $request, Post $post) {
        $request->validate([
            'category' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'title' => ['required', 'string', 'min:6', 'max:200'],
            'description' => ['nullable', 'min:60'],
            'slug' => ['nullable', 'string', 'min:3', 'max:255', 'unique:posts'],
            'status' => ['required', 'in:published,draft,moderation']
        ]);

        $post->category_id = $request->category;
        $post->user_id = $request->author;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;

        if(!$request->filled('slug')) {
            $post->slug = Str::slug($request->title);
        }

        if($request->hasFile('image')) {
            $post->image = $this->uploadImage($request->file('image'), 'images/posts', $post->slug, 90);
        }

        if($post->saveOrFail()) {
            $post->meta()->create([
                'title' => $request->meta_title ?? $request->title,
                'description' => $request->meta_description ?? null,
                'no_index' => $request->no_index ?? false,
                'no_follow' => $request->no_follow ?? false
            ]);

            return redirect()->route('dashboard.posts')->with('success', "Категорія створена");
        }

    }

    public function update(Request $request, Post $post, $post_id) {
        $request->validate([
            'category' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'title' => ['required', 'string', 'min:6', 'max:200'],
            'description' => ['required', 'min:60'],
            'slug' => ['nullable', 'string', 'min:3', 'max:255', 'unique:posts,slug,' . $post_id],
            'status' => ['required', 'in:published,draft,moderation']
        ]);

        $post = $post->findOrFail($post_id);

        $post->category_id = $request->category;
        $post->user_id = $request->author;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->status = $request->status;

        if(!$request->filled('slug')) {
            $post->slug = Str::slug($request->title);
        }

        if($request->hasFile('image')) {
            $post->image = $this->uploadImage($request->file('image'), 'images/posts', $post->slug, 90);
        }

        if($post->saveOrFail()) {
            $post->meta()->update([
                'title' => $request->meta_title ?? $request->title,
                'description' => $request->meta_description ?? null,
                'no_index' => $request->no_index ?? false,
                'no_follow' => $request->no_follow ?? false
            ]);

            return redirect()->route('dashboard.posts')->with('success', "Категорія створена");
        }
    }

    public function delete($post_id) {

    }
}
