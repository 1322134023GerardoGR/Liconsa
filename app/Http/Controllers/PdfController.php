<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFWithImageFromVar;
use App\Models\beneficiario;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use FPDF;
use JetBrains\PhpStorm\NoReturn;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Intervention\Image\Facades\Image;

// Importa la clase Image de Intervention


class PdfController extends Controller
{
    #[NoReturn] public function generatePDF($id): void
    {

        $beneficiario = beneficiario::find($id);
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
        $x = 10;
        $y = 10;

// Dibujar borde de la credencial
        $pdf->Rect($x, $y, $anchoCredencial, $altoCredencial);

// Agregar logo de LICONSA con tamaño reducido
        $pdf->Image(public_path('img/logo_liconsa.jpg'), $x + 5, $y + 5, 20);
        $pdf->Image(public_path('img/logo-mexico.png'), $x + 45, $y + 5, 40);

// Configurar fuente y tamaño para los datos del beneficiario
        $pdf->SetFont('Arial', '', 10);

// Agregar nombre completo del beneficiario
        $pdf->Text($x + 5, $y + 38, 'Nombre: ' . $beneficiario->nombre . ' ' . $beneficiario->apellido_p . ' ' . $beneficiario->apellido_m);

// Agregar cantidad de beneficiarios
        $pdf->Text($x + 5, $y + 48, 'Cant de Beneficiarios: ' . $beneficiario->n_dependientes);

        $pdf->Text($x + 5, $y + 58, 'Numero de Lecheria: ' . $beneficiario->num_lecheria);

        //$cantidad_dotacion=$cant_beneficiarios*2;
        $cantidad_dotacion = $beneficiario->n_dependientes * 2;

        $pdf->Text($x + 5, $y + 68, 'Dotacion: ' . $cantidad_dotacion . ' Lts');

        $pdf->Text($x + 5, $y + 78, 'Dias de Asistencia: ' . $beneficiario->d_recoleccion);

        $pdf->SetFont('Arial', 'I', 8);
// Agregar fecha de expedición
        $date = Carbon::now('America/Mexico_City');
        $pdf->Text($x + 5, $y + 85, 'Fecha de expedicion: ' . $date->format('d-m-Y'));
        $imagePath = public_path('img/usuario.jpeg');
        $image = Image::make($imagePath);

        // Obtener las dimensiones de la imagen
        $imageWidth = $image->width();
        $imageHeight = $image->height();

        // Calcular las coordenadas para recortar el centro de la imagen
        $cropWidth = 80; // Ancho deseado
        $cropHeight = 80; // Alto deseado
        $cropX = ($imageWidth - $cropWidth) / 2;
        $cropY = ($imageHeight - $cropHeight) / 2;

        // Recortar la imagen al centro
        $croppedImage = $image->crop($cropWidth, $cropHeight, $cropX, $cropY);

        // Guardar la imagen recortada temporalmente
        $croppedImagePath = public_path('img/temp_cropped_usuario.jpeg');
        $croppedImage->save($croppedImagePath);

        // Insertar la imagen recortada en el PDF
        $pdf->Image($croppedImagePath, $x + $anchoCredencial - 50, $y + 30, 80);
        $pdf->Rect($x + $anchoCredencial - 50, $y + 30, 40, 40, 'D');

// Agregar texto informativo o cualquier otro detalle
        $fecha_vencimiento = $date; // Crea un objeto DateTime
        $intervalo = new DateInterval('P1Y'); // Crea un intervalo de 1 mes
        $fecha_vencimiento->add($intervalo); // Añade el intervalo a la fecha

        $pdf->Text($x + 5, $y + 90, 'Esta credencial es valida hasta la fecha de vencimiento: ');// Crea un objeto DateTime
        $pdf->Text($x + 5, $y + 95, $fecha_vencimiento->format('d-m-Y'));  // Muestra la nueva fecha
        // Generar código de barras

        $generator = new BarcodeGeneratorPNG();
        $code = $beneficiario->folio_cb;
        $barcode = $generator->getBarcode($code, $generator::TYPE_CODE_128);
        file_put_contents('img/barcode.png', $barcode);
        $pdf->Image('img/barcode.png', $x + $anchoCredencial - 50, $y + 82, 40, 10, 'PNG');
        $pdf->Text($x + 123, $y + 96, $code);

        // Salida del PDF
        $pdf->Output();
        exit;
    }
}
