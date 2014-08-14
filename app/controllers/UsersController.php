<?php
use Directorio\Entities\User;
use Directorio\Managers\RegisterManager;
use Directorio\Repositories\NegocioRepo;

class UsersController extends BaseController{

    protected $negocioRepo;

    public function __construct(NegocioRepo $negocioRepo)
    {

        $this->negocioRepo = $negocioRepo;
    }

    public function signUp()
    {
        return View::make('users/sign-up');
    }


    public function register()
    {
        $user = $this->negocioRepo->newNegocio();
        $manager = new RegisterManager($user, Input::all());

        if($manager->save())
        {
            return Redirect::route('home');
        }
        else{
            return Redirect::back()->withInput()->withErrors($manager->getErrors());
        }

    }

} 