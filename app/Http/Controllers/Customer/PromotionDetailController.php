<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Promotions;
use App\Models\Products;

class PromotionDetailController extends Controller
{
    //
    public function index()
    {
        $promotions = Promotions::all();
        return view('customer.promotion.all-promotion', compact('promotions'));
    }

    public function viewpromotion($slug)
    {
        if (Promotions::where('slug', $slug)->exists()) {
            $promotions = Promotions::where('slug', $slug)->first();
            return view('customer.promotion.detail', compact('promotions'));
        } else {
            return redirect('/')->with('status', "Slug does not exist");
        }
    }
}
