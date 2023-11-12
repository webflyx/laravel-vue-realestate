<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            'by' => $request->get('by'),
            'order' => $request->get('order') ? $request->get('order') :'desc',
        ];

        return inertia("Realtor/Index", [
            'listings' => Auth::user()->listings()->withCount('images')->filter($filters)->latest()->paginate(3)->withQueryString(),
            'filters' => $filters,
        ]);
    }

    public function create()
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|numeric|min:1|max:20',
                'baths' => 'required|numeric|min:1|max:20',
                'area' => 'required|numeric|min:15|max:1500',
                'city' => 'required|string|min:2|max:255',
                'code' => 'required|string|min:2|max:255',
                'street' => 'required|string|min:2|max:255',
                'street_nr' => 'required|string|min:2|max:255',
                'price' => 'required|numeric|min:10000|max:20000000',
            ])
        );

        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing was created');
    }

    public function edit(Listing $listing)
    {
        return inertia('Realtor/Edit', [
            'listing' => $listing,
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'beds' => 'required|numeric|min:1|max:20',
            'baths' => 'required|numeric|min:1|max:20',
            'area' => 'required|numeric|min:15|max:1500',
            'city' => 'required|string|min:2|max:255',
            'code' => 'required|string|min:2|max:255',
            'street' => 'required|string|min:2|max:255',
            'street_nr' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:10000|max:20000000',
        ]));

        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing was updated');
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success', 'Listing was deleted!');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()->with('success', 'Listing was restored!');
    }
}
