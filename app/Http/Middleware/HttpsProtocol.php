<?php

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class HttpsProtocol extends Middleware{

    protected $proxies = "*";
    /**
     * The headers that should be used to detect proxies.
     *
     * @var string
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;

    public function handle($request, Closure $next)
    {

        if (!$request->secure() ) {
            Request::setTrustedProxies([$request->getClientIp()],Request::HEADER_X_FORWARDED_ALL);
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}


