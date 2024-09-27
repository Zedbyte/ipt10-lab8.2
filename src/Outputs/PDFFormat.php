<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        // Initialize PDF
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();

        $this->pdf->SetFont('Arial', 'B', 18);
        $this->pdf->SetTextColor(33, 37, 41); 
        $this->pdf->Cell(0, 15, 'Profile of ' . $profile->getName(), 0, 1, 'C');
        
        $imageUrl = 'https://www.auf.edu.ph/home/images/articles/bya.jpg'; 
        $this->pdf->Image($imageUrl, 85, 30, 40); 
        $this->pdf->Ln(60); 
        
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell(0, 10, 'Story', 0, 1, 'L');
        
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(50, 50, 50); 
        $this->pdf->MultiCell(0, 10, $profile->getStory(), 0, 'L');
    }

    public function render()
    {
        // Output PDF to browser or save to file
        return $this->pdf->Output();
    }
}
