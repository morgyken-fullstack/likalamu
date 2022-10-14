<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

use DB;

use Response;

use App\User;

use Illuminate\Support\Facades\Storage;

use URL;

class StudentAskQuestionController extends Controller
{
    //
  public function postQuestion(Request $request)
   {

    //  $input = $request->all();


       $questionid = rand (99999,999999);

       $allre= $request->all();

       //dd( $request->all());

       $number_of_words1 = rand (700,900);

       $summary1 =  strip_tags(substr(trim($request->body),0, $number_of_words1)). '...';

       $file = $request->file;

       //destination

      $dest = public_path().'/storage/uploads/'.$questionid.'/question/';

       //upload files
       $this->uploadFiles($file, $dest);

       //insert into database here

       //add to session
       session(['questionid' => $questionid,'price' => $request->price ]);

       DB::table('questions')->insert(
           [
               'body' =>  htmlspecialchars($request['body']),
               'studentId'   => Auth::user()->id,
               'header'     => $request->header,
               'pages'     => $request->pages,
               'studentprice'     => $request->price,
               'deadline'     => $request->deadline,
               'format'     => $request->format,
               'tutorprice'     => $request->tutorprice,
               'questionId' => $questionid,
               'summary' => htmlspecialchars($summary1),
               'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
               'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

           ]);

           //insert data to matrix table
           DB::table('matrices')->insert(
               [
                   'tutorprice' => $request->tutorprice,
                   'qid' => $questionid,
                   'status' => 'new',
                   'assigned' =>0,
                   'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                   'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
               ]);

              $request->session()->put('deadline', $request->deadline );

              $request->session()->put('receiptDate', \Carbon\Carbon::now()->toDateTimeString() );

              $request->session()->put('receiptNo', $questionid );

              $request->session()->put('price', $request->price );

              $request->session()->put('tax', 0.053* $request->price );

               // redirect to receipt

          return redirect() ->route('student-view-payments');
   }

     public function viewPaymentDetails()
     {

       return view('student.payment-details');

     }

  public function PostComments(Request $request){

        // mark as answer here
        //dd($request->mark);

        if($request->mark ==1)
        {
          DB::table('matrices')->where('qid','=', $request->questionid)->update(
                 [
                     'answered' => 1,

                     'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

                 ]
             );

        }

        $commentid = rand (99999,999999);
        //files
         $file = $request->file;

         //question id
         $questionid = $request->questionid;

         //add to session
         session(['questionid' => $questionid, 'commentid'=>$commentid ]);

         if($file !=null)
         {
           if($request->mark == null)
           {
              $dest = public_path().'/storage/uploads/'.$questionid.'/comments/'.$commentid.'/';
              $mark ='comment';
           }

           else {
              $dest = public_path().'/storage/uploads/'.$questionid.'/answer/'.$commentid.'/';
              $mark ='ans';
           }
           $this->uploadFiles($file, $dest);
         }


          DB::table('comments_models')->insert(
                 [
                     'answer' =>  htmlspecialchars($request->answer),

                     'userid'   => Auth::user()->id,

                     'commentid'   => $commentid,

                     'questionid'   =>$request->questionid,

                     'mark'     => $request->mark,
                    //dates are here
                     'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),

                     'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

                 ]);

        //  return response()->json(['success'=>$request]);
         return redirect() ->back();


       }

       public function uploadFiles($file, $dest){

         if(is_array($file)){


                foreach ($file as $files){
                 /*
                  * loop through multiple files
                  */
                 $name =  $files->getClientOriginalName();
                 $files->move($dest, $name);
             }

         }

       }


       public function CommentsDocumentUpload(Request $request)
       {
         if($request->hasFile('file')){
               $file = $request->file('file');
               $dest = public_path().'/storage/uploads/'.$questionid.'/comments/'.$commentid.'/';
               $this->uploadFiles($file, $dest);
           }
       }

       public function document_upload(Request $request) {

       //  dd($request);

       if($request->hasFile('file')){
           $file = $request->file('file');
           $completeFileName = $file->getClientOriginalName();
           $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
           $extension = $file->getClientOriginalExtension();
           $randomized = rand();
           $documents = str_replace(' ', '', $fileNameOnly).'-'.$randomized.''.time().'.'.$extension;
           $path = $file->storeAs('public/users', $documents);
           $test2 = $request->hasFile('file');

       }
   }
}