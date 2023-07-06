<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    //
    function index()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $news = DB::table('News')
                ->select('News.*')
                ->orderByDesc('new_id')
                ->get();
            return view('admin/news.index', ['news' => $news]);
        }
    }

    function show($new_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $new = News::findOrFail($new_id);
            return view('admin/news.detail', ['new' => $new]);
        }
    }

    function create()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 5) {
                return view('admin/news.create');
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function save(Request $request)
    {
        $newsName = $request->get('newsName');
        $newsImage = $request->file('newsImage')->store('public');
        $newsDate = $request->get('newsDate');
        $newsContent = $request->get('newsContent');

        DB::table('News')->insert(
            [
                'new_title' => $newsName, 'new_image' => $newsImage, 'new_day' => $newsDate, 'new_content' => $newsContent,
            ]
        );
        return redirect('admin/news');
    }

    function edit($new_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 5) {
                $new = News::findOrFail($new_id);
                // $product = DB::table('Product')->where('prd_id',$prd_id)->get();
                if ($new == null) {
                    return redirect()->route('error');
                }
                return view('admin/news.edit', ['new' => $new]);
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function update(Request $request, $new_id)
    {
        $newsName = $request->get('newsName');
        $newsDate = $request->get('newsDate');
        $newsDescription = $request->get('newsDescription');
        $image = $request->file('newsImage');
        if ($image != null) {
            $newsImage = $request->file('newsImage')->store('public');
            DB::table('News')->where('new_id', $new_id)
                ->update([
                    'new_title' => $newsName, 'new_image' => $newsImage, 'new_day' => $newsDate, 'new_content' => $newsDescription,
                ]);
        } else {
            DB::table('News')->where('new_id', $new_id)
                ->update([
                    'new_title' => $newsName, 'new_day' => $newsDate, 'new_content' => $newsDescription,
                ]);
        }
        return redirect('admin/news');
    }

    function newsMain()
    {
        $day = date('Y-m-j');
        $dateUp = strtotime('+30 day', strtotime($day));
        $dateUp = date('Y-m-j', $dateUp);
        $dateDown = strtotime('-30 day', strtotime($day));
        $dateDown = date('Y-m-j', $dateDown);
        $news = DB::table('News')
            ->select('News.*')
            ->whereBetween('News.new_day', [$dateDown, $dateUp])
            ->orderByDesc('new_id')
            ->paginate(2);
        // dd($news);
        return view('user.tintuc', ['news' => $news]);
    }
    function newsShow($new_id)
    {
        $news = DB::table('News')
            ->select('News.*')
            ->where('News.new_id', $new_id)
            ->get();
        // dd($news);
        return view('user.bai-viet', ['news' => $news]);
    }
}
