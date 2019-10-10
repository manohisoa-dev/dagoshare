@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Bugs</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.bug.index') }}">Bugs</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.bug.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Bug        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Bugs</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.bug.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('bug_type_id','admin.bug.index','Type du bug')!!}
                        {!!\Nvd\Crud\Html::sortableTh('statut','admin.bug.index','Statut')!!}
                        {!!\Nvd\Crud\Html::sortableTh('titre','admin.bug.index','Titre')!!}
                        {!!\Nvd\Crud\Html::sortableTh('url','admin.bug.index','Url')!!}
                        {!!\Nvd\Crud\Html::sortableTh('description','admin.bug.index','Description')!!}
                        {!!\Nvd\Crud\Html::sortableTh('created_at','admin.bug.index','Créer le')!!}
                        {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.bug.index','Corrigé le')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td>
                                <select class="form-control chosen-select" id="bug_type_id" name="bug_type_id">
                                    <option value="">Tout type de bug</option>
                                    @foreach(\App\BugType::all() as $item)
                                        <option value="{{$item->id}}" {{Request::input("bug_type_id") == $item->id ? 'selected' : ''}}>{{$item->libelle}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{!!\Nvd\Crud\Html::selectRequested(
                                'statut',
                                [ '', 'en_attente', 'corriger' ],
                                ['class'=>'form-control']
                            )!!}</td>
                            <td><input type="text" class="form-control" name="titre" value="{{Request::input("titre")}}"></td>
                            <td><input type="text" class="form-control" name="url" value="{{Request::input("url")}}"></td>
                            <td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
                            <td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
                            <td><input type="text" class="form-control" name="created_at" value="{{Request::input("updated_at")}}"></td>
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
                                          data-name="bug_type_id"
                                          data-value="{{ $record->bug_type_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->bugType->libelle }}
                                    </span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="select"
                                          data-name="statut"
                                          data-value="{{ $record->statut }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          data-source="[{'en_attente':'en_attente'},{'corriger':'corriger'}]">
                                            @if($record->statut == 'en_attente')
                                                <span class="label label-danger">{{ $record->statut }}</span>
                                            @else
                                                <span class="label label-primary">{{ $record->statut }}</span>
                                            @endif
                                    </span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="text"
                                          data-name="titre"
                                          data-value="{{ $record->titre }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->titre }}
                                    </span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="text"
                                          data-name="url"
                                          data-value="{{ $record->url }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->url }}
                                    </span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->description }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.bug.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->description }}
                                    </span>
                                </td>
                                <td>
                                    {{ $record->created_at }}
                                </td>
                                <td>
                                    {{ $record->resolution ? $record->resolution->created_at : '' }}
                                </td>
                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.bug.index'), 'record' => $record ] )
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