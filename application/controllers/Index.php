<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller
{	
	public function __construct()
    {
        parent::__construct();

    }
	public function index()
	{
		$this->theme_view = 'site';
		
		$this->content_view = 'site/index';
	}

	public function getVD() {
		$this->theme_view = 'blank';
		if(!$this->input->is_ajax_request()) {
			exit;
		}

		$sehir = $this->input->post('sehir',TRUE);
		$v_daireleri = getVergiDaireleri($sehir);
		if($v_daireleri) {
			$json['data']=' <select id="vds" class="form-control">';
			foreach($v_daireleri as $vd) {
				$json['data'].=' <option value="'.$vd['kod'].'">'.$vd['vdadi'].'</option>';
			}
			$json['data'].='</select>';
			$json['status']=200;
		} else {
			$json['data']='';
			$json['status']=400;
		}
		
		echo json_encode($json);
	}

	public function sorgu() {
		$this->theme_view = 'blank';
		if(!$this->input->is_ajax_request()) {
			exit;
		}

		$sehir = $this->input->post('sehir',TRUE);
		$vd = $this->input->post('vd',TRUE);
		$vkn = $this->input->post('vkn',TRUE);
		$vergiSorgula = getVergiDetail($vkn,$vd,$sehir);
		if($vergiSorgula) {
			$json['data']='
			<div style="width:100%;margin-top: 10px;" class="alert alert-success" role="alert">
			  	<table class="table">
				  <tbody>
				    <tr>
				      <th scope="row">VKN</th>
				      <td>'.$vergiSorgula->data->vkn.'</td>
				      <th scope="row">ÜNVAN</th>
				      <td>'.$vergiSorgula->data->unvan.'</td>
				    </tr>
				    <tr>
				      <th scope="row">Vergi Dairesi</th>
				      <td>'.getVergiDaireleri($sehir,$vergiSorgula->data->vdkodu).'</td>
				      <th scope="row">Durumu</th>
				      <td>'.$vergiSorgula->data->durum_text.'</td>
				    </tr>
				    <tr>
				  </tbody>
				</table>
			</div>
			';
			$json['status']=200;
		} else {
			$json['data']='';
			$json['status']=400;
		}
		echo json_encode($json);
	}

}