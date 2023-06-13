<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User as users;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
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
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $usersObjects = users::paginate(25);

        return view('users.index', compact('usersObjects'));
    }

    /**
     * Show the form for creating a new users.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('users.create');
    }

    /**
     * Store a new users in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $user =users::create($data);
            $user->assignRole('admin');
            return redirect()->route('users.users.index')
                ->with('success_message', trans('users.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified users.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $users = users::findOrFail($id);

        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $users = users::findOrFail($id);


        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified users in the storage.
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

            $users = users::findOrFail($id);
            $users->update($data);

            return redirect()->route('users.users.index')
                ->with('success_message', trans('users.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
        }
    }

    /**
     * Remove the specified users from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $users = users::findOrFail($id);
            $users->delete();

            return redirect()->route('users.users.index')
                ->with('success_message', trans('users.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
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
                'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'ud' => 'required|string|min:1|max:255|unique:users,ud',
            'email' => 'required|string|min:1|max:255|unique:users,email',

            'password' => 'required|string|min:1|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
