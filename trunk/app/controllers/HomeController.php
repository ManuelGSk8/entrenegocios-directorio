<?php

use Directorio\Repositories\NegocioRepo;

class HomeController extends BaseController {

    protected $negocioRepo;

    public function __construct(NegocioRepo $negocioRepo)
    {
        $this->negocioRepo = $negocioRepo;
    }

	public function index()
	{
        $listaNegocios = $this->negocioRepo->listNegocios();

        View::share('page_title', 'Inicio');
		return View::make('home', compact('listaNegocios'));
	}

}
