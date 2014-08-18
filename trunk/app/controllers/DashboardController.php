<?php


class DashboardController extends BaseController {

    public function showDashboard()
    {
        return View::make('dashboard/dashboard');
    }


    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }


    public function saveGeneral()
    {
        dd('graba');
    }

    public function  saveContact()
    {
        dd('graba datos de contacto');
    }
}