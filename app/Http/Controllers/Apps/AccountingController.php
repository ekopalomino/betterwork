<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;

class AccountingController extends Controller
{
    public function index()
    {
    	return view('apps.pages.accountingHome');
    }
}
