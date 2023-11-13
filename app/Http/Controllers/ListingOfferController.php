<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
     public function store(Listing $listing, Request $request)
     {
        
        $listing->offers()->create([
            ...$request->validate([
                'amount' => 'required|integer|min:1|max:20000000',
            ]),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success','Offer successfully added!');
     }
}
