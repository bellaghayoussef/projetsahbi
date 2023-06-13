<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcceptationClient;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class AcceptationClientsController extends Controller
{
     /**
  * Create a new controller instance.
  *
  * @return void
  */
 public function __construct()
 {
     $this->middleware('auth');
 }

    /**
     * Display a listing of the acceptation clients.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $acceptationClients = AcceptationClient::with('user','client')->paginate(25);

        return view('acceptation_clients.index', compact('acceptationClients'));
    }

    /**
     * Show the form for creating a new acceptation client.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('first_name','id')->all();
$clients = Client::pluck('created_at','id')->all();

        return view('acceptation_clients.create', compact('users','clients'));
    }

    /**
     * Store a new acceptation client in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            AcceptationClient::create($data);

            return redirect()->route('acceptation_clients.acceptation_client.index')
                ->with('success_message', trans('acceptation_clients.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('acceptation_clients.unexpected_error')]);
        }
    }

    /**
     * Display the specified acceptation client.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $acceptationClient = AcceptationClient::with('user','client')->findOrFail($id);

        return view('acceptation_clients.show', compact('acceptationClient'));
    }

    /**
     * Show the form for editing the specified acceptation client.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $acceptationClient = AcceptationClient::findOrFail($id);
        $users = User::pluck('first_name','id')->all();
$clients = Client::pluck('created_at','id')->all();

        return view('acceptation_clients.edit', compact('acceptationClient','users','clients'));
    }

    /**
     * Update the specified acceptation client in the storage.
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

            $acceptationClient = AcceptationClient::findOrFail($id);
            $acceptationClient->update($data);

            return redirect()->route('acceptation_clients.acceptation_client.index')
                ->with('success_message', trans('acceptation_clients.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('acceptation_clients.unexpected_error')]);
        }
    }

    /**
     * Remove the specified acceptation client from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $acceptationClient = AcceptationClient::findOrFail($id);
            $acceptationClient->delete();

            return redirect()->route('acceptation_clients.acceptation_client.index')
                ->with('success_message', trans('acceptation_clients.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('acceptation_clients.unexpected_error')]);
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

            'Client_id' => 'nullable',
            'commenter' => 'string|min:1|nullable',
        ];

        $data['User_id'] = Auth()->user()->id;
        $data = $request->validate($rules);




        return $data;
    }

}
