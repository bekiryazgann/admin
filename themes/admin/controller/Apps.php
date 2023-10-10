<?php

namespace themes\admin\controller;

use Core\Controller;
use Faker\Factory;

class Apps extends Controller
{

    /**
     * @return string
     */
    public function mail() :string
    {
        return $this->view('apps.mail.main');
    }
}