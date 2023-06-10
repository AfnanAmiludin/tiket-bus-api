<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function createContentNews(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required'],
            'isi'  => ['required']
        ]);
        $createNews = News::create($attribute);
        if ($createNews) {
            return response()->json([
                'status' => 'SUCCES',
                'message' => 'Create data succes',
                'data' => $createNews
            ]);
        }
    }
    public function getData()
    {
        $getDataNews = News::all();
        return response()->json([
            'data' => $getDataNews
        ]);
    }
}
