<?php

namespace App\Http\Controllers;

use App\Models\atts_3ms;
use Illuminate\Http\Request;
use App\Models\table__course__g__student;
use App\Http\Controllers\Controller;
use Exception;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\url;
use PDF;
use App\level;
use Carbon\Carbon;

class Atts3msController extends Controller
{
       public function index(Request $request)
    {
            $level = DB::table('Level')
          ->where('id','=', "5")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "6")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "7")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "8")->first();

          $level4 = DB::table('Level')
          ->where('id','=', "9")->first();



         $keyword = $request->get('search');
       
        if (!empty($keyword)) {
            $atts3msObjects = atts_3ms::where('name', 'LIKE', "%$keyword%")
                ->orWhere('Reg_No', 'LIKE', "%$keyword%")
            
                ->latest()->paginate(100);
        } else
        {
          $atts3msObjects = atts_3ms::paginate(25);
        }

         return view('atts_3ms.index', compact('atts3msObjects','level','level1','level2','level3','level4'));
    }

  

    public function create()
    {

        return view('atts_3ms.create');
    }

    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            atts_3ms::create($data);

            return redirect()->route('atts_3ms.atts_3ms.index')
                             ->with('success_message', 'Student data was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    public function show($id)
    {
        $atts3ms = atts_3ms::findOrFail($id);

        return view('atts_3ms.show', compact('atts3ms'));
    }

    public function edit($id)
    {
        $atts3ms = atts_3ms::findOrFail($id);
        

        return view('atts_3ms.edit', compact('atts3ms'));
    }

    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $atts3ms = atts_3ms::findOrFail($id);
            $atts3ms->update($data);

            return redirect()->route('atts_3ms.atts_3ms.index')
                             ->with('success_message', 'Student data was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    
    public function destroy($id)
    {
        try {
            $atts3ms = atts_3ms::findOrFail($id);
            $atts3ms->delete();

            return redirect()->route('atts_3ms.atts_3ms.index')
                             ->with('success_message', 'Student data was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

     public function view($id,Request $request)
    {
        $atts = atts_3ms::paginate(100);
        
         $SingleData =  DB::table('atts_3ms')->first();
            
        $keyword = $request->get('search');
            
        $items = DB::table('precentages')
            ->select('precentage')
            ->where('Level','=', "2S")->first();
        
        $data = table__course__g__student::findOrFail($id);
        
        
                
        if (!empty($keyword)) {
                 $atts = atts_3ms::where('Reg_NO', 'LIKE', "%$keyword%")
                ->orWhere('Name', 'LIKE', "%$keyword%")  
                ->latest()->paginate(300);
        }
        else {
           $atts = atts_3ms::paginate(100);
        }
        
             if($id==9){
             return view('subject table_8_view.Subject1', compact('atts','items','data', 'SingleData'));
             }
             if($id==10){
             return view('subject table_8_view.Subject2', compact('atts','items','data','SingleData'));
             }
              if($id==11){
             return view('subject table_8_view.Subject3', compact('atts','items','data','SingleData'));
             }
              if($id==12){
             return view('subject table_8_view.Subject4', compact('atts','items','data','SingleData'));
             }
              if($id==27){
             return view('subject table_8_view.Subject5', compact('atts','items','data','SingleData'));
             }
             
              if($id==28){
             return view('subject table_8_view.Subject6', compact('atts','items','data','SingleData'));
             }
              if($id==29){
             return view('subject table_8_view.Subject7', compact('atts','items','data','SingleData'));
             }
               if($id==45){
             return view('subject table_8_view.Subject8', compact('atts','items','data','SingleData'));
             }
    }
  public function result()
   {
          DB::table('atts_3ms')-> update(['attend_mark'=>0]);
          DB::table('atts_3ms')-> update(['is_saved'=>0]);
           return redirect::to(url::previous());
   } 
   
      public function result1()
   {
          DB::table('atts_3ms')-> update(['attend_mark1'=>0]);
          DB::table('atts_3ms')-> update(['is_saved1'=>0]);
           return redirect::to(url::previous());
   } 
      public function result2()
   {
          DB::table('atts_3ms')-> update(['attend_mark2'=>0]);
          DB::table('atts_3ms')-> update(['is_saved2'=>0]);
           return redirect::to(url::previous());
   } 
      public function result3()
   {
          DB::table('atts_3ms')-> update(['attend_mark3'=>0]);
          DB::table('atts_3ms')-> update(['is_saved3'=>0]);
           return redirect::to(url::previous());
   } 
      public function result4()
   {
          DB::table('atts_3ms')-> update(['attend_mark4'=>0]);
          DB::table('atts_3ms')-> update(['is_saved4'=>0]);
           return redirect::to(url::previous());
   } 
      public function result5()
   {
          DB::table('atts_3ms')-> update(['attend_mark5'=>0]);
          DB::table('atts_3ms')-> update(['is_saved5'=>0]);
           return redirect::to(url::previous());
   } 
      public function result6()
   {
          DB::table('atts_3ms')-> update(['attend_mark6'=>0]);
          DB::table('atts_3ms')-> update(['is_saved6'=>0]);
           return redirect::to(url::previous());
   } 
   
      public function result7()
   {
          DB::table('atts_3ms')-> update(['attend_mark7'=>0]);
          DB::table('atts_3ms')-> update(['is_saved7'=>0]);
           return redirect::to(url::previous());
   } 
   
     public function store1(Request $request,$id)
   {   

    try{
        if($id==9){
            $st = Carbon::parse($request->ST);
            $et = Carbon::parse($request->ET);
            $diff = $et->diffInHours($st);

            DB::table('atts_3ms')-> update(['hours'=>$diff]);  
            DB::table('atts_3ms')-> update(['hall'=>$request->hall]);
            DB::table('atts_3ms')-> update(['date'=>$request->date]);
            DB::table('atts_3ms')-> update(['Start_Time'=>$request->ST]);
            DB::table('atts_3ms')-> update(['End_Time'=>$request->ET]);
            DB::table('atts_3ms')->update(['nooflectures' => DB::raw('nooflectures +  hours')]);
            DB::table('atts_3ms')->where('attend_mark', '0')->update(['lectureattend' => DB::raw('lectureattend + hours')]);
            DB::table('atts_3ms')-> update(['is_saved'=>0]); 
             }
             
               
             if($id==10){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours1'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall1'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date1'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time1'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time1'=>$request->ET]);
           
            DB::table('atts_3ms')->update(['nooflectures1' => DB::raw('nooflectures1 +  hours1')]);
        
            DB::table('atts_3ms')->where('attend_mark1', '0')->update(['lectureattend1' => DB::raw('lectureattend1 + hours1')]);
            
            DB::table('atts_3ms')-> update(['is_saved1'=>'0']); 
             }
             
             if($id==11){


              $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours2'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall2'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date2'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time2'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time2'=>$request->ET]); 
           
            DB::table('atts_3ms')->update(['nooflectures2' => DB::raw('nooflectures2 +  hours2')]);
            
             DB::table('atts_3ms')->where('attend_mark2', '0')->update(['lectureattend2' => DB::raw('lectureattend2 + hours2')]);
        
            DB::table('atts_3ms')-> update(['is_saved2'=>'0']); 
             }
               
            if($id==12){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours3'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall3'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date3'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time3'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time3'=>$request->ET]); 
             //DB::table('atts_3ms')-> update(['hours3'=>$request->name]); 
           
            DB::table('atts_3ms')->update(['nooflectures3' => DB::raw('nooflectures3 +  hours3')]);
        
            DB::table('atts_3ms')->where('attend_mark3', '0')->update(['lectureattend3' => DB::raw('lectureattend3 + hours3')]);
       
            DB::table('atts_3ms')-> update(['is_saved3'=>'0']); 
             }
             
            if($id==27){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours4'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall4'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date4'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time4'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time4'=>$request->ET]); 
           
            DB::table('atts_3ms')->update(['nooflectures4' => DB::raw('nooflectures4 +  hours4')]);
        
            DB::table('atts_3ms')->where('attend_mark4', '0')->update(['lectureattend4' => DB::raw('lectureattend4 + hours4')]);
        
            DB::table('atts_3ms')-> update(['is_saved4'=>'0']); 
             }
             
            if($id==28){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours5'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall5'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date5'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time5'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time5'=>$request->ET]); 
           
            DB::table('atts_3ms')->update(['nooflectures5' => DB::raw('nooflectures5 +  hours5')]);
        
            DB::table('atts_3ms')->where('attend_mark5', '0')->update(['lectureattend5' => DB::raw('lectureattend5 + hours5')]);
        
            DB::table('atts_3ms')-> update(['is_saved5'=>'0']); 
             }
             
            if($id==29){

             $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours6'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall6'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date6'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time6'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time6'=>$request->ET]); 
           
            DB::table('atts_3ms')->update(['nooflectures6' => DB::raw('nooflectures6 +  hours6')]);
        
            DB::table('atts_3ms')->where('attend_mark6', '0')->update(['lectureattend6' => DB::raw('lectureattend6 + hours6')]);
        
            DB::table('atts_3ms')-> update(['is_saved6'=>'0']); 
             }
             
            if($id==45){
                $st = Carbon::parse($request->ST);
                $et = Carbon::parse($request->ET);
                $diff = $et->diffInHours($st);
    
                DB::table('atts_3ms')-> update(['hours7'=>$diff]);  

                DB::table('atts_3ms')-> update(['hall7'=>$request->hall]);

            DB::table('atts_3ms')-> update(['date7'=>$request->date]);

            DB::table('atts_3ms')-> update(['Start_Time7'=>$request->ST]);

            DB::table('atts_3ms')-> update(['End_Time7'=>$request->ET]); 
            //DB::table('atts_3ms')-> update(['hours7'=>$request->name]); 
           
            DB::table('atts_3ms')->update(['nooflectures7' => DB::raw('nooflectures7 +  hours7')]);
        
            DB::table('atts_3ms')->where('attend_mark7', '0')->update(['lectureattend7' => DB::raw('lectureattend7 + hours7')]);
      
            DB::table('atts_3ms')-> update(['is_saved7'=>'0']); 
             }


            return redirect::to(url::previous())
            ->with('success_message', 'Attendance Sheet successfully added!');   
                 
             
             
        } catch (Exception $exception) {
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
   }
   
    public function ray(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark'=>0]); 
        $record = $request->my_checkbox;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray1(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark1'=>0]); 
        $record = $request->my_checkbox1;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark1'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved1'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray2(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark2'=>0]); 
        $record = $request->my_checkbox2;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark2'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved2'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray3(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark3'=>0]); 
        $record = $request->my_checkbox3;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark3'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved3'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray4(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark4'=>0]); 
        $record = $request->my_checkbox4;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark4'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved4'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray5(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark5'=>0]); 
        $record = $request->my_checkbox5;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark5'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved5'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray6(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark6'=>0]); 
        $record = $request->my_checkbox6;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark6'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved6'=>1]); 
        
        return redirect::to(url::previous());
     }
     
        public function ray7(Request $request)
    {
      DB::table('atts_3ms')-> update(['attend_mark7'=>0]); 
        $record = $request->my_checkbox7;
        
        if (is_null($record)){
            
        }
        else{
        foreach ($record as $value) {
            DB::table('atts_3ms')->where('id', $value)->update(['attend_mark7'=>1]);
        }
        }    
        
        DB::table('atts_3ms')-> update(['is_saved7'=>1]); 
        
        return redirect::to(url::previous());
     }
  
    
        public function attendance_mark($id)
                
    {
        $atts =  atts_3ms::paginate(300);
        $data = table__course__g__student::findOrFail($id);
        if($id==9){
              return view('subject table_8_mark8.subject1', compact('atts','data'));
             }
        if($id==10){
              return view('subject table_8_mark8.subject2', compact('atts','data'));
             }
        if($id==11){
              return view('subject table_8_mark8.subject3', compact('atts','data'));
             } 
        if($id==12){
               return view('subject table_8_mark8.subject4', compact('atts','data'));
             }
         if($id==27){
               return view('subject table_8_mark8.subject5', compact('atts','data'));
             }
          if($id==28){
               return view('subject table_8_mark8.subject6', compact('atts','data'));
             }
              if($id==29){
               return view('subject table_8_mark8.subject7', compact('atts','data'));
             }
              if($id==45){
               return view('subject table_8_mark8.subject8', compact('atts','data'));
             }
    }    
   
     public function Subject_Level()
    {     
            $atts = atts_3ms::paginate(100);
            $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
            
            $data=DB::table('table__course__g__students')
                    ->where('id','=', "9")->first();
            
            $data1=DB::table('table__course__g__students')
                    ->where('id','=', "10")->first();
               
            $data2=DB::table('table__course__g__students')
                    ->where('id','=', "11")->first();   
            
            $data3=DB::table('table__course__g__students')
                    ->where('id','=', "12")->first();
            
            $data4=DB::table('table__course__g__students')
                    ->where('id','=', "27")->first();
           
            $data5=DB::table('table__course__g__students')
                    ->where('id','=', "28")->first();
            
            $data6=DB::table('table__course__g__students')
                    ->where('id','=', "29")->first();
            
             $level1 = DB::table('Level')
                    ->where('id','=', "8")->first();
             
            $SingleData = atts_3ms::findOrFail(1);
        
            
                 $pdf = PDF::loadView('Summery.table_6_sub.Level', compact('atts','items','SingleData','data','data1','data2','data3','data4','data5','data6','data7','level1'));
                 return $pdf->download('Summmary Level.pdf');
     }  
    
       public function Backup()
     {
        $atts = atts_3ms::paginate(100);
        $items = DB::table('precentages')
         ->select('precentage')
         ->where('Level','=', "2s")->first();
        
        $data=DB::table('table__course__g__students')
                ->where('id','=', "9")->first();
        
        $data1=DB::table('table__course__g__students')
                ->where('id','=', "10")->first();
           
        $data2=DB::table('table__course__g__students')
                ->where('id','=', "11")->first();   
        
        $data3=DB::table('table__course__g__students')
                ->where('id','=', "12")->first();
        
          $data4=DB::table('table__course__g__students')
                    ->where('id','=', "27")->first();
           
            $data5=DB::table('table__course__g__students')
                    ->where('id','=', "28")->first();
            
            $data6=DB::table('table__course__g__students')
                    ->where('id','=', "29")->first();
               
             
           $leve = DB::table('Level')
                    ->where('id','=', "8")->first();
        
        
        $SingleData = atts_3ms::findOrFail(1);   
       
        
        $pdf = PDF::loadView('BackUp.table_2.Level2', compact('atts','items','SingleData','data',
                'data1','data2','data3','data4','data5','data6','data7','leve'))
                ->download('BackUP Level.pdf');
        return view('BackUp.table_2.Level2',compact('atts','items','data','data1','data2',
                'data3','data4','data5','data6','data7','SingleData','leve'));
     }
     
        public function reset1()
    {
        $level = DB::table('Level')
          ->where('id','=', "5")->first();
           
          $level1 = DB::table('Level')
         ->where('id','=', "6")->first();
          
          $level2 = DB::table('Level')
         ->where('id','=', "7")->first();
          
          $level3 = DB::table('Level')
          ->where('id','=', "8")->first();
          
           $level4 = DB::table('Level')
          ->where('id','=', "9")->first();

          $items = DB::table('precentages')
             ->select('precentage')
             ->where('Level','=', "2S")->first();
         
          $tableCourseSStudentsObjects = table__course__g__student::where('Level', '=', "3m") ->latest()->paginate(60);

            DB::table('atts_3ms')
               ->update(['nooflectures' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend' => 0]);
            DB::table('atts_3ms')
               ->update(['nooflectures1' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend1' => 0]);
            DB::table('atts_3ms')
               ->update(['nooflectures2' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend2' => 0]);
            DB::table('atts_3ms')
               ->update(['nooflectures3' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend3' => 0]);
            DB::table('atts_3ms')
               ->update(['nooflectures4' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend4' => 0]);
            DB::table('atts_3ms')
               ->update(['nooflectures5' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend5' => 0]);
            DB::table('atts_3ms')
               ->update(['nooflectures6' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend6' => 0]);
            
              
            DB::table('atts_3ms')
               ->update(['nooflectures7' => 0]);
            DB::table('atts_3ms')
               ->update(['lectureattend7' => 0]);
             DB::table('atts_3ms')
               ->update(['attend_mark' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark1' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark2' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark3' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark4' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark5' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark6' => 0]);
            DB::table('atts_3ms')
               ->update(['attend_mark7' => 0]);
             DB::table('atts_3ms')
               ->update(['attend_mark7' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved1' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved2' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved3' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved4' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved5' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved6' => 0]);
             DB::table('atts_3ms')
               ->update(['is_saved7' => 0]);
         
           
             
           
             return view('Reset_Table/Update_Semester7', compact('tableCourseSStudentsObjects','items','level','level1','level2','level3','level4'));
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
