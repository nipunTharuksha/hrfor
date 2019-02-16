<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subplant;
use Illuminate\Http\Request;

class SubplantsController extends Controller
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
            $subplants = Subplant::where('subplantname', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $subplants = Subplant::latest()->paginate($perPage);
        }

        return view('admin.subplants.index', compact('subplants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.subplants.create');
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
        
        Subplant::create($requestData);

        return redirect('admin/subplants')->with('flash_message', 'Subplant added!');
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
        $subplant = Subplant::findOrFail($id);

        return view('admin.subplants.show', compact('subplant'));
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
        $subplant = Subplant::findOrFail($id);

        return view('admin.subplants.edit', compact('subplant'));
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
        
        $subplant = Subplant::findOrFail($id);
        $subplant->update($requestData);

        return redirect('admin/subplants')->with('flash_message', 'Subplant updated!');
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
        Subplant::destroy($id);

        return redirect('admin/subplants')->with('flash_message', 'Subplant deleted!');
    }
}
