<?php

namespace App\Http\Controllers;
use App\Models\Writer;

use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
{
    $writers = Writer::with('user')->get(); // Fetch writers with user info
    return view('Writers.index', compact('Writers'));
}
}

