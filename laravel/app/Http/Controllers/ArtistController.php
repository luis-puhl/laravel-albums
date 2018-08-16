<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Validator as ValidatorFacade;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use View;
// use App\Services\ArtistService;

class ArtistController extends Controller
{
    public $model = Artist::class;

    public function validationRules($id = null)
    {
        return [
            'name' => [
                'required',
                Rule::unique('artists')->ignore($id),
                'max:255',
            ],
            'image' => 'nullable|unique:artists|image',
            'genre' => 'nullable|max:255',
            'description' => 'nullable',
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
        $artists = $this->baseIndex();
        return View::make('artists.index')->with('artists', $artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('artists.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = $this->baseCreate($request->all());
        return View::make('artists.view')->with('artist', $artist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        $id = $artist->id;
        $artist = $artist ?? $this->baseFind($id);
        return View::make('artists.view')->with('artist', $artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        $id = $artist->id;
        $artist = $artist ?? $this->baseFind($id);
        return View::make('artists.form')->with('artist', $artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $id = $artist->id;
        $artist = $this->baseUpdate($request->all(), $id);
        return View::make('artists.view')->with('artist', $artist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $id = $artist->id;
        $this->baseDestroy($id);
        return $this->index();
    }
}
