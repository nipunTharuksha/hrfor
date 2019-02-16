<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mainplant;
use Illuminate\Http\Request;

class MainplantController extends Controller
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
            $mainplant = Mainplant::where('mainplant', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mainplant = Mainplant::latest()->paginate($perPage);
        }

        return view('admin.mainplant.index', compact('mainplant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mainplant.create');
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

        Mainplant::create($requestData);

        return redirect('admin/mainplant')->with('flash_message', 'Mainplant added!');
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
        $mainplant = Mainplant::findOrFail($id);

        return view('admin.mainplant.show', compact('mainplant'));
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
        $mainplant = Mainplant::findOrFail($id);

        return view('admin.mainplant.edit', compact('mainplant'));
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

        $mainplant = Mainplant::findOrFail($id);
        $mainplant->update($requestData);

        return redirect('admin/mainplant')->with('flash_message', 'Mainplant updated!');
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
        Mainplant::destroy($id);

        return redirect('admin/mainplant')->with('flash_message', 'Mainplant deleted!');
    }
}
