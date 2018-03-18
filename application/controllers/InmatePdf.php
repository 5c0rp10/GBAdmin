<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */

require APPPATH . '/libraries/BaseController.php';
require APPPATH . '/libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;


class InmatePdf extends BaseController
{
  public function __construct()
   {
       parent::__construct();
       $this->load->model('inmate_model');
       $this->isLoggedIn();
   }

  public function index()
  {

// reference the Dompdf namespace

  }
  public function pdf($userId = NULL)
  {
                if($userId == null)
           {
               redirect('inmateListing');
           }

           $data['userInfo'] = $this->inmate_model->getUserInfo($userId);

// instantiate and use the dompdf class
$options = new Options();
$options->setIsRemoteEnabled(true);
$dompdf = new Dompdf($options);
$pdf = $this->load->view("makepdf", $data, true);

$dompdf->loadHtml($pdf);

// (cairo_font_options_get_antialias(options)l) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('inmate_'.$userId.'.pdf',array('Attachment'=>0));

  }
}

 ?>
