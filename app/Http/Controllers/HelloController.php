<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function other(Request $request)
    {
        $data = [
            'msg' => $request->bye,
        ];

        // return redirect()->route('hello'); # リダイレクト
        return response()->json($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = [
            'msg' => "id = {$id}",
        ];

        return response()->json($data);
    }


}
