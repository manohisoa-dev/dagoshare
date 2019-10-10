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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Page : {{$page->titre}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.page.index')}}/{{$page->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('titre','text')->model($page)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('description','text')->model($page)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('route','text')->model($page)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('slug','text')->model($page)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::select( 'nouvelle_onglet', [ 'oui', 'non' ] )->model($page)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection