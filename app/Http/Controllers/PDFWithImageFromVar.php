<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use FPDF;
class PDFWithImageFromVar extends FPDF
{
    function MemImage($data, $x = null, $y = null, $w = 0, $h = 0, $type = 'PNG'): void {
        if ($x === null) {
            $x = $this->GetX();
        }
        if ($y === null) {
            $y = $this->GetY();
        }
        $data = base64_decode($data);
        $this->Image($data, $x, $y, $w, $h, $type);
    }
}
