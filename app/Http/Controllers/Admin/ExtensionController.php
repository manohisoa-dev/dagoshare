<?php
namespace App\Http\Controllers\admin;

use App\Extension;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class ExtensionController extends Controller
{
    public $viewDir = "admin.extension";

    public function index()
    {
        $records = Extension::findRequested();
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
        $this->validate($request, Extension::validationRules());

        Extension::create($request->all());

        # notification
        Notify::success('Extension a été créer avec succès');
        return redirect(route('admin.extension.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Extension $extension)
    {
        return $this->view("show",['extension' => $extension]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Extension $extension)
    {
        return $this->view( "edit", ['extension' => $extension] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Extension $extension)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Extension::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $extension->update($data);
            return "Record updated";
        }

        $this->validate($request, Extension::validationRules());

        $extension->update($request->all());

        # notification
        Notify::success('Extension a été mise à jour avec succès');
        return redirect(route('admin.extension.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Extension $extension)
    {
        $extension->delete();

        # notification
        Notify::success('Extension a été supprimer avec succès');
        return redirect(route('admin.extension.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
