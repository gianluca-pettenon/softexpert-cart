<?php

namespace App\Libraries;

use App\Config\Smarty as SmartyConfig;
use Smarty as SmartyTemplate;

class Smarty
{
    private array $data;
    private string $view;

    public function __construct(
        private SmartyTemplate $smarty
    ) {}

    private function initial(): void
    {
        $this->smarty->setTemplateDir(SmartyConfig::getPathTemplate());
        $this->smarty->setConfigDir(SmartyConfig::getPathConfig());
        $this->smarty->setCompileDir(SmartyConfig::getPathCompile());
        $this->smarty->setCacheDir(SmartyConfig::getPathCache());
    }

    /**
     * @param array $data
     * @return void
     */

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string $view
     * @return void
     */

    public function setView(string $view): void
    {
        $this->view = $view;
    }

    /**
     * @return array $data
     */

    private function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string $view
     */

    private function getView(): string
    {
        return $this->view;
    }

    /**
     * @return void
     */

    public function load(): void
    {
        $this->initial();

        $this->smarty->assign($this->getData());
        $this->smarty->display($this->smarty->getTemplateDir(0) . $this->getView() . SmartyConfig::getExtension());
    }
}
