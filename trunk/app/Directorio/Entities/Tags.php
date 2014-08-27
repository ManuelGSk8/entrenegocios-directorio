<?php
/**
 * Created by PhpStorm.
 * User: mgoicochea
 * Date: 26/08/14
 * Time: 01:38 PM
 */

namespace Directorio\Entities;


class Tags extends \Eloquent {

    protected $table = 'tags';

    protected $fillable = ['id','tags'];

}