<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\View\View;

class IndustryController extends Controller
{
    /**
     * Display a listing of all industries.
     */
    public function index(): View
    {
        $industries = Industry::where('is_active', true)
            ->withCount('products')
            ->orderBy('name', 'asc')
            ->paginate(12);

        return view('frontend.industries.index', [
            'industries' => $industries,
        ]);
    }

    /**
     * Display industry details with related products.
     */
    public function show(string $slug): View
    {
        $industry = Industry::where('slug', $slug)
            ->with(['products' => function ($query) {
                $query->where('is_active', true);
            }])
            ->firstOrFail();

        $products = $industry->products()
            ->where('is_active', true)
            ->paginate(12);

        return view('frontend.industries.show', [
            'industry' => $industry,
            'products' => $products,
        ]);
    }
}
