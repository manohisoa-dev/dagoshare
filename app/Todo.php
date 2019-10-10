<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon ;

class Todo extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Todo::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('priorite_id') and $query->where('priorite_id',\Request::input('priorite_id'));
        \Request::input('libelle') and $query->where('libelle','like','%'.\Request::input('libelle').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('statut') and $query->where('statut',\Request::input('statut'));
        \Request::input('fait_le') and $query->where('fait_le',\Request::input('fait_le'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        if(!\Request::input("sort")){
            $query->orderBy('priorite_id' , 'asc');
        }
        else{
            \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));
        }

        // paginate results
        return $query->paginate(Config::get('constants.perpage.admin'));
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'priorite_id' => 'integer',
            'libelle' => 'string|max:200',
            'description' => 'string',
            'statut' => 'in:en_attente,fait',
            'fait_le' => '',
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

    public function priorite()
    {
        return $this->belongsTo('App\Priorite');
    }

}

