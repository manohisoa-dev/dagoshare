@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Langues</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.langue.index') }}">Langues</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.langue.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Langue        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Langues</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.langue.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('code','admin.langue.index','Code')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('libelle','admin.langue.index','Libelle')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('prefixe','admin.langue.index','Prefixe')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.langue.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.langue.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="code" value="{{Request::input("code")}}"></td>
                                                            <td><input type="text" class="form-control" name="libelle" value="{{Request::input("libelle")}}"></td>
                                                            <td><input type="text" class="form-control" name="prefixe" value="{{Request::input("prefixe")}}"></td>
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
                                          data-name="code"
                                          data-value="{{ $record->code }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.langue.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->code }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="libelle"
                                          data-value="{{ $record->libelle }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.langue.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->libelle }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="prefixe"
                                          data-value="{{ $record->prefixe }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.langue.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->prefixe }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.langue.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 7])
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