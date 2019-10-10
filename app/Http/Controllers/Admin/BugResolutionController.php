<?php
namespace App\Http\Controllers\admin;

use App\Bug;
use App\BugResolution;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class BugResolutionController extends Controller
{
    public $viewDir = "admin.bug_resolution";

    public function index()
    {
        $records = BugResolution::findRequested();
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
        $this->validate($request, BugResolution::validationRules());

        BugResolution::create($request->all());

        $bug = Bug::find($request->input('bug_id')) ;
        $bug->statut = "corriger" ;
        $bug->save() ;

        # notification
        Notify::success('Bug Resolution a été créer avec succès');
        return redirect(route('admin.bug-resolution.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, BugResolution $bugResolution)
    {
        return $this->view("show",['bugResolution' => $bugResolution]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, BugResolution $bugResolution)
    {
        return $this->view( "edit", ['bugResolution' => $bugResolution] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, BugResolution $bugResolution)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, BugResolution::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $bugResolution->update($data);
            return "Record updated";
        }

        $this->validate($request, BugResolution::validationRules());

        $bugResolution->update($request->all());

        # notification
        Notify::success('Bug Resolution a été mise à jour avec succès');
        return redirect(route('admin.bug-resolution.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, BugResolution $bugResolution)
    {
        $bugResolution->delete();

        # notification
        Notify::success('Bug Resolution a été supprimer avec succès');
        return redirect(route('admin.bug-resolution.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
