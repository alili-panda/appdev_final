<?php

namespace App\Http\Controllers\socialWorker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myCasesController extends Controller
{
     public function index()
    {
        return view('social-worker.myCases');
    }
}
