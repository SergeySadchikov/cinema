<?php
namespace App\Http\Controllers\Client;

use Illuminate\Routing\Controller as BaseController;

Class ClientController extends BaseController
{
    public function index()
    {
        return view('client.index');
    }
}