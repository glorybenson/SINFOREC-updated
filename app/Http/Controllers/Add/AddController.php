<?php

namespace App\Http\Controllers\Add;

use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Centre;
use App\Models\Communes;
use App\Models\Department;
use App\Models\Pay;
use App\Models\Region;
use App\Models\Util;
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
            return response("{ \"message\": \"Ajout cr????e avec succ??s\", \"id\": $id}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return Redirect::route('naissance.registre')->with('success', 'Ajout cr????e avec succ??s');
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
            ->where('naissance_add.id', '=', $id)
            ->get()->first();
        $values = json_decode($add->values);

        $binding = [
            'registre' => collect($add),
            'values' => $values,
        ];

        $valuesArr = json_decode($add->values, true);

        $binding['models'] = [
            'judgement-region' => empty($valuesArr['judgement-region']) ? '--' :
                Region::find($values->{'judgement-region'})->description,
            'geographical_zone-pays' => empty($valuesArr['geographical_zone-pays']) ? '--' :
                Pay::find($values->{'geographical_zone-pays'})->description,
            'geographical_zone-centre' => empty($valuesArr['geographical_zone-centre']) ? '--' :
                Centre::find($values->{'geographical_zone-centre'})->description,
            'geographical_zone-communes' => empty($valuesArr['geographical_zone-communes']) ? '--' :
                Communes::find($values->{'geographical_zone-communes'})->description,
            'geographical_zone-departments' => empty($valuesArr['geographical_zone-departments']) ? '--' :
                Department::find($values->{'geographical_zone-departments'})->description,
            'geographical_zone-regions' => empty($valuesArr['geographical_zone-regions']) ? '--' :
                Region::find($values->{'geographical_zone-regions'})->description,
            'geographical_zone-arrondissements' => empty($valuesArr['geographical_zone-arrondissements']) ? '--' :
                Arrondissement::find($values->{'geographical_zone-arrondissements'})->description,
        ];

        return view('naissance.registre.show', $binding);
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
        $formFields = [
            ['geographical_zone-pays', 'geographical_zone-arrondissements', 'geographical_zone-departments',
                'geographical_zone-communes', 'geographical_zone-regions', 'geographical_zone-centre'],
            ['child_info-date_of_decl', 'child_info-decl_number', 'child_info-first_name', 'child_info-birth_time',
                'child_info-last_name', 'child_info-gender', 'child_info-dob', 'child_info-place_of_birth'],
            ['father_info-department', 'father_info-communes', 'father_info-country', 'father_info-borough',
                'father_info-region', 'father_info-center'],
            ['mother_info-family_name', 'mother_info-birth_place', 'mother_info-occupation', 'mother_info-first_name',
                'mother_info-address', 'mother_info-dob'],
            ['declarant_info-profession', 'declarant_info-first_name', 'declarant_info-last_name',
                'declarant_info-address', 'declarant_info-cin'],
            ['judgement-judgement'],
        ];
        $formNamesFilled = array_map(function ($fields) use ($old) {
            $values = json_decode($old->values, true);
            foreach ($values as $key => $value) {
                if (in_array($key, $fields) && empty($value)) {
                    return false;
                } elseif ($fields[0] === 'judgement-judgement' && $values['judgement-judgement'] !== 'Non'
                    && empty($value)) {
                    return false;
                }
            }

            return true;
        }, $formFields);

        $binding['filledFields'] = $formNamesFilled;
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

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            return response("{ \"message\": \"Add cr????e avec succ??s\"}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return Redirect::route('naissance.registre')->with('success', 'Add cr????e avec succ??s');
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
        return redirect()->route('naissance.registre')->with('success', 'Supprim??e avec succ??s');
    }
}
