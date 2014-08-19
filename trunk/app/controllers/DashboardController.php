<?php

use Directorio\Repositories\RubroRepo;
use Directorio\Repositories\NegocioRepo;
use Directorio\Managers\DatosGeneralesManager;


class DashboardController extends BaseController {

    protected $rubroRepo;
    protected $negocioRepo;

    public function __construct(RubroRepo $rubroRepo, NegocioRepo $negocioRepo)
    {
        $this->rubroRepo = $rubroRepo;
        $this->negocioRepo = $negocioRepo;
    }

    public function showDashboard()
    {

        $rubros = $this->rubroRepo->getAllRubros();
        $negocio = $this->negocioRepo->find(Auth::user()->id);

        return View::make('dashboard/dashboard',compact('rubros', 'negocio'));
    }


    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }


    public function saveGeneral()
    {

        $negocio = $this->negocioRepo->newNegocio(Auth::user()->id);

        $inputs = [
            'id'                => Auth::user()->id,
            'nombre_negocio'    => Input::get('nombre_negocio'),
            'slogan_negocio'    => Input::get('slogan_negocio'),
            'descripcion'       => Input::get('descripcion'),
            'rubros_id'         => Input::get('rubro'),
            'website'           => Input::get('website'),
            'slug'              => \Str::slug(Input::get('nombre_negocio'))
        ];

        $manager = new DatosGeneralesManager($negocio, $inputs);

        if($manager->save())
        {
           return Redirect::route('dashboard');
        }
        else{
            return Redirect::back()->withInput()->withErrors($manager->getErrors());
        }

    }

    public function  saveContact()
    {
        $negocio = $this->negocioRepo->newNegocio(Auth::user()->id);

        $inputs = [
            'id'        => Auth::user()->id,
            'fijo'      => Input::get('fijo'),
            'movil'     => Input::get('movil'),
            'email'     => Input::get('email'),
            'web_fb'    => Input::get('web_fb'),
            'Web_tw'    => Input::get('web_tw')
        ];


    }
}