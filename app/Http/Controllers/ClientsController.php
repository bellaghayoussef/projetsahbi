<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\countries as Contry;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\AcceptationClient;
use App\SMS\Sms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class ClientsController extends Controller
{
    use AuthenticatesUsers;

    // public function __construct()
    // {
    //   $this->middleware('guest')->except('logout');
    // }

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










        $data = $request->validate($rules);
        if ($request->hasFile('photo_ud_frent')) {
            $data['photo_ud_frent'] = $this->moveFile($request->file('photo_ud_frent'));
        }
        if ($request->hasFile('photo_ud_back')) {
            $data['photo_ud_back'] = $this->moveFile($request->file('photo_ud_back'));
        }


        $data['password']=  Hash::make($data['password']);

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


            $image = $request->signature;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(12) . '.png';

            Storage::disk('local')->put('images/'.$imageName, base64_decode($image));

            $client = Client::findOrFail($id);
            $client->singateur = $imageName;
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



    public function accept ($id, Request $request)
    {
        try {

            $client = Client::findOrFail($id);
            $client->accepted = 1;
            $client->refused = 0;
            $client->save();
            $accept = new AcceptationClient();
            $accept->User_id = Auth()->user()->id;
            $accept->Client_id = $client->id;
            $accept->commenter = "accepted";
            $accept->save();
            $sms = new Sms;
$contry = Contry::find($client->contry_id );
$sms->send($contry->phonecode.$client->phone,$accept->commenter);

            return redirect()->route('clients.client.index')
                ->with('success_message', trans('clients.model_was_updated'));
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }

    public function refused ($id, Request $request)
    {

        try {
            $client = Client::findOrFail($id);
            $client->accepted = 0;
            $client->refused = 1;
            $client->save();
            $accept = new AcceptationClient();
            $accept->User_id = Auth()->user()->id;
            $accept->Client_id = $client->id;
            $accept->commenter = $request->commenter;
            $accept->save();
            $sms = new Sms;
            $contry = Contry::find($client->contry_id );
            $sms->send($contry->phonecode.$client->phone,"refused :  ".$accept->commenter);
            return redirect()->route('clients.client.index')
                ->with('success_message', trans('clients.model_was_updated'));
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }



    function login(Request $request){

        $client = Client::where('phone',$request->phone)->where('contry_id',$request->ccontry_id)->first();

        if($client){
            if($client->virification == null){
                return redirect()->route('confiramtion',['id' => $client->id] );
            }elseif($client->refused == 1){
                return view('midification',compact('client'));
            }elseif($client->refused == null && $client->accepted == null){
                return redirect()->route('/');
            }elseif($client->accepted == 1){

                if (Auth::guard('clientt')->attempt(['email' =>$client->email, 'password' =>$request->password])) {
                        // Authentication was successful...
                        return redirect()->route('client.home');
                 }
               else{
                dd('not conecter');
                   return back()->with('fail','Incorrect credentials');
                 }
            }

        }else{
            return back();
        }
    }

    public function updatem($id, Request $request)
    {

        try {



            $client = Client::findOrFail($id);
            $client->first_name =$request->first_name;
            $client->last_name =$request->last_name;
            $client->phone =$request->phone;
            $client->ud =$request->ud;
            $client->email =$request->email;
            if ($request->hasFile('photo_ud_frent')) {
                $client->photo_ud_frent = $this->moveFile($request->file('photo_ud_frentd'));
            }
            if ($request->hasFile('photo_ud_back')) {
                $client->photo_ud_back = $this->moveFile($request->file('photo_ud_backd'));
            }


            $client->password =  Hash::make($request->password);
            $client->contry_id =$request->contry_id;



            $client->accepted = null;
            $client->refused = null;
            $client->virification = null;

            $client->save();
            return redirect()->route('term',['id' => $client->id] )
            ->with('success_message', trans('clients.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }
}
