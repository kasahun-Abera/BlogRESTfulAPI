<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $image;
    protected $entity;
    public function __construct($image)
    {
        $this->image = $image;
        $entity = $this->entity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $entity = $this->entity;
        $image = $this->image;

        $filename = time() . '_' . $image->getClientOriginalName();
        $path = $image->storeAs($entity->getTable(), $filename, 'public/images');

        $entity->images()->create([
            'path' => $path,
        ]);
    }
}
