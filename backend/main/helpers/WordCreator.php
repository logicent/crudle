<?php

namespace crudle\app\main\helpers;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class WordCreator
{
    public $wordDoc;

    public function __construct()
    {
        // Creating the new document...
        $this->wordDoc = new PhpWord();
    }

    public function addSection( $text )
    {
        // Add empty Section to the document...
        $section = $this->wordDoc->addSection();
        // Add Text element to the Section...
        $section->addText( $text, [
            // 'name' => 'Tahoma', // 'Verdana', 'Arial', 'Georgia', 'Times New Roman'
            'size' => 12,
            // 'color' => '#0812AE',
            // 'bold' => true
        ] );
    }

    public function saveWordDoc( $fileName, $fileExt = '.docx', $fileFormat = 'Word2007' )
    {
        // Saving the document as file...
        $objWriter = IOFactory::createWriter( $this->wordDoc, $fileFormat );
        $objWriter->save( $fileName . $fileExt );
    }
}