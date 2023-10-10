<?php

namespace themes\admin\controller;

use Core\Controller;
use Illuminate\Database\Capsule\Manager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Component extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function main($role, $id, Request $request, Response $response): string
    {
        $data = json_decode(str_ireplace("\\", "", htmlspecialchars_decode(get('data'))), true);
        $response->headers->set('Content-Type', 'application/json');
        return json_encode([
            'html' => $this->view('web-builder.components.' . $role . '.' . $id . '.html', ['data' => $data]),
            'css' => $this->view('web-builder.components.' . $role . '.' . $id . '.css', ['data' => $data]),
            'js' => $this->view('web-builder.components.' . $role . '.' . $id . '.js', ['data' => $data])
        ]);
    }
}