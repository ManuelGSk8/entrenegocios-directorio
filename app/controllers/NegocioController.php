<?php

use Directorio\Repositories\NegocioRepo;

class NegocioController extends BaseController{


    protected  $negocioRepo;

    public function  __construct(NegocioRepo $negocioRepo)
    {
        $this->negocioRepo = $negocioRepo;
    }

    public function show($slug, $id)
    {
        $this->negocioRepo->counteProfile($id);
        $negocio = $this->negocioRepo->find($id);

        View::share('page_title', $negocio->nombre_negocio);

        $config = array();
        $config['center'] = $negocio->latitud .', '. $negocio->longitud;
        $config['zoom'] = '16';

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