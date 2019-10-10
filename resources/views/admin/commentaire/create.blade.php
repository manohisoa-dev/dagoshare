@extends('admin.layouts.app')

@section('page-heading')
<h2>Commentaires</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Commentaires</a>
    </li>
    <li>
        <a href="{{ route('admin.commentaire.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Commentaire</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.commentaire.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('fichier_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('user_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::textarea( 'message' )->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('note','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('point_globale','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection