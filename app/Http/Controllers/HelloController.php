<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            // 'msg' => 'サンプル',
            // 'msg2' => 'サンプル2',
            'msg' => $request->hello
        ];
        // return view('hello.index', $data);
        return response()->json($data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg' => $request->bye,
        ];

        // return redirect()->route('hello'); # リダイレクト
        return response()->json($data);
    }

    public function show($id)
    {
        $data = [
            'msg' => "id = {$id}",
        ];

        return response()->json($data);
    }


}
