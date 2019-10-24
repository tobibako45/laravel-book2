<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class HelloController extends Controller
{

    function __construct()
    {
        # ここで書き換わる
        // config(['sample.message' => '新しいメッセージ']);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // 独自config
        // $sample_msg = config('sample.message');
        // $sample_data = config('sample.data');

        // .envに独自変数を追加
        $sample_msg = env('SAMPLE_MESSAGE');
        $sample_data = env('SAMPLE_DATA');

        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data,
        ];

        // $data = [
        //     // 'msg' => 'サンプル',
        //     // 'msg2' => 'サンプル2',
        //     'msg' => $request->hello
        // ];
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
