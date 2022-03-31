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
        //dd($request->all());
        unset($inputs['_token']);
        if( array_key_exists( 'src', $inputs))
        {
            unset( $inputs[ 'src']);
            $ajax_call = true;
        }

        if( array_key_exists( 'id', $inputs)) {
            $add = Deces::find( $inputs[ 'id']);
            $add->values = json_encode( $inputs);
            $add->update();
            return $add;
        } else if (array_key_exists('docId', $inputs)) {
            $add = Deces::find( $inputs[ 'docId']);
            $add->values = json_encode( $inputs);
            $add->update();
        } else
        {
            $add = new Deces();
            $add->values = json_encode( $inputs);
            $add->created_by = Auth::user()[ 'id'];
            //$add->done = isset( $ajax_call) ? 'no' : 'yes';
            $add->save();
            //$inputs[ 'id'] = $add->id;
            //$add->values = json_encode( $inputs);
            //$add->update();
        }
       

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            $id = $add->id;
            return response("{ \"message\": \"Ajout créée avec succès\", \"id\": $id}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }


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
        $add = DB::table('deces')
            ->join('users', 'deces.created_by', '=', 'users.id')
            ->select('deces.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->where('deces.id', '=', $id)
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

        //if (isset($valuesArr['certificate-civil_servant'])) {
            //$civilServant = User::find($valuesArr['certificate-civil_servant']);
        //}
        //$binding['civilServantName'] = isset($civilServant)
            //? $civilServant->first_name . ' ' . $civilServant->last_name
            //: '--';

        return view('Deces.registre.show', $binding);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $old = Deces::find( $id);
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'old'] = $old->values;
        $binding[ 'post_url'] = route( 'deces.registre.edit.post', [ 'id' => $id]);
        $binding[ 'page_url'] = route( 'deces.registre.edit', [ 'id' => $id]);
        $formFields = [
            ['geographical_zone-pays', 'geographical_zone-regions', 'geographical_zone-departments',
                'geographical_zone-arrondissements', 'geographical_zone-communes', 'geographical_zone-centre'],
            ['date_du_deces', 'declaration_number', 'date_of_death',
                'death_time', 'place_of_death', 'formation_sanitaire'],
            ['deceased-first_name', 'deceased-family_name', 'deceased-dob', 'deceased-birth_place',
                'deceased-profession', 'deceased_sex_info', 'deceased-address'],
            ['deceased_father-first_name', 'deceased_father-family_name', 'deceased_father-dob', 'deceased_father-profession',
                'deceased_father-address'],
            ['deceased_mother-first_name', 'deceased_mother-family_name', 'deceased_mother-dob', 'deceased_mother-profession',
                'deceased_mother-address'],
            ['declarant-first_name', 'declarant_name', 'declarant_address', 'declarant-profession',
                'declarant_info-cin', 'parente'],
            ['judgement-judgement', 'judgement-date', 'judgement-number', 'judgment-region'],
            
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
            ['title' => 'Acte de Deces', 'is_filled' => $formNamesFilled[1]],
            ['title' => "Renseignement sur le Défunt / la Défunte", 'is_filled' => $formNamesFilled[2]],
            ['title' => "Renseignement sur le Père du Défunt / de la Défunte", 'is_filled' => $formNamesFilled[3]],
            ['title' => "Renseignement sur la Mère du Défunt / de la Défunte", 'is_filled' => $formNamesFilled[4]],
            ['title' => "Renseignement sur le Déclarant", 'is_filled' => $formNamesFilled[5]],
            ['title' => "Jugement", 'is_filled' => $formNamesFilled[6]],
            
        ];
        $binding[ 'is_edit'] = true;
        $binding['users'] = User::with('created_user:id,first_name,last_name')->orderBy('id', 'desc')->get();

        return view('Deces.registre.create', $binding);
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
        $add = Deces::find( $id);
        $add->values = json_encode( $inputs);
        $add->update();

        if ( isset( $ajax_call) && empty($inputs['saveAndExit']))
        {
            return response("{ \"message\": \"Add créée avec succès\"}", 200)
                ->header('Content-Type', 'application/json')
                ->header( 'charset', 'utf-8');
        }

        return back()->with('success', 'Add créée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Deces::destroy($id);
        return back()->with('success', 'supprimé avec succès.');
    }

}
