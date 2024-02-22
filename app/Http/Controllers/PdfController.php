<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFWithImageFromVar;
use Illuminate\Http\Request;
use FPDF;
use JetBrains\PhpStorm\NoReturn;
use Picqer\Barcode\BarcodeGeneratorPNG;
class PdfController extends Controller
{
    #[NoReturn] public function generatePDF(): void
    {
        // Configurar dimensiones de la página (cuarto de hoja tamaño carta)
        $pdf = new PDFWithImageFromVar('P', 'mm', 'Letter');
        $pdf->AddPage();

// Configurar margen izquierdo y superior
        $pdf->SetLeftMargin(15);
        $pdf->SetTopMargin(15);

// Ancho y alto de la credencial (hazla un poco más grande)
        $anchoCredencial = 160; // Ajusta según sea necesario
        $altoCredencial = 100;   // Ajusta según sea necesario

// Coordenadas del borde superior izquierdo de la credencial
        $x = 15;
        $y = 15;

// Dibujar borde de la credencial
        $pdf->Rect($x, $y, $anchoCredencial, $altoCredencial);

// Agregar logo de LICONSA con tamaño reducido
        $pdf->Image(public_path('img/logo_liconsa.jpg'), $x + 5, $y + 5, 30); // Ancho y alto reducidos a 30
        $pdf->Image(public_path('img/logo-mexico.png'), $x + $anchoCredencial - 45, $y + 5, 40);

// Configurar fuente y tamaño para los datos del beneficiario
        $pdf->SetFont('Arial', '', 10);

// Agregar nombre completo del beneficiario
        $pdf->Text($x + 5, $y + 50, 'Nombre: ' . '$nombreCompleto');

// Agregar cantidad de beneficiarios
        $pdf->Text($x + 5, $y + 60, 'Cant de Beneficiarios: ' . '$cant_beneficiarios');

// Agregar fecha de expedición
        $pdf->Text($x + 5, $y + 70, 'Fecha de expedicion: ' . '$fecha_exp');

// Agregar texto informativo o cualquier otro detalle
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Text($x + 5, $y + 90, 'Esta credencial es valida hasta la fecha de vencimiento.');

// Agregar texto "Sello de validez"
        $anchoTexto = $pdf->GetStringWidth('Sello de validez'); // Obtener el ancho del texto

        $pdf->Line($x + $anchoCredencial - $anchoTexto - 35, $y + 65, $x + $anchoCredencial - 8, $y + 65);
// Generar código de barras

        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode('123456789', $generator::TYPE_CODE_128);
        file_put_contents('img/barcode.png', $barcode);
        $pdf->Image('img/barcode.png',$x + $anchoCredencial - 50, $y + 78, 40, 20,'PNG');
// Asumiendo que quieres el código de barras justo encima de "Sello de validez"
// Ajusta las coordenadas x, y según sea necesario, así como el ancho y alto del código de barras
      //  $pdf->MemImage($barcode, $x + $anchoCredencial - 100, $y + 65, 40, 20);

        // Continúa con el sello de validez y el resto del PDF
        $pdf->Text($x + $anchoCredencial - $anchoTexto - 20, $y + 70, 'Sello de validez');

        // Salida del PDF
        $pdf->Output();
        exit;
    }
}
