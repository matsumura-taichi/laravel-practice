<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $items = DB::table('authors')->get();
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
        $param = ['id' => $request->id];
        DB::table('authors')->where('id', $request->id)->delete();
        return redirect('/');
    }
}
