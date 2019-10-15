<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class FichierLien extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = FichierLien::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('titre') and $query->where('titre','like','%'.\Request::input('titre').'%');
        \Request::input('fichier_id') and $query->where('fichier_id',\Request::input('fichier_id'));
        \Request::input('qualite_id') and $query->where('qualite_id',\Request::input('qualite_id'));
        \Request::input('lien') and $query->where('lien','like','%'.\Request::input('lien').'%');
        \Request::input('hebergeur_id') and $query->where('hebergeur_id',\Request::input('hebergeur_id'));
        \Request::input('langue_id') and $query->where('langue_id',\Request::input('langue_id'));
        \Request::input('extension') and $query->where('extension',\Request::input('extension'));
        \Request::input('taille') and $query->where('taille','like','%'.\Request::input('taille').'%');
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
            'titre' => 'string|max:200',
            'fichier_id' => 'required|integer',
            'qualite_id' => 'integer',
            'lien' => 'required|string|max:255',
            'hebergeur_id' => 'integer',
            'langue_id' => 'required|integer',
            'extension' => 'integer',
            'taille' => 'required|string|max:60',
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

