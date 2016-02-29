<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Flyer_photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FlyerController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//

		dd(Flyer::with('flyer_photo')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// flash("hello world","first home page");
		return view('flyer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Requests\FlyerRequest $request)
	{
		

		Flyer::create($request->all());

		//session()->flash('flash_msg','successfully added flyer');
		flash("success", "successfully inserted flyer");
		return redirect()->back();

	}

	/**
	 * Display the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		return view('flyer.fourth');
	}


	/**
	 * Show the form for editing the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$pic    = Flyer_photo::find($id);
		$files1 = "flyers/photo/" . $pic->image;
		$files2 = "flyers/photo/th" . $pic->image;
		File::delete([
			$files1, $files2
		]);
		$pic->delete();
		return back();
	}

	public function view($id)
	{

		$record = Flyer::with('flyer_photo')->find($id);
		return view('flyer.show', compact('record'));
	}


	public function storeImage(Request $request, $id)
	{
		$file = $request->file('file');
		$rec  = Flyer::find($id);
		if ($rec->user_id != Auth::id()) {
			/*echo $rec->user_id;
			echo Auth::id();*/
			if ($request->ajax()) {
				flash('cant', 'no way');
				return response(['Unthorized'],403);

			}
			flash('cant', 'no way');


		}

		$name = str_random(6) . '_' . $file->getClientOriginalName();
		$file->move('flyers/photo/', $name);

		$path = 'flyers/photo/' . $name;
		$th   = 'flyers/photo/th' . $name;


		Image::make($path)->fit('200')->save($th);

		$flyer = Flyer::find($id);
		$flyer->flyer_photo()->create(['image' => $name]);

		return "done";


	}
}
