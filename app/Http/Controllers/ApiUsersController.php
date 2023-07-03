<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApiUser;
use Illuminate\Http\Request;
use Exception;
use GuzzleHttp\Client;
class ApiUsersController extends Controller
{

    /**
     * Display a listing of the api users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $apiUser = ApiUser::first();
        if($apiUser){
            return view('api_users.edit', compact('apiUser'));
        }else{
            return view('api_users.create');
        }

        return view('api_users.index', compact('apiUser'));
    }

    /**
     * Show the form for creating a new api user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('api_users.create');
    }

    /**
     * Store a new api user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {


            $data = $this->getData($request);

            $client = new Client();
            $res = $client->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/token', [
                'form_params' => [
                    'Username' => $request->Username,
                    'Password' => $request->Password,
                    'grant_type' => 'password',
                ]
            ]);
            $response = (string) $res->getBody();
            $response =json_decode($response); // Using this you can access any key like below
            $access_token = $response->access_token;
           // dd($access_token);
            $data['access_token']= $access_token;
            ApiUser::create($data);

            return redirect()->route('api_users.api_user.index')
                ->with('success_message', trans('api_users.model_was_added'));
        } catch (Exception $exception) {
dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('api_users.unexpected_error')]);
        }
    }

    /**
     * Display the specified api user.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $apiUser = ApiUser::findOrFail($id);

        return view('api_users.show', compact('apiUser'));
    }

    /**
     * Show the form for editing the specified api user.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $apiUser = ApiUser::findOrFail($id);


        return view('api_users.edit', compact('apiUser'));
    }

    /**
     * Update the specified api user in the storage.
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

            $apiUser = ApiUser::findOrFail($id);
            $client = new Client();
            $res = $client->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/token', [
                'form_params' => [
                    'Username' => $request->Username,
                    'Password' => $request->Password,
                    'grant_type' => 'password',
                ]
            ]);
            $response = (string) $res->getBody();
            $response =json_decode($response); // Using this you can access any key like below
            $access_token = $response->access_token;
           // dd($access_token);
            $data['access_token']= $access_token;
            $apiUser->update($data);

            return redirect()->route('api_users.api_user.index')
                ->with('success_message', trans('api_users.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('api_users.unexpected_error')]);
        }
    }

    /**
     * Remove the specified api user from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $apiUser = ApiUser::findOrFail($id);
            $apiUser->delete();

            return redirect()->route('api_users.api_user.index')
                ->with('success_message', trans('api_users.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('api_users.unexpected_error')]);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'Username' => 'string|min:1|nullable',
            'Password' => 'nullable',

        ];


        $data = $request->validate($rules);




        return $data;
    }

}
