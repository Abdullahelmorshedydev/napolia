<?php

namespace App\View\Composers;

use App\Enums\CategoryStatusEnum;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryComposer
{
    public function compose(View $view): void
    {
        $parentCategories = Category::where('category_id', null)->where('status', CategoryStatusEnum::ACTIVE->value)->get();
        $cats = Category::where('status', CategoryStatusEnum::ACTIVE->value)->get();
        $view->with('parentCategories', $parentCategories)
            ->with('cats', $cats);
    }
}
