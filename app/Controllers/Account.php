<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index(): string
    {
        $data = ['title' => 'Gaming Store || My Account'];
        return view('account', $data);
    }
}
