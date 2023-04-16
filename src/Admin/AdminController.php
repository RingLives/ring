<?php

namespace Ringlives\Ring\Admin;

use Ringlives\Ring\Supports\Controller;

class AdminController extends Controller
{
    protected function view($fileName = '', $data = [])
    {
        return view(admin_theme() . $fileName, $data);
    }
}