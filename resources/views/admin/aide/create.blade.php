@extends('admin.layouts.app')

@section('page-heading')
<h2>Aides</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Aides</a>
    </li>
    <li>
        <a href="{{ route('admin.aide.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Aide</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.aide.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('titre','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::textarea( 'description' )->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection