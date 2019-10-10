<?php
namespace App\Http\Controllers\admin;

use App\BugType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class BugTypeController extends Controller
{
    public $viewDir = "admin.bug_type";

    public function index()
    {
        $records = BugType::findRequested();
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
        $this->validate($request, BugType::validationRules());

        BugType::create($request->all());

        # notification
        Notify::success('type de bug a été créer avec succès');
        return redirect(route('admin.bug-type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, BugType $bugType)
    {
        return $this->view("show",['bugType' => $bugType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, BugType $bugType)
    {
        return $this->view( "edit", ['bugType' => $bugType] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, BugType $bugType)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, BugType::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $bugType->update($data);
            return "Record updated";
        }

        $this->validate($request, BugType::validationRules());

        $bugType->update($request->all());

        # notification
        Notify::success('type de bug a été mise à jour avec succès');
        return redirect(route('admin.bug-type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, BugType $bugType)
    {
        $bugType->delete();

        # notification
        Notify::success('type de bug a été supprimer avec succès');
        return redirect(route('admin.bug-type.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
