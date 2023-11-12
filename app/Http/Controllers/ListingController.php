<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function __construct()
    {
        // $this->middleware("auth")->only(['create', 'store', 'edit', 'destroy']);
        $this->authorizeResource(Listing::class);
    }

    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);

        $listings = Listing::latest()
            ->filter($filters)
            ->paginate(10)
            ->withQueryString();


        return inertia('Listing/Index', [
            'listings' => $listings,
            'filters' => $filters
        ]);
    }


    public function show(Listing $listing)
    {
        $listing->load(['images']);

        return inertia('Listing/Show', [
            'listing' => $listing,
        ]);
    }

}
