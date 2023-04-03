<?php

namespace Ringlives\Ring\Http\Controller\Admin;

use Ringlives\Ring\Core\Request;
use Ringlives\Ring\Core\Controller;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    protected $model;
    
    protected $data = [];
    
    protected $view = "";

    public function index() {
        return view("{$this->view}.index", $this->data);
    }

    public function show($id) {
        $this->data['items'] = $this->model->find($id);

        return view("{$this->view}.show", $this->data);
    }

    public function edit($id) {
        $this->data['items'] = $this->model->find($id);
        
        return view("{$this->view}.show");
    }

    public function store(Request $request) {
        
        $request->validate();

        try {
            DB::beginTransaction();
            
            $this->model->fill($request->all());
            $this->save();

            DB::commit();

            return redirect()->back()->withSuccess("Success");

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withError($th->getMessage());
        }  
    }

    public function update(Request $request, $id)
    {
        $request->validate();

        try {
            DB::beginTransaction();

            $model = $this->model->find($id);

            $model->fill($request->all());

            $model->update();

            DB::commit();

            return redirect()->back()->withSuccess("Success");

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withError($th->getMessage());
        }
    }
}
