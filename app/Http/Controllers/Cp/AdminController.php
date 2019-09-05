<?php

namespace App\Http\Controllers\Cp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getHomeRedirect()
    {
        return redirect('/cp/home');
    }
}
