<?php

namespace Ringlives\Ring\Http\Controllers;

use Ringlives\Ring\Admin\AdminController;
use Ringlives\Ring\Supports\Controller;

class DashboardController extends AdminController
{
    public function index()
    {
        return $this->view('dashboard');
    }
}