<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cors {

    public function handle() {
        header("Access-Control-Allow-Origin: http://localhost:8081"); // Cambia según necesites
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            // Si es una petición OPTIONS, simplemente termina
            http_response_code(200);
            exit();
        }
    }
}
