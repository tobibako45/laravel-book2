<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{

    private $fname;

    function __construct()
    {
        // ここで書き換わる
        // config(['sample.message' => '新しいメッセージ']);

        $this->fname = 'hello.txt';

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
        // $sample_msg = env('SAMPLE_MESSAGE');
        // $sample_data = env('SAMPLE_DATA');

        # シンボリックリンク /storage/app/public/から読み込み
        $sample_msg = Storage::disk('public')->url($this->fname);
        $sample_data = Storage::disk('public')->get($this->fname);


        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data),
            // 'data' => $sample_data,
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
     * @param $msg
     * @return void
     */
    public function other($msg)
    {
        // $data = [
        //     'msg' => $request->bye,
        // ];
        // return redirect()->route('hello'); # リダイレクト
        // return response()->json($data);

        # シンボリックリンク /storage/app/public/から、先頭に追加
        Storage::disk('public')->prepend($this->fname, $msg);
        return redirect()->route('hello');
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
