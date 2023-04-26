<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Phenotype;
use App\Models\Terpene;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Strain;

class PageController extends Controller
{
    public function home() {
        $categories = Category::where('status', 'published')->get();
        $posts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(4)->get();
        $strains = Strain::where('active', 1)->inRandomOrder()->limit(8)->get();

        return view('client.home', compact('posts', 'categories', 'strains'));
    }

    public function posts() {
        $posts = Post::where('status', 'published')->paginate(10);
        $categories = Category::where('status', 'published')->get();

        return view('client.posts.list', compact('posts', 'categories'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $posts = Post::where('category_id', $post->category_id)->where('status', 'published')->limit(3)->get();

        return view('client.posts.view', compact('post', 'posts'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::where('status', 'published')->get();
        $posts = Post::where('category_id', $category->id)->where('status', 'published')->paginate(10);

        return view('client.posts.list', compact('category', 'posts', 'categories'));
    }

    public function strains() {
        $phenotypes = Phenotype::where('active', 1)->get();
        $strains = Strain::where('active', 1)->paginate(40);

        return view('client.strains.list', compact('strains', 'phenotypes'));
    }

    public function strain($slug) {
        $strain = Strain::where('slug', $slug)->where('active', 1)->firstOrFail();

        $strains = Strain::query();

        if($strain->phenotype_id) {
            $strains->where('phenotype_id', $strain->phenotype_id);
        }

        if($strain->terpene_id) {
            $strains->where('terpene_id', $strain->terpene_id);
        }

        $strains = $strains->where('active', 1)->inRandomOrder()->limit(8)->get();

        return view('client.strains.view', compact('strain', 'strains'));
    }

    public function phenotype($slug) {
        $phenotype = Phenotype::where('slug', $slug)->firstOrFail();

        if($phenotype->strains->count() > 0) {
            $strains = Strain::where('phenotype_id', $phenotype->id)->where('active', 1)->paginate(10);
            $phenotypes = Phenotype::where('active', 1)->get();

            return view('client.strains.phenotype', compact('strains', 'phenotype', 'phenotypes'));
        }

        abort(404);
    }

    public function terpene($slug) {
        $terpene = Terpene::where('slug', $slug)->firstOrFail();
        $phenotypes = Phenotype::where('active', 1)->get();

        $strains = Strain::where('active', 1)->where('terpene_id', $terpene->id)->paginate(10);

        return view('client.strains.list', compact('strains', 'phenotypes'));
    }

    public function about() {
        $posts = Post::where('status', 'published')->inRandomOrder()->limit(8)->get();

        return view('client.page.about', compact('posts'));
    }
}
