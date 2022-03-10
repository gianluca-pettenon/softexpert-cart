<?php

namespace App\Controller;

use App\Core\Controller;

class Message extends Controller
{
    public function message(string $title, string $message, $code = 404)
    {
        http_response_code($code);
        $this->view('message/main', [
            'title' => $title,
            'message' => $message,
        ]);
    }
}
