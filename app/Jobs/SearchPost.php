<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SearchPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $query;

    /**
     * Create a new job instance.
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        return Post::search($this->query)->simplePaginate(5);

    }

}
