@extends('admin.layouts.app')

@section('page-heading')
<h2>Tags</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Tags</a>
    </li>
    <li>
        <a href="{{ route('admin.tag.index') }}">Listes</a>
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
                <h5>Mise à jour Tag : {{$tag->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.tag.index')}}/{{$tag->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($tag)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection