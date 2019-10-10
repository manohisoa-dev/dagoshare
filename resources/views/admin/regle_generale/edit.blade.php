@extends('admin.layouts.app')

@section('page-heading')
<h2>Regle Generales</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Regle Generales</a>
    </li>
    <li>
        <a href="{{ route('admin.regle-generale.index') }}">Listes</a>
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
                <h5>Mise à jour Regle Generale : {{$regleGenerale->regle_type_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.regle-generale.index')}}/{{$regleGenerale->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('regle_type_id','text')->model($regleGenerale)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'description' )->model($regleGenerale)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection