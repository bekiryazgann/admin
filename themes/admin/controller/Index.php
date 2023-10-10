<?php
namespace themes\admin\controller;

use Core\Controller;

class Index extends Controller
{
    public function main(): string
    {
        redirect('admin/')
            ->send();
        return '';
    }
}