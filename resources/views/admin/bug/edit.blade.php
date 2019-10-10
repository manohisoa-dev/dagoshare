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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Bug : {{$bug->bug_type_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.bug.index')}}/{{$bug->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                    <div class="form-group">
                        <label for="bug_type_id">Type du bug</label>
                        <select class="form-control chosen-select" id="bug_type_id" name="bug_type_id" required>
                            @foreach(\App\BugType::all() as $item)
                                <option value="{{$item->id}}" {{$bug->bug_type_id == $item->id ? 'selected' : ''}}>{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>

                    {!! \Nvd\Crud\Form::input('titre','text')->model($bug)->show() !!}

                    {!! \Nvd\Crud\Form::input('url','text')->model($bug)->show() !!}

                    {!! \Nvd\Crud\Form::textarea( 'description' )->model($bug)->show() !!}

                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection