<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Centre;
use App\Models\Communes;
use App\Models\Deces;
use App\Models\Department;
use App\Models\Residence;
use App\Models\Pay;
use App\Models\Region;
use App\Models\User;
use App\Models\Util;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ResidenceController extends Controller
{
    
    public function index()
    {
        $add = DB::table('residence')
            ->join('users', 'residence.created_by', '=', 'users.id')
            ->select('residence.*')
            ->get();
        return view('residence.index', [
            'add' => $add
        ]);
    }
    public function create()
    {
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'post_url'] = route( 'residence.create.post');
        $binding[ 'page_url'] = route( 'residence.create');
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        return view('residence.create', $binding);
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
            $add = Residence::find( $inputs[ 'id']);
            $add->values = json_encode( $inputs);
            $add->update();
            return $add;
        } else if (array_key_exists('docId', $inputs)) {
            $add = Residence::find( $inputs[ 'docId']);
            $add->values = json_encode( $inputs);
            $add->update();
        } else
        {
            $add = new Residence();
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


        return Redirect::route('residence.index')->with('success', 'Ajout cr????e avec succ??s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $add = DB::table('residence')
            ->join('users', 'residence.created_by', '=', 'users.id')
            ->select('residence.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->where('residence.id', '=', $id)
            ->get()->first();
        $values = json_decode($add->values);

        $binding = [
            'registre' => collect($add),
            'values' => $values,
        ];

        return view('residence.show', $binding);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $old = Residence::find( $id);
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'old'] = $old->values;
        $binding[ 'post_url'] = route( 'residence.edit.post', [ 'id' => $id]);
        $binding[ 'page_url'] = route( 'residence.edit', [ 'id' => $id]);

        $binding[ 'is_edit'] = true;
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        return view('residence.create', $binding);
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
        $add = Residence::find( $id);
        $add->values = json_encode( $inputs);
        $add->update();

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            return response("{ \"message\": \"Add cr????e avec succ??s\"}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return Redirect::route('residence.index')->with('success', 'Add cr????e avec succ??s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Residence::destroy($id);
        return redirect()->route('residence.index')->with('success', 'Supprim??e avec succ??s');
    }
}
