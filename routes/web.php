<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('articles', [\App\Http\Controllers\PageController::class, 'posts'])->name('articles');
Route::get('articles/category/{slug}', [\App\Http\Controllers\PageController::class, 'category'])->name('category.articles');
Route::get('articles/{slug_article}', [\App\Http\Controllers\PageController::class, 'post'])->name('article');

Route::get('strains', [\App\Http\Controllers\PageController::class, 'strains'])->name('strains');
Route::get('strains/{slug}', [\App\Http\Controllers\PageController::class, 'strain'])->name('strain');
Route::get('cannabinoid', [\App\Http\Controllers\CannabinoidControlller::class, 'page'])->name('cannabinoid.page');
Route::get('cannabinoid/{slug}', [\App\Http\Controllers\CannabinoidControlller::class, 'view'])->name('cannabinoid.view');

Route::get('strains/phenotype/{slug}', [\App\Http\Controllers\PageController::class, 'phenotype'])->name('phenotype.strains');
Route::get('phenotypes', [\App\Http\Controllers\PhenotypeController::class, 'page'])->name('phenotype.page');
Route::get('phenotype/{slug}', [\App\Http\Controllers\PhenotypeController::class, 'view'])->name('phenotype.view');

Route::get('strains/terpene/{slug}', [\App\Http\Controllers\PageController::class, 'terpene'])->name('terpene.strains');
Route::get('terpene', [\App\Http\Controllers\TerpeneControlller::class, 'page'])->name('terpene.page');
Route::get('terpene/{slug}', [\App\Http\Controllers\TerpeneControlller::class, 'view'])->name('terpene.view');

Route::post('news/subscribe', [\App\Http\Controllers\SubscribeController::class, 'join'])->name('subscribe');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Auth::routes(['register' => false]);

    // posts
    Route::get('posts', [\App\Http\Controllers\PostController::class, 'list'])->name('dashboard.posts');
    Route::get('posts/add', [\App\Http\Controllers\PostController::class, 'add'])->name('dashboard.post.add');
    Route::get('posts/{post_id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('dashboard.post.edit');
    Route::post('posts', [\App\Http\Controllers\PostController::class, 'create'])->name('dashboard.post.create');
    Route::put('posts/{post_id}', [\App\Http\Controllers\PostController::class, 'update'])->name('dashboard.post.update');
    Route::delete('posts/{post_id}', [\App\Http\Controllers\PostController::class, 'delete'])->name('dashboard.post.delete');

    // categories
    Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'list'])->name('dashboard.categories');
    Route::get('categories/add', [\App\Http\Controllers\CategoryController::class, 'add'])->name('dashboard.category.add');
    Route::get('categories/{category_id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::post('categories', [\App\Http\Controllers\CategoryController::class, 'create'])->name('dashboard.category.create');
    Route::put('categories/{category_id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('categories/{category_id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('dashboard.category.delete');

    // strains
    Route::get('strains/cannabinoids', [\App\Http\Controllers\StrainController::class, 'cannabinoids'])->name('dashboard.strains.cannabinoids');
    Route::get('strains/terpenes', [\App\Http\Controllers\StrainController::class, 'terpenes'])->name('dashboard.strains.terpenes');
    Route::get('strains/effects', [\App\Http\Controllers\StrainController::class, 'effects'])->name('dashboard.strains.effects');

    Route::get('strains', [\App\Http\Controllers\StrainController::class, 'list'])->name('dashboard.strains');
    Route::get('strains/add', [\App\Http\Controllers\StrainController::class, 'add'])->name('dashboard.strain.add');
    Route::get('strains/{strain_id}', [\App\Http\Controllers\StrainController::class, 'edit'])->name('dashboard.strain.edit');
    Route::post('strains', [\App\Http\Controllers\StrainController::class, 'create'])->name('dashboard.strain.create');
    Route::put('strains/{strain_id}', [\App\Http\Controllers\StrainController::class, 'update'])->name('dashboard.strain.update');
    Route::delete('strains/{strain_id}', [\App\Http\Controllers\StrainController::class, 'delete'])->name('dashboard.strain.delete');

    // strains parameters
    Route::get('phenotypes', [\App\Http\Controllers\PhenotypeController::class, 'list'])->name('dashboard.phenotypes');
    Route::get('phenotypes/{id}', [\App\Http\Controllers\PhenotypeController::class, 'edit'])->name('dashboard.phenotype.edit');
    Route::put('phenotypes/{id}', [\App\Http\Controllers\PhenotypeController::class, 'update'])->name('dashboard.phenotype.update');

    Route::get('terpenes', [\App\Http\Controllers\TerpeneControlller::class, 'list'])->name('dashboard.terpenes');
    Route::get('terpenes/{id}', [\App\Http\Controllers\TerpeneControlller::class, 'edit'])->name('dashboard.terpene.edit');
    Route::put('terpenes/{id}', [\App\Http\Controllers\TerpeneControlller::class, 'update'])->name('dashboard.terpene.update');

    Route::get('cannabinoids', [\App\Http\Controllers\CannabinoidControlller::class, 'list'])->name('dashboard.cannabinoids');
    Route::get('cannabinoids/{id}', [\App\Http\Controllers\CannabinoidControlller::class, 'edit'])->name('dashboard.cannabinoid.edit');
    Route::put('cannabinoids/{id}', [\App\Http\Controllers\CannabinoidControlller::class, 'update'])->name('dashboard.cannabinoid.update');

    Route::get('effects', [\App\Http\Controllers\EffectController::class, 'list'])->name('dashboard.effects');
    Route::get('effects/{id}', [\App\Http\Controllers\EffectController::class, 'edit'])->name('dashboard.effect.edit');
    Route::put('effects/{id}', [\App\Http\Controllers\EffectController::class, 'update'])->name('dashboard.effect.update');

    // users
    Route::get('users', [\App\Http\Controllers\UserController::class, 'list'])->name('dashboard.users');
    Route::get('users/add', [\App\Http\Controllers\UserController::class, 'add'])->name('dashboard.user.add');
    Route::get('users/{user_id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('dashboard.user.edit');
    Route::post('users', [\App\Http\Controllers\UserController::class, 'create'])->name('dashboard.user.create');
    Route::put('users/{user_id}', [\App\Http\Controllers\UserController::class, 'update'])->name('dashboard.user.update');

    // api
    Route::get('strain/cannabinoids', [\App\Http\Controllers\CannabinoidControlller::class, 'list']);
    Route::get('strain/terpenes', [\App\Http\Controllers\TerpeneControlller::class, 'list']);
});
