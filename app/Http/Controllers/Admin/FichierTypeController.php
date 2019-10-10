<?php
namespace App\Http\Controllers\admin;

use App\FichierType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class FichierTypeController extends Controller
{
    public $viewDir = "admin.fichier_type";

    public function index()
    {
        $records = FichierType::findRequested();
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
        $this->validate($request, FichierType::validationRules());

        FichierType::create($request->all());

        # notification
        Notify::success('type de fichier a été créer avec succès');
        return redirect(route('admin.fichier-type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, FichierType $fichierType)
    {
        return $this->view("show",['fichierType' => $fichierType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, FichierType $fichierType)
    {
        return $this->view( "edit", ['fichierType' => $fichierType] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, FichierType $fichierType)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, FichierType::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fichierType->update($data);
            return "Record updated";
        }

        $this->validate($request, FichierType::validationRules());

        $fichierType->update($request->all());

        # notification
        Notify::success('type de fichier a été mise à jour avec succès');
        return redirect(route('admin.fichier-type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, FichierType $fichierType)
    {
        $fichierType->delete();

        # notification
        Notify::success('type de fichier a été supprimer avec succès');
        return redirect(route('admin.fichier-type.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
