@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Demandes</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.demande.index') }}">Demandes</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.demande.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Demande        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Demandes</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.demande.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('user_id','admin.demande.index','Utilisateur')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('compte_facebook','admin.demande.index','Compte Facebook')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('description','admin.demande.index','Description')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('statut','admin.demande.index','Statut')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('personnel_id','admin.demande.index','Personnel')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.demande.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.demande.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="compte_facebook" value="{{Request::input("compte_facebook")}}"></td>
                                                            <td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
                                                            <td>{!!\Nvd\Crud\Html::selectRequested(
					'statut',
					[ '', 'en_attente', 'en_cours', 'fait', 'annuler' ],
					['class'=>'form-control']
				)!!}</td>
                                                            <td><input type="text" class="form-control" name="personnel_id" value="{{Request::input("personnel_id")}}"></td>
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
                                          data-name="user_id"
                                          data-value="{{ $record->user_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.demande.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->user_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="compte_facebook"
                                          data-value="{{ $record->compte_facebook }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.demande.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->compte_facebook }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->description }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.demande.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->description }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="select"
                                          data-name="statut"
                                          data-value="{{ $record->statut }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.demande.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          data-source="[{'en_attente':'en_attente'},{'en_cours':'en_cours'},{'fait':'fait'},{'annuler':'annuler'}]">{{ $record->statut }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="personnel_id"
                                          data-value="{{ $record->personnel_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.demande.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->personnel_id }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.demande.index'), 'record' => $record ] )
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