<?php

namespace App\Http\Controllers\Pages\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NormativniDokumentiController extends Controller
{
    public function __invoke()
    {
        return view('pages/menu/normativni-dokumenti');
    }
}
