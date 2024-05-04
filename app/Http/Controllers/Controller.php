<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
    {
        $response = response()->view('todos.index', compact('todos'));
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        return $response;
    }
}
