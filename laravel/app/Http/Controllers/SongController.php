<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use Validator as ValidatorFacade;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use View;

class SongController extends Controller
{
    public $model = Song::class;

    public function validationRules($id = null)
    {
        return [
            'name' => 'required|max:255',
            'composer' => 'nullablemax:255',
            'duration' => 'nullable|numeric|lt:3000',
            'order_number' => 'nullable|numeric|lt:30',
        ];
    }

    public function validationMessages()
    {
        return [];
    }

    public function baseValidate(array $baseData, $validationRules = null, $validationMessages = null, $id = null)
    {
        $validator = ValidatorFacade::make(
            array_merge(
                $baseData,
                [
                    '3000' => 3000,
                    '30' => 30,
                ]
            ),
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
        $songs = $this->baseIndex();
        return View::make('songs.index')->with('songs', $songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View::make('songs.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $song = $this->baseCreate($request->all());
        return View::make('songs.view')->with('song', $song);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        $id = $song->id;
        $song = $song ?? $this->baseFind($id);
        return View::make('songs.view')->with('song', $song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $id = $song->id;
        $song = $song ?? $this->baseFind($id);
        return View::make('songs.form')->with('song', $song);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $id = $song->id;
        $song = $this->baseUpdate($request->all(), $id);
        return View::make('songs.view')->with('song', $song);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $id = $song->id;
        $this->baseDestroy($id);
        return $this->index();
    }
}
