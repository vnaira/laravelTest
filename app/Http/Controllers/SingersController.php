<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singers;
use App\Discs;
use DB;


class SingersController extends Controller
{
	/**
	 * @return view for singers page
	 */
	public function home()
	{
		$singers = Singers::all();
		return view( 'singers', [ 'singers' => $singers ] );
	}

	/**
	 * Insert the new singer to DB, after validation
	 * @param Request $request
	 * @return view with given success message
	 */
	public function add( Request $request )
	{
		$this->validate( $request, [
			'singer_name' => 'required',
			'singer_desc' => 'required'
		] );
		$singer = new Singers();
		$singer->singer_name = $request->input( 'singer_name' );
		$singer->description = $request->input( 'singer_desc' );
		$singer->save();
		return redirect( '/singers' )->with( 'info', 'Singer created successfully' );

	}

	/**
	 * @param {Number}  $id
	 * @return view for singer edit page
	 */
	public function update( $id )
	{
		$singer = Singers::find( $id );
		return view( 'editsinger', [ 'singer' => $singer ] );
	}

	/**
	 * @param Request $request
	 * @param {Number} $id
	 * @return view with given success message
	 */
	public function doUpdate( Request $request, $id )
	{
		$this->validate( $request, [
			'singer_name' => 'required'
		] );
		$data = array( 'singer_name' => $request->input( 'singer_name' ),
			'description' => $request->input( 'singer_desc' ) );
		Singers::where( 'id', $id )->update( $data );
		return redirect( '/singers' )->with( 'info', 'Singer updated successfully' );
	}

	/**
	 * Delete Singer by given id
	 * @param {Number} $id
	 * @return view with given success message
	 */
	public function delete( $id )
	{
		Singers::where( 'id', $id )->delete();
		return redirect( 'singers' )->with( 'info', 'Singer deleted successfully' );
	}

	/**
	 * Get disc list of given singer id
	 * @param {Number} $id
	 * @return view for disc list by given singer
	 */
	public function getDiscList( $id )
	{
		$discList = DB::table( 'discs' )->join( 'singers', 'discs.singer_id', '=', 'singers.id' )
			->select( 'discs.*', 'singers.singer_name' )
			->where( 'singers.id', '=', $id )
			->get();
		return view( 'discs', [ 'discs' => $discList, 'author' => true ] );
	}
}
