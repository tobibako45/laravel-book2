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
        // $sample_msg = Storage::disk('public')->url($this->fname);
        // $sample_data = Storage::disk('public')->get($this->fname);

        # urlを得る
        $url = Storage::disk('public')->url($this->fname);
        # ファイルサイズを得る
        $size = Storage::disk('public')->size($this->fname);
        # 最終更新日を得る
        $modified = Storage::disk('public')->lastModified($this->fname);
        $modified_time = date('y-m-d H:i:s', $modified);

        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified_time];

        # ファイルを読み込む
        $sample_data = Storage::disk('public')->get($this->fname);

        $data = [
            'sample_keys' => $sample_keys,
            'sample_meta' => $sample_meta,
            'modified_time' => $modified_time,
            'sample_data' => explode(PHP_EOL, $sample_data),
        ];

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
