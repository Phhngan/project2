<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    //Hien thi toan bo
    function index()
    {
        $images = DB::table('Images')
            ->join('Products', 'Images.prd_id', '=', 'Products.prd_id')
            ->select('Images.*', 'Products.prd_name', 'Products.prd_code')
            ->get();
        return view('admin/images.index', ['images' => $images]);
    }

    //Xoa
    function delete($img_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            DB::table('Images')->where('img_id', $img_id)->delete();
            return redirect('admin/images');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }

    //Tao moi
    function create()
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            return view('admin/images.create');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }
    function save(Request $request)
    {
        $img_url = $request->file('image')->store('product');
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
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            $image = Image::findOrFail($img_id);
            if ($image == null) {
                return redirect()->route('error');
            }
            $images = DB::table('Images')
                ->join('Products', 'Products.prd_id', '=', 'Images.prd_id')
                ->select('Images.*', 'Products.prd_name')
                ->where('Images.img_id', $image->img_id)
                ->get();
            return view('admin/images.edit', ['images' => $images]);
            // return view('admin/images.edit', ['image' => $image]);
        } else {
            return view('error/khong-co-quyen-admin');
        }
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
