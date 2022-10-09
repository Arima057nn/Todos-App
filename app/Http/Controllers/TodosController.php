<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;



class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ? Lấy toàn bộ dữ liệu có 2 cách như trên
        $todos = DB::table('todos')->get();
        // $todos = Todo::all(); // Lấy dữ liệu bằng Model Todo
        // return view('todos.index', ['todos' => $todos])->render();
        return view('todos.index')->with('todos',Todo::all());
        // return $todos;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("todos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ?Cách 1
        // $validator = Validator::make($request->all(), [
        //     'name'       => 'required|max:255',
        //     'description'    => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return redirect('new-todos/create')
        //             ->withErrors($validator)
        //             ->withInput();
        // } else {
        //     // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
        //     DB::table('todos')->insert([
        //         'name'             => $request->input('name'),
        //         'description'      => $request->input('description'),
        //     ]);

        //     return redirect('new-todos/create')
        //             ->with('message', 'Tạo thành công' );
        // }

        // ?Cách 2

        //     validate() có hai tham số:
        // Tham số thứ nhất là đối tượng request chứa thông tin về dữ liệu được gửi lên từ người dùng.
        // Tham số thứ hai là một mảng các quy tắc kiểm tra cho từng trường nhập liệu có trong request.
        // Trường name: bắt buộc nhập, tối thiểu 6 ký tự, tối đa 12 ký tự.
        // Trường description: bắt buộc nhập.
        $this->validate(request(), [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();

        $request->session()->flash('success', 'Create todo successful!');
        return redirect('new-todos/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($todoId)
    {
        $todos = Todo::find($todoId);
        // return view('todos.show')->with('todo', Todo::find($todoId));
        return $todos->description;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $todos = Todo::find($id);
        // return view('todos.edit')->with('todo', Todo::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        $data = request()->all();
        // $data = Todo::all();
        $todo = Todo::find($id);

        $todo->name = $data['name'];

        $todo->description = $data['description'];
        $todo->save();

        $request->session()->flash('success', 'Update todo successful!');
        return redirect('/new-todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        $request->session()->flash('success', 'Delete todo successful!');
        return redirect('/new-todos');
    }

    public function complete(Request $request,$id)
    {
        $todo = Todo::find($id);
        $todo->completed = true;
        $todo->save();
        $request->session()->flash('success', 'complete todo successful!');

        return redirect('/new-todos');

    }
}
