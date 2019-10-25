<?php
// declare(strict_types=1);

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\MyClasses\MyService;

class HelloController extends Controller
{
    // ここで1回インスタンスを生成
    function __construct(MyService $myservice)
    {
        // ここで2回目のインスタンスを生成
        $myservice = app(MyService::class);
    }

    // ここで3回目のインスタンスを生成
    public function index(MyService $myservice, int $id = -1)
    {

        $myservice->setId($id);

        $data = [
            'msg'=> $myservice->say($id),
            'data'=> $myservice->alldata()
        ];

        return response()->json($data);

        // return view('hello.index', $data);
    }

}
