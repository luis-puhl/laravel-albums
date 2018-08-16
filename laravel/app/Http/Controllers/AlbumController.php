<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public $model = Album::class;

    public function validationRules($id = null)
    {
        return [
            'name' => 'required|max:255',
            'released_at' => 'nullable|before_or_equal:now',
            'cover_photo' => 'nullable|image',
        ];
    }

    public function validationMessages()
    {
        return [];
    }

    public function baseValidate(array $baseData, $validationRules = null, $validationMessages = null, $id = null)
    {
        $validator = ValidatorFacade::make(
            $baseData,
            $validationRules ?? $this->validationRules($id),
            $validationMessages ?? $this->validationMessages()
        );
        return $validator->validate();
    }

    public function find($id)
    {
        return ($this->model)::findOrFail($id);
    }

    public function baseIndex()
    {
        return ($this->model)::all();
    }

    public function baseShow($id)
    {
        return $this->find($id);
    }

    public function baseCreate(array $baseData, $validationRules = null, $validationMessages = null)
    {
        $validData = $this->baseValidate($baseData, $validationRules, $validationMessages);

        return ($this->model)::create($validData);
    }

    public function baseUpdate(array $baseData, int $id, $validationRules = null, $validationMessages = null)
    {
        $validData = $this->baseValidate($baseData, $validationRules, $validationMessages, $id);

        $entity = $this->find($id);

        $entity->fill($validData);
        $entity->saveOrFail();

        return $entity;
    }

    public function baseDestroy($id)
    {
        $entity = $this->find($id);

        return $entity->delete();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = $this->baseIndex();
        return View::make('albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('albums.form');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = $this->baseCreate($request->all());
        return View::make('albums.view')->with('album', $album);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $id = $album->id;
        $album = $album ?? $this->baseFind($id);
        return View::make('albums.view')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
           $id = $album->id;
        $album = $album ?? $this->baseFind($id);
        return View::make('albums.form')->with('album', $album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $id = $album->id;
        $album = $this->baseUpdate($request->all(), $id);
        return View::make('albums.view')->with('album', $album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $id = $album->id;
        $this->baseDestroy($id);
        return $this->index();
    }
}
