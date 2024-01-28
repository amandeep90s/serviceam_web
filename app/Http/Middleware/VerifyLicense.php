<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class VerifyLicense
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws GuzzleException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = $_SERVER['SERVER_NAME'];
        $path = storage_path('license') . '/' . $domain . '.json';

        if (!file_exists($path)) {
            abort(500, 'Contact our team to access your domain');
        }

        $config = file_get_contents($path);
        $accessKey = json_decode($config, true)['accessKey'];

        $client = new Client();
        $params = [
            'form_params' => ['access_key' => $accessKey, 'domain' => $domain],
        ];

        try {
            $result = $client->post(env('BASE_URL') . '/verify', $params);

            $redis = Redis::connection();

            if ($redis->get($domain) === null) {
                $redis->set($domain, json_encode(json_decode($result->getBody())));
            }

        } catch (ClientException $exception) {
            dd(json_decode($exception->getResponse()->getBody())->message);
        } catch (Exception $exception) {
            dd($exception);
        }

        return $next($request);
    }
}
