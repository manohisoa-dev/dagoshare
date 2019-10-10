<?php
namespace App\Http\Controllers\admin;

use App\FichierTelechargement;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class FichierTelechargementController extends Controller
{
    public $viewDir = "admin.fichier_telechargement";

    public function index()
    {
        $records = FichierTelechargement::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, FichierTelechargement::validationRules());

        FichierTelechargement::create($request->all());

        # notification
        Notify::success('Fichier Telechargement a été créer avec succès');
        return redirect(route('admin.fichier-telechargement.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, FichierTelechargement $fichierTelechargement)
    {
        return $this->view("show",['fichierTelechargement' => $fichierTelechargement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, FichierTelechargement $fichierTelechargement)
    {
        return $this->view( "edit", ['fichierTelechargement' => $fichierTelechargement] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, FichierTelechargement $fichierTelechargement)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, FichierTelechargement::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fichierTelechargement->update($data);
            return "Record updated";
        }

        $this->validate($request, FichierTelechargement::validationRules());

        $fichierTelechargement->update($request->all());

        # notification
        Notify::success('Fichier Telechargement a été mise à jour avec succès');
        return redirect(route('admin.fichier-telechargement.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, FichierTelechargement $fichierTelechargement)
    {
        $fichierTelechargement->delete();

        # notification
        Notify::success('Fichier Telechargement a été supprimer avec succès');
        return redirect(route('admin.fichier-telechargement.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
