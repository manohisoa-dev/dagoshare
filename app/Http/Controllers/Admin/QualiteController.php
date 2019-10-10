<?php
namespace App\Http\Controllers\admin;

use App\Qualite;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class QualiteController extends Controller
{
    public $viewDir = "admin.qualite";

    public function index()
    {
        $records = Qualite::findRequested();
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
        $this->validate($request, Qualite::validationRules());

        Qualite::create($request->all());

        # notification
        Notify::success('Qualite a été créer avec succès');
        return redirect(route('admin.qualite.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Qualite $qualite)
    {
        return $this->view("show",['qualite' => $qualite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Qualite $qualite)
    {
        return $this->view( "edit", ['qualite' => $qualite] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Qualite $qualite)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Qualite::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $qualite->update($data);
            return "Record updated";
        }

        $this->validate($request, Qualite::validationRules());

        $qualite->update($request->all());

        # notification
        Notify::success('Qualite a été mise à jour avec succès');
        return redirect(route('admin.qualite.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Qualite $qualite)
    {
        $qualite->delete();

        # notification
        Notify::success('Qualite a été supprimer avec succès');
        return redirect(route('admin.qualite.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
