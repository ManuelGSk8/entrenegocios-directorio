<?php

use Directorio\Repositories\RubroRepo;

class NegocioController extends BaseController{


    protected  $rubroRepo;

    public function  __construct(RubroRepo $rubroRepo)
    {
        $this->rubroRepo = $rubroRepo;
    }

    public function rubros($slug, $id )
    {

       $rubro = $this->rubroRepo->find($id);

        return View::make('rubros/categorias', compact('rubro'));
    }

    public function show($slug, $id)
    {
        dd($slug);
    }




















































} 