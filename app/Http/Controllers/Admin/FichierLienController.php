<?php
namespace App\Http\Controllers\admin;

use App\FichierLien;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class FichierLienController extends Controller
{
    public $viewDir = "admin.fichier_lien";

    public function index()
    {
        $records = FichierLien::findRequested();
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
        $this->validate($request, FichierLien::validationRules());

        FichierLien::create($request->all());

        # notification
        Notify::success('Fichier Lien a été créer avec succès');
        return redirect(route('admin.fichier-lien.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, FichierLien $fichierLien)
    {
        return $this->view("show",['fichierLien' => $fichierLien]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, FichierLien $fichierLien)
    {
        return $this->view( "edit", ['fichierLien' => $fichierLien] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, FichierLien $fichierLien)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, FichierLien::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fichierLien->update($data);
            return "Record updated";
        }

        $this->validate($request, FichierLien::validationRules());

        $fichierLien->update($request->all());

        # notification
        Notify::success('Fichier Lien a été mise à jour avec succès');
        return redirect(route('admin.fichier-lien.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, FichierLien $fichierLien)
    {
        $fichierLien->delete();

        # notification
        Notify::success('Fichier Lien a été supprimer avec succès');
        return redirect(route('admin.fichier-lien.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
