<?php

use Directorio\Repositories\RubroRepo;
use Directorio\Repositories\NegocioRepo;
use Directorio\Repositories\ProductoRepo;
use Directorio\Managers\DatosGeneralesManager;
use Directorio\Managers\ContactManager;
use Directorio\Managers\GalleryManager;


class DashboardController extends BaseController {

    protected $rubroRepo;
    protected $negocioRepo;
    protected $productoRepo;

    public function __construct(RubroRepo $rubroRepo, NegocioRepo $negocioRepo, ProductoRepo $productoRepo)
    {
        $this->rubroRepo = $rubroRepo;
        $this->negocioRepo = $negocioRepo;
        $this->productoRepo = $productoRepo;
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
            'user_id'                => Auth::user()->id,
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
            'user_id'        => Auth::user()->id,
            'fijo'      => Input::get('fijo'),
            'movil'     => Input::get('movil'),
            'email'     => Input::get('email'),
            'web_fb'    => Input::get('web_fb'),
            'Web_tw'    => Input::get('web_tw')
        ];

        $manager = new ContactManager($negocio, $inputs);

        if($manager->save())
        {
            return Redirect::route('dashboard');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($manager->getErrors());
        }
    }


    public function showGallery()
    {
        $productos = $this->productoRepo->findProductbyNegocio(Auth::user()->id);

        return View::make('dashboard/gallery', compact('productos'));
    }

    public function uploadImage()
    {
        $input = [
            'file' => Input::file('file')
        ];
        $rules = [
            'file' => 'required|image|mimes:jpg,jpeg,png,bmp|max:2000'
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails())
        {
            return Response::make($validation->messages()->first(), 400);
        }else
        {
            $image = Input::file('file');

            $producto = $this->productoRepo->newProducto();
            $new_name = time().time().str_random(15);
            $path = public_path('upload/img/thumbnail/' . $new_name.'small.jpg');
            $path_normal = public_path('upload/img/img/' . $new_name.'large.jpg');

            $inputs = [
                'negocio_id'        => Auth::user()->id,
                'url_image_small' => 'upload/img/thumbnail/' . $new_name.'small.jpg',
                'url_image_large' => 'upload/img/img/' . $new_name.'large.jpg',
                'titulo'            => null
            ];

            $manager = new GalleryManager($producto, $inputs);

            if($manager->save())
            {
                \Image::make($image->getRealPath())->resize('350','350')->save($path,70);
                \Image::make($image->getRealPath())->save($path_normal,70);
            }
            else{
                return Redirect::back()->withInput()->withErrors($manager->getErrors());
            }
        }
    }



    public function setUbication()
    {

        $negocio = $this->negocioRepo->find(Auth::user()->id);

        $config = array();
        if($negocio->latitud != null && $negocio->longitud != null)
        {
            $config['center'] = $negocio->latitud .', '. $negocio->longitud;
        }
        $config['map_height'] = '350px';
        $config['zoom'] = '13';
      /*  $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'direccion';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';*/


        Gmaps::initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        if($negocio->latitud != null && $negocio->longitud != null)
        {
            $marker['position'] = $negocio->latitud .', '. $negocio->longitud;
        }

        $marker['draggable'] = true;
        $marker['animation'] = 'DROP';
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return View::make('dashboard/ubication', compact('negocio', 'map'));
    }


    public function saveUbication(){

        dd('graba');
    }
}