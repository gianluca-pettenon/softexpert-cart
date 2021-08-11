<?php

namespace App\Core;

class Controller
{
    protected function load(string $view, $params = [])
    {
        $twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader('../App/View/'));

        $twig->addGlobal('BASEURL', BASEURL);
        echo $twig->render($view . '.twig.php', $params);
    }

    public function showMessage(string $title, string $description, int $httpCode = 200)
    {
        http_response_code($httpCode);

        $this->load('partials/message',
            [
                'title' => $title,
                'description' => $description
            ]
        );
    }
}
