<?php

namespace App\Http\Controllers\Paevalu;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $designation = Designation::where('designationname', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $designation = Designation::latest()->paginate($perPage);
        }

        return view('paevalu.designation.index', compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('paevalu.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Designation::create($requestData);

        return redirect('paevalu/designation')->with('flash_message', 'Designation added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $designation = Designation::findOrFail($id);

        return view('paevalu.designation.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);

        return view('paevalu.designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $designation = Designation::findOrFail($id);
        $designation->update($requestData);

        return redirect('paevalu/designation')->with('flash_message', 'Designation updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Designation::destroy($id);

        return redirect('paevalu/designation')->with('flash_message', 'Designation deleted!');
    }
}
