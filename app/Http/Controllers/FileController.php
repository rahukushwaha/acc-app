<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{

    public function readFile($filename)
    {
        $disk = base_path('uploads/PurchaseInvoice/').$filename;
        // Check if the file exists
        if (Storage::disk($disk)->exists($filename)) {
            // Get the file path
            $filePath = Storage::disk($disk)->path($filename);

            // Determine the MIME type of the file (you may customize this based on your file types)
            $mimeType = Storage::disk($disk)->mimeType($filename);

            // Generate a response to return the file to the browser
            $response = new StreamedResponse(function () use ($filePath) {
                // Open the file for reading
                $file = fopen($filePath, 'rb');

                // Send the file content to the browser in chunks
                while (!feof($file)) {
                    echo fread($file, 1024);
                    flush();
                }

                // Close the file
                fclose($file);
            });

            // Set the response headers
            $response->headers->set('Content-Type', $mimeType);
            $response->headers->set('Content-Disposition', 'inline; filename="' . $filename . '"');

            return $response;
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }
}
