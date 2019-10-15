<?php
namespace App\Http\Controllers\admin;

use App\Hebergeur;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class HebergeurController extends Controller
{
    public $viewDir = "admin.hebergeur";

    public function index()
    {
        $records = Hebergeur::findRequested();
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
        $this->validate($request, Hebergeur::validationRules());

        Hebergeur::create($request->all());

        # notification
        Notify::success('Hebergeur a été créer avec succès');
        return redirect(route('admin.hebergeur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Hebergeur $hebergeur)
    {
        return $this->view("show",['hebergeur' => $hebergeur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Hebergeur $hebergeur)
    {
        return $this->view( "edit", ['hebergeur' => $hebergeur] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Hebergeur $hebergeur)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Hebergeur::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $hebergeur->update($data);
            return "Record updated";
        }

        $this->validate($request, Hebergeur::validationRules());

        $hebergeur->update($request->all());

        # notification
        Notify::success('Hebergeur a été mise à jour avec succès');
        return redirect(route('admin.hebergeur.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Hebergeur $hebergeur)
    {
        $hebergeur->delete();

        # notification
        Notify::success('Hebergeur a été supprimer avec succès');
        return redirect(route('admin.hebergeur.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
