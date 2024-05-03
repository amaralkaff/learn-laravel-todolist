<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $name = 'John Doe';
        $
        $data = [
            'name' => $name,
            'age' => 30,
            'address' => '123 Main St, New York, NY 10030',
        ];

        return view('example.about', $data);
    }
}
