<?php

namespace app\helpers;

use Knp\Snappy\Pdf; 
use Yii;

class PdfHelper
{
    public $snappy;

    const BinaryPath = '/usr/local/bin/wkhtmltopdf';

    public function __construct()
    {
        $this->snappy = new Pdf();
        $this->snappy->setBinary( self::BinaryPath );
    }

    public function openInBrowser( $url, $options = [] )
    {
        header('Content-Type: application/pdf');

        if ( !empty( $options ))
            foreach ( $options as $key => $value )
                $this->_setOption( $key, $value );

        echo $this->snappy->getOutput( $url );
    }

    public function writeFromHtml( $html, $fileName = '', $options = [] )
    {
        if ( empty( $fileName ))
            $fileName = 'file';

        $filePath = Yii::getAlias('@app/../storage/downloads/') . $fileName;

        $this->_setOption('disable-external-links', $options['skip-cdn']);
        $this->_setOption('user-style-sheet', $options['css']);
        $this->_setOption('run-script', $options['js']);
        $this->_setOption('minimum-font-size', 24);

        $this->snappy->generateFromHtml( $html, $filePath, [], true );

        return $filePath;
    }

    public function writeForDownload( $url, $fileName )
    {
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename='{$fileName}.pdf'");

        echo $this->snappy->getOutput($url);
    }

    private function _setOption($name, $value = null)
    {
        // Type wkhtmltopdf -H to see the list of options
        $this->snappy->setOption($name, $value);
    }

    private function _resetOptions()
    {
        // Reset options
        $this->snappy->resetOptions();
    }
}