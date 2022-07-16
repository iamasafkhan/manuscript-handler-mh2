<?php

namespace App\Http\Controllers;

use App\Models\mh_companies;
use App\Models\mh_esubmit_profiles;
use App\Models\mh_journals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

        $journals = mh_journals::all(); 
        $companies = mh_companies::all();

        //dd($companies);


        if ($request->ajax()) {

            //= mh_esubmit_profiles::latest()->get();

            $data = DB::table('mh_esubmit_profiles')
            ->join('mh_journals', 'mh_esubmit_profiles.journalID', '=', 'mh_journals.id')
            ->join('mh_companies', 'mh_esubmit_profiles.companyID', '=', 'mh_companies.id')
            ->select('mh_esubmit_profiles.*', 'mh_journals.name as journalName', 'mh_companies.companyName as CompanyName')
            ->orderBy('mh_esubmit_profiles.id', 'DESC')
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('userType'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['userType'], $request->get('userType')) ? true : false;
                        });
                    }

                    if (!empty($request->get('companyID'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['companyID'], $request->get('companyID')) ? true : false;
                        });
                    }

                    if (!empty($request->get('journalID'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['journalID'], $request->get('journalID')) ? true : false;
                        });
                    }


                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['userType']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                return true;
                            }

                            return false;
                        });
                    }
                })
  


       
                ->addColumn('action', function ($row) {

                    //     $btn = '<a   href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="View"  class="btn btn-primary btn-sm view" style="margin-right:6px">View</a>'; 

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-secondary btn-sm editProduct" >Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';



                    return $btn;
                })

                
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('admin.users', compact('journals', 'companies'));


        

 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        
        mh_esubmit_profiles::updateOrCreate(
            ['id' => $request->product_id],
            [
                'userType' => $request->userTypeAdd,

                'journalID' => $request->journalID,

                'companyID' => $request->companyID,

                'firstName' => $request->name,

                'primaryEmailAddress' => $request->email,

                'passWord' => bcrypt(request()->get('password')),
            ]
        );




        return redirect()->to('/admin/users')
            ->with('success', 'Create new user successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = mh_esubmit_profiles::find($id);
        return response()->json($product);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {




        $user = mh_esubmit_profiles::findOrFail($id);
        $user->delete();


        return redirect()->to('/admin/users')
            ->with('success', 'User delete Successfully!');
    }
}
