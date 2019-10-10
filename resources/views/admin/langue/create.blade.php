@extends('admin.layouts.app')

@section('page-heading')
<h2>Langues</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Langues</a>
    </li>
    <li>
        <a href="{{ route('admin.langue.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Langue</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.langue.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('code','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('libelle','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('prefixe','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection