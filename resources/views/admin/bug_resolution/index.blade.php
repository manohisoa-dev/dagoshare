@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Bug Resolutions</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.bug-resolution.index') }}">Bug Resolutions</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.bug-resolution.create') }}" type="button" class="btn btn-primary">
            Resoudre un bug
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Bug Resolutions</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.bug-resolution.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('bug_id','admin.bug-resolution.index','Bug')!!}
                        {!!\Nvd\Crud\Html::sortableTh('conclusion','admin.bug-resolution.index','Conclusion')!!}
                        {!!\Nvd\Crud\Html::sortableTh('created_at','admin.bug-resolution.index','Créer le')!!}
                        {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.bug-resolution.index','Mise à jour le')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td><input type="text" class="form-control" name="bug_id" value="{{Request::input("bug_id")}}"></td>
                            <td><input type="text" class="form-control" name="conclusion" value="{{Request::input("conclusion")}}"></td>
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
                                          data-name="bug_id"
                                          data-value="{{ $record->bug_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug-resolution.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->bug->titre }}</span>
                                </td>
                                <td>
                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="conclusion"
                                          data-value="{{ $record->conclusion }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug-resolution.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->conclusion }}</span>
                                </td>
                                <td>
                                    {{ $record->created_at }}
                                </td>
                                <td>
                                    {{ $record->updated_at }}
                                </td>
                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.bug-resolution.index'), 'record' => $record ] )
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