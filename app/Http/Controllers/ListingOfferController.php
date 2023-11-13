<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Notifications\OfferMade;
use Auth;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
     public function store(Listing $listing, Request $request)
     {
        $this->authorize('view', $listing);
        
        $offer = $listing->offers()->create([
            ...$request->validate([
                'amount' => 'required|integer|min:1|max:20000000',
            ]),
            'user_id' => Auth::user()->id,
        ]);
        
        $offer->user->notify(new OfferMade($offer));

        return redirect()->back()->with('success','Offer successfully added!');
     }
}
