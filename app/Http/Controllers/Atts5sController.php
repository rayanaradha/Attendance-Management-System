<?php

namespace App\Http\Controllers;

use App\Models\atts_5S;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class Atts5SController extends Controller
{

    public function index(Request $request)
    {
         $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
        $keyword = $request->get('search');
       
        if (!empty($keyword)) {
           $atts5SObjects = atts_5S::where('name', 'LIKE', "%$keyword%")
                ->orWhere('Reg_No', 'LIKE', "%$keyword%")
                ->latest()->paginate(100);
        } else {
            $atts5SObjects = atts_5S::paginate(25);
        }

         return view('atts_5S.index', compact('atts5SObjects','level','level1','level2','level3'));
    }

  
    public function create()
    {
        
        
        return view('atts_5S.create');
    }

    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            atts_5S::create($data);

            return redirect()->route('atts_5S.atts_5S.index')
                             ->with('success_message', 'Student data was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

  
    public function show($id)
    {
        $atts5S = atts_5S::findOrFail($id);

        return view('atts_5S.show', compact('atts5S'));
    }

 
    public function edit($id)
    {
        $atts5S = atts_5S::findOrFail($id);
        

        return view('atts_5S.edit', compact('atts5S'));
    }


    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $atts5S = atts_5S::findOrFail($id);
            $atts5S->update($data);

            return redirect()->route('atts_5S.atts_5S.index')
                             ->with('success_message', 'Student data was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    public function destroy($id)
    {
        try {
            $atts5S = atts_5S::findOrFail($id);
            $atts5S->delete();

            return redirect()->route('atts_5S.atts_5S.index')
                             ->with('success_message', 'Student data was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
            'Reg_No' => 'required|string|min:1|max:20',
            'name' => 'required|string|min:1|max:60',
           
        ];

        
        $data = $request->validate($rules);


        return $data;
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\atts_5S;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class Atts5SController extends Controller
{

    public function index(Request $request)
    {
         $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
        $keyword = $request->get('search');
       
        if (!empty($keyword)) {
           $atts5SObjects = atts_5S::where('name', 'LIKE', "%$keyword%")
                ->orWhere('Reg_No', 'LIKE', "%$keyword%")
                ->latest()->paginate(100);
        } else {
            $atts5SObjects = atts_5S::paginate(25);
        }

         return view('atts_5S.index', compact('atts5SObjects','level','level1','level2','level3'));
    }

  
    public function create()
    {
        
        
        return view('atts_5S.create');
    }

    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            atts_5S::create($data);

            return redirect()->route('atts_5S.atts_5S.index')
                             ->with('success_message', 'Student data was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

  
    public function show($id)
    {
        $atts5S = atts_5S::findOrFail($id);

        return view('atts_5S.show', compact('atts5S'));
    }

 
    public function edit($id)
    {
        $atts5S = atts_5S::findOrFail($id);
        

        return view('atts_5S.edit', compact('atts5S'));
    }


    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $atts5S = atts_5S::findOrFail($id);
            $atts5S->update($data);

            return redirect()->route('atts_5S.atts_5S.index')
                             ->with('success_message', 'Student data was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    public function destroy($id)
    {
        try {
            $atts5S = atts_5S::findOrFail($id);
            $atts5S->delete();

            return redirect()->route('atts_5S.atts_5S.index')
                             ->with('success_message', 'Student data was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
            'Reg_No' => 'required|string|min:1|max:20',
            'name' => 'required|string|min:1|max:60',
           
        ];

        
        $data = $request->validate($rules);


        return $data;
    }

}
