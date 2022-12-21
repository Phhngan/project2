<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    //Hien thi toan bo
    function index()
    {
        $images = Image::get();
        return view('admin/images.index', ['images' => $images]);
    }

    //Xoa
    function delete($img_id)
    {
        DB::table('Images')->where('img_id', $img_id)->delete();
        return redirect('admin/images');
    }

    //Tao moi
    function create()
    {
        return view('admin/images.create');
    }
    function save(Request $request)
    {
        $img_url = $request->get('imageURL');
        $img_role = $request->get('imageRole');
        $prd_id = $request->get('productId');
        DB::table('Images')->insert(
            ['img_url' => $img_url, 'img_role' => $img_role, 'prd_id' => $prd_id]
        );
        return redirect('admin/images');
    }

    //Sua 
    function edit($img_id)
    {
        $image = Image::findOrFail($img_id);
        if ($image == null) {
            return redirect()->route('error');
        }
        return view('admin/images.edit', ['image' => $image]);
    }
    function update(Request $request, $img_id)
    {
        $img_url = $request->get('imageURL');
        $img_role = $request->get('imageRole');
        $prd_id = $request->get('productId');
        DB::table('Images')->where('img_id', $img_id)->update(
            ['img_url' => $img_url, 'img_role' => $img_role, 'prd_id' => $prd_id]
        );
        return redirect('admin/images');
    }
}
