<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $hello = 'こんにちわ　ミドルウェアです。';
        $bye = 'さよなら　ミドルウェア...';
        $data = [
            'hello' => $hello,
            'bye' => $bye
        ];

        # Requestにmergeでhello、byeの値を追加。$request->helloで取り出す
        $request->merge($data);

        return $next($request);
    }
}
