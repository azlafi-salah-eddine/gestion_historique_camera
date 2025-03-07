<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Demande;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function downloadDemandePDF($id)
    {
        $demande = Demande::with('employe', 'concernes.camera')->findOrFail($id);

        // Chemin de l'image du logo
        $path = public_path('photos/logo-MSISF.png');

        // Convertir l'image en base64
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // Création du contenu HTML pour le PDF
        $html = '<html>';
        $html .= '<head>';
        $html .= '<style>';
        $html .= 'body { font-family: Arial, sans-serif; margin: 20px; }';
        $html .= '.header { text-align: center; margin-bottom: 20px; }';
        $html .= '.logo { width: auto; height: 150px; margin-bottom: 20px; }';
        $html .= 'h2, h3 { margin: 0; padding: 0; }';
        $html .= 'h2 { font-size: 16px; }';
        $html .= '.content { margin-top: 40px; }';
        $html .= '.content p { font-size: 14px; margin: 5px 0; padding-left: 20px; }';
        $html .= 'table { width: 100%; border-collapse: collapse; margin-top: 20px; }';
        $html .= 'th, td { border: 1px solid black; padding: 8px; text-align: center; font-size: 10px; }';
        $html .= 'th.nom-camera, td.nom-camera { width: 50px; }';
        $html .= '.signature { margin-top: 40px; text-align: center; font-size: 14px; }';
        $html .= '</style>';
        $html .= '</head>';
        $html .= '<body>';
        $html .= '<div class="header">';
        $html .= '<img src="' . $base64 . '" alt="Logo" class="logo">';
        $html .= '</div>';
        $html .= '<div class="content">';
        $html .= '<p class="strong"><strong>Objet :</strong> ' . $demande->Objet . '</p>';
        $html .= '<p class="strong"><strong>Réf :</strong> ' . $demande->Reff . '</p>';
        $html .= '<p class="strong"><strong>Nom de demandeur :</strong>' . $demande->employe->Nom_emp . ' ' . $demande->employe->Prenom_emp . '</p>';
        $html .= '<p class="strong"><strong>Date d\'opération :</strong>' . Carbon::parse($demande->Date_operation)->format('y/m/d') . '</p>';
        $html .= '<p class="strong"><strong>Sauvegarde :</strong>' . ($demande->Sauvegarder ? 'Oui' : 'Non') . '</p>';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>Nom des Caméras</th>';
        $html .= '<th>Début d\'enregistrement</th>';
        $html .= '<th>Fin d\'enregistrement</th>';
        $html .= '<th>Lieu</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($demande->concernes as $concerne) {
            $html .= '<tr>';
            $html .= '<td>' . $concerne->camera->Nom_c;
            $html .= '<td>' . Carbon::parse($concerne->Debut_sauv)->format('y/m/d H:i') . '</td>';
            $html .= '<td>' . Carbon::parse($concerne->Fin_sauv)->format('y/m/d H:i') . '</td>';
            $html .= '<td>' . $concerne->camera->Site . '</td>';
            $html .= '</tr>';
        }
        ;
        $html .= '</tbody>';
        $html .= '</table>';
        if ($demande->Sauvegarder && $demande->But) {
            $html .= '<p class="strong"><strong>But :</strong> ' . $demande->But . '</p>';
        }
        $html .= '<div class="signature">';
        $html .= '<p>Signature de demandeur</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</body>';
        $html .= '</html>';

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('demande_' . $demande->Id_de . '.pdf');
    }
}
