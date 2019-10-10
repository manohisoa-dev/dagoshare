<?php
namespace App\Http\Controllers\admin;

use App\RegleGenerale;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class RegleGeneraleController extends Controller
{
    public $viewDir = "admin.regle_generale";

    public function index()
    {
        $records = RegleGenerale::findRequested();
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
        $this->validate($request, RegleGenerale::validationRules());

        RegleGenerale::create($request->all());

        # notification
        Notify::success('Regle Generale a été créer avec succès');
        return redirect(route('admin.regle-generale.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, RegleGenerale $regleGenerale)
    {
        return $this->view("show",['regleGenerale' => $regleGenerale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, RegleGenerale $regleGenerale)
    {
        return $this->view( "edit", ['regleGenerale' => $regleGenerale] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, RegleGenerale $regleGenerale)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, RegleGenerale::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $regleGenerale->update($data);
            return "Record updated";
        }

        $this->validate($request, RegleGenerale::validationRules());

        $regleGenerale->update($request->all());

        # notification
        Notify::success('Regle Generale a été mise à jour avec succès');
        return redirect(route('admin.regle-generale.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, RegleGenerale $regleGenerale)
    {
        $regleGenerale->delete();

        # notification
        Notify::success('Regle Generale a été supprimer avec succès');
        return redirect(route('admin.regle-generale.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
