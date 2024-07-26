<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class pdfController extends Controller
{
    public function index(){
        return view("unir-pdf.index");
    }


    public function merge(Request $request){

        $request->validate([
            "files" => ["required", "array"],
            "order" => ["required", "array"]
        ]);



       $oMerger = PDFMerger::init();
       $order = $request->all()['order'];
       $files = $request->file('files');

       foreach ($order as $num_pdf) {
           $oMerger->addPDF($files[intval($num_pdf)], 'all');
       }

       $oMerger->merge();

       Storage::makeDirectory('temp');

       $filename = "merge_" . time() . '.pdf';
       $oMerger->save(storage_path('app/temp' . $filename));

       return response()->json($filename);       
    }

    public function getPDF(string $filename)
    {
        return response()->file(storage_path('app/temp/' . $filename));
    }

    public function downloadPdf(string $filename)
    {
        return response()->download(storage_path('app/temp/' . $filename));
    }
}
