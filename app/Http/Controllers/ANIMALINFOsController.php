<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ANIMAL_INFO;
use App\Models\Client;
use Illuminate\Http\Request;
use Exception;

class ANIMALINFOsController extends Controller
{

    /**
     * Display a listing of the a n i m a l  i n f os.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $aNIMALINFOs = ANIMAL_INFO::with('client')->paginate(25);

        return view('a_n_i_m_a_l__i_n_f_os.index', compact('aNIMALINFOs'));
    }

    /**
     * Show the form for creating a new a n i m a l  i n f o.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::pluck('created_at','id')->all();

        return view('a_n_i_m_a_l__i_n_f_os.create', compact('clients'));
    }

    /**
     * Store a new a n i m a l  i n f o in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ANIMAL_INFO::create($data);

            return redirect()->route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index')
                ->with('success_message', trans('a_n_i_m_a_l__i_n_f_os.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('a_n_i_m_a_l__i_n_f_os.unexpected_error')]);
        }
    }

    /**
     * Display the specified a n i m a l  i n f o.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $aNIMALINFO = ANIMAL_INFO::with('client')->findOrFail($id);

        return view('a_n_i_m_a_l__i_n_f_os.show', compact('aNIMALINFO'));
    }

    /**
     * Show the form for editing the specified a n i m a l  i n f o.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $aNIMALINFO = ANIMAL_INFO::findOrFail($id);
        $clients = Client::pluck('created_at','id')->all();

        return view('a_n_i_m_a_l__i_n_f_os.edit', compact('aNIMALINFO','clients'));
    }

    /**
     * Update the specified a n i m a l  i n f o in the storage.
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

            $aNIMALINFO = ANIMAL_INFO::findOrFail($id);
            $aNIMALINFO->update($data);

            return redirect()->route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index')
                ->with('success_message', trans('a_n_i_m_a_l__i_n_f_os.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('a_n_i_m_a_l__i_n_f_os.unexpected_error')]);
        }
    }

    /**
     * Remove the specified a n i m a l  i n f o from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $aNIMALINFO = ANIMAL_INFO::findOrFail($id);
            $aNIMALINFO->delete();

            return redirect()->route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index')
                ->with('success_message', trans('a_n_i_m_a_l__i_n_f_os.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('a_n_i_m_a_l__i_n_f_os.unexpected_error')]);
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
            'EXPORT_COUNTRY' => 'string|nullable',
                'ORIGIN_COUNTRY' => 'string|nullable',
            'TRANSIET_COUNTRY' => 'string|nullable',
            'ANML_SPECIES' => 'string|min:1|nullable',
            'ANML_SEX' => 'string|min:1|nullable',
            'ANML_NUMBER' => 'numeric|nullable',
            'ANML_USE' => 'string|min:1|nullable',
            'ANIMAL_BREED' => 'string|min:1|nullable',
            'client_id' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
