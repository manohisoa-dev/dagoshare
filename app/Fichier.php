<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Fichier extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Fichier::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('ajouter_par') and $query->where('ajouter_par',\Request::input('ajouter_par'));
        \Request::input('titre') and $query->where('titre','like','%'.\Request::input('titre').'%');
        \Request::input('titre_original') and $query->where('titre_original','like','%'.\Request::input('titre_original').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('category_id') and $query->where('category_id',\Request::input('category_id'));
        \Request::input('sous_categorie_id') and $query->where('sous_categorie_id',\Request::input('sous_categorie_id'));
        \Request::input('fichier_type_id') and $query->where('fichier_type_id',\Request::input('fichier_type_id'));
        \Request::input('mot_de_passe') and $query->where('mot_de_passe','like','%'.\Request::input('mot_de_passe').'%');
        \Request::input('realisation') and $query->where('realisation','like','%'.\Request::input('realisation').'%');
        \Request::input('duree') and $query->where('duree',\Request::input('duree'));
        \Request::input('annee') and $query->where('annee',\Request::input('annee'));
        \Request::input('taille') and $query->where('taille',\Request::input('taille'));
        \Request::input('taille_unite') and $query->where('taille_unite',\Request::input('taille_unite'));
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
            'ajouter_par' => '',
            'titre' => 'required|string|max:200',
            'titre_original' => '',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'sous_categorie_id' => '',
            'fichier_type_id' => 'integer',
            'mot_de_passe' => '',
            'realisation' => 'string|max:200',
            'duree' => '',
            'annee' => '',
            'taille' => '',
            'taille_unite' => 'in:oct,ko,mo,go,to',
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

    public function fichierType()
    {
        return $this->belongsTo('App\FichierType');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\User' , 'ajouter_par');
    }
    public function commentaires()
    {
        return $this->hasMany('App\Commentaire');
    }
    public function tags()
    {
        return $this->hasMany('App\FichierTag');
    }

}

