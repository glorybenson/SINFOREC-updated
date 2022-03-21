<?php

namespace App\Http\Controllers\Marriage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

final class MarriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $add = DB::table('marriage')
            ->join('users', 'marriage.created_by', '=', 'users.id')
            ->select('marriage.*')
            ->get();

        return view('marriage.registre.index', ['add' => $add]);
    }
}
