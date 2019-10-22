<?php

namespace App\Http\Controllers;

class HelloController extends Controller
{
    public function index()
    {
        $data = [
            'msg' => 'サンプル',
            'msg2' => 'サンプル2',
        ];
        // return view('hello.index', $data);
        return response()->json($data);
    }

    public function other()
    {
        return redirect()->route('hello');
    }

    public function show($id)
    {
        $data = [
            'msg' => "id = {$id}",
        ];

        return response()->json($data);
    }





}
