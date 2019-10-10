<?php
namespace App\Http\Controllers\admin;

use App\Commentaire;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class CommentaireController extends Controller
{
    public $viewDir = "admin.commentaire";

    public function index()
    {
        $records = Commentaire::findRequested();
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
        $this->validate($request, Commentaire::validationRules());

        Commentaire::create($request->all());

        # notification
        Notify::success('Commentaire a été créer avec succès');
        return redirect(route('admin.commentaire.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Commentaire $commentaire)
    {
        return $this->view("show",['commentaire' => $commentaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Commentaire $commentaire)
    {
        return $this->view( "edit", ['commentaire' => $commentaire] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Commentaire::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $commentaire->update($data);
            return "Record updated";
        }

        $this->validate($request, Commentaire::validationRules());

        $commentaire->update($request->all());

        # notification
        Notify::success('Commentaire a été mise à jour avec succès');
        return redirect(route('admin.commentaire.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Commentaire $commentaire)
    {
        $commentaire->delete();

        # notification
        Notify::success('Commentaire a été supprimer avec succès');
        return redirect(route('admin.commentaire.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
