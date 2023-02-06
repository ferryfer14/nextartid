<?php
/**
 * Created by NextArt.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\GroupGenre;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;
use Image;
use Cache;

class SliderController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $slider = Slider::orderBy('discover', 'desc')->orderBy('priority', 'asc');

        if ($this->request->has('term'))
        {
            $slider = $slider->where('name', 'like', '%' . $this->request->input('term') . '%');
        }

        $slider = $slider->paginate(50);

        return view('backend.slider.index')->with('slider', $slider);
    }

    public function sort()
    {
        $sliderIds = $this->request->input('sliderIds');

        foreach ($groupIds AS $index => $groupId) {
            DB::table('sliders')
                ->where('id', $groupId)
                ->update(['priority' => $index + 1]);
        }

        Cache::clear('discover');

        return redirect()->route('backend.slider')->with('status', 'success')->with('message', 'Priority successfully changed!');
    }

    public function delete()
    {
        Slider::where('id', $this->request->route('id'))->delete();
        Cache::clear('discover');
        return redirect()->route('backend.slider')->with('status', 'success')->with('message', 'Slider successfully deleted!');
    }

    public function add()
    {
        return view('backend.slider.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'name' => 'required|string|unique:group_genres',
            'artwork' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
        ]);

        $slider = new Slider();
        $slider->fill($this->request->except('_token'));

        if($this->request->input('discover')) {
            $slider->discover = 1;
        } else {
            $slider->discover = 0;
        }

        $slider->save();

        if ($this->request->hasFile('artwork'))
        {
            $slider->clearMediaCollection('artwork');
            $slider->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 1200)), intval(config('settings.image_artwork_max', 600)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        Cache::clear('discover');

        return redirect()->route('backend.slider')->with('status', 'success')->with('message', 'Slider successfully added!');
    }

    public function edit()
    {
        $slider = Slider::findOrFail($this->request->route('id'));

        return view('backend.slider.form')
            ->with('slider', $slider);
    }

    public function editPost()
    {
        $this->request->validate([
            'name' => 'nullable|string|max:50'
        ]);

        $slider = Slider::findOrFail($this->request->route('id'));

        if($slider->name != $this->request->input('name')) {
            $this->request->validate([
                'name' => 'required|string|unique:sliders',

            ]);
        }

        $slider->fill($this->request->except('_token'));

        if($this->request->input('discover')) {
            $slider->discover = 1;
        } else {
            $slider->discover = 0;
        }

        if ($this->request->hasFile('artwork'))
        {
            $this->request->validate([
                'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
            ]);

            $slider->clearMediaCollection('artwork');
            $slider->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(1200), intval(600))->encode('jpg', config('settings.image_jpeg_quality', 100))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        $slider->save();
        Cache::clear('discover');

        return redirect()->route('backend.slider')->with('status', 'success')->with('message', 'Slider successfully edited!');
    }
}