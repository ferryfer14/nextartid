<?php
/**
 * Created by NextArt.
 * Date: 2019-05-25
 * Time: 21:02
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Auth;
use DB;
use Image;
use Cache;

class VouchersController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        $vouchers = Voucher::paginate(20);

        return view('backend.vouchers.index')
            ->with('vouchers', $vouchers);
    }

    public function delete()
    {
        Voucher::where('id', $this->request->route('id'))->delete();
        return redirect()->route('backend.vouchers')->with('status', 'success')->with('message', 'Voucher successfully deleted!');
    }

    public function add()
    {
        return view('backend.vouchers.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'code' => 'required|unique:vouchers',
            'amount' => 'nullable|int',
            'user' => 'nullable',
            'meta_title' => 'nullable|int',
            'usage_limit' => 'nullable|int',
            'artwork' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
        ]);

        $vouchers = new Voucher();
        $vouchers->fill($this->request->except('_token'));
        $user = null;
        if (is_array($this->request->input('user')))
        {
            $user = implode(',', $this->request->input('user'));
            $vouchers->user = $user ? $user :null;
        }else{
            $vouchers->user =  $this->request->input('user');
        }
        $vouchers->approved = $this->request->input('approved') ? 1 : 0;

        $vouchers->save();

        if ($this->request->hasFile('artwork'))
        {
            $vouchers->clearMediaCollection('artwork');
            $vouchers->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(1200), intval(1200))->encode('jpg', config('settings.image_jpeg_quality', 100))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        return redirect()->route('backend.vouchers')->with('status', 'success')->with('message', 'Voucher successfully created!');
    }

    public function edit()
    {
        $vouchers = Voucher::findOrFail($this->request->route('id'));
        return view('backend.vouchers.form')->with('voucher', $vouchers);
    }

    public function editPost()
    {
        $this->request->validate([
            'amount' => 'nullable|int',
            'meta_title' => 'nullable|int',
            'user' => 'nullable',
            'usage_limit' => 'nullable|int',
        ]);

        $voucher = Voucher::findOrFail($this->request->route('id'));

        if($voucher->code != $this->request->input('code')) {
            $this->request->validate([
                'code' => 'required|unique:vouchers',
            ]);
        }

        $voucher->fill($this->request->except('_token'));
        $voucher->approved = $this->request->input('approved') ? 1 : 0;

        $user = null;
        if (is_array($this->request->input('user')))
        {
            $user = implode(',', $this->request->input('user'));
            $voucher->user = $user ? $user :null;
        }else{
            $voucher->user =  $this->request->input('user');
        }
        if ($this->request->hasFile('artwork'))
        {
            $this->request->validate([
                'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
            ]);
            $voucher->clearMediaCollection('artwork');
            $voucher->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(1200), intval(1200))->encode('jpg', config('settings.image_jpeg_quality', 100))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }
        $voucher->save();

        return redirect()->route('backend.vouchers')->with('status', 'success')->with('message', 'Static page successfully created!');
    }
}