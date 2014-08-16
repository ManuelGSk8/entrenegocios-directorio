<?php
use Directorio\Managers\RegisterManager;
use Directorio\Repositories\UserRepo;

class UsersController extends BaseController{

    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {

        $this->userRepo = $userRepo;
    }

    public function signUp()
    {
        return View::make('users/sign-up');
    }


    public function register()
    {
        $user = $this->userRepo->newUser();
        $manager = new RegisterManager($user, Input::all());

        if($manager->save())
        {
            return Redirect::route('home');
        }
        else{
            return Redirect::back()->withInput()->withErrors($manager->getErrors());
        }

    }

    public function showLogin()
    {
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
                dd('ingreso');
            }
            else{
                return Redirect::back()->withInput()->withErrors($validator);
            }
        }


    }

} 