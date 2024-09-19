<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Aquí puedes manejar lógicas adicionales antes de la solicitud
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Agregar cabeceras CORS
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        // Manejar la solicitud OPTIONS (preflight request)
        if ($request->getMethod() === 'options') {
            $response->setStatusCode(200);
            $response->setBody('');
            return $response; // Devuelve la respuesta
        }

        return $response; // Asegúrate de devolver la respuesta en otros casos también
    }
}
