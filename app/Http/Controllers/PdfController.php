<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use FPDF;
use JetBrains\PhpStorm\NoReturn;
use setasign\Fpdi\Fpdi;
class PdfController extends Controller
{
    #[NoReturn] public function generatePDF(): void
    {
        // Configurar dimensiones de la página (cuarto de hoja tamaño carta)
        $pdf = new FPDF('P', 'mm', 'Letter');
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

// Agregar CURP del beneficiario
        $pdf->Text($x + 5, $y + 60, 'CURP: ' . '$curp');

// Agregar cantidad de beneficiarios
        $pdf->Text($x + 5, $y + 70, 'Cant de Beneficiarios: ' . '$cant_beneficiarios');

// Agregar fecha de expedición
        $pdf->Text($x + 5, $y + 80, 'Fecha de expedicion: ' . '$fecha_exp');

// Agregar texto informativo o cualquier otro detalle
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Text($x + 5, $y + 90, 'Esta credencial es válida hasta la fecha de vencimiento.');

// Agregar texto "Sello de validez"
        $anchoTexto = $pdf->GetStringWidth('Sello de validez'); // Obtener el ancho del texto
        $pdf->Text($x + $anchoCredencial - $anchoTexto - 20, $y + 80, 'Sello de validez'); // Agregar texto

// Dibujar una línea horizontal justo sobre el texto "Sello de validez"
        $pdf->Line($x + $anchoCredencial - $anchoTexto - 35, $y + 76, $x + $anchoCredencial - 8, $y + 76);

// Salida del PDF
        $pdf->Output();
        exit;
    }
}
