<?php
namespace App\Http\Controllers\admin;

use App\Langue;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class LangueController extends Controller
{
    public $viewDir = "admin.langue";

    public function index()
    {
        $records = Langue::findRequested();
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
        $this->validate($request, Langue::validationRules());

        Langue::create($request->all());

        # notification
        Notify::success('Langue a été créer avec succès');
        return redirect(route('admin.langue.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Langue $langue)
    {
        return $this->view("show",['langue' => $langue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Langue $langue)
    {
        return $this->view( "edit", ['langue' => $langue] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Langue $langue)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Langue::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $langue->update($data);
            return "Record updated";
        }

        $this->validate($request, Langue::validationRules());

        $langue->update($request->all());

        # notification
        Notify::success('Langue a été mise à jour avec succès');
        return redirect(route('admin.langue.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Langue $langue)
    {
        $langue->delete();

        # notification
        Notify::success('Langue a été supprimer avec succès');
        return redirect(route('admin.langue.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
