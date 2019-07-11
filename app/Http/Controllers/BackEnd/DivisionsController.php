<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class DivisionsController extends Controller
{

    public function index()
    {
      $divisions = Division::OrderBy('priority','asc')->get();
      return view('BackEnd.Pages.Divisions.index', compact('divisions'));
    }
    public function create()
    {

      return view('BackEnd.Pages.Divisions.create');
    }


    public function store(Request $request)
    {
       $this->validate($request,[

          'name' => 'required',
          'priority' =>'required',

        ],
        [
          'name.required' =>'Please provide a division name',
          'priority.required' =>'Please provide a division priority',

        ]);


          $divisions = new Division;
          $divisions->name = $request->name;
          $divisions->priority = $request->priority;

          $divisions->save();

        Session()->flash('success','A new Division has added successfullY!!');
        return redirect()->Route('admin.divisions');
    }


    public function edit($id)
    {
        $division = Division::find($id);

        if(!is_null($division)){
          return view('BackEnd.pages.divisions.edit',compact('division'));

        }
        return redirect()->Route('admin.divisions');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request,[

         'name' => 'required',
         'priority' =>'required',

       ],
       [
         'name.required' =>'Please provide a division name',
         'priority.required' =>'Please provide a division priority',

       ]);
          $divisions =Division::find($id);
          $divisions->name = $request->name;
          $divisions->priority = $request->priority;
          $divisions->save();

        Session()->flash('success','Division has updated successfully!!');
        return redirect()->Route('admin.divisions');
    }


    public function delete($id)
    {
        $division = Division::find($id);
        // Division Delete
        if(!is_null($division)){
          // Delete all the districts for this Divisions
          $districts = District::where('division_id',$division->id)->get();

          foreach ($districts as $district) {
            $district->delete();
          }

          $division->delete();
        }
        Session()->flash('success','Division has deleted successfully!!');
        return back();
      }

}
