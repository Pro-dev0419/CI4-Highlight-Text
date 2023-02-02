<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PdfController extends BaseController
{
    public function index()
    {
        $Pdf = new \App\Models\Pdf();
        $data = $Pdf->findAll();
        return view("home-view", ["pdfs" => $data]);
    }

    public function upload()
    {
        $file = $_FILES["pdf-file"];
        if (!$file['size']) {
            return redirect()->to("/");
        }
        $target_dir = "uploads/";
        $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $filename = random_int(1000000000, 10000000000) . "." . $ext;
        $target_file = $target_dir . basename($filename);
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($filename)) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $Pdf = new \App\Models\Pdf();
        $Pdf->insert([
            "name" => $target_file
        ]);
        return redirect()->to("/");
    }

    public function show($id = false)
    {
        $PdfModel = new \App\Models\Pdf();
        $pdf = $PdfModel->find($id);
        $parser = new \Smalot\PdfParser\Parser();
        $PDFfile = $pdf['name'];
        $PDF = $parser->parseFile($PDFfile);
        $PDFContent = $PDF->getText();
        $data = ['pdf' => $PDFContent, 'pdf_id' => $id];
        print_r(json_encode($data, true));
        // return view('pdf-view', ['pdf' => $PDFContent, 'pdf_id' => $id]);
    }

    public function save()
    {
        $data = $_POST;
        $Test = new \App\Models\Test();
        $Test->where('pdf_id', $data['pdf_id'])->delete();
        foreach ($data['elements'] as $item) {
            $Test->insert([
                'pdf_id' => $data['pdf_id'],
                'start_offset' => $item['start'],
                'end_offset' => $item['end'],
            ]);
        }
        echo 'success';
    }

    public function tests($id = false)
    {
        $Test = new \App\Models\Test();
        $data = $Test->where('pdf_id', $id)->findAll();
        $data = json_encode($data, true);
        print_r($data);
    }
}