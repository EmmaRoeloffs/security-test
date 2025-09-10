<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandController extends Controller
{
     public function run(Request $request)
    {
        $cmd = $request->input('cmd'); // hier komt de user input binnen

        return view('command', [
            'command' => $cmd,
            'output'  => exec($cmd)
        ]);
    }
}
