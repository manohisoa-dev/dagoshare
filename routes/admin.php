<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::resource('actualite','ActualiteController');
    Route::resource('aide','AideController');
    Route::resource('category','CategoryController');
    Route::resource('sous-category','SousCategoryController');
    Route::resource('commentaire-evaluation','CommentaireEvaluationController');
    Route::resource('commentaire','CommentaireController');
    Route::resource('demande','DemandeController');

    Route::resource('fichier','FichierController');
    Route::resource('fichier-lien','FichierLienController');
    Route::resource('fichier-telechargement','FichierTelechargementController');
    Route::resource('fichier-type','FichierTypeController');
    Route::resource('fichier-tag','FichierTagController');

    Route::resource('fonction','FonctionController');
    Route::resource('langue','LangueController');
    Route::resource('page','PageController');
    Route::resource('personnel','PersonnelController');
    Route::resource('qualite','QualiteController');

    Route::resource('regle-generale','RegleGeneraleController');
    Route::resource('regle-type','RegleTypeController');

    Route::resource('tag','TagController');

    Route::resource('bug','BugController');
    Route::resource('bug-type','BugTypeController');
    Route::resource('bug-resolution','BugResolutionController');

    Route::resource('priorite','PrioriteController');
    Route::resource('todo','TodoController');
});