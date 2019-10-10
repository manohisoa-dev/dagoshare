<?php
namespace App\Http\Controllers\admin;

use App\FichierTag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class FichierTagController extends Controller
{
    public $viewDir = "admin.fichier_tag";

    public function index()
    {
        $records = FichierTag::findRequested();
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
        $this->validate($request, FichierTag::validationRules());

        FichierTag::create($request->all());

        # notification
        Notify::success('Fichier Tag a été créer avec succès');
        return redirect(route('admin.fichier-tag.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, FichierTag $fichierTag)
    {
        return $this->view("show",['fichierTag' => $fichierTag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, FichierTag $fichierTag)
    {
        return $this->view( "edit", ['fichierTag' => $fichierTag] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, FichierTag $fichierTag)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, FichierTag::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fichierTag->update($data);
            return "Record updated";
        }

        $this->validate($request, FichierTag::validationRules());

        $fichierTag->update($request->all());

        # notification
        Notify::success('Fichier Tag a été mise à jour avec succès');
        return redirect(route('admin.fichier-tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, FichierTag $fichierTag)
    {
        $fichierTag->delete();

        # notification
        Notify::success('Fichier Tag a été supprimer avec succès');
        return redirect(route('admin.fichier-tag.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
