<?php
namespace App\Http\Controllers\admin;

use App\RegleType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class RegleTypeController extends Controller
{
    public $viewDir = "admin.regle_type";

    public function index()
    {
        $records = RegleType::findRequested();
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
        $this->validate($request, RegleType::validationRules());

        RegleType::create($request->all());

        # notification
        Notify::success('Regle Type a été créer avec succès');
        return redirect(route('admin.regle-type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, RegleType $regleType)
    {
        return $this->view("show",['regleType' => $regleType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, RegleType $regleType)
    {
        return $this->view( "edit", ['regleType' => $regleType] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, RegleType $regleType)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, RegleType::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $regleType->update($data);
            return "Record updated";
        }

        $this->validate($request, RegleType::validationRules());

        $regleType->update($request->all());

        # notification
        Notify::success('Regle Type a été mise à jour avec succès');
        return redirect(route('admin.regle-type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, RegleType $regleType)
    {
        $regleType->delete();

        # notification
        Notify::success('Regle Type a été supprimer avec succès');
        return redirect(route('admin.regle-type.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
