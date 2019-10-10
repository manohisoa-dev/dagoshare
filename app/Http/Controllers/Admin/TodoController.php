<?php
namespace App\Http\Controllers\admin;

use App\Todo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class TodoController extends Controller
{
    public $viewDir = "admin.todo";

    public function index()
    {
        $records = Todo::findRequested();
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
        $this->validate($request, Todo::validationRules());

        Todo::create($request->all());

        # notification
        Notify::success('Todo a été créer avec succès');
        return redirect(route('admin.todo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Todo $todo)
    {
        return $this->view("show",['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Todo $todo)
    {
        return $this->view( "edit", ['todo' => $todo] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Todo::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $todo->update($data);
            return "Record updated";
        }

        $this->validate($request, Todo::validationRules());

        $todo->update($request->all());

        # notification
        Notify::success('Todo a été mise à jour avec succès');
        return redirect(route('admin.todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Todo $todo)
    {
        $todo->delete();

        # notification
        Notify::success('Todo a été supprimer avec succès');
        return redirect(route('admin.todo.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
