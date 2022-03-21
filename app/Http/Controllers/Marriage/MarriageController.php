<?php

namespace App\Http\Controllers\Marriage;

use App\Http\Controllers\Controller;
use App\Models\Util;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'post_url'] = route( 'marriage.registre.create.post');
        $binding[ 'page_url'] = route( 'marriage.registre.create');

        $binding['fields'] = [
            ['title' => 'Zone Gérographique', false],
            ['title' => 'Acte de Mariage', false],
            ['title' => "Renseignement sur l'Epoux", false],
            ['title' => "Renseignement sur le Père de l'Epoux", false],
            ['title' => "Renseignement sur la Mère de l'Epoux", false],
            ['title' => "Renseignement sur l'Epouse", false],
            ['title' => "Renseignement sur le Père de l'Epouse", false],
            ['title' => "Renseignement sur la Mère de l'Epouse", false],
            ['title' => "Renseignements additionnels ", false],
            ['title' => "Jugement", false],
            ['title' => "Premier témoin de l'Epoux", false],
            ['title' => "Deuxieme témoin de l'Epoux", false],
            ['title' => "Premier témoin de l'Epouse", false],
            ['title' => "Deuxieme témoin de l'Epouse", false],
        ];

        return view('marriage.registre.create', $binding);
    }
}
