<?php
namespace App\Http\Controllers\admin;

use App\Fonction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class FonctionController extends Controller
{
    public $viewDir = "admin.fonction";

    public function index()
    {
        $records = Fonction::findRequested();
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
        $this->validate($request, Fonction::validationRules());

        Fonction::create($request->all());

        # notification
        Notify::success('Fonction a été créer avec succès');
        return redirect(route('admin.fonction.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Fonction $fonction)
    {
        return $this->view("show",['fonction' => $fonction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Fonction $fonction)
    {
        return $this->view( "edit", ['fonction' => $fonction] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Fonction::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fonction->update($data);
            return "Record updated";
        }

        $this->validate($request, Fonction::validationRules());

        $fonction->update($request->all());

        # notification
        Notify::success('Fonction a été mise à jour avec succès');
        return redirect(route('admin.fonction.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fonction $fonction)
    {
        $fonction->delete();

        # notification
        Notify::success('Fonction a été supprimer avec succès');
        return redirect(route('admin.fonction.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
