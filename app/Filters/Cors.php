<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Manejo de solicitudes preflight (OPTIONS)
        header('Access-Control-Allow-Origin: http://localhost:8081');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Access-Control-Max-Age: 3600');
        if ($request->getMethod() === 'options') {
            return $this->respond('', 204);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Configura los encabezados CORS
        // $response->setHeader('Access-Control-Allow-Origin', '*');
        // $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // $response->setHeader('Access-Control-Allow-Headers', 'Origin, Content-Type, Authorization');
    }
}
