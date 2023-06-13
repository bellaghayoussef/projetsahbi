<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\countries;
use Illuminate\Http\Request;
use Exception;

class CountriesController extends Controller
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
     * Display a listing of the countries.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $countriesObjects = countries::paginate(25);

        return view('countries.index', compact('countriesObjects'));
    }

    /**
     * Show the form for creating a new countries.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('countries.create');
    }

    /**
     * Store a new countries in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            countries::create($data);

            return redirect()->route('countries.countries.index')
                ->with('success_message', trans('countries.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('countries.unexpected_error')]);
        }
    }

    /**
     * Display the specified countries.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $countries = countries::findOrFail($id);

        return view('countries.show', compact('countries'));
    }

    /**
     * Show the form for editing the specified countries.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $countries = countries::findOrFail($id);


        return view('countries.edit', compact('countries'));
    }

    /**
     * Update the specified countries in the storage.
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

            $countries = countries::findOrFail($id);
            $countries->update($data);

            return redirect()->route('countries.countries.index')
                ->with('success_message', trans('countries.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('countries.unexpected_error')]);
        }
    }

    /**
     * Remove the specified countries from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $countries = countries::findOrFail($id);
            $countries->delete();

            return redirect()->route('countries.countries.index')
                ->with('success_message', trans('countries.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('countries.unexpected_error')]);
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
                'iso' => 'required|string|min:1|max:2',
            'name' => 'required|string|min:1|max:80',
            'iso3' => 'nullable|string|min:0|max:3',
            'numcode' => 'nullable',
            'phonecode' => 'required|numeric|min:-2147483648|max:2147483647',
            'active' => 'required|string|min:1|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
