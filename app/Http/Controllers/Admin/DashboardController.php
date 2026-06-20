<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => Category::count(),
            'products' => Product::count(),
            'blog_posts' => BlogPost::where('status', 'published')->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
