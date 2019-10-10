@extends('admin.layouts.app')

@section('page-heading')
<h2>Fichiers</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Fichiers</a>
    </li>
    <li>
        <a href="{{ route('admin.fichier.index') }}">Listes</a>
    </li>
    <li class="active">
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Fichier : {{$fichier->titre}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.fichier.index')}}/{{$fichier->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('titre','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('titre_original','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'description' )->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('categorie_id','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('sous_categorie_id','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('fichier_type_id','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('mot_de_passe','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('realisation','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('duree','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('annee','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('tag_id','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('taille','text')->model($fichier)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::select( 'taille_unite', [ 'oct', 'ko', 'mo', 'go', 'to' ] )->model($fichier)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection