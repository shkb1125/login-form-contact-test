<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // 問い合わせフォーム
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }

    // 問い合わせフォーム確認画面
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
    }

    // 問い合わせ内容登録
    public function store(Request $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

}
