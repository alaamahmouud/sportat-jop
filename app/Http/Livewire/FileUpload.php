<?php

namespace App\Http\Livewire;

use App\Models\Video;
use DB;
use Helper\Attachment;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{

    use WithFileUploads;
    public $attachment, $title,$description,$category_id,$tags;


    public function submit(Request $request)
    {




        $client = auth()->user() ;

        $validatedData = $this->validate([
            'title' => 'required',
            'attachment' => 'required',
            'description' => 'required' ,
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required'
        ]);



//        DB::beginTransaction();
//        try {






            $toJson = json_encode($validatedData['tags'],true);
            $json =  json_decode($toJson,true);
            $toConvert = ['tags' => $json];


            $record = Video::create([
                'client_id' => $client->id ,
                'description' => $validatedData['description'],
                'category_id' => $validatedData['category_id'],
                'title' => $validatedData['title'],
                'tags' => $validatedData['tags'],
            ]);





                Attachment::addAttachment($validatedData['attachment'], $record, 'talent/video', ['save' => 'original','usage'=>'video' ,'type' => 'video' ]);

          //  DB::commit();
            session()->flash('message', 'File successfully Uploaded.');


//        }catch (\Exception $e){
//            DB::rollback();
//            session()->flash('message', 'File Faild Uploaded.');
//
//        }

//        session()->flash('message', 'File successfully Uploaded.');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
