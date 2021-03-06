@extends('admin.layouts.app')

@section('page-heading')
<h2>Fichier Liens</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Fichier Liens</a>
    </li>
    <li>
        <a href="{{ route('admin.fichier-lien.index') }}">Listes</a>
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
                <h5>Mise à jour Fichier Lien : {{$fichierLien->titre}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.fichier-lien.index')}}/{{$fichierLien->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('titre','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('fichier_id','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('qualite_id','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('lien','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('hebergeur_id','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('langue_id','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('extension','text')->model($fichierLien)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('taille','text')->model($fichierLien)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection