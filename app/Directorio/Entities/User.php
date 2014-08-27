<?php namespace Directorio\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = array('full_name','email','password');
/*
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make('value');
    }
*/

    public function negocio()
    {
        return $this->hasOne('Directorio\Entities\Negocio','user_id','id');
    }

}
