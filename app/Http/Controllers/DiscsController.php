<?php

namespace App\Http\Controllers;

use App\Discs;
use App\Singers;
use Illuminate\Http\Request;
use DB;

class DiscsController extends Controller
{
	/**
	 * @return view for discs page
	 */
	public function index()
	{

		$discs = DB::table( 'discs' )->join( 'singers', 'discs.singer_id', '=', 'singers.id' )
			->select( 'discs.*', 'singers.singer_name' )
			->get();

		return view( 'discs', [ 'discs' => $discs ] );

	}

	/**
	 * Show disc for editing by given id
	 * @param $id
	 * @return view for edit page
	 */
	public function update( $id )
	{
		$disc = DB::table( 'discs' )->join( 'singers', 'discs.singer_id', '=', 'singers.id' )
			->select( 'discs.*', 'singers.singer_name' )
			->where( 'discs.id', '=', $id )
			->get();

		$singers = Singers::all();
		return view( 'editdisc', [ 'disc' => $disc, 'singers' => $singers ] );
	}

	/**
	 * Page for creation new disc
	 * @return view
	 */
	public function newDisc()
	{
		$singersList = Singers::all();
		return view( 'createdisc', [ 'singers' => $singersList ] );
	}

	/**
	 * Insert the new disc to DB
	 * @param Request $request
	 * @return view with given success message
	 */
	public function add( Request $request )
	{
		$this->validate( $request, [
			'disc_name' => 'required',
			'disc_author' => 'required'
		] );
		$disc = new Discs();
		$disc->disc_name = $request->input( 'disc_name' );
		$disc->singer_id = $request->input( 'disc_author' );
		$disc->save();
		return redirect( '/discs' )->with( 'info', 'The new disc created successfully' );

	}

	/**
	 * Update disc on DB by given id
	 * @param Request $request
	 * @param Number  $id
	 * @return view with given success message
	 */
	public function doUpdate( Request $request, $id )
	{
		$this->validate( $request, [
			'disc_name' => 'required'
		] );
		$data = array( 'disc_name' => $request->input( 'disc_name' ),
			'singer_id' => $request->input( 'disc_author' ) );
		Discs::where( 'id', $id )->update( $data );
		return redirect( '/discs' )->with( 'info', 'Disc information updated successfully' );
	}

	/**
	 * Delete disc from DB by given id
	 * @param $id
	 * @return view with given success message
	 */
	public function delete( $id )
	{
		Discs::where( 'id', $id )->delete();
		return redirect( 'discs' )->with( 'info', 'Discs deleted successfully' );
	}
}
