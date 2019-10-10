@extends('admin.layouts.app')

@section('page-heading')
<h2>Bugs</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Bugs</a>
    </li>
    <li>
        <a href="{{ route('admin.bug.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Bug</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.bug.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    <div class="form-group">
                        <label for="bug_type_id">Type du bug</label>
                        <select class="form-control chosen-select" id="bug_type_id" name="bug_type_id" required>
                            @foreach(\App\BugType::all() as $item)
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>

                    {!! \Nvd\Crud\Form::input('titre','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('url','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::textarea( 'description' )->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection