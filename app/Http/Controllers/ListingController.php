<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function index()
    {
        return inertia('Listing/Index', [
            'listings' => Listing::all(),
        ]);
    }

    public function create()
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        Listing::create($request->all());

        return redirect()->route('listing.index')
            ->with('success', 'Listing was created');
    }

    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'listing' => $listing,
        ]);
    }

    public function edit(Listing $listing)
    {
        //
    }

    public function update(Request $request, Listing $listing)
    {
        //
    }

    public function destroy(Listing $listing)
    {
        //
    }
}
