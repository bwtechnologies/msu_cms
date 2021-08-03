<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Countries;
use App\Events\CountriesUpdated;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Http\Request;

class CountriesController extends Controller
{

    public function parse($countries,$style)
    {
        foreach ($countries as $country) {
            $country->continent;
            $country->programs;
            $country->gallery;
            if($country->gallery) $country->gallery->media;
            if($country->enabled != 'off' && $country->suspended != 'on') CountriesUpdated::dispatch($country,$style);
        }

        return $countries;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Countries::all();

        return response()->json($this->parse($countries,'listing'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $countries = Countries::where('enabled','on')->get();

        return response()->json($this->parse($countries,'listing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'name' => 'required'
        ]);

        $country = new Country([
            'slug' => $request->get('slug'),
            'name' => $request->get('name'),
            'continent_id' => $request->get('parent'), 
            'gallery_id' => $request->get('gallery'), 
            'code' => $request->get('code'), 
            'enabled' => $request->get('enabled'),
            'suspended' => $request->get('suspended')
        ]);

        $country->save();
        CountriesUpdated::dispatch($country,'create');

        return response()->json('Country successfully created!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $country = Countries::find($id);
        $country->name = $request->get('name');
        $country->color = $request->get('color');
        $country->code = $request->get('code');
        $country->enabled = $request->get('enabled');
        $country->suspended = $request->get('suspended');

        $country->save();
        $country = $this->parse([$country],'update');
        return response()->json($country[0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $continent = Countries::find($id);
        $continent->delete();
        
        return response()->json('Country successfully deleted!');
    }
}
