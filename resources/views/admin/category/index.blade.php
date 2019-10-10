@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Categories</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.category.index') }}">Categories</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Category        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Categories</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.category.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('libelle','admin.category.index','Libelle')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('description','admin.category.index','Description')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.category.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.category.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="libelle" value="{{Request::input("libelle")}}"></td>
                                                            <td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
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
                                          data-type="text"
                                          data-name="libelle"
                                          data-value="{{ $record->libelle }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.category.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->libelle }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->description }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.category.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->description }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.category.index'), 'record' => $record ] )
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