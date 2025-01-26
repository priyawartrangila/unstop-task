<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIpMiddleware
{
    public function handle($request, Closure $next)
    {
        // Define the array of blocked IP addresses
        //$blockedIps = ['127.0.0.1'];
		$blockedIps = [];

        // Get the client's IP address
        $clientIp = $request->ip();

        // Check if the client's IP matches any blocked IP
        if (in_array($clientIp, $blockedIps)) {
            // Optionally, you can log the blocked attempt or perform other actions

            // Return a response indicating that the request is blocked
            $response = [
					'success' => false,
					'status' => 401,
					'message' => 'Unauthorized',
				];
			return response(json_encode($response));
        }

        // Continue with the request if the IP is not blocked
        return $next($request);
    }
}