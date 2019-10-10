<?php
namespace App\Http\Controllers\admin;

use App\Personnel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class PersonnelController extends Controller
{
    public $viewDir = "admin.personnel";

    public function index()
    {
        $records = Personnel::findRequested();
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
        $this->validate($request, Personnel::validationRules());

        Personnel::create($request->all());

        # notification
        Notify::success('Personnel a été créer avec succès');
        return redirect(route('admin.personnel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Personnel $personnel)
    {
        return $this->view("show",['personnel' => $personnel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Personnel $personnel)
    {
        return $this->view( "edit", ['personnel' => $personnel] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Personnel::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $personnel->update($data);
            return "Record updated";
        }

        $this->validate($request, Personnel::validationRules());

        $personnel->update($request->all());

        # notification
        Notify::success('Personnel a été mise à jour avec succès');
        return redirect(route('admin.personnel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Personnel $personnel)
    {
        $personnel->delete();

        # notification
        Notify::success('Personnel a été supprimer avec succès');
        return redirect(route('admin.personnel.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
