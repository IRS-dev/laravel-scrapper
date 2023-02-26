<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Exports\MovieExport;
use Maatwebsite\Excel\Facades\Excel;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.movie.index',[
            'movies' => Movie::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
            'actor' => 'required|max:255',
            'trailer' => 'required|max:255',
            'synopsis' => 'required'
        ]);

        if($request->file('poster')){
            $validatedData['poster'] = $request->file('poster')->store('poster');
        }

        Movie::create($validatedData);
        return redirect('/dashboard/movies')->with('success','New movies has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.movie.show',[
            'movie' => Movie::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.movie.edit',[
            'movie' => Movie::findOrFail($id)
        ]);
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
        $movie = Movie::findOrFail($id);
        $rules =([
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
            'actor' => 'required|max:255',
            'trailer' => 'required|max:255',
            'synopsis' => 'required'
        ]);

        $validatedData = $request->validate($rules);
        // if($request->file('image')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }


        Movie::where('id',$movie->id)->update($validatedData);
        return redirect('/dashboard/movies')->with('success','movie has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        Movie::destroy($id);
        return redirect('/dashboard/movies')->with('success','movie had been deleted');
    }

    public function export_excel()
	{
		return Excel::download(new MovieExport, 'movie.xlsx');
	}

    public function import()
    {
        Excel::import(new MovieExport, 'movie.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
