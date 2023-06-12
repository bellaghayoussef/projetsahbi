<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\countries as Contry;
use Illuminate\Http\Request;
use Exception;

class ClientsController extends Controller
{

    /**
     * Display a listing of the clients.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::with('contry')->paginate(25);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $contries = Contry::where('active','1')->pluck('name','id')->all();

        return view('clients.create', compact('contries'));
    }

    /**
     * Store a new client in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Client::create($data);

            return redirect()->route('clients.client.index')
                ->with('success_message', trans('clients.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }

    /**
     * Display the specified client.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $client = Client::with('contry')->findOrFail($id);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $contries = Contry::pluck('id','id')->all();

        return view('clients.edit', compact('client','contries'));
    }

    /**
     * Update the specified client in the storage.
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

            $client = Client::findOrFail($id);
            $client->update($data);

            return redirect()->route('clients.client.index')
                ->with('success_message', trans('clients.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }

    /**
     * Remove the specified client from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect()->route('clients.client.index')
                ->with('success_message', trans('clients.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
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
                'first_name' => 'string|min:1|nullable',
            'last_name' => 'string|min:1|nullable',
            'phone' => 'string|min:1|unique:clients,phone',
            'ud' => 'required|string|min:1|max:255|unique:clients,ud',
            'email' => 'required|string|min:1|max:255|unique:clients,email',
            'photo_ud_frent' => 'file|required',
            'photo_ud_back' => 'file|required',
            'password' => 'confirmed',
            'contry_id' => 'required',
            'accepted' => 'string|min:1|nullable',
            'refused' => 'string|min:1|nullable',
        ];

        if ($request->hasFile('photo_ud_frent')) {
            $data['photo_ud_frent'] = $this->moveFile($request->file('photo_ud_frent'));
        }

        if ($request->hasFile('photo_ud_back')) {
            $data['photo_ud_back'] = $this->moveFile($request->file('photo_ud_back'));
        }

        $data = $request->validate($rules);




        return $data;
    }

    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('images',['disk' => 'public_uploads']);

        return  $saved;
    }

    public function sungupp(Request $request)
    {
        try {

            $data = $this->getData($request);

         $client =    Client::create($data);

            return redirect()->route('term',['id' => $client->id] )
                ->with('success_message', trans('clients.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }

    public function signature($id, Request $request)
    {
        try {



            $client = Client::findOrFail($id);
            $client->singateur = 1;
            $client->save();
            return redirect()->route('confiramtion',['id' => $client->id] )
                ->with('success_message', trans('clients.model_was_added'));
        } catch (Exception $exception) {
           dd( $exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }

    public function confiramtion($id, Request $request)
    {
        try {



            $client = Client::findOrFail($id);
            if($client->code == $request->code){
                $client->virification = 1;
            }

            $client->save();
            return redirect()->route('/' )
                ->with('success_message', trans('clients.model_was_added'));
        } catch (Exception $exception) {
           dd( $exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }




}
