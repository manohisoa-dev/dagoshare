<?php
namespace App\Http\Controllers\admin;

use App\Demande;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class DemandeController extends Controller
{
    public $viewDir = "admin.demande";

    public function index()
    {
        $records = Demande::findRequested();
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
        $this->validate($request, Demande::validationRules());

        Demande::create($request->all());

        # notification
        Notify::success('Demande a été créer avec succès');
        return redirect(route('admin.demande.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Demande $demande)
    {
        return $this->view("show",['demande' => $demande]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Demande $demande)
    {
        return $this->view( "edit", ['demande' => $demande] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Demande::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $demande->update($data);
            return "Record updated";
        }

        $this->validate($request, Demande::validationRules());

        $demande->update($request->all());

        # notification
        Notify::success('Demande a été mise à jour avec succès');
        return redirect(route('admin.demande.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Demande $demande)
    {
        $demande->delete();

        # notification
        Notify::success('Demande a été supprimer avec succès');
        return redirect(route('admin.demande.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
