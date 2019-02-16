<?php

namespace App\Http\Controllers\PA;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PA;
use Illuminate\Http\Request;

class PAsController extends Controller
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
            $pas = PA::where('firstname', 'LIKE', "%$keyword%")
                ->orWhere('lastname', 'LIKE', "%$keyword%")
                ->orWhere('dateofbirh', 'LIKE', "%$keyword%")
                ->orWhere('mobilenumber', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pas = PA::latest()->paginate($perPage);
        }

        return view('pa.p-as.index', compact('pas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pa.p-as.create');
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
        
        PA::create($requestData);

        return redirect('pa/p-as')->with('flash_message', 'PA added!');
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
        $pa = PA::findOrFail($id);

        return view('pa.p-as.show', compact('pa'));
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
        $pa = PA::findOrFail($id);

        return view('pa.p-as.edit', compact('pa'));
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
        
        $pa = PA::findOrFail($id);
        $pa->update($requestData);

        return redirect('pa/p-as')->with('flash_message', 'PA updated!');
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
        PA::destroy($id);

        return redirect('pa/p-as')->with('flash_message', 'PA deleted!');
    }
}
