<?php

namespace Project1\Bootstrap;

class Navigation 
{
    public function render()
    {
        $navbar = <<<EOL
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Lead Entry</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/records.php">Records</a>
              </li>
            </ul>
            </div>
        </div>
        EOL;

        echo $navbar;
    }
}