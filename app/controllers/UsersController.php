<?php
use Directorio\Managers\RegisterManager;
use Directorio\Repositories\UserRepo;
use Directorio\Repositories\RubroRepo;
use Directorio\Entities\Negocio;

class UsersController extends BaseController{

    protected $userRepo;
    protected $rubroRepo;

    public function __construct(UserRepo $userRepo, RubroRepo $rubroRepo)
    {
        $this->userRepo = $userRepo;
        $this->rubroRepo = $rubroRepo;
    }

    public function signUp()
    {
        View::share('page_title', 'Registrare');

        $rubros = $this->rubroRepo->getAllRubros();

        return View::make('users/sign-up', compact('rubros'));
    }


    public function register()
    {

        $rules = [
            'full_name'             => 'required',
            'email'                 => 'required|email|unique:user,email',
            'nombre_negocio'        => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        else{
            $user = $this->userRepo->newUser();
            $manager = new RegisterManager($user, Input::all());

            if($manager->save_user())
            {
                $negocio = new Negocio;
                $negocio->user_id = $user->id;
                $negocio->nombre_negocio = Input::get('nombre_negocio');
                $negocio->rubros_id = Input::get('rubro');
                $negocio->slug =\Str::slug(Input::get('nombre_negocio'));
                $negocio->save();

                return Redirect::route('home');
            }
            else{
                return Redirect::back()->withInput()->withErrors($manager->getErrors());
            }
        }
    }

    public function showLogin()
    {
        View::share('page_title', 'Iniciar Sesión');

        return View::make('users/login');
    }

    public function  login()
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required'
        ];

        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else
        {
            $credentials = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            if (Auth::attempt($credentials))
            {
               /* $id = Auth::id();
                $email = Auth::user()->email;
                dd('ingreso '.$id.'  '. $email);*/
                return Redirect::to('/dashboard');
            }
            else{
                return Redirect::back()->withInput()->withErrors($validator);
            }
        }


    }

} 