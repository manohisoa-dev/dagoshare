<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class FichierTelechargement extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = FichierTelechargement::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('fichier_id') and $query->where('fichier_id',\Request::input('fichier_id'));
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('ip') and $query->where('ip',\Request::input('ip'));
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
            'fichier_id' => 'required|integer',
            'user_id' => 'integer',
            'ip' => 'required|integer',
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

