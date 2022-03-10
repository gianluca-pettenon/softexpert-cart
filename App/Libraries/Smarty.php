<?php

namespace App\Libraries;

use App\Config\Smarty as SmartyConfig;
use Smarty as SmartyTemplate;

class Smarty
{
    private $smarty;
    private $data;
    private $view;

    public function __construct(SmartyTemplate $smarty)
    {
        $this->smarty = $smarty;
    }

    private function initial(): void
    {
        $this->smarty->setTemplateDir(SmartyConfig::getPathTemplate());
        $this->smarty->setConfigDir(SmartyConfig::getPathConfig());
        $this->smarty->setCompileDir(SmartyConfig::getPathCompile());
        $this->smarty->setCacheDir(SmartyConfig::getPathCache());
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function setView(string $view): void
    {
        $this->view = $view;
    }

    private function getData(): array
    {
        return $this->data;
    }

    private function getView(): string
    {
        return $this->view;
    }

    public function load()
    {
        $this->initial();

        $this->smarty->assign($this->getData());
        $this->smarty->display($this->smarty->getTemplateDir(0) . $this->getView() . SmartyConfig::getExtension());
    }
}
