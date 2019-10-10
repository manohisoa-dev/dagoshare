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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Todo : {{$todo->priorite_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.todo.index')}}/{{$todo->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                    <div class="form-group">
                        <label for="priorite_id">Priorite</label>
                        <select class="form-control chosen-select" id="priorite_id" name="priorite_id" required>
                            @foreach(\App\Priorite::all() as $item)
                                <option value="{{$item->id}}" {{$todo->priorite_id == $item->id ? 'selected' : ''}}>{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                                                                        
                    {!! \Nvd\Crud\Form::input('libelle','text')->model($todo)->show() !!}
                                                                
                    {!! \Nvd\Crud\Form::textarea( 'description' )->model($todo)->show() !!}
                                                                
                    {!! \Nvd\Crud\Form::select( 'statut', [ 'en_attente', 'fait' ] )->model($todo)->show() !!}
                                                                
                    {!! \Nvd\Crud\Form::input('fait_le','text')->model($todo)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection