<?php

namespace App\Http\Controllers\Web\Site;

use App\Enums\CategoryStatusEnum;
use App\Enums\SliderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $sliders = Slider::where('status', SliderStatusEnum::ACTIVE->value)->with('image')->get();
        $categories = Category::where('status', CategoryStatusEnum::ACTIVE->value)
            ->has('categories')
            ->with('image')->get();
        return view('web.site.pages.index', compact('sliders', 'categories'));
    }
}
