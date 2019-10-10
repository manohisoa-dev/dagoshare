@extends('admin.layouts.app')

@section('page-heading')
<h2>Sous Categories</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Sous Categories</a>
    </li>
    <li>
        <a href="{{ route('admin.sous-category.index') }}">Listes</a>
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
                <h5>Mise à jour Sous Category : {{$sousCategory->category_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.sous-category.index')}}/{{$sousCategory->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}

                    <div class="form-group">
                        <label for="category_id">Catégorie parent</label>
                        <select class="form-control chosen-select" id="category_id" name="category_id" required>
                            @foreach(\App\Category::all() as $item)
                                <option value="{{$item->id}}" {{$sousCategory->category_id == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>

                    {!! \Nvd\Crud\Form::input('libelle','text')->model($sousCategory)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection