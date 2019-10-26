<?php
// declare(strict_types=1);

namespace App\Http\Controllers;

// use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(MyServiceInterface $myService, int $id = -1)
    {

        $myService->setId($id);

        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata()
        ];

        // return response()->json($data);

        return view('hello.index', $data);
    }

}
