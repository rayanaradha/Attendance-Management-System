<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\table__course__s__students;
use Exception;
use DB;

class TableCourseSStudentsController extends Controller
{
     //table course for view attendance
    public function index(Request $request)
    {    $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
 
          $items = DB::table('precentages')
         ->where('Level','=', "2S")->first();
      
       $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
       return view('table__course__s__students.index', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
      
    }
 
    
     //table course for add attendance
    public function AddAttendance(Request $request)
    {    $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
 
       $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
       return view('Add_Attendance_Subject_Table.2s_attendance.index', compact('tableCourseSStudentsObjects','level','level1','level2','level3'));
    }

    
    
    //function to reset table to after semester
     public function Reset_index(Request $request)
    {    $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
          
          $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
      
          $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
      
       $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
       return view('Reset_Table/Update_Semester', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
      
    }
  //go to edit view
    public function edit($id)
    {
        $tableCourseSStudents = table__course__s__students::findOrFail($id);
        $dat = DB::table('table__lectures')
                ->select('id','name')
                ->get();
        

        return view('table__course__s__students.edit2s', compact('tableCourseSStudents','dat'));
    }
   
    
    //go to edit view update semester table
        public function edit1($id)
    {
        $tableCourseSStudents = table__course__s__students::findOrFail($id);
        $dat = DB::table('table__lectures')
                ->select('id','name')
                ->get();
        

        return view('table__course__s__students.edit1', compact('tableCourseSStudents','dat'));
    }
    
    //update the edit data
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $tableCourseSStudents = table__course__s__students::findOrFail($id);
            $tableCourseSStudents->update($data);
             return back();

         

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }
    
    
    
      //update the edit data in semester upadte table
       public function update1($id, Request $request)
    {
       
            $data = $this->getData($request);
            
            $tableCourseSStudents = table__course__s__students::findOrFail($id);
            $tableCourseSStudents->update($data);

            return back();
                             

       

           
    }
    
    //change the precentage
         public function precentage(Request $request)
    { 
        $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
 
    
        DB::table('precentages')->where('Level', '2S')->update(['precentage' => $request->name]);
         $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
       
         $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
            
         return view('table__course__s__students.index', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
    } 
    
         public function precentage1(Request $request)
    { 
        $level = DB::table('Level')
          ->where('id','=', "1")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "2")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "3")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "4")->first();
 
    
        DB::table('precentages')->where('Level', '2S')->update(['precentage' => $request->name]);
         $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
       
         $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
            
         return view('Reset_table.Update_Semester', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
    } 

//validate the data
    protected function getData(Request $request)
    {
        $rules = [
            'id' => 'nullable|string|min:0|max:191',
            'code' => 'nullable|string|min:0|max:191',
            'name' => 'nullable|string|min:0|max:191',
            'credit' => 'nullable|string|min:0|max:191',
            'Level' => 'nullable|string|min:0|max:191',
            'Lecture_id' => 'nullable|string|min:0|max:191',
     
        ];
        
        $data = $request->validate($rules);

        return $data;
    }
    
    //function to backup table to after semester
    public function Backup_index(Request $request)
    {   
        $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
            
          $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
       return view('BackUp.table_2.index', compact('tableCourseSStudentsObjects','items','todayDate'));

      
    }
  
}
