<?php
declare(strict_types=1);

namespace mvc\Controllers;

class PageController
{

    public function index(): void
    {
        require __DIR__ . '/../../views/index.html';
    }

    public function error(): void
    {
        require __DIR__ . '/../../views/404.html';
    }

}