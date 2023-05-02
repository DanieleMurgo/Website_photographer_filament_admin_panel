<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CompactImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $filePath;
    private $fileName;
    private $path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($_filePath)
    {
        $this->filePath=$_filePath;
        $this->path = dirname($_filePath);
        $this->fileName = basename($_filePath);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Crea piccola immagine compattata
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/thumb_" . $this->fileName;
        $thumbnailImage = Image::make($srcPath)
                        ->save($destPath, 50);
        
        //Aggiornare indirizzo dell'immagine compattata nel DB
        DB::table('photos')
        ->where('path', $this->filePath)
        ->update(['thumb_path' => $this->path . "/thumb_" . $this->fileName]);
    }
}
