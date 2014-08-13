<?php


class UsersController extends BaseController{

    public function signUp()
    {
        return View::make('users/sign-up');
    }


    public function register()
    {
        dd(Input::all());
    }

} 