<?php


namespace App;

use Gears\Pdf;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
require_once '../public/gears/src/Pdf.php';


use PhpOffice\PhpWord\Settings;
use setasign\Fpdi\Fpdi;

class GenerateContract
{
    protected $template;
    protected $outputFile;
    protected $data;

    public function __construct(array $data)
    {
        $this->setTemplate('template.docx');
        $this->setData($data);
        $this->generate();
        $this->getOutputFile();
    }
    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    private function getTemplate(): string
    {
        return $this->template;
    }

    public function JoinPDF($files, $outputFile){
        $fpdi = new Fpdi();
        // merger operations
        foreach ($files as $file) {
            $filename  = $file;
            $filepages = 'all';
            $fileorientation =  'P';

            $count = $fpdi->setSourceFile($filename);

            //add the pages
            if ($filepages == 'all') {
                for ($i=1; $i<=$count; $i++) {
                    $template   = $fpdi->importPage($i);
                    $size       = $fpdi->getTemplateSize($template);

                    $fpdi->AddPage($fileorientation, $size);
                    $fpdi->useTemplate($template);
                }
            }
        }
        if ($fpdi->Output($outputFile, 'D') == '') {
            return true;
        } else {
          die("error");
        }

    }

    private function generate()
    {
//        $template = new TemplateProcessor($this->getTemplate());
//
//        foreach ($this->data["fields"] as $field => $value){
//            $template->setValue("\${{$field}}", $value);
//        }
//
//        $template->cloneBlock('table_block', count($this->data['table']));
//        $template->cloneRowAndSetValues('name', $this->data['table'][0]);
//        $template->cloneRowAndSetValues('name', $this->data['table'][1]);
////        $template->cloneRowAndSetValues('name', $this->data['table'][2]);
//
        //        $template->saveAs('temp1.docx');
        $filename = "x_contract.pdf";

        $wordPdf= IOFactory::load('x_contract.docx');

//
////        //Save it
////        try {
//        // or dompdf
//            Settings::setPdfRendererPath('../vendor/tecnickcom/tcpdf');
//            Settings::setPdfRendererName('TCPDF');
////            $xmlWriter = IOFactory::createWriter($wordPdf, 'PDF');
////        } catch (Exception $e) {
////            var_dump($e->getMessage());
////        }
////        $xmlWriter->save($filename);
        Pdf::convert('x_contract.docx', 'rezultatix.pdf');

//        $pdfWriter = IOFactory::createWriter($wordPdf , 'PDF');
////        $pdfWriter->setFont('Time');
//        $pdfWriter->save($filename.".pdf");
//        unlink($wordPdf);
//        $this->JoinPDF(['file1.pdf','file2.pdf'], 'output.pdf');
//        $this->setOutputFile(basename($filename));
    }

    public function getOutputFile(): void
    {

    }

    public function setOutputFile($outputFile): void
    {
        $this->outputFile = $outputFile;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

}