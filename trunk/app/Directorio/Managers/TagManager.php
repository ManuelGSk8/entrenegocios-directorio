<?php
/**
 * Created by PhpStorm.
 * User: mgoicochea
 * Date: 26/08/14
 * Time: 02:01 PM
 */

namespace Directorio\Managers;


class TagManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'tags' => ''
        ];

        return $rules;
    }

} 