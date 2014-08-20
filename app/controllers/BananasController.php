<?php

class BananasController extends \BaseController {

	/**
	 * Display a listing of bananas
	 *
	 * @return Response
	 */
	public function index()
	{
		$bananas = Banana::all();

		return View::make('bananas.index', compact('bananas'));
	}

	/**
	 * Show the form for creating a new banana
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bananas.create');
	}

	/**
	 * Store a newly created banana in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Banana::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Banana::create($data);

		return Redirect::route('bananas.index');
	}

	/**
	 * Display the specified banana.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$banana = Banana::findOrFail($id);

		return View::make('bananas.show', compact('banana'));
	}

	/**
	 * Show the form for editing the specified banana.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$banana = Banana::find($id);

		return View::make('bananas.edit', compact('banana'));
	}

	/**
	 * Update the specified banana in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$banana = Banana::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Banana::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$banana->update($data);

		return Redirect::route('bananas.index');
	}

	/**
	 * Remove the specified banana from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Banana::destroy($id);

		return Redirect::route('bananas.index');
	}

}
