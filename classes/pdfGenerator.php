<?php

namespace Classes;

if ( !defined("ACCESSCHECK") ){
    die("Access not permitted");
}

use mikehaertl\pdftk\Pdf;


class pdfGenerator {

    public function generate($data) {

        $filename = 'pdf_' . rand(2000, 1200000) . '.pdf';
        $pdf = new Pdf('test.pdf');
        $res = $pdf->fillForm($data)
        ->saveAs('./completed/' . $filename);
    
        return $filename;
    }
}
