<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ContactsExport;


class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7); // 7件ごとのデータ表示
        return view('admin.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        // 部分一致検索
        if ($request->filled('name')) {
            $query->where('first_name', 'like', "%{$request->name}%")
                  ->orWhere('last_name', 'like', "%{$request->name}%");
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        // 性別検索
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        // カテゴリー検索
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 日付検索
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        return view('admin.index', compact('contacts'));
    }

    public function export(Request $request)
    {
        return Excel::download(new ContactsExport($request->all()), 'contacts.csv');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.show', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'データが削除されました');
    }
}
