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
        <strong>Ajout</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un nouveau Fichier Lien</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.fichier-lien.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('titre','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('fichier_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('qualite_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('lien','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('hebergeur_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('langue_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('extension','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('taille','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection