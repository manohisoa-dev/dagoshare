@extends('admin.layouts.app')

@section('page-heading')
<h2>Bug Resolutions</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Bug Resolutions</a>
    </li>
    <li>
        <a href="{{ route('admin.bug-resolution.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Bug Resolution</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.bug-resolution.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    <div class="form-group">
                        <label for="bug_id">Bug</label>
                        <select class="form-control chosen-select" id="bug_id" name="bug_id" required>
                            @foreach(\App\Bug::all() as $item)
                                <option value="{{$item->id}}">{{$item->titre}}</option>
                            @endforeach
                        </select>
                    </div>
                                            
                    {!! \Nvd\Crud\Form::textarea( 'conclusion' )->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection