<?php
namespace App\Http\Controllers\admin;

use App\SousCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class SousCategoryController extends Controller
{
    public $viewDir = "admin.sous_category";

    public function index()
    {
        $records = SousCategory::findRequested();
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
        $this->validate($request, SousCategory::validationRules());

        SousCategory::create($request->all());

        # notification
        Notify::success('Sous Category a été créer avec succès');
        return redirect(route('admin.sous-category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, SousCategory $sousCategory)
    {
        return $this->view("show",['sousCategory' => $sousCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, SousCategory $sousCategory)
    {
        return $this->view( "edit", ['sousCategory' => $sousCategory] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, SousCategory $sousCategory)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, SousCategory::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $sousCategory->update($data);
            return "Record updated";
        }

        $this->validate($request, SousCategory::validationRules());

        $sousCategory->update($request->all());

        # notification
        Notify::success('Sous Category a été mise à jour avec succès');
        return redirect(route('admin.sous-category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, SousCategory $sousCategory)
    {
        $sousCategory->delete();

        # notification
        Notify::success('Sous Category a été supprimer avec succès');
        return redirect(route('admin.sous-category.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
