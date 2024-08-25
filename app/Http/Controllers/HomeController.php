<?php

namespace App\Http\Controllers;

use App\Models\Promotions;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     // banner
    //     $promotions = Promotions::all();

    //     $featured_product = Products::where('trending', '1')->take(15)->get();
    //     $trending_category = Categories::where('popular', '1')->take(15)->get();

    //     $category = Categories::all();

    //     return view('customer.home', compact('promotions', 'featured_product', 'trending_category', 'category'));
    // }

    public function index()
    {
        // Check if user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check if the user's fname is null
            if (is_null($user->fname)) {
                return view('customer.personal.edit', compact('user'))
                    ->with('status', 'Please complete your profile before proceeding.');
            }
        }

        // Fetch the required data for the home page
        $promotions = Promotions::all();

        $featured_product = Products::where('trending', '1')->take(15)->get();
        $trending_category = Categories::where('popular', '1')->take(15)->get();

        $category = Categories::all();

        return view('customer.home', compact('promotions', 'featured_product', 'trending_category', 'category'));
    }

}
