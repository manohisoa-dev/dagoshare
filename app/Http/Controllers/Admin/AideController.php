<?php
namespace App\Http\Controllers\admin;

use App\Aide;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class AideController extends Controller
{
    public $viewDir = "admin.aide";

    public function index()
    {
        $records = Aide::findRequested();
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
        $this->validate($request, Aide::validationRules());

        Aide::create($request->all());

        # notification
        Notify::success('Aide a été créer avec succès');
        return redirect(route('admin.aide.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Aide $aide)
    {
        return $this->view("show",['aide' => $aide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Aide $aide)
    {
        return $this->view( "edit", ['aide' => $aide] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Aide $aide)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Aide::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $aide->update($data);
            return "Record updated";
        }

        $this->validate($request, Aide::validationRules());

        $aide->update($request->all());

        # notification
        Notify::success('Aide a été mise à jour avec succès');
        return redirect(route('admin.aide.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Aide $aide)
    {
        $aide->delete();

        # notification
        Notify::success('Aide a été supprimer avec succès');
        return redirect(route('admin.aide.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
