<?php

use Directorio\Repositories\RubroRepo;
use Directorio\Repositories\NegocioRepo;
use Directorio\Repositories\ProductoRepo;
use Directorio\Repositories\TagRepo;
use Directorio\Managers\DatosGeneralesManager;
use Directorio\Managers\GalleryManager;
use Directorio\Managers\UbicationManager;
use Directorio\Managers\TagManager;


class DashboardController extends BaseController {

    protected $rubroRepo;
    protected $negocioRepo;
    protected $productoRepo;
    protected $tagRepo;

    public function __construct(RubroRepo $rubroRepo, NegocioRepo $negocioRepo, ProductoRepo $productoRepo,
                                TagRepo $tagRepo)
    {
        $this->rubroRepo = $rubroRepo;
        $this->negocioRepo = $negocioRepo;
        $this->productoRepo = $productoRepo;
        $this->tagRepo = $tagRepo;
    }

    public function showDashboard()
    {
        View::share('page_title', 'Dashboard');
        $rubros = $this->rubroRepo->getAllRubros();
        $negocio = $this->negocioRepo->find(Auth::user()->id);

        $tags = $this->tagRepo->listTagsbyNegocio(Auth::user()->id);
        $tag = implode(',',$tags);

            return View::make('dashboard/dashboard',compact('rubros', 'negocio','tag'));
    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

    public function saveGeneral()
    {
        $negocio = $this->negocioRepo->find(Auth::user()->id);

        $inputs = [
            'nombre_negocio'    => Input::get('nombre_negocio'),
            'slogan_negocio'    => Input::get('slogan_negocio'),
            'descripcion'       => Input::get('descripcion'),
            'website'           => Input::get('website'),
            'web_fb'            => Input::get('web_fb'),
            'web_tw'            => Input::get('web_tw'),
            'rubros_id'         => Input::get('rubro'),
            'movil'             => Input::get('movil'),
            'fijo'              => Input::get('fijo'),
            'email'             => Input::get('email'),
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

    public function showGallery()
    {
        View::share('page_title', 'Dashboard - Gallery');

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
                'url_image_small'   => 'upload/img/thumbnail/' . $new_name.'small.jpg',
                'url_image_large'   => 'upload/img/img/' . $new_name.'large.jpg',
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

    public function showUbication()
    {
        View::share('page_title', 'Dashboard - Ubication');

        $negocio = $this->negocioRepo->find(Auth::user()->id);
        $departamentos = ['0' => '-- Seleccione --'] + $this->negocioRepo->listRegions();
        if($negocio->departamento != null)
        {
            $provincias = ['0' => '-- Seleccione --'] + $this->negocioRepo->listProvinces($negocio->departamento);
        }
        else
        {
            $provincias = ['0' => '-- Seleccione --'];
        }

        if($negocio->provincia != null)
        {
            $distritos = ['0' => '-- Seleccione --'] + $this->negocioRepo->listDistrict($negocio->departamento,$negocio->provincia);
        }
        else
        {
            $distritos = ['0' => '-- Seleccione --'];
        }

        return View::make('dashboard/ubication', compact('negocio', 'departamentos', 'provincias','distritos'));
    }


    public function saveUbication(){
        $direccion = false;
        $mapa = false;
       if(Input::get('flag_direccion') != null)
       {
           $direccion = true;
       }

        if(Input::get('flag_mapa') != null)
        {
            $mapa = true;
        }

        $inputs = [
            'flag_direccion'    => $direccion,
            'direccion'         => Input::get('direccion'),
            'departamento'      => Input::get('departamento'),
            'provincia'         => Input::get('provincia'),
            'distrito'          => Input::get('distrito'),
            'flag_mapa'          => $mapa,
            'latitud'           => Input::get('latitud'),
            'longitud'          => Input::get('longitud')
        ];


       $negocio = $this->negocioRepo->find(Auth::user()->id);

       $manager = new UbicationManager($negocio, $inputs);


        if($manager->save())
        {
            return Redirect::route('map');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($manager->getErrors());
        }


    }


    public function saveTag()
    {
        $inputs = explode(',',Input::get('tag'));
        $this->tagRepo->deleteNegocio_Tag(\Auth::user()->id);
        if($inputs[0] != "")
        {
            foreach($inputs as $input){

                $tag = $this->tagRepo->findTagbyName($input);

                if($tag != null)
                {
                    $this->tagRepo->newNegocio_Tag(\Auth::user()->id,$tag->id);
                }else
                {
                    $tag = $this->tagRepo->newTag();
                    $variables = [
                        'tags' => $input
                    ];
                    $manager = new TagManager($tag,$variables);

                    if($manager->save())
                    {
                        $this->tagRepo->newNegocio_Tag(\Auth::user()->id,$tag->id);
                    }
                }

            }
        }

        return Redirect::route('dashboard');
    }


    //obtiene lista de pronvicias
    public function listProvincias($departamento)
    {
       $provincias = ['0' => '-- Seleccione --'] + $this->negocioRepo->listProvinces($departamento);

       return $provincias;

    }


    public function listDistrito($departamento, $provincia)
    {
        $distrito = ['0' => '-- Seleccione --'] + $this->negocioRepo->listDistrict($departamento, $provincia);

        return $distrito;
    }
}