@extends('admin.layouts.app')

@section('page-heading')
<h2>Todos</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Todos</a>
    </li>
    <li>
        <a href="{{ route('admin.todo.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Todo</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.todo.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    <div class="form-group">
                        <label for="priorite_id">Priorite</label>
                        <select class="form-control chosen-select" id="priorite_id" name="priorite_id" required>
                            @foreach(\App\Priorite::all() as $item)
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                                            
                    {!! \Nvd\Crud\Form::input('libelle','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::textarea( 'description' )->show() !!}
                                            
                    {!! \Nvd\Crud\Form::select( 'statut', [ 'en_attente', 'fait' ] )->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('fait_le','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection