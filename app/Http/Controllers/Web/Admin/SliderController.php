<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\SliderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Web\Admin\Slider\UpdateSliderRequest;
use App\Models\Slider;
use App\Traits\FilesTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use FilesTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::with('image')->paginate();
        return view('web.admin.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create();
        $slider->image()->create([
            'image' => FilesTrait::store($request->file('image'), Slider::$img_path),
        ]);
        return redirect()->route('admin.sliders.index')->with('success', __('admin/slider/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $status = SliderStatusEnum::cases();
        return view('web.admin.pages.slider.edit', compact('slider', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $slider->update($request->validated());
        if ($request->hasFile('image')) {
            FilesTrait::delete($slider->image->image);
            $slider->image()->update([
                'image' => FilesTrait::store($request->file('image'), Slider::$img_path),
            ]);
        }
        return redirect()->route('admin.sliders.index')->with('success',  __('admin/slider/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        FilesTrait::delete($slider->image->image);
        $slider->image()->delete();
        $slider->delete();
        return back()->with('success', __('admin/slider/index.success'));
    }
}
