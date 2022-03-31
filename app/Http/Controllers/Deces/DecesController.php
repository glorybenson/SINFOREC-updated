<?php

namespace App\Http\Controllers\Deces;

use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Centre;
use App\Models\Communes;
use App\Models\Deces;
use App\Models\Department;
use App\Models\Marriage;
use App\Models\Pay;
use App\Models\Region;
use App\Models\User;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

final class DecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $add = DB::table('deces')
            ->join('users', 'deces.created_by', '=', 'users.id')
            ->select('deces.*')
            ->get();

        return view('Deces.registre.index', [
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
        $binding[ 'post_url'] = route( 'deces.registre.create.post');
        $binding[ 'page_url'] = route( 'deces.registre.create');
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        $binding['fields'] = [
            ['title' => 'Zone Gérographique', 'is_filled' => false],
            ['title' => 'Acte de Décès', 'is_filled' => false],
            ['title' => "Renseignement sur le Défunt / la Défunte", 'is_filled' => false],
            ['title' => "Renseignement sur le Père du Défunt / de la Défunte", 'is_filled' => false],
            ['title' => "Renseignement sur la Mère du Défunt / de la Défunte", 'is_filled' => false],
            ['title' => "Renseignement sur le Déclarant", 'is_filled' => false],
            ['title' => "Jugement", 'is_filled' => false],
        ];

        return view('Deces.registre.create', $binding);
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
        
            $add = new Deces();
            $add->values = json_encode( $inputs);
            $add->created_by = Auth::user()[ 'id'];
            $add->save();
            $inputs[ 'id'] = $add->id;
            $add->values = json_encode( $inputs);
            $add->update();
       


        return Redirect::route('deces.index')->with('success', 'Ajout créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $add = DB::table('marriage')
            ->join('users', 'marriage.created_by', '=', 'users.id')
            ->select('marriage.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->where('marriage.id', '=', $id)
            ->get()->first();
        $values = json_decode($add->values);

<<<<<<< HEAD
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

        if (isset($valuesArr['certificate-civil_servant'])) {
            $civilServant = User::find($valuesArr['certificate-civil_servant']);
        }
        $binding['civilServantName'] = isset($civilServant)
            ? $civilServant->first_name . ' ' . $civilServant->last_name
            : '--';

        return view('marriage.registre.show', $binding);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $old = Marriage::find( $id);
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'old'] = $old->values;
        $binding[ 'post_url'] = route( 'marriage.registre.edit.post', [ 'id' => $id]);
        $binding[ 'page_url'] = route( 'marriage.registre.edit', [ 'id' => $id]);
        $formFields = [
            ['geographical_zone-pays', 'geographical_zone-arrondissements', 'geographical_zone-departments',
                'geographical_zone-communes', 'geographical_zone-regions', 'geographical_zone-centre'],
            ['certificate-date_of_marriage', 'certificate-decl_number', 'certificate-date_of_decl',
                'certificate-wedding_time', 'certificate-wedding_venue', 'certificate-civil_servant'],
            ['groom-first_name', 'groom-family_name', 'groom-dob', 'groom-birth_place',
                'groom-profession', 'groom-address'],
            ['groom_father-first_name', 'groom_father-family_name', 'groom_father-dob', 'groom_father-birth_place',
                'groom_father-profession', 'groom_father-address'],
            ['groom_mother-first_name', 'groom_mother-family_name', 'groom_mother-dob', 'groom_mother-birth_place',
                'groom_mother-profession', 'groom_mother-address'],
            ['bride-first_name', 'bride-family_name', 'bride-dob', 'bride-birth_place',
                'bride-profession', 'bride-address'],
            ['bride_father-first_name', 'bride_father-family_name', 'bride_father-dob', 'bride_father-birth_place',
                'bride_father-profession', 'bride_father-address'],
            ['bride_mother-first_name', 'bride_mother-family_name', 'bride_mother-dob', 'bride_mother-birth_place',
                'bride_mother-profession', 'bride_mother-address'],
            ['additional-regime', 'additional-type', 'additional-feats'],
            ['judgement-judgement'],
            ['groom_witness_one-first_name','groom_witness_one-name','groom_witness_one-profession',
                'groom_witness_one-cin','groom_witness_one-address'],
            ['groom_witness_two-first_name','groom_witness_two-name','groom_witness_two-profession',
                'groom_witness_two-cin','groom_witness_two-address'],
            ['bride_witness_one-first_name','bride_witness_one-name','bride_witness_one-profession',
                'bride_witness_one-cin','bride_witness_one-address'],
            ['bride_witness_two-first_name','bride_witness_two-name','bride_witness_two-profession',
                'bride_witness_two-cin','bride_witness_two-address'],
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

        $binding['fields'] = [
            ['title' => 'Zone Gérographique', 'is_filled' => $formNamesFilled[0]],
            ['title' => 'Acte de Mariage', 'is_filled' => $formNamesFilled[1]],
            ['title' => "Renseignement sur l'Epoux", 'is_filled' => $formNamesFilled[2]],
            ['title' => "Renseignement sur le Père de l'Epoux", 'is_filled' => $formNamesFilled[3]],
            ['title' => "Renseignement sur la Mère de l'Epoux", 'is_filled' => $formNamesFilled[4]],
            ['title' => "Renseignement sur l'Epouse", 'is_filled' => $formNamesFilled[5]],
            ['title' => "Renseignement sur le Père de l'Epouse", 'is_filled' => $formNamesFilled[6]],
            ['title' => "Renseignement sur la Mère de l'Epouse", 'is_filled' => $formNamesFilled[7]],
            ['title' => "Renseignements additionnels ", 'is_filled' => $formNamesFilled[8]],
            ['title' => "Jugement", 'is_filled' => $formNamesFilled[9]],
            ['title' => "Premier témoin de l'Epoux", 'is_filled' => $formNamesFilled[10]],
            ['title' => "Deuxieme témoin de l'Epoux", 'is_filled' => $formNamesFilled[11]],
            ['title' => "Premier témoin de l'Epouse", 'is_filled' => $formNamesFilled[12]],
            ['title' => "Deuxieme témoin de l'Epouse", 'is_filled' => $formNamesFilled[13]],
        ];
        $binding[ 'is_edit'] = true;
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        return view('marriage.registre.create', $binding);
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
        $add = Marriage::find( $id);
        $add->values = json_encode( $inputs);
        $add->update();

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            return response("{ \"message\": \"Add créée avec succès\"}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return Redirect::route('marriage.registre')->with('success', 'Add créée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Marriage::destroy($id);
        return redirect()->route('marriage.registre')->with('success', 'Supprimée avec succès');
    }
=======
>>>>>>> parent of ba32c5c (For checkout purpose)
}
