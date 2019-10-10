@extends('admin.layouts.app')

@section('page-heading')
<h2>Pages</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Pages</a>
    </li>
    <li>
        <a href="{{ route('admin.page.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Page</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.page.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('titre','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('description','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('route','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('slug','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::select( 'nouvelle_onglet', [ 'oui', 'non' ] )->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection