<?php

use Directorio\Repositories\RubroRepo;
use Directorio\Repositories\NegocioRepo;

class NegocioController extends BaseController{


    protected  $rubroRepo;
    protected  $negocioRepo;

    public function  __construct(RubroRepo $rubroRepo, NegocioRepo $negocioRepo)
    {
        $this->rubroRepo = $rubroRepo;
        $this->negocioRepo = $negocioRepo;
    }

    public function rubros($slug, $id )
    {

       $rubro = $this->rubroRepo->find($id);

        return View::make('rubros/categorias', compact('rubro'));
    }

    public function show($slug, $id)
    {
        $negocio = $this->negocioRepo->find($id);



        $config = array();
        $config['center'] = $negocio->latitud .', '. $negocio->longitud;
        $config['zoom'] = '17';

        Gmaps::initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        $marker['position'] = $negocio->latitud .', '. $negocio->longitud;
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();
        //echo "<html><head>".$map['js']."</head><body>".$map['html']."</body></html>";

       return View::make('negocio/negocio', compact('negocio','map'));
    }




















































} 