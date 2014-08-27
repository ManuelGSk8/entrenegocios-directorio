<?php

class HomeController extends BaseController {

	public function index()
	{
        View::share('page_title', 'Inicio');
		return View::make('home');
	}

}
