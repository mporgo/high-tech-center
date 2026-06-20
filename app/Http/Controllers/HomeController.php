<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        $products = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        $blogPosts = BlogPost::published()
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('categories', 'products', 'blogPosts'));
    }

    public function products(Request $request)
    {
        $query = Product::with('category')->where('is_active', true);

        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->paginate(9);
        $categories = Category::where('is_active', true)->withCount('products')->get();

        return view('products', compact('products', 'categories'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Produits similaires de la même catégorie
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('detail_produits', compact('product', 'relatedProducts'));
    }

    public function blog()
    {
        $posts = BlogPost::published()->paginate(9);
        return view('blog', compact('posts'));
    }

    public function blogPost($slug)
    {
        $post = BlogPost::where('slug', $slug)->published()->firstOrFail();
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog-post', compact('post', 'relatedPosts'));
    }
}
