<?php
namespace App\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function uploadStore(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : time(str_random(25));
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }

    public function uploadDelete($image, $disk = 'public')
    {
        Storage::disk($disk)->delete($image);
    }

    public function upload($model,$request,$disk,$dataName)
    {
        if ($request->has($dataName)) {
            $image = $request->file($dataName);
            $name = $dataName.'_'.time();
            $folder='/'.$model->id .'/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadDelete($model->$dataName,$disk);
            $this->uploadStore($image, $folder, $disk, $name);
            $model->$dataName = $filePath;
        }
    }
}
