<?php

namespace App\Console\Commands;

use App\Helpers\ArrayHelper;
use App\Helpers\FileHelper;
use Illuminate\Console\Command;

class SetPictureScrapper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:picture:scrap {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filename = storage_path($this->argument('filename'));
        if (!is_file($filename)) {
            $this->error($filename. ' not found');
            return 1;
        } elseif (!is_readable($filename)) {
            $this->error($filename. ' not readable');
            return 1;
        } else {
            $contents = file_get_contents($filename);
            $contents  = (!is_array($contents)) ? explode(PHP_EOL, $contents): $contents;
            foreach ($contents as $content) {
                //get the picture filename
                $pictureName = substr(strrchr($content, '/'), 1);
                $path = $this->_process($pictureName);
                if (!is_null($path)) {
                    file_put_contents($path.DIRECTORY_SEPARATOR.$pictureName, file_get_contents($content));
                }
            }
        }

        $this->info('Script finish');
        return 0;
    }

    private function _process($pictureName)
    {
        $path = null;
        $exploded = explode('_', $pictureName);
        if (preg_match('/SetLogo/', $pictureName)) {
            $collectionSlug = ArrayHelper::check(1, $exploded);
        } else {
            $collectionSlug = ArrayHelper::check(0, $exploded);
        }
        if (!is_null($collectionSlug)) {
            $path = public_path('files/'.$collectionSlug);
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            } elseif (!is_writable($path)) {
                chmod($path, 0777);
            }
        }

        return $path;
    }
}
