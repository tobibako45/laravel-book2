<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\MyClasses\MyService;

class HelloController extends Controller
{
    // public function index(MyService $myService)
    public function index()
    {

        // サービスコンテナからインスタンスを取得
        // $myService = app(MyService::class);
        // $myService = app()->make(MyService::class);
        $myService = resolve(MyService::class);

        $data = [
            'msg' => $myService->say(),
            'data' => $myService->data(),
        ];

        // return view('hello.index', $data);
        return response()->json($data);
    }

    /**
     * @param $msg
     * @return void
     */
    public function other(Request $request)
    {
        // $data = [
        //     'msg' => $request->bye,
        // ];
        // return redirect()->route('hello'); # リダイレクト
        // return response()->json($data);

        // シンボリックリンク /storage/app/public/から、先頭に追加
        // Storage::disk('public')->prepend($this->fname, $msg);


        // /storage/app/public/hello.txtがあれば先に削除
        // if(Storage::disk('public')->exists('bk_'.$this->fname)){
        //     Storage::disk('public')->delete('bk_' . $this->fname);
        // }
        //
        // // /storage/app/public/hello.txtをコピーして、bk_hello.txtを作る
        // Storage::disk('public')->copy($this->fname, 'bk_' . $this->fname);
        //
        // // /storage/app/内に、bk_hello.txtがあれば削除
        // if (Storage::disk('local')->exists('bk_'.$this->fname)){
        //     Storage::disk('local')->delete('bk_' . $this->fname);
        // }
        // // /storage/app/から/storage/app/public/に移動
        // Storage::disk('local')->move('public/bk_' . $this->fname, 'bk_' . $this->fname);

        // ダウンロード
        // return Storage::disk('public')->download($this->fname);

        // putFileでアップロード
        // Storage::disk('local')->putFile('files', $request->file('file'));

        // putFileAsでアップロード
        // アップロードしたファイルの拡張子をextension()で取り出して格納。
        // $ext = '.' . $request->file('file')->extension();
        // Storage::disk('local')->putFileAs('files', $request->file('file'), 'upload'. $ext);

        return redirect()->route('hello');

        // return redirect()->route('hello');
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
