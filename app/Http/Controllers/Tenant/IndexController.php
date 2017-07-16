<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // index 商户中心主页
    public function index()
    {
    	return view('tenant.index.index', ['title' => '商户中心']);
    }
}
