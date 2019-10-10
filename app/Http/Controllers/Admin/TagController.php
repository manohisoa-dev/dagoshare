<?php
namespace App\Http\Controllers\admin;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class TagController extends Controller
{
    public $viewDir = "admin.tag";

    public function index()
    {
        $records = Tag::findRequested();
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
        $this->validate($request, Tag::validationRules());

        Tag::create($request->all());

        # notification
        Notify::success('Tag a été créer avec succès');
        return redirect(route('admin.tag.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Tag $tag)
    {
        return $this->view("show",['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Tag $tag)
    {
        return $this->view( "edit", ['tag' => $tag] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Tag::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $tag->update($data);
            return "Record updated";
        }

        $this->validate($request, Tag::validationRules());

        $tag->update($request->all());

        # notification
        Notify::success('Tag a été mise à jour avec succès');
        return redirect(route('admin.tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();

        # notification
        Notify::success('Tag a été supprimer avec succès');
        return redirect(route('admin.tag.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
