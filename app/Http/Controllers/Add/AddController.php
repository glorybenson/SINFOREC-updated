<?php

namespace App\Http\Controllers\Add;

use App\Http\Controllers\Controller;
use App\Models\Util;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Add;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AddController extends Controller
{
    const GEO_ZONE = 'geographical_zone';
//    const VALIDATION_FIELDS = [
//        'first_name' => 'required',
//        'last_name' => 'required',
//        'date_naissance' => 'required',
//        'name_of_mother' => 'required',
//        'name_of_father' => 'required',
//        'mother_maiden_name' => 'required',
//    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $add = DB::table('naissance_add')
            ->join('users', 'naissance_add.created_by', '=', 'users.id')
            ->select('naissance_add.*')
            ->get();

        return view('naissance.registre.index', ['add' => $add]);
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
        $binding[ 'post_url'] = route( 'naissance.registre.create.post');
        $binding[ 'page_url'] = route( 'naissance.registre.create');

        return view('naissance.registre.create', $binding);
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
            $add = Add::find( $inputs[ 'id']);
            $add->values = json_encode( $inputs);
            $add->update();
            return $add;
        } else if (array_key_exists('docId', $inputs)) {
            $add = Add::find( $inputs[ 'docId']);
            $add->values = json_encode( $inputs);
            $add->update();
        } else
        {
            $add = new Add();
            $add->values = json_encode( $inputs);
            $add->created_by = Auth::user()[ 'id'];
            $add->done = isset( $ajax_call) ? 'no' : 'yes';
            $add->save();
            $inputs[ 'id'] = $add->id;
            $add->values = json_encode( $inputs);
            $add->update();
        }

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            $id = $add->id;
            return response("{ \"message\": \"Ajout créée avec succès\", \"id\": $id}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return Redirect::route('naissance.registre')->with('success', 'Ajout créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $add = DB::table('naissance_add')
            ->join('users', 'naissance_add.created_by', '=', 'users.id')
            ->select('naissance_add.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->get('department_id')->first();
            $department = 'geographical_zone-departments';
        $values = json_decode($add->values);
        return view('department' => $department 'naissance.registre.show', [
            'registre' => collect($add),
            'values' => $values,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $old = Add::find( $id);
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'old'] = $old->values;
        $binding[ 'post_url'] = route( 'naissance.registre.edit.post', [ 'id' => $id]);
        $binding[ 'page_url'] = route( 'naissance.registre.edit', [ 'id' => $id]);
        $binding[ 'is_edit'] = true;

        return view('naissance.registre.create', $binding);
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
        $add = Add::find( $id);
        $add->values = json_encode( $inputs);
        $add->update();

        if ( isset( $ajax_call))
        {
            return response("{ \"message\": \"Add créée avec succès\"}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return redirect()->back()->with('success', 'Add créée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Add::destroy($id);
        return redirect()->route('naissance.registre')->with('success', 'Supprimée avec succès');
    }
}
