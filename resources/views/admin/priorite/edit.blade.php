@extends('admin.layouts.app')

@section('page-heading')
<h2>Priorites</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Priorites</a>
    </li>
    <li>
        <a href="{{ route('admin.priorite.index') }}">Listes</a>
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
                <h5>Mise à jour Priorite : {{$priorite->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.priorite.index')}}/{{$priorite->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($priorite)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('class','text')->model($priorite)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection