<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Client;
use App\Models\importation;
use App\Models\ANIMAL_INFO;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as ClientHTTP;
use App\Models\ApiUser;
class ImportationsController extends Controller
{

    /**
     * Display a listing of the importations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $importations = importation::with('client')->paginate(25);

        return view('importations.index', compact('importations'));
    }


    /**
     * Show the form for creating a new importation.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::pluck('ud','id')->all();


        return view('importations.create', compact('clients'));
    }

    /**
     * Store a new importation in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            importation::create($data);

            return redirect()->route('importations.importation.index')
                ->with('success_message', trans('importations.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }

    /**
     * Display the specified importation.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $importation = importation::with('client')->findOrFail($id);

        return view('importations.show', compact('importation'));
    }

    /**
     * Show the form for editing the specified importation.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $importation = importation::findOrFail($id);
        $clients = Client::pluck('ud','id')->all();


        return view('importations.edit', compact('importation','clients'));
    }

    /**
     * Update the specified importation in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $importation = importation::findOrFail($id);
            $importation->update($data);

            return redirect()->route('importations.importation.index')
                ->with('success_message', trans('importations.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }

    /**
     * Remove the specified importation from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $importation = importation::findOrFail($id);
            $importation->delete();

            return redirect()->route('importations.importation.index')
                ->with('success_message', trans('importations.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */


    public function indexclient()
    {

        $importations = importation::where('client_id',auth()->guard('clientt')->user()->id)->get();

        return view('importationsclient.index', compact('importations'));
    }



     /**
     * Show the form for creating a new importation.
     *
     * @return \Illuminate\View\View
     */
    public function createclient()
    {
        $clients = Client::pluck('ud','id')->all();


        return view('importationsclient.create', compact('clients'));
    }

    /**
     * Store a new importation in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function storeclient(Request $request)
    {
        try {

            $data = $this->getData($request);



          $importation =  importation::create($data);

          foreach ($request->ORIGIN_COUNTRYa as $key => $animale) {
            $animal = new ANIMAL_INFO();
            $animal->ORIGIN_COUNTRY = $request->ORIGIN_COUNTRYa[$key];
            $animal->EXPORT_COUNTRY = $request->EXPORT_COUNTRY[$key];
            $animal->TRANSIET_COUNTRY = $request->TRANSIET_COUNTRY[$key];
            $animal->ANML_SPECIES = $request->ANML_SPECIES[$key];
            $animal->ANML_SEX = $request->ANML_SEX[$key];
            $animal->ANML_NUMBER = $request->ANML_NUMBER[$key];
            $animal->ANML_USE = $request->ANML_USE[$key];
            $animal->ANIMAL_BREED = $request->ANIMAL_BREED[$key];
            $animal->client_id =  auth()->guard('clientt')->user()->id ;
            $animal->save();
            $importation->animal()->attach( $animal->id);

          }



dd($request);

            return redirect()->route('importations.client.index')
                ->with('success_message', trans('importations.model_was_added'));
        } catch (Exception $exception) {
dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }

    /**
     * Display the specified importation.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function showclient($id)
    {
        $importation = importation::with('client','comp')->findOrFail($id);

        return view('importationsclient.show', compact('importation'));
    }

    /**
     * Show the form for editing the specified importation.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function editclient($id)
    {
        $importation = importation::findOrFail($id);
        $clients = Client::pluck('ud','id')->all();


        return view('importationsclient.edit', compact('importation','clients'));
    }

    /**
     * Update the specified importation in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function updateclient($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $importation = importation::findOrFail($id);
            $importation->update($data);

            return redirect()->route('importations.client.index')
                ->with('success_message', trans('importations.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }

    /**
     * Remove the specified importation from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroyclient($id)
    {
        try {
            $importation = importation::findOrFail($id);
            $importation->delete();

            return redirect()->route('importations.client.index')
                ->with('success_message', trans('importations.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }

    protected function getData(Request $request)
    {
        $rules = [
                'client_id' => 'nullable',
            'CER_TYPE' => 'nullable',
            'CER_LANG' => 'nullable',
            'COMP_ID' => 'nullable',
            'EUSER_QID' => 'nullable',
            'EXP_NAME' => 'nullable',
            'EXP_TEL' => 'nullable',
            'EXP_QID' => 'nullable',
            'EXP_FAX' => 'nullable',
            'EXP_COUNTRY' => 'nullable',
            'IMP_NAME' => 'nullable',
            'IMP_ADDRESS' => 'nullable',
            'IMP_FAX' => 'nullable',
            'IMP_TEL' => 'nullable',
            'IMP_POBOX' => 'nullable',
            'IMP_COUNTRY' => 'nullable',
            'ORIGIN_COUNTRY' => 'nullable',
            'SHIPPING_PLACE' => 'nullable',
            'ENTERY_PORT' => 'nullable',
            'EXPECTED_ARRIVAL_DATE' => 'nullable',
            'TRANSPORT' => 'nullable',
            'SHIPPING_DATE' => 'nullable',
            'APPLICANT_NAME' => 'nullable',
            'APPLICANT_TEL' => 'nullable',
            'EXP_NATIONALITY' => 'nullable',
            'EXP_PASSPORT_NUM' => 'nullable',


        ];


        $data = $request->validate($rules);
        if ($request->hasFile('files')) {
            $data['files'] = $this->moveFile($request->file('files'));
        }



        return $data;
    }

    public function accept($id)
    {
        $importation = importation::findOrFail($id);
        $apiUser = ApiUser::first();
        $client = new ClientHTTP();
        $res = $client->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/token', [
            'form_params' => [
                'Username' => $apiUser->Username,
                'Password' => $apiUser->Password,
                'grant_type' => 'password',
            ]
        ]);
        $response = (string) $res->getBody();
        $response =json_decode($response); // Using this you can access any key like below
        $access_token = $response->access_token;
      // dd($access_token);

$data['CER_TYPE'] = $importation->CER_TYPE;
$data['CER_LANG'] = $importation->CER_LANG;
$data['COMP_ID'] = $importation->COMP_ID;
$data['EUSER_QID'] = $importation->EUSER_QID;
$data['EXP_NAME'] = $importation->EXP_NAME;
$data['EXP_TEL'] = $importation->EXP_TEL;
$data['EXP_QID'] = $importation->EXP_QID;
$data['EXP_FAX'] = $importation->EXP_FAX;
$data['EXP_COUNTRY'] = $importation->EXP_COUNTRY;
$data['IMP_NAME'] = $importation->IMP_NAME;
$data['IMP_ADDRESS'] = $importation->IMP_ADDRESS;
$data['IMP_FAX'] = $importation->IMP_FAX;
$data['IMP_TEL'] = $importation->IMP_TEL;
$data['IMP_POBOX'] = $importation->IMP_POBOX;
$data['IMP_COUNTRY'] = $importation->IMP_COUNTRY;
$data['ORIGIN_COUNTRY'] = $importation->ORIGIN_COUNTRY;
$data['SHIPPING_PLACE'] = $importation->SHIPPING_PLACE;
$data['ENTERY_PORT'] = $importation->ENTERY_PORT;
$data['EXPECTED_ARRIVAL_DATE'] = $importation->EXPECTED_ARRIVAL_DATE;
$data['TRANSPORT'] = $importation->TRANSPORT;
$data['SHIPPING_DATE'] = $importation->SHIPPING_DATE;
$data['APPLICANT_NAME'] = $importation->APPLICANT_NAME;
$data['APPLICANT_TEL'] = $importation->APPLICANT_TEL;
$data['EXP_NATIONALITY'] = $importation->EXP_NATIONALITY;
$data['EXP_PASSPORT_NUM'] = $importation->EXP_PASSPORT_NUM;

$ANIMALINFO = [];

foreach ($importation->animal as $key => $value) {

    $data1['EXPORT_COUNTRY'] = $value->EXPORT_COUNTRY;
    $data1['ORIGIN_COUNTRY'] = $value->ORIGIN_COUNTRY;
    $data1['TRANSIET_COUNTRY'] = $value->TRANSIET_COUNTRY;
    $data1['ANML_SPECIES'] = $value->EUSER_QID;
    $data1['ANML_SEX'] = $value->ANML_SEX;
    $data1['ANML_NUMBER'] = $value->ANML_NUMBER;
    $data1['ANML_USE'] = $value->ANML_USE;
    $data1['ANIMAL_BREED'] = $value->ANIMAL_BREED;
    $ANIMALINFO[$key] = $data1;


}

$ANIMALINFOj = json_encode($ANIMALINFO);

$token ='Bearer '.$access_token;

$headers = [
    'Authorization' => $token,
    'Accept'        => 'application/json',
];



try{
    $client2 = new ClientHTTP();
    $res = $client2->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/IMPLC_SUBMIT', [
        'form_params' => [
            'DATA' => $data,
            'ANIMAL_INFO' =>$ANIMALINFOj,
            'files' => $importation->files,
        ],
        'headers' => $headers
    ]);
}catch(Exception $exception) {
dd($exception);
}

       dd($res->getBody());
       $response = (string) $res->getBody();
       $response =json_decode($response);




       return back();


        return view('importations.edit', compact('importation','clients'));
    }
}
