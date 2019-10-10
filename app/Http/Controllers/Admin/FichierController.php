<?php
namespace App\Http\Controllers\admin;

use App\Fichier;
use App\FichierTag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Jleon\LaravelPnotify\Notify;

class FichierController extends Controller
{
    public $viewDir = "admin.fichier";

    public function index()
    {
        $start = microtime(true);
        $records = Fichier::findRequested();
        $time = microtime(true) - $start;
        return $this->view( "index", ['records' => $records, 'time' => $time] );
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
        $this->validate($request, Fichier::validationRules());

        $data = $request->except('tag_id') ;
        $data['ajouter_par'] = Auth::id() ;
        $fichier = Fichier::create($data);

        // insertion des tags
        $tags = $request->input('tag_id') ;
        if(!empty($tags) && count($tags) > 0){
            foreach ($request->input('tag_id') as $id){
                FichierTag::create(array('fichier_id' =>  $fichier->id, 'tag_id' => $id)) ;
            }
        }

        # notification
        Notify::success('Fichier a été créer avec succès');
        return redirect(route('admin.fichier.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Fichier $fichier)
    {
        return $this->view("show",['fichier' => $fichier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Fichier $fichier)
    {
        return $this->view( "edit", ['fichier' => $fichier] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Fichier::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fichier->update($data);
            return "Record updated";
        }

        $this->validate($request, Fichier::validationRules());

        $fichier->update($request->all());

        # notification
        Notify::success('Fichier a été mise à jour avec succès');
        return redirect(route('admin.fichier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fichier $fichier)
    {
        $fichier->delete();

        # notification
        Notify::success('Fichier a été supprimer avec succès');
        return redirect(route('admin.fichier.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
