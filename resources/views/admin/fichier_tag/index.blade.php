@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Fichier Tags</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.fichier-tag.index') }}">Fichier Tags</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.fichier-tag.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Fichier Tag        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Fichier Tags</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.fichier-tag.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('fichier_id','admin.fichier-tag.index','Fichier Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('tag_id','admin.fichier-tag.index','Tag Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.fichier-tag.index','Created At')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.fichier-tag.index','Updated At')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="fichier_id" value="{{Request::input("fichier_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="tag_id" value="{{Request::input("tag_id")}}"></td>
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
                                          data-name="fichier_id"
                                          data-value="{{ $record->fichier_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-tag.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->fichier_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="tag_id"
                                          data-value="{{ $record->tag_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-tag.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->tag_id }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.fichier-tag.index'), 'record' => $record ] )
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