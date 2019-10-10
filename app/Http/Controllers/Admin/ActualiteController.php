<?php
namespace App\Http\Controllers\admin;

use App\Actualite;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class ActualiteController extends Controller
{
    public $viewDir = "admin.actualite";

    public function index()
    {
        $records = Actualite::findRequested();
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
        $this->validate($request, Actualite::validationRules());

        Actualite::create($request->all());

        # notification
        Notify::success('Actualite a été créer avec succès');
        return redirect(route('admin.actualite.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Actualite $actualite)
    {
        return $this->view("show",['actualite' => $actualite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Actualite $actualite)
    {
        return $this->view( "edit", ['actualite' => $actualite] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Actualite $actualite)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Actualite::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $actualite->update($data);
            return "Record updated";
        }

        $this->validate($request, Actualite::validationRules());

        $actualite->update($request->all());

        # notification
        Notify::success('Actualite a été mise à jour avec succès');
        return redirect(route('admin.actualite.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Actualite $actualite)
    {
        $actualite->delete();

        # notification
        Notify::success('Actualite a été supprimer avec succès');
        return redirect(route('admin.actualite.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
