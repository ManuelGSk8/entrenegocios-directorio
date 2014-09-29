<?php

use Directorio\Repositories\NegocioRepo;
use Directorio\Repositories\RubroRepo;

class HomeController extends BaseController {

    protected $negocioRepo;
    protected $rubroRepo;


    public function __construct(NegocioRepo $negocioRepo, RubroRepo $rubroRepo)
    {
        $this->negocioRepo = $negocioRepo;
        $this->rubroRepo = $rubroRepo;
    }

	public function index()
	{
        $listaNegocios = $this->negocioRepo->listNegocios();
        $listaDepartamento = ['all' => '-- Todos los departamentos --'] + $this->negocioRepo->listRegions();
        $listaCategorias = ['all' => '-- Todas las categorias--'] + $this->rubroRepo->getAllRubros();

       //dd(array_rand($listaNegocios));

        View::share('page_title', 'Inicio');
		return View::make('home', compact('listaNegocios', 'listaDepartamento','listaCategorias'));
	}


    public function busqueda($id_depart,$id_category,$texto = null){

       // dd('departamento: '.$id_depart.' categoria: '.$id_category. ' texto: '.$texto);

        $departamento = $id_depart;
        $categoria = $id_category;
        $texto =$texto;

        if($departamento == 'all'){
            $departamento = null;
        }

        if($categoria == 'all'){
            $categoria == null;
        }

        $listaNegocios = $this->negocioRepo->getResultBusqueda($departamento,$categoria,$texto);
        $listaDepartamento = ['all' => '-- Todos los departamentos --'] + $this->negocioRepo->listRegions();
        $listaCategorias = ['all' => '-- Todas las categorias--'] + $this->rubroRepo->getAllRubros();


        View::share('page_title', 'Inicio');
        return View::make('busqueda.result', compact('listaNegocios', 'listaDepartamento','listaCategorias'));
    }


    public function categoria($slug, $id )
    {

        //$rubro = $this->rubroRepo->find($id);
        $listaNegocios = $this->rubroRepo->getNegociobyRubro($id);
        $rubro = $this->rubroRepo->getRubrobyId($id);
        $listaDepartamento = ['all' => '-- Todos los departamentos --'] + $this->negocioRepo->listRegions();
        $listaCategorias = ['all' => '-- Todas las categorias--'] + $this->rubroRepo->getAllRubros();

        View::share('page_title',$rubro->descripcion);

        return View::make('categoria/categorias', compact('listaNegocios','rubro','listaDepartamento','listaCategorias'));
    }

}
