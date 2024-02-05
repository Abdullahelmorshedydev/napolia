<?php

namespace App\View\Composers;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class FavComposer
{
    public function compose(View $view): void
    {
        $favProducts = [];
        $favProdIds = [];
        if (auth('web')->user()) {
            if (auth()->user()) {
                $favs = Favourite::where('user_id', auth('web')->user()->id)->get();
                foreach ($favs as $fav) {
                    $favProducts[] = Product::where('id', $fav->product_id)->with(['images', 'colors'])->first();
                    $favProdIds[] = Product::where('id', $fav->product_id)->pluck('id')->first();
                }
            }
        }
        $view->with('favProducts', $favProducts)
            ->with('favProdIds', $favProdIds);
    }
}
