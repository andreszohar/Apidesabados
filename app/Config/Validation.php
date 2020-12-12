<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $usuarioPOST=[
		
		'nombre'=>'alpha|required',
		'edad'=>'required',
		'cedula'=>'required',
		'poblacion'=>'required',
		'descripcion'=>'required',
		'foto'=>'required'
	];

	public $usuarioPUT=[
		
		'nombre'=>'alpha|required',
		'edad'=>'required'
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
