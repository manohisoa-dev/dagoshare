<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Bug extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Bug::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('bug_type_id') and $query->where('bug_type_id',\Request::input('bug_type_id'));
        \Request::input('statut') and $query->where('statut',\Request::input('statut'));
        \Request::input('titre') and $query->where('titre','like','%'.\Request::input('titre').'%');
        \Request::input('url') and $query->where('url','like','%'.\Request::input('url').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
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
            'bug_type_id' => 'required|integer',
            'statut' => 'in:en_attente,corriger',
            'titre' => 'string|max:200',
            'url' => 'string|max:255',
            'description' => 'string',
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

    public function bugType()
    {
        return $this->belongsTo('App\BugType');
    }

    public function resolution()
    {
        return $this->hasOne('App\BugResolution');
    }

}

