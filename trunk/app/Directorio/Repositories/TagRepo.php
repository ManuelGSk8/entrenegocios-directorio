<?php

namespace Directorio\Repositories;

use Directorio\Entities\Tags;


class TagRepo extends BaseRepo{

    public function getModel()
    {
        return new Tags;
    }


    public function  newTag()
    {
        $tag = new Tags();

        return $tag;
    }

    public function findTagbyName($tag)
    {
        $tag = \DB::table('tags')->select('id')->where('tags', '=', $tag)->first();

        return $tag;
    }

    public function newNegocio_Tag($id_negocio,$id_tag)
    {
        \DB::table('negocio_tags')->insert(
            array('negocio_id' => $id_negocio, 'tag_id' => $id_tag)
        );
    }


    public function deleteNegocio_Tag($id_negocio)
    {
        \DB::table('negocio_tags')->where('negocio_id', '=', $id_negocio)->delete();
    }


    public function listTagsbyNegocio($id_negocio)
    {
        $tags = \DB::table('tags')->select('tags')
                 ->join('negocio_tags', function($join)
                {
                   $join->on('tags.id', '=', 'negocio_tags.tag_id');
                })->where('negocio_tags.negocio_id', '=', $id_negocio)->get();

        $list = [];
        for($i = 0; $i < count($tags); $i++)
        {
            $list[$i] = $tags[$i]->tags;
        }

        return $list;
    }

} 