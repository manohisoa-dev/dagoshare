<?php
namespace App\Http\Controllers\admin;

use App\Bug;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class BugController extends Controller
{
    public $viewDir = "admin.bug";

    public function index()
    {
        $records = Bug::findRequested();
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
        $this->validate($request, Bug::validationRules());

        Bug::create($request->all());

        # notification
        Notify::success('Bug a été créer avec succès');
        return redirect(route('admin.bug.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Bug $bug)
    {
        return $this->view("show",['bug' => $bug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Bug $bug)
    {
        return $this->view( "edit", ['bug' => $bug] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Bug $bug)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Bug::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $bug->update($data);
            return "Record updated";
        }

        $this->validate($request, Bug::validationRules());

        $bug->update($request->all());

        # notification
        Notify::success('Bug a été mise à jour avec succès');
        return redirect(route('admin.bug.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bug $bug)
    {
        $bug->delete();

        # notification
        Notify::success('Bug a été supprimer avec succès');
        return redirect(route('admin.bug.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
