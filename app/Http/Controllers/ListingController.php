<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->only(['create', 'store', 'edit', 'destroy']);
    }

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
        Listing::create($request->validate([
            'beds'=> 'required|numeric|min:1|max:20',
            'baths'=> 'required|numeric|min:1|max:20',
            'area'=> 'required|numeric|min:15|max:1500',
            'city'=> 'required|string|min:2|max:255',
            'code'=> 'required|string|min:2|max:255',
            'street'=> 'required|string|min:2|max:255',
            'street_nr'=> 'required|string|min:2|max:255',
            'price'=> 'required|numeric|min:10000|max:20000000',
        ]));

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
        return inertia('Listing/Edit', [
            'listing' => $listing,
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'beds'=> 'required|numeric|min:1|max:20',
            'baths'=> 'required|numeric|min:1|max:20',
            'area'=> 'required|numeric|min:15|max:1500',
            'city'=> 'required|string|min:2|max:255',
            'code'=> 'required|string|min:2|max:255',
            'street'=> 'required|string|min:2|max:255',
            'street_nr'=> 'required|string|min:2|max:255',
            'price'=> 'required|numeric|min:10000|max:20000000',
        ]));

        return redirect()->route('listing.index')
            ->with('success', 'Listing was updated');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->route('listing.index')->with('success','Listing was deleted!');
    }
}
