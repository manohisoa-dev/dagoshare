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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Aide : {{$aide->titre}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.aide.index')}}/{{$aide->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('titre','text')->model($aide)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'description' )->model($aide)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection