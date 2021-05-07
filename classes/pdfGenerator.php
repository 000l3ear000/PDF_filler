<?php

namespace Classes;

if ( !defined("ACCESSCHECK") ){
    die("Access not permitted");
}
use mikehaertl\pdftk\Pdf;


class pdfGenerator {

    public function generate($data) {

        $filename = 'pdf_' . rand(2000, 1200000) . '.pdf';
        $pdf = new Pdf('F:\wamp64\www\php\PDF reader\test.pdf');
        $res = $pdf->fillForm($data)
        ->flatten()
        ->saveAs('./completed/' . $filename);
    
        return $filename;
    }
}
