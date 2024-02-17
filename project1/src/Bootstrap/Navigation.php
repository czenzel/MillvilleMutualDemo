<?php

namespace Bootstrap;

class Navigation 
{
    public function __construct($title = 'Project', $navigation = [])
    {
        $this->title = $title;
        $this->navigation = $navigation;
    }

    public function render()
    {
        $links = '';

        foreach ($this->navigation as $item)
        {
            $title = $item['title'];
            $url = $item['url'];

            $links .= <<<EOL
            <li class="nav-item">
            <a class="nav-link" href="{$url}">{$title}</a>
            </li>
            EOL;
        }

        $navbar = <<<EOL
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">{$this->title}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            {$links}
            </ul>
            </div>
        </div>
        EOL;

        echo $navbar;
    }
}