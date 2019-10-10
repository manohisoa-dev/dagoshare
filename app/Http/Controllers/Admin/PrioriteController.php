<?php
namespace App\Http\Controllers\admin;

use App\Priorite;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class PrioriteController extends Controller
{
    public $viewDir = "admin.priorite";

    public function index()
    {
        $records = Priorite::findRequested();
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
        $this->validate($request, Priorite::validationRules());

        Priorite::create($request->all());

        # notification
        Notify::success('Priorite a été créer avec succès');
        return redirect(route('admin.priorite.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Priorite $priorite)
    {
        return $this->view("show",['priorite' => $priorite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Priorite $priorite)
    {
        return $this->view( "edit", ['priorite' => $priorite] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Priorite $priorite)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Priorite::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $priorite->update($data);
            return "Record updated";
        }

        $this->validate($request, Priorite::validationRules());

        $priorite->update($request->all());

        # notification
        Notify::success('Priorite a été mise à jour avec succès');
        return redirect(route('admin.priorite.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Priorite $priorite)
    {
        $priorite->delete();

        # notification
        Notify::success('Priorite a été supprimer avec succès');
        return redirect(route('admin.priorite.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
