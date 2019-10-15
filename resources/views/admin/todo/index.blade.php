@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Todos</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.todo.index') }}">Todos</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.todo.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Todo        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Todos</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.todo.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('priorite_id','admin.todo.index','Priorite')!!}
                        {!!\Nvd\Crud\Html::sortableTh('libelle','admin.todo.index','Libelle')!!}
                        {!!\Nvd\Crud\Html::sortableTh('description','admin.todo.index','Description')!!}
                        {!!\Nvd\Crud\Html::sortableTh('statut','admin.todo.index','Statut')!!}
                        {!!\Nvd\Crud\Html::sortableTh('fait_le','admin.todo.index','Fait Le')!!}
                        {!!\Nvd\Crud\Html::sortableTh('created_at','admin.todo.index','Créer le')!!}
                        {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.todo.index','Mise à jour le')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td><input type="text" class="form-control" name="priorite_id" value="{{Request::input("priorite_id")}}"></td>
                            <td><input type="text" class="form-control" name="libelle" value="{{Request::input("libelle")}}"></td>
                            <td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
                            <td>{!!\Nvd\Crud\Html::selectRequested(
                                'statut',
                                [ '', 'en_attente', 'fait' ],
                                ['class'=>'form-control']
                            )!!}</td>
                            <td><input type="text" class="form-control" name="fait_le" value="{{Request::input("fait_le")}}"></td>
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
                                          data-name="priorite_id"
                                          data-value="{{ $record->priorite_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.todo.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >
                                          <span class="label label-{{$record->priorite ? $record->priorite->class : 'default'}}">{{ $record->priorite->libelle }}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="text"
                                          data-name="libelle"
                                          data-value="{{ $record->libelle }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.todo.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->libelle }}</span>
                                    </td>
                                    <td>
                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->description }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.todo.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->description }}</span>
                                    </td>
                                    <td>
                                        <span class="editable"
                                          data-type="select"
                                          data-name="statut"
                                          data-value="{{ $record->statut }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.todo.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          data-source="[{'en_attente':'en_attente'},{'fait':'fait'}]">{{ $record->statut }}</span>
                                    </td>
                                    <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="fait_le"
                                          data-value="{{ $record->fait_le }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.todo.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->fait_le }}</span>
                                    </td>
                                    <td>
                                        {{ $record->created_at }}
                                    </td>
                                    <td>
                                        {{ $record->updated_at }}
                                    </td>
                                    @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.todo.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 9])
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