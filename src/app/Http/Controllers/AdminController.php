<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    // 検索機能
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date = $request->input('date');

        // 検索結果のページネーション
        $contacts = Contact::KeywordSearch($keyword, $gender, $category_id, $date)->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
