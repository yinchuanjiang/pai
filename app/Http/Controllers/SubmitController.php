<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitRequest;
use App\Models\WpPaiPhoto;
use App\Models\WpPaiPhotoImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubmitController extends Controller
{
    public function index(SubmitRequest $request)
    {
        $data = $request->all(['files', 'wp_pai_category_id', 'is_anonymous', 'content','mobile']);
        $files = $data['files'];
        unset($data['files']);
        $images = [];
        foreach ($files as $file){
            $dir = 'images';
            $images[] =  Storage::putFileAs($dir, $file, Str::random(40) . time() . '.' . Str::after($file->getClientOriginalName(), '.'));
        }
        DB::beginTransaction();
        try{
            /** @var WpPaiPhoto $photo */
            $photo = WpPaiPhoto::create($data);
            foreach ($images as $image){
                $saveImage = new WpPaiPhotoImage();
                $saveImage->image_url = asset(asset('uploads/'.$image));
                $photo->images()->save($saveImage);
            }
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            foreach ($images as $image){
                Storage::delete($image);
            }
            return show(400,$e->getMessage());
        }
        return show(200,'提交成功');
    }
}
