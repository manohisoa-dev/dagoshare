@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Regle Generales</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.regle-generale.index') }}">Regle Generales</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.regle-generale.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Regle Generale        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Regle Generales</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.regle-generale.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('regle_type_id','admin.regle-generale.index','Regle Type Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('description','admin.regle-generale.index','Description')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.regle-generale.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.regle-generale.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="regle_type_id" value="{{Request::input("regle_type_id")}}"></td>
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
                                          data-type="number"
                                          data-name="regle_type_id"
                                          data-value="{{ $record->regle_type_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.regle-generale.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->regle_type_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->description }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.regle-generale.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->description }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.regle-generale.index'), 'record' => $record ] )
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