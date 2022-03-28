<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $items = Author::all();
        return view('index', ['items' => $items]);
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ];
        DB::table('authors')->insert($param);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $item = DB::table('authors')->where('id', $request->id)->first();
        return view('edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ];
        DB::table('authors')->where('id', $request->id)->update($param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $item = DB::table('authors')->where('id', $request->id)->first();
        return view('delete', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('authors')->where('id', $request->id)->delete();
        return redirect('/');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Author::where('name', 'LIKE',"%{$request->input}%")->first();
        $param = [
            'item' => $item,
            'input' => $request->input
        ];
        return view('find', $param);
    }

    public function bind(Author $author)
    {
        $data = [
            'item'=>$author,
        ];
        return view('author.binds', $data);
    }
}
