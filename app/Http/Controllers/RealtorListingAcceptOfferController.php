<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        //Accept offer
        $offer->update([
            'accepted_at' => now(),
            'rejected_at' => NULL,
        ]);

        //Reject other offers
        $offer->listing->offers()->except($offer)->update([
            'accepted_at' => NULL,
            'rejected_at' => now(),
        ]);

        return redirect()->back()->with('success', "Order was accepted. Other offers are rejected");
    }
}
