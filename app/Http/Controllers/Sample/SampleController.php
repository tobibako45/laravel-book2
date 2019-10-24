<?php
declare(strict_types=1);

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\HelloController;
use Illuminate\Http\Request;

class SampleController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = [
            'msg' => 'さんぷるこんとろーらーいんでっくす',
        ];

        // return view('hello.index', $data);
        return response()->json($data);
    }

    /**
     * @param Request $request
     */
    public function other(Request $request)
    {
        $data = [
            'msg' => 'さんぷるこんとろーらーOTHER',
        ];

        // return view('hello.other', $data);
        return response()->json($data);
    }


}
