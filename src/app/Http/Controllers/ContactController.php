<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $content = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail']);
        // 電話番号の結合
        $tell = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $content['tell'] = $tell;

        if ($request->has('content')) {
            $content['category'] = Category::find($request->input('content'))->content;
            $content['category_id'] = $request->input('content');
        }
        $categories = Category::all();
        return view('confirm', compact('content', 'categories'));

        // $categoryId = $request->input('category_id');
        // $category = Category::find($categoryId);

        // $category = $request->only(['content']);

        // $contacts = Contact::with('category')->get();
        // $categories = Category::all();
        // dd($categories);
        // $category = $request->only(['content']);

        // $categoryId = $request->input('content');
        // $category = Category::find($categoryId);



        // if ($request->has('content')) {
        //     $content['category'] = Category::find($request->input('content'))->content;
        //     $content['category_id'] = $request->input('content');
        // }
        // $categories = Category::all();

        // $category = Contact::with('category')->categorySearch($request->content)->get();
        // dd($category);

        // $categories = $request->input('content');

        // コントローラ内で内部結合
        // $category = DB::table('contacts')
        //     ->join('categories', 'contacts.category_id', '=', 'categories.id')
        //     ->get();
        // dd($category);

        // カテゴリテーブルのcontentを取得
        // $contact = new Contact();
        // $category = $contact->getCategoryContent();
        // dd($category);
        // $category = Category::where('content', $request->input('categoryId'))->first();

        // $category = $request->input('content');
        // dd($categoryContent);
        // $category = Category::where('content', $categoryContent)->first();

        // return view('confirm', compact('content', 'category'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }



}
