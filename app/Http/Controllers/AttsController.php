<?php
namespace App\Http\Controllers;
use App\Models\atts;
use App\Models\att;
use App\Models\table__course__s__students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\url;
use App\Http\Controllers\Controller;
use Exception;
use PDF; 

 class AttsController extends Controller
 {
   
  // ---------------------------_ATTENDANCE VIEW_-------------------------------------------------
     
     public function index(Request $request){
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
            $attsObjects = atts::where('name', 'LIKE', "%$keyword%")
                ->orWhere('Reg_No', 'LIKE', "%$keyword%")
            
                ->latest()->paginate(100);
        } else {
             $attsObjects = atts::paginate(25);
        }

         return view('atts.index', compact('attsObjects','level','level1','level2','level3'));
     } 
     
     
     // viewing table_2 subject
    public function view($id,Request $request)
    {
        $atts = att::paginate(100);
        $SingleData = att::findOrFail(1);
            
        $keyword = $request->get('search');
            
        $items = DB::table('precentages')
            ->select('precentage')
            ->where('Level','=', "2S")->first();
        
        $data = table__course__s__students::findOrFail($id);
        
        
                
        if (!empty($keyword)) {
                 $atts = att::where('Reg_NO', 'LIKE', "%$keyword%")
                ->orWhere('Name', 'LIKE', "%$keyword%")  
                ->latest()->paginate(300);
        }
        else {
           $atts = att::paginate(100);
        }
        
             if($id==35){
             return view('subject table_2_view.Subject1', compact('atts','items','data', 'SingleData'));
             }
             if($id==31){
             return view('subject table_2_view.Subject2', compact('atts','items','data','SingleData'));
             }
              if($id==27){
             return view('subject table_2_view.Subject3', compact('atts','items','data','SingleData'));
             }
              if($id==25){
             return view('subject table_2_view.Subject4', compact('atts','items','data','SingleData'));
             }
              if($id==24){
             return view('subject table_2_view.Subject5', compact('atts','items','data','SingleData'));
             }
              if($id==23){
             return view('subject table_2_view.Subject6', compact('atts','items','data','SingleData'));
             }
              if($id==22){
             return view('subject table_2_view.Subject7', compact('atts','items','data','SingleData'));
             }
              if($id==21){
             return view('subject table_2_view.Subject8', compact('atts','items','data','SingleData'));
             }
    }
    
          
    
   
    // --------------------------_ATTENDANCE MARKING VIEW_------------------------------------------------
    
    //attenadnce marking view table_2 subject
    public function attendance_mark($id)
    {
        $atts = att::paginate(150);
        $data = table__course__s__students::findOrFail($id);
        if($id==35){
              return view('subject table_2_mark2.subject1', compact('atts','data'));
             }
        if($id==31){
              return view('subject table_2_mark2.subject2', compact('atts','data'));
             }
        if($id==27){
              return view('subject table_2_mark2.subject3', compact('atts','data'));
             } 
        if($id==25){
               return view('subject table_2_mark2.subject4', compact('atts','data'));
             }
        if($id==24){
               return view('subject table_2_mark2.subject5', compact('atts','data'));
             }
        if($id==23){
               return view('subject table_2_mark2.subject6', compact('atts','data'));
             }
        if($id==22){
               return view('subject table_2_mark2.subject7', compact('atts','data'));
             }
        if($id==21){
               return view('subject table_2_mark2.subject8', compact('atts','data'));
             }     
    }

  
 // ---------------------------_HOUR BUTTON AND SUBMIT THE MARKING ATTENDANCE-----------------------------------------
 
// function change precentage with hours for subject1
    public function store(Request $request,$id)
   {   
    try{
             if($id==35){
            DB::table('atts')-> update(['hours'=>$request->name]); 
            
            DB::table('atts')-> update(['hall'=>$request->hall]);

            DB::table('atts')-> update(['date'=>$request->date]);

            DB::table('atts')-> update(['Start_Time'=>$request->ST]);

            DB::table('atts')-> update(['End_Time'=>$request->ET]);
            
            DB::table('atts')->update(['nooflectures' => DB::raw('nooflectures +  hours')]);
           
            DB::table('atts')->where('attend_mark', '0')->update(['lectureattend' => DB::raw('lectureattend + hours')]);
        
            DB::table('atts')->update(['attend_mark' =>'0']);
             }
             
               
             if($id==31){
               DB::table('atts')-> update(['hours1'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures1' => DB::raw('nooflectures1 +  hours1')]);
        
            DB::table('atts')->where('attend_mark1', '0')->update(['lectureattend1' => DB::raw('lectureattend1 + hours1')]);
        
            DB::table('atts')->update(['attend_mark1' =>'0']);
             }
             
             if($id==27){
               DB::table('atts')-> update(['hours2'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures2' => DB::raw('nooflectures2 +  hours2')]);
        
            DB::table('atts')->where('attend_mark2', '0')->update(['lectureattend2' => DB::raw('lectureattend2 + hours2')]);
        
            DB::table('atts')->update(['attend_mark2' =>'0']);
             }
               
            if($id==25){
             DB::table('atts')-> update(['hours3'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures3' => DB::raw('nooflectures3 +  hours3')]);
        
            DB::table('atts')->where('attend_mark3', '0')->update(['lectureattend3' => DB::raw('lectureattend3 + hours3')]);
        
            DB::table('atts')->update(['attend_mark3' =>'0']);
             }
             
            if($id==24){
            DB::table('atts')-> update(['hours4'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures4' => DB::raw('nooflectures4 +  hours4')]);
        
            DB::table('atts')->where('attend_mark4', '0')->update(['lectureattend4' => DB::raw('lectureattend4 + hours4')]);
        
            DB::table('atts')->update(['attend_mark4' =>'0']);
             }
             
            if($id==23){
            DB::table('atts')-> update(['hours5'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures5' => DB::raw('nooflectures5 +  hours5')]);
        
            DB::table('atts')->where('attend_mark5', '0')->update(['lectureattend5' => DB::raw('lectureattend5 + hours5')]);
        
            DB::table('atts')->update(['attend_mark5' =>'0']);
             }
             
            if($id==22){
            DB::table('atts')-> update(['hours6'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures6' => DB::raw('nooflectures6 +  hours6')]);
        
            DB::table('atts')->where('attend_mark6', '0')->update(['lectureattend6' => DB::raw('lectureattend6 + hours6')]);
        
            DB::table('atts')->update(['attend_mark6' =>'0']);
             }
             
            if($id==21){
            DB::table('atts')-> update(['hours7'=>$request->name]); 
           
            DB::table('atts')->update(['nooflectures7' => DB::raw('nooflectures7 +  hours7')]);
        
            DB::table('atts')->where('attend_mark7', '0')->update(['lectureattend7' => DB::raw('lectureattend7 + hours7')]);
        
            DB::table('atts')->update(['attend_mark7' =>'0']);
             }
           
            return redirect::to(url::previous())
            ->with('success_message', 'Attendance Sheet successfully added!');   
                 
             
             
        } catch (Exception $exception) {
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
   }
   
    // -------------------------------_ MARKING THE ATTENDANCE-------------------------------------------------
   
   //function for mark attendance for subject1
  public function ray(Request $request)
    {

     $record = $request->all();
      for ($x = 0; $x <= sizeof($record); $x++){    
          $s= $request-> my_checkbox[$x];
          DB::table('atts')->where('id', $s)->update(['attend_mark'=>1]);
        }
     
        return redirect::to(url::previous());
     }
         

    //function for mark attendance for subject2
    public function edit1s($id)
    {
        $att = att::findOrFail($id);    
            if($att->attend_mark1==0){
                $att->attend_mark1=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark1=0;
                $att->save();
            }
        
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
       //function for mark attendance for subject3
    public function edit2s($id)
    {        
        $att = att::findOrFail($id);    
            if($att->attend_mark2==0){
                $att->attend_mark2=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark2=0;
                $att->save();
            }
            
            
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
       //function for mark attendance for subject4
    public function edit3s($id)
    {        
        $att = att::findOrFail($id);    
            if($att->attend_mark3==0){
                $att->attend_mark3=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark3=0;
                $att->save();
            }
            
            
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
       //function for mark attendance for subject5
    public function edit4s($id)
    {        
        $att = att::findOrFail($id);    
            if($att->attend_mark4==0){
                $att->attend_mark4=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark4=0;
                $att->save();
            }
            
            
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
       //function for mark attendance for subject6
    public function edit5s($id)
    {        
        $att = att::findOrFail($id);    
            if($att->attend_mark5==0){
                $att->attend_mark5=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark5=0;
                $att->save();
            }
            
            
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
       //function for mark attendance for subject7
    public function edit6s($id)
    {        
        $att = att::findOrFail($id);    
            if($att->attend_mark6==0){
                $att->attend_mark6=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark6=0;
                $att->save();
            }
            
            
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
    
       //function for mark attendance for subject8
    public function edit7s($id)
    {        
        $att = att::findOrFail($id);    
            if($att->attend_mark7==0){
                $att->attend_mark7=1;
                $att->save(); 
            }  
            else{
                $att->attend_mark7=0;
                $att->save();
            }
            
            
        if($id<=4 || (12<=$id  && $id<=15) || (23<=$id  && $id<=26) || (34<=$id  && $id<=37)) {    
            return redirect::to(url::previous() );
        }
        else{
            return redirect::to(url::previous() ."#r");
        }
    }
    
    
    
    //function for reset Table_2 data
     public function reset($id)
    { $level = DB::table('Level')
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
         
          $tableCourseSStudentsObjects  = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);
          
        if($id==35){
            DB::table('atts')
               ->update(['nooflectures' => 0]);
            DB::table('atts')
               ->update(['lectureattend' => 0]);
             }
        if($id==31){
            DB::table('atts')
               ->update(['nooflectures1' => 0]);
            DB::table('atts')
               ->update(['lectureattend1' => 0]);
             }
      
        if($id==27){
            DB::table('atts')
               ->update(['nooflectures2' => 0]);
            DB::table('atts')
               ->update(['lectureattend2' => 0]);
             } 
        if($id==25){
            DB::table('atts')
               ->update(['nooflectures3' => 0]);
            DB::table('atts')
               ->update(['lectureattend3' => 0]);
             }
        if($id==24){
           DB::table('atts')
               ->update(['nooflectures4' => 0]);
            DB::table('atts')
               ->update(['lectureattend4' => 0]);
             }
        if($id==23){
        DB::table('atts')
               ->update(['nooflectures5' => 0]);
            DB::table('atts')
               ->update(['lectureattend5' => 0]);
             }
        if($id==22){
              DB::table('atts')
               ->update(['nooflectures6' => 0]);
            DB::table('atts')
               ->update(['lectureattend6' => 0]);
             }
        if($id==21){
            DB::table('atts')
               ->update(['nooflectures7' => 0]);
            DB::table('atts')
               ->update(['lectureattend7' => 0]);
             } 
   
             return view('Reset_Table/Update_Semester', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
          
         
    }
 
     public function reset1()
    {
        $level = DB::table('Level')
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
         
          $tableCourseSStudentsObjects = table__course__s__students::where('Level', '=', "2S") ->latest()->paginate(60);

            DB::table('atts')
               ->update(['nooflectures' => 0]);
            DB::table('atts')
               ->update(['lectureattend' => 0]);
            DB::table('atts')
               ->update(['nooflectures1' => 0]);
            DB::table('atts')
               ->update(['lectureattend1' => 0]);
            DB::table('atts')
               ->update(['nooflectures2' => 0]);
            DB::table('atts')
               ->update(['lectureattend2' => 0]);
            DB::table('atts')
               ->update(['nooflectures3' => 0]);
            DB::table('atts')
               ->update(['lectureattend3' => 0]);
            DB::table('atts')
               ->update(['nooflectures4' => 0]);
            DB::table('atts')
               ->update(['lectureattend4' => 0]);
            DB::table('atts')
               ->update(['nooflectures5' => 0]);
            DB::table('atts')
               ->update(['lectureattend5' => 0]);
            DB::table('atts')
               ->update(['nooflectures6' => 0]);
            DB::table('atts')
               ->update(['lectureattend6' => 0]);
            DB::table('atts')
               ->update(['nooflectures7' => 0]);
            DB::table('atts')
               ->update(['lectureattend7' => 0]);
        
             return view('Reset_Table/Update_Semester', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
    }
    
    //Get summary for Level
     public function Subject_Level()
    {     
            $atts = att::paginate(100);
            $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
            
            $data=DB::table('table__course__s__students')
                    ->where('id','=', "35")->first();
            
            $data1=DB::table('table__course__s__students')
                    ->where('id','=', "31")->first();
               
            $data2=DB::table('table__course__s__students')
                    ->where('id','=', "27")->first();   
            
            $data3=DB::table('table__course__s__students')
                    ->where('id','=', "25")->first();
            
            $data4=DB::table('table__course__s__students')
                    ->where('id','=', "24")->first();
           
            $data5=DB::table('table__course__s__students')
                    ->where('id','=', "23")->first();
            
            $data6=DB::table('table__course__s__students')
                    ->where('id','=', "22")->first();
            
            $data7=DB::table('table__course__s__students')
                    ->where('id','=', "21")->first();
          
            $level1 = DB::table('Level')
                    ->where('id','=', "2")->first();
            
            
            $SingleData = att::findOrFail(1);
        
            
                 $pdf = PDF::loadView('Summery.table_2_sub.Level', compact('atts','items','SingleData','data','data1','data2','data3','data4','data5','data6','data7','level1'));
                 return $pdf->download('Summmary Level.pdf');
     }  
     
     
    public function create()
    {

        return view('atts.create');
    }
    
     public function storeStudent (Request $request)
    {
        
            $data = $this->getData($request);
            
            atts::create($data);

            return redirect()->route('atts.atts.index')
                             ->with('success_message', 'Student data was successfully added!');
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
    
     public function destroy($id)
    {
        try {
            $atts = atts::findOrFail($id);
            $atts->delete();

            return redirect()->route('atts.atts.index')
                             ->with('success_message', 'Student data was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
    
     public function editStudent($id)
    {
        $atts = atts::findOrFail($id);
        

        return view('atts.edit', compact('atts'));
    }
    
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $atts1s = atts::findOrFail($id);
            $atts1s->update($data);

            return redirect()->route('atts.atts.index')
                             ->with('success_message', 'Student data was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }
    
      
    public function updateLevel()
    {
       DB::table('level')
         ->where('level','=', "Level 4S")
        ->update(['level' => "Level x"]);
       
       DB::table('level')
         ->where('level','=', "Level 3S")
        ->update(['level' => "Level 4S"]);
       
       DB::table('level')
         ->where('level','=', "Level 2S")
        ->update(['level' => "Level 3S"]);
       
       DB::table('level')
         ->where('level','=', "Level 1S")
        ->update(['level' => "Level 2S"]);
       
       DB::table('level')
         ->where('level','=', "Level x")
        ->update(['level' => "Level 1S"]);
       
       DB::table('level')
         ->where('level','=', "Level 4M")
        ->update(['level' => "Level y"]);

       DB::table('level')
         ->where('level','=', "Level 3M")
        ->update(['level' => "Level 4M"]);
       
       DB::table('level')
         ->where('level','=', "Level 2G")
        ->update(['level' => "Level 3M"]);
       
       
       DB::table('level')
         ->where('level','=', "Level 1G")
        ->update(['level' => "Level 2G"]);
       
       DB::table('level')
         ->where('level','=', "Level y")
        ->update(['level' => "Level 1G"]);
     
      
            return redirect()->route('atts.atts.index')
                             ->with('success_message', 'All the Level was successfully updated!.. add new  stundents in to level');
    }


    public function Backup()
     {
        $atts = att::paginate(100);
        $items = DB::table('precentages')
         ->select('precentage')
         ->where('Level','=', "2S")->first();
        
        $data=DB::table('table__course__s__students')
                ->where('id','=', "35")->first();
        
        $data1=DB::table('table__course__s__students')
                ->where('id','=', "31")->first();
           
        $data2=DB::table('table__course__s__students')
                ->where('id','=', "27")->first();   
        
        $data3=DB::table('table__course__s__students')
                ->where('id','=', "25")->first();
        
        $data4=DB::table('table__course__s__students')
                ->where('id','=', "24")->first();
       
        $data5=DB::table('table__course__s__students')
                ->where('id','=', "23")->first();
        
        $data6=DB::table('table__course__s__students')
                ->where('id','=', "22")->first();
        
        $data7=DB::table('table__course__s__students')
                ->where('id','=', "21")->first();
         $leve = DB::table('Level')
                    ->where('id','=', "2")->first();
            
        
        $SingleData = att::findOrFail(1);   
       
        
        $pdf = PDF::loadView('BackUp.table_2.Level2', compact('atts','items','SingleData','data',
                'data1','data2','data3','data4','data5','data6','data7','leve'))
                ->download('BackUP Level.pdf');
        return view('BackUp.table_2.Level2',compact('atts','items','data','data1','data2',
                'data3','data4','data5','data6','data7','SingleData','leve'));
     }



     public function edit($id)
    {
        $atts = atts::findOrFail($id);
        

        return view('atts.edit', compact('atts'));
    }
    public function updateS($id, Request $request)
    {
        
            
            $data = $this->getDataS($request);
            
            $atts = atts::findOrFail($id);
            $atts->update($data);

            return redirect()->route('return')
                             ->with('success_message', 'Atts was successfully updated!');

        
               
    }
    protected function getDataS(Request $request)
    {
        $rules = [
            'lectureattend' => 'required|numeric|min:-2147483648|max:2147483647',
            
        ];

        $data = $request->validate($rules);

        return $data;
    }

 }
 
 