<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CommentaireEvaluation extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = CommentaireEvaluation::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('commentaire_id') and $query->where('commentaire_id',\Request::input('commentaire_id'));
        \Request::input('valeur') and $query->where('valeur',\Request::input('valeur'));
        \Request::input('attribuer_par') and $query->where('attribuer_par',\Request::input('attribuer_par'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(Config::get('constants.perpage.admin'));
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'commentaire_id' => 'required|integer',
            'valeur' => 'required|integer',
            'attribuer_par' => 'integer',
        ];

        // no list is provided
        if(!$attributes)
            return $rules;

        // a single attribute is provided
        if(!is_array($attributes))
            return [ $attributes => $rules[$attributes] ];

        // a list of attributes is provided
        $newRules = [];
        foreach ( $attributes as $attr )
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

}

