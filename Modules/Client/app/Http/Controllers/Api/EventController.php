<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function __construct(
        
    )
    {}

    public function index()
    {
    }

    public function show($id)
    {
        return view('client::show');
    }
}
