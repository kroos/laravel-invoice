<?php
namespace App\Helpers;

class ExampleHelper
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public static function example_method($times = []): string
	{
		return '';
	}


}
