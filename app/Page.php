<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Page extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Page::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('titre') and $query->where('titre','like','%'.\Request::input('titre').'%');
        \Request::input('description') and $query->where('description',\Request::input('description'));
        \Request::input('route') and $query->where('route','like','%'.\Request::input('route').'%');
        \Request::input('slug') and $query->where('slug','like','%'.\Request::input('slug').'%');
        \Request::input('nouvelle_onglet') and $query->where('nouvelle_onglet',\Request::input('nouvelle_onglet'));
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
            'titre' => 'required|string|max:200',
            'description' => '',
            'route' => 'string|max:125',
            'slug' => 'string|max:255',
            'nouvelle_onglet' => 'in:oui,non',
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

