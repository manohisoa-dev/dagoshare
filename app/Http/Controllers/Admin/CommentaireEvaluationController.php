<?php
namespace App\Http\Controllers\admin;

use App\CommentaireEvaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class CommentaireEvaluationController extends Controller
{
    public $viewDir = "admin.commentaire_evaluation";

    public function index()
    {
        $records = CommentaireEvaluation::findRequested();
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
        $this->validate($request, CommentaireEvaluation::validationRules());

        CommentaireEvaluation::create($request->all());

        # notification
        Notify::success('Commentaire Evaluation a été créer avec succès');
        return redirect(route('admin.commentaire-evaluation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, CommentaireEvaluation $commentaireEvaluation)
    {
        return $this->view("show",['commentaireEvaluation' => $commentaireEvaluation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, CommentaireEvaluation $commentaireEvaluation)
    {
        return $this->view( "edit", ['commentaireEvaluation' => $commentaireEvaluation] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, CommentaireEvaluation $commentaireEvaluation)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, CommentaireEvaluation::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $commentaireEvaluation->update($data);
            return "Record updated";
        }

        $this->validate($request, CommentaireEvaluation::validationRules());

        $commentaireEvaluation->update($request->all());

        # notification
        Notify::success('Commentaire Evaluation a été mise à jour avec succès');
        return redirect(route('admin.commentaire-evaluation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, CommentaireEvaluation $commentaireEvaluation)
    {
        $commentaireEvaluation->delete();

        # notification
        Notify::success('Commentaire Evaluation a été supprimer avec succès');
        return redirect(route('admin.commentaire-evaluation.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
