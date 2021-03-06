<?php
namespace App\Http\Controllers;
use App\Models\atts_1;
use App\Models\table__course__s__students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\url;
use App\Http\Controllers\Controller;
use Exception;
use PDF; 
use App\level;
use Carbon\Carbon;

 class Atts1smController extends Controller
 {
     
  // ---------------------------_ATTENDANCE VIEW_-------------------------------------------------
     
     // viewing table_2 subject
    public function view($id,Request $request)
    {
        $atts = atts_1::paginate(100);
         $SingleData =  DB::table('atts_1s')->first();
            
        $keyword = $request->get('search');
            
        $items = DB::table('precentages')
            ->select('precentage')
            ->where('Level','=', "2S")->first();
        
        $data = table__course__s__students::findOrFail($id);
        
        
                
        if (!empty($keyword)) {
                 $atts = atts_1::where('Reg_NO', 'LIKE', "%$keyword%")
                ->orWhere('Name', 'LIKE', "%$keyword%")  
                ->latest()->paginate(300);
        }
        else {
           $atts = atts_1::paginate(100);
        }
        
             if($id==45){
             return view('subject table_1_view.Subject1', compact('atts','items','data', 'SingleData'));
             }
             if($id==44){
             return view('subject table_1_view.Subject2', compact('atts','items','data','SingleData'));
             }
              if($id==43){
             return view('subject table_1_view.Subject3', compact('atts','items','data','SingleData'));
             }
              if($id==42){
             return view('subject table_1_view.Subject4', compact('atts','items','data','SingleData'));
             }
              if($id==39){
             return view('subject table_1_view.Subject5', compact('atts','items','data','SingleData'));
             }
              if($id==38){
             return view('subject table_1_view.Subject6', compact('atts','items','data','SingleData'));
             }
              if($id==37){
             return view('subject table_1_view.Subject7', compact('atts','items','data','SingleData'));
             }
              if($id==46){
             return view('subject table_1_view.Subject8', compact('atts','items','data','SingleData'));
             }
    }
    
         
    // --------------------------_ATTENDANCE MARKING VIEW_------------------------------------------------
    
    //attenadnce marking view table_2 subject
    public function attendance_mark($id)
    {
        $atts = atts_1::paginate(200);
        $data = table__course__s__students::findOrFail($id);
        if($id==45){
              return view('subject table_1_mark1.subject1', compact('atts','data'));
             }
        if($id==44){
              return view('subject table_1_mark1.subject2', compact('atts','data'));
             }
        if($id==43){
              return view('subject table_1_mark1.subject3', compact('atts','data'));
             } 
        if($id==42){
               return view('subject table_1_mark1.subject4', compact('atts','data'));
             }
        if($id==39){
               return view('subject table_1_mark1.subject5', compact('atts','data'));
             }
        if($id==38){
               return view('subject table_1_mark1.subject6', compact('atts','data'));
             }
        if($id==37){
               return view('subject table_1_mark1.subject7', compact('atts','data'));
             }
        if($id==46){
               return view('subject table_1_mark1.subject8', compact('atts','data'));
             }     
    }

  
 // ---------------------------_HOUR BUTTON AND SUBMIT THE MARKING ATTENDANCE-----------------------------------------
 
    public function result()
   {
          DB::table('atts_1s')-> update(['attend_mark'=>0]);
          DB::table('atts_1s')-> update(['is_saved'=>0]);
           return redirect::to(url::previous());
   } 
   
      public function result1()
   {
          DB::table('atts_1s')-> update(['attend_mark1'=>0]);
          DB::table('atts_1s')-> update(['is_saved1'=>0]);
           return redirect::to(url::previous());
   } 
      public function result2()
   {
          DB::table('atts_1s')-> update(['attend_mark2'=>0]);
          DB::table('atts_1s')-> update(['is_saved2'=>0]);
           return redirect::to(url::previous());
   } 
      public function result3()
   {
          DB::table('atts_1s')-> update(['attend_mark3'=>0]);
          DB::table('atts_1s')-> update(['is_saved3'=>0]);
           return redirect::to(url::previous());
   } 
      public function result4()
   {
          DB::table('atts_1s')-> update(['attend_mark4'=>0]);
          DB::table('atts_1s')-> update(['is_saved4'=>0]);
           return redirect::to(url::previous());
   } 
      public function result5()
   {
          DB::table('atts_1s')-> update(['attend_mark5'=>0]);
          DB::table('atts_1s')-> update(['is_saved5'=>0]);
           return redirect::to(url::previous());
   } 
      public function result6()
   {
          DB::table('atts_1s')-> update(['attend_mark6'=>0]);
          DB::table('atts_1s')-> update(['is_saved6'=>0]);
           return redirect::to(url::previous());
   } 
   
      public function result7()
   {
          DB::table('atts_1s')-> update(['attend_mark7'=>0]);
          DB::table('atts_1s')-> update(['is_saved7'=>0]);
           return redirect::to(url::previous());
   } 
    
    
// function change precentage with hours for subject1
    public function store(Request $request,$id)
   {   

    try{
        if($id==45){
            $st = Carbon::parse($request->ST);
            $et = Carbon::parse($request->ET);
            $diff = $et->diffInHours($st);

            DB::table('atts_1s')-> update(['hours'=>$diff]);  
            DB::table('atts_1s')-> update(['hall'=>$request->hall]);
            DB::table('atts_1s')-> update(['date'=>$request->date]);
            DB::table('atts_1s')-> update(['Start_Time'=>$request->ST]);
            DB::table('atts_1s')-> update(['End_Time'=>$request->ET]);
            DB::table('atts_1s')->update(['nooflectures' => DB::raw('nooflectures +  hours')]);
            DB::table('atts_1s')->where('attend_mark', '0')->update(['lectureattend' => DB::raw('lectureattend + hours')]);
            DB::table('atts_1s')-> update(['is_saved'=>0]); 
             }
             
               
             if($id==44){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours1'=>$diff]);  

                DB::table('atts_1s')-> update(['hall1'=>$request->hall]);

            DB::table('atts_1s')-> update(['date1'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time1'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time1'=>$request->ET]);
           
            DB::table('atts_1s')->update(['nooflectures1' => DB::raw('nooflectures1 +  hours1')]);
        
            DB::table('atts_1s')->where('attend_mark1', '0')->update(['lectureattend1' => DB::raw('lectureattend1 + hours1')]);
            
            DB::table('atts_1s')-> update(['is_saved1'=>'0']); 
             }
             
             if($id==43){


              $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours2'=>$diff]);  

                DB::table('atts_1s')-> update(['hall2'=>$request->hall]);

            DB::table('atts_1s')-> update(['date2'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time2'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time2'=>$request->ET]); 
           
            DB::table('atts_1s')->update(['nooflectures2' => DB::raw('nooflectures2 +  hours2')]);
            
             DB::table('atts_1s')->where('attend_mark2', '0')->update(['lectureattend2' => DB::raw('lectureattend2 + hours2')]);
        
            DB::table('atts_1s')-> update(['is_saved2'=>'0']); 
             }
               
            if($id==42){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours3'=>$diff]);  

                DB::table('atts_1s')-> update(['hall3'=>$request->hall]);

            DB::table('atts_1s')-> update(['date3'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time3'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time3'=>$request->ET]); 
             //DB::table('atts_1s')-> update(['hours3'=>$request->name]); 
           
            DB::table('atts_1s')->update(['nooflectures3' => DB::raw('nooflectures3 +  hours3')]);
        
            DB::table('atts_1s')->where('attend_mark3', '0')->update(['lectureattend3' => DB::raw('lectureattend3 + hours3')]);
       
            DB::table('atts_1s')-> update(['is_saved3'=>'0']); 
             }
             
            if($id==39){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours4'=>$diff]);  

                DB::table('atts_1s')-> update(['hall4'=>$request->hall]);

            DB::table('atts_1s')-> update(['date4'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time4'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time4'=>$request->ET]); 
           
            DB::table('atts_1s')->update(['nooflectures4' => DB::raw('nooflectures4 +  hours4')]);
        
            DB::table('atts_1s')->where('attend_mark4', '0')->update(['lectureattend4' => DB::raw('lectureattend4 + hours4')]);
        
            DB::table('atts_1s')-> update(['is_saved4'=>'0']); 
             }
             
            if($id==38){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours5'=>$diff]);  

                DB::table('atts_1s')-> update(['hall5'=>$request->hall]);

            DB::table('atts_1s')-> update(['date5'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time5'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time5'=>$request->ET]); 
           
            DB::table('atts_1s')->update(['nooflectures5' => DB::raw('nooflectures5 +  hours5')]);
        
            DB::table('atts_1s')->where('attend_mark5', '0')->update(['lectureattend5' => DB::raw('lectureattend5 + hours5')]);
        
            DB::table('atts_1s')-> update(['is_saved5'=>'0']); 
             }
             
            if($id==37){

             $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours6'=>$diff]);  

                DB::table('atts_1s')-> update(['hall6'=>$request->hall]);

            DB::table('atts_1s')-> update(['date6'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time6'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time6'=>$request->ET]); 
           
            DB::table('atts_1s')->update(['nooflectures6' => DB::raw('nooflectures6 +  hours6')]);
        
            DB::table('atts_1s')->where('attend_mark6', '0')->update(['lectureattend6' => DB::raw('lectureattend6 + hours6')]);
        
            DB::table('atts_1s')-> update(['is_saved6'=>'0']); 
             }
             
            if($id==46){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_1s')-> update(['hours7'=>$diff]);  

                DB::table('atts_1s')-> update(['hall7'=>$request->hall]);

            DB::table('atts_1s')-> update(['date7'=>$request->date]);

            DB::table('atts_1s')-> update(['Start_Time7'=>$request->ST]);

            DB::table('atts_1s')-> update(['End_Time7'=>$request->ET]); 
            //DB::table('atts_1s')-> update(['hours7'=>$request->name]); 
           
            DB::table('atts_1s')->update(['nooflectures7' => DB::raw('nooflectures7 +  hours7')]);
        
            DB::table('atts_1s')->where('attend_mark7', '0')->update(['lectureattend7' => DB::raw('lectureattend7 + hours7')]);
      
            DB::table('atts_1s')-> update(['is_saved7'=>'0']); 
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
      DB::table('atts_1s')-> update(['attend_mark'=>0]); 
        $record = $request->my_checkbox;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray1(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark1'=>0]); 
        $record = $request->my_checkbox1;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark1'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved1'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray2(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark2'=>0]); 
        $record = $request->my_checkbox2;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark2'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved2'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray3(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark3'=>0]); 
        $record = $request->my_checkbox3;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark3'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved3'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray4(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark4'=>0]); 
        $record = $request->my_checkbox4;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark4'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved4'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray5(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark5'=>0]); 
        $record = $request->my_checkbox5;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark5'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved5'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray6(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark6'=>0]); 
        $record = $request->my_checkbox6;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark6'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved6'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray7(Request $request)
    {
      DB::table('atts_1s')-> update(['attend_mark7'=>0]); 
        $record = $request->my_checkbox7;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_1s')->where('id', $value)->update(['attend_mark7'=>1]);
        }
        }    
        
        DB::table('atts_1s')-> update(['is_saved7'=>1]); 
        
        return redirect::to(url::previous());
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
         
          $tableCourseSStudentsObjects = table__course__s__students::where('Level', '=', "1S") ->latest()->paginate(60);

            DB::table('atts_1s')
               ->update(['nooflectures' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures1' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend1' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures2' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend2' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures3' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend3' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures4' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend4' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures5' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend5' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures6' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend6' => 0]);
            DB::table('atts_1s')
               ->update(['nooflectures7' => 0]);
            DB::table('atts_1s')
               ->update(['lectureattend7' => 0]);
             DB::table('atts_1s')
               ->update(['attend_mark' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark1' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark2' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark3' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark4' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark5' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark6' => 0]);
            DB::table('atts_1s')
               ->update(['attend_mark7' => 0]);
             DB::table('atts_1s')
               ->update(['attend_mark7' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved1' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved2' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved3' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved4' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved5' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved6' => 0]);
             DB::table('atts_1s')
               ->update(['is_saved7' => 0]);
        
        
             return view('Reset_Table/Update_Semester1', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3'));
    }
 
    
    //Get summary for Level
     public function Subject_Level()
    {     
            $atts = atts_1::paginate(100);
            $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
            
            $data=DB::table('table__course__s__students')
                    ->where('id','=', "45")->first();
            
            $data1=DB::table('table__course__s__students')
                    ->where('id','=', "44")->first();
               
            $data2=DB::table('table__course__s__students')
                    ->where('id','=', "43")->first();   
            
            $data3=DB::table('table__course__s__students')
                    ->where('id','=', "42")->first();
            
            $data4=DB::table('table__course__s__students')
                    ->where('id','=', "39")->first();
           
            $data5=DB::table('table__course__s__students')
                    ->where('id','=', "38")->first();
            
            $data6=DB::table('table__course__s__students')
                    ->where('id','=', "37")->first();
            
            $data7=DB::table('table__course__s__students')
                    ->where('id','=', "21")->first();
            
             $level1 = DB::table('Level')
                    ->where('id','=', "1")->first();
             
            $SingleData = atts_1::findOrFail(1);
        
            
                 $pdf = PDF::loadView('Summery.table_2_sub.Level', compact('atts','items','SingleData','data','data1','data2','data3','data4','data5','data6','data7','level1'));
                 return $pdf->download('Summmary Level.pdf');
     }  
     
      public function Backup()
     {
        $atts = atts_1::paginate(100);
        $items = DB::table('precentages')
         ->select('precentage')
         ->where('Level','=', "2S")->first();
        
        $data=DB::table('table__course__s__students')
                ->where('id','=', "45")->first();
        
        $data1=DB::table('table__course__s__students')
                ->where('id','=', "44")->first();
           
        $data2=DB::table('table__course__s__students')
                ->where('id','=', "43")->first();   
        
        $data3=DB::table('table__course__s__students')
                ->where('id','=', "42")->first();
        
        $data4=DB::table('table__course__s__students')
                ->where('id','=', "39")->first();
       
        $data5=DB::table('table__course__s__students')
                ->where('id','=', "38")->first();
        
        $data6=DB::table('table__course__s__students')
                ->where('id','=', "37")->first();
        
        $data7=DB::table('table__course__s__students')
                ->where('id','=', "21")->first();
        
           $leve = DB::table('Level')
                    ->where('id','=', "1")->first();
        
        
        $SingleData = atts_1::findOrFail(1);   
       
        
        $pdf = PDF::loadView('BackUp.table_2.Level2', compact('atts','items','SingleData','data',
                'data1','data2','data3','data4','data5','data6','data7','leve'))
                ->download('BackUP Level.pdf');
        return view('BackUp.table_2.Level2',compact('atts','items','data','data1','data2',
                'data3','data4','data5','data6','data7','SingleData','leve'));
     }

 
 }
 
 