<?php

namespace App\Http\Controllers\Celibat;

use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Centre;
use App\Models\Communes;
use App\Models\Deces;
use App\Models\Department;
use App\Models\Celibat;
use App\Models\Pay;
use App\Models\Region;
use App\Models\User;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

final class CelibatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $add = DB::table('celibat')
            ->join('users', 'celibat.created_by', '=', 'users.id')
            ->select('celibat.*')
            ->get();
        return view('celibat.index', [
            'add' => $add
        ]);
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
        $binding[ 'post_url'] = route( 'celibat.create.post');
        $binding[ 'page_url'] = route( 'celibat.create');
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        return view('celibat.create', $binding);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);

        if( array_key_exists( 'src', $inputs))
        {
            unset( $inputs[ 'src']);
            $ajax_call = true;
        }

        if( array_key_exists( 'id', $inputs)) {
            $add = Celibat::find( $inputs[ 'id']);
            $add->values = json_encode( $inputs);
            $add->update();
            return $add;
        } else if (array_key_exists('docId', $inputs)) {
            $add = Celibat::find( $inputs[ 'docId']);
            $add->values = json_encode( $inputs);
            $add->update();
        } else
        {
            $add = new Celibat();
            $add->values = json_encode( $inputs);
            $add->created_by = Auth::user()[ 'id'];
            $add->save();
        }


        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            $id = $add->id;
            return response("{ \"message\": \"Ajout cr????e avec succ??s\", \"id\": $id}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }


        return Redirect::route('celibat.index')->with('success', 'Ajout cr????e avec succ??s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $add = DB::table('celibat')
            ->join('users', 'celibat.created_by', '=', 'users.id')
            ->select('celibat.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->where('celibat.id', '=', $id)
            ->get()->first();
        $values = json_decode($add->values);

        $binding = [
            'registre' => collect($add),
            'values' => $values,
        ];

        return view('celibat.show', $binding);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $old = Celibat::find( $id);
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'old'] = $old->values;
        $binding[ 'post_url'] = route( 'celibat.edit.post', [ 'id' => $id]);
        $binding[ 'page_url'] = route( 'celibat.edit', [ 'id' => $id]);

        $binding[ 'is_edit'] = true;
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        return view('celibat.create', $binding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|Response
     */
    public function update( Request $request, $id)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        if( array_key_exists( 'src', $inputs))
        {
            unset( $inputs[ 'src']);
            $ajax_call = true;
        }
        $add = Celibat::find( $id);
        $add->values = json_encode( $inputs);
        $add->update();

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            return response("{ \"message\": \"Add cr????e avec succ??s\"}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return Redirect::route('celibat.index')->with('success', 'Add cr????e avec succ??s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Celibat::destroy($id);
        return redirect()->route('celibat.index')->with('success', 'Supprim??e avec succ??s');
    }
}
