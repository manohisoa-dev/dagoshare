@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Sous Categories</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.sous-category.index') }}">Sous Categories</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.sous-category.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Sous Category
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Sous Categories</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.sous-category.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('category_id','admin.sous-category.index','Categorie')!!}
                        {!!\Nvd\Crud\Html::sortableTh('libelle','admin.sous-category.index','Libelle')!!}
                        {!!\Nvd\Crud\Html::sortableTh('created_at','admin.sous-category.index','Créer le')!!}
                        {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.sous-category.index','Mis à jour le')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td>
                                <select class="form-control chosen-select" id="category_id" name="category_id">
                                    <option value="">Tout les catégories</option>
                                    @foreach(\App\Category::all() as $item)
                                        <option value="{{$item->id}}" {{Request::input("category_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" class="form-control" name="libelle" value="{{Request::input("libelle")}}"></td>
                            <td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
                            <td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
                            <td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
                        </form>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse ( $records as $record )
                            <tr>
                                <td>
                                    {{ $record->id }}
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="number"
                                          data-name="category_id"
                                          data-value="{{ $record->category_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.sous-category.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->category ? $record->category->libelle : '' }}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="number"
                                          data-name="libelle"
                                          data-value="{{ $record->libelle }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.sous-category.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->libelle }}</span>
                                </td>
                                <td>
                                    {{ $record->created_at }}
                                </td>
                                <td>
                                    {{ $record->updated_at }}
                                </td>
                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.sous-category.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 6])
                        @endforelse
                    </tbody>

                </table>

                @include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

				<script>
					$(".editable").editable({ajaxOptions:{method:'PUT'}});
				</script>
			</div>
		</div>
	</div>
</div>
@endsection