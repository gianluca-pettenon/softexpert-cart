<?php

namespace App\Core;

use App\Libraries\Smarty;
use Smarty as SmartyTemplate;

class Controller
{

    protected function view(string $view, array $data = []): void
    {
        $smarty = new Smarty(new SmartyTemplate);

        $smarty->setData($data);
        $smarty->setView($view);
        $smarty->load();
    }

    public function showMessage(string $title, string $description, int $httpCode = 200): void
    {
        http_response_code($httpCode);

        $this->view(
            'partials/message',
            [
                'title' => $title,
                'description' => $description
            ]
        );
    }
}
