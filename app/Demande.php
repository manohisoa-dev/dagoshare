<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Demande extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Demande::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('compte_facebook') and $query->where('compte_facebook','like','%'.\Request::input('compte_facebook').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('statut') and $query->where('statut',\Request::input('statut'));
        \Request::input('personnel_id') and $query->where('personnel_id',\Request::input('personnel_id'));
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
            'user_id' => 'integer',
            'compte_facebook' => 'string|max:200',
            'description' => 'string',
            'statut' => 'in:en_attente,en_cours,fait,annuler',
            'personnel_id' => 'required|integer',
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

