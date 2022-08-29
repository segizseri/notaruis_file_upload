<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        $files = File::with('folder', 'category')
            ->paginate(25);
        $folders = Folder::get(['id', 'name']);
        $categories = Category::get(['id', 'name']);
        return view('file', compact(['files', 'folders', 'categories']));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['name'] = $request->file('file')->getClientOriginalName();
        $data['type'] = $request->file('file')->extension();
        $data['path'] = $request->file('file')->store('public/files');
        File::create($data);
        return redirect()->route('file.index')->with('message', 'Успешно сохранено');
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->route('file.index')->with('message', 'Удалено');
    }
}
