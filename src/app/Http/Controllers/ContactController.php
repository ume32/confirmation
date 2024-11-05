<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
    return view('index');
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        return view('confirm', compact('contact'));
    }
    public function store(Request $request)
    {
        $contact = session('contact_data');

        if (!$contact) {
            return redirect()->route('contact.edit')->with('error', 'データがありません。');
        }
        Contact::create($contact);
        session()->forget('contact_data');
        session(['thank_you' => true]);
        return redirect()->route('contact.thanks');
    }
    public function edit()
    {
    // セッションから以前の入力データを取得（なければ空配列）
    $contact = session('contact_data', []);

    // フォームにデータを渡して表示
    return view('index', compact('contact'));
    }
}