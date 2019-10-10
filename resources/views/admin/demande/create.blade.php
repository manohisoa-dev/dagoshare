@extends('admin.layouts.app')

@section('page-heading')
<h2>Demandes</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Demandes</a>
    </li>
    <li>
        <a href="{{ route('admin.demande.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Demande</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.demande.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('user_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('compte_facebook','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::textarea( 'description' )->show() !!}
                                            
                    {!! \Nvd\Crud\Form::select( 'statut', [ 'en_attente', 'en_cours', 'fait', 'annuler' ] )->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('personnel_id','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection