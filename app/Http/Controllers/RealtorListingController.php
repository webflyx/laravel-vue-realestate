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
            'listings' => Auth::user()->listings()->filter($filters)->latest()->paginate(3)->withQueryString(),
            'filters' => $filters,
        ]);
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->route('realtor.listing.index')->with('success', 'Listing was deleted!');
    }
}
