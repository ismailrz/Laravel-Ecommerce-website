<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class DistrictsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }


    public function index()
    {
      $districts = District::OrderBy('name','asc')->get();
      return view('BackEnd.Pages.Districts.index', compact('districts'));
    }
    public function create()
    {
      $divisions = Division::OrderBy('priority','asc')->get();
      return view('BackEnd.Pages.Districts.create',compact('divisions'));
    }


    public function store(Request $request)
    {
       $this->validate($request,[

          'name' => 'required',
          'division_id' =>'required',

        ],
        [
          'name.required' =>'Please provide a district name',
          'division_id.required' =>'Please provide a district id',

        ]);


          $districts = new District;
          $districts->name = $request->name;
          $districts->division_id = $request->division_id;

          $districts->save();

        Session()->flash('success','A new District has added successfullY!!');
        return redirect()->Route('admin.districts');
    }


    public function edit($id)
    {
        $district = District::find($id);
        $divisions = Division::OrderBy('priority','asc')->get();

        if(!is_null($district)){
          return view('BackEnd.pages.districts.edit',compact('district','divisions'));

        }
        return redirect()->Route('admin.districts');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request,[

         'name' => 'required',
         'division_id' =>'required',

       ],
       [
         'name.required' =>'Please provide a district name',
         'division_id.required' =>'Please provide a district name',

       ]);
          $districts =District::find($id);
          $districts->name = $request->name;
          $districts->division_id = $request->division_id;
          $districts->save();

        Session()->flash('success','District has updated successfully!!');
        return redirect()->Route('admin.districts');
    }


    public function delete($id)
    {
        $district = District::find($id);

        if(!is_null($district)){
          $district->delete();
        }
        Session()->flash('success','District has deleted successfully!!');
        return back();
      }

}
