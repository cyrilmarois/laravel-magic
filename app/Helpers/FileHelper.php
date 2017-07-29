<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class FileHelper
{
    public static function listDirFiles($directory)
    {
        try {
            Log::info('Trace in '.__METHOD__);
    
            if (!is_dir($directory)) {
                $response = Response()->json($directory . ' not found', Response::HTTP_NOT_FOUND);
                throw new HttpResponseException($response, Response::HTTP_NOT_FOUND);
            }
            
            $files = [];
            $tmpFiles = array_diff(scandir($directory), array('..', '.'));
            foreach ($tmpFiles as $tmpFile) {
                if (is_file($directory.DIRECTORY_SEPARATOR.$tmpFile)) {
                    $files[] = $tmpFile;
                }
            }

            return $files;
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            return $e->getResponse();
        }
    }
}