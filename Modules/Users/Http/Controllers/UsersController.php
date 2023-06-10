<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Throwable;
class UsersController extends Controller
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

        $users=User::query();


      if ($req->name != null) {
        $users->where('name','LIKE','%'.$req->name.'%');
      }

      if ($req->email != null) {
        $users->where('email', $req->email);
      }


        $total = $users->count();
        $users   = $users->offset($strt)->limit($length)->get();

            return DataTables::of($users)
                ->setOffset($strt)
                ->with([
                  "recordsTotal"    => $total,
                  "recordsFiltered" => $total,
                ])
                ->addColumn('action', function ($row) {
                    $action='';

                $action.='<a class="btn btn-primary m-1 btn-sm" href="'.url('users/edit/'.$row->id).'"><i class="fas fa-pencil-alt"></i></a>';

                $action.='<a class="btn btn-danger m-1 btn-sm" href="'.url('users/destroy/'.$row->id).'"><i class="fas fa-trash-alt"></i></a>';

                return $action;
                })

                ->editColumn('name', function ($row) {
                    return $row->name;
                })

                ->editColumn('email', function ($row) {
                    return $row->email;
                })

                ->rawColumns(['action'])
                ->make(true);
    }


        return view('users::index');    
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $req)
    {

        $req->validate([
        'name'=>'required',
        'email'=>'required',
        'password' => ['required', 'string', 'min:8'],
        ]);

        DB::beginTransaction();
        try {
            $inputs=$req->except('_token');
            $inputs['password']=Hash::make($req->password);
            $inputs['image']='dummy.png';

            $user=User::create($inputs);
            DB::commit();
            return redirect('users')->with('success', 'User successfully created');

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
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->data['user']=User::find($id);
        return view('users::edit')->withData($this->data);
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
        'name'=>'required',
        'email'=>['required'],
         ]);

        DB::beginTransaction();
        try {

            $inputs=$req->except('_token','password');

            if($req->password!=null){
            $inputs['password']=Hash::make($req->password);
            }

            $user=User::find($id);
            $user->update($inputs);
            DB::commit();
            return redirect('users')->with('success', 'User successfully updated');

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
            $user=User::find($id);
            $user->delete();
            DB::commit();
            return redirect('users')->with('success', 'User successfully deleted');

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
