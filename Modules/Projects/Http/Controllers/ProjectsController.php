<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Projects\Entities\Projects;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;
use Throwable;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
    $req=request();
    if ($req->ajax()) {
        $strt   = $req->start;
        $length = $req->length;

        $projects=Projects::query();


      if ($req->name != null) {
        $projects->where('project_name','LIKE','%'.$req->name.'%');
      }

      if ($req->email != null) {
        $projects->where('email', $req->email);
      }


        $total = $projects->count();
        $projects   = $projects->offset($strt)->limit($length)->get();

            return DataTables::of($projects)
                ->setOffset($strt)
                ->with([
                  "recordsTotal"    => $total,
                  "recordsFiltered" => $total,
                ])
                ->addColumn('action', function ($row) {
                    $action='';

                $action.='<a class="btn btn-success m-1 btn-sm" href="'.url('documents/show?passcode='.$row->password).'"><i class="fas fa-eye"></i></a>';

                $action.='<a class="btn btn-primary m-1 btn-sm" href="'.url('documents/edit/'.$row->id).'"><i class="fas fa-pencil-alt"></i></a>';

                $action.='<a class="btn btn-danger m-1 btn-sm" href="'.url('documents/destroy/'.$row->id).'"><i class="fas fa-trash-alt"></i></a>';

                return $action;
                })

                ->editColumn('project_name', function ($row) {
                    return $row->project_name;
                })
                ->editColumn('password', function ($row) {
                    return $row->password;
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('d-m-Y');
                })

                ->rawColumns(['action'])
                ->make(true);
    }

        return view('projects::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('projects::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $req)
    {

        $req->validate([
            'password'=>'required', 
            'project_name'=>'required',
            'topic'=>'required',
            'summery'=>'required',
            'action'=>'required',
            'outcomes'=>'required',
            'case_for_action'=>'required',
            'barrier_to_success'=>'required',
            'consequences'=>'required'
        ]);

        DB::beginTransaction();
        try {
            $inputs=$req->except('_token');

            $pro=Projects::create($inputs);
            DB::commit();
            return redirect('projects/edit/'.$pro->id)->with('success', 'Project successfully created');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Something went wrong with this error: '.$e->getMessage());
        }
        catch(Throwable $e){
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Something went wrong with this error: '.$e->getMessage());
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $req)
    {
        if($req->passcode==null){
            return redirect()->back()->with('error', 'No data found against this passcode');
        }

        $project=Projects::where('password',$req->passcode)->first();
        if($project==null){
            return redirect()->back()->with('error', 'No data found against this passcode');
        }        
        return view('projects::show')->withData($project);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $project=Projects::find($id);
        return view('projects::edit')->withData($project);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'password'=>'required', 
            'project_name'=>'required',
            'topic'=>'required',
            'summery'=>'required',
            'action'=>'required',
            'outcomes'=>'required',
            'case_for_action'=>'required',
            'barrier_to_success'=>'required',
            'consequences'=>'required'
        ]);

        DB::beginTransaction();
        try {
            $inputs=$req->except('_token');

            $user=Projects::find($id)->update($inputs);
            DB::commit();
            return redirect()->back()->with('success', 'Project successfully updated');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Something went wrong with this error: '.$e->getMessage());
        }
        catch(Throwable $e){
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Something went wrong with this error: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Projects::find($id)->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Project successfully deleted');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Something went wrong with this error: '.$e->getMessage());
        }
        catch(Throwable $e){
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Something went wrong with this error: '.$e->getMessage());
        }
    }
}
