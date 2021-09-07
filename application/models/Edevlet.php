<?php
class Edevlet extends ActiveRecord\Model
{

    public static function new_token() {
            try {
		        $postdata = http_build_query(
				    array(
				        'assoscmd' => 'cfsession',
				        'rtype' => 'json',
				        'fskey' => 'intvrg.fix.session',
				        'fuserid' => 'INTVRG_FIX'
				    )
				);
				$opts = array('http' =>
				    array(
				        'method'  => 'POST',
				        'header'  => 'Content-Type: application/x-www-form-urlencoded',
				        'content' => $postdata
				    )
				);

				$context  = stream_context_create($opts);
				$result = file_get_contents('https://ivd.gib.gov.tr/tvd_server/assos-login', false, $context);
                $datas=json_decode($result,false);
                if($result->error!=1 && $result!=null) {
                    return $datas;
                } else {
                    throw new Exception('Hata');
                }

            } catch (Exception $e) {
                $return= array(
                    'status'=>'error',
                    'message'=>$e->getMessage()
                );
                return (object)$return; 
            }
            
    }


    public static function vkn_sorgu($vkn,$vd,$il) {
        $token = Edevlet::new_token();

        if($token->status=='error') {
            $return= array(
                'status'=>'error',
                'message'=>$token->message
            );
            return (object)$return; 
        }
        $jp=json_encode(array(
            "dogrulama"=>array(
                "vkn1"=>$vkn,
                "tckn1"=>"",
                "iller"=>$il,
                "vergidaireleri"=>$vd
            )
        ));
        $data_string="cmd=vergiNoIslemleri_vergiNumarasiSorgulama&callid=ff81dd010b12d-8&pageName=R_INTVRG_INTVD_VERGINO_DOGRULAMA&token=".$token->token."&jp=".$jp;
        try {
            $postdata = http_build_query(
			    array(
			        'cmd' => 'vergiNoIslemleri_vergiNumarasiSorgulama',
			        'callid' => 'ff81dd010b12d-8',
			        'pageName' => 'R_INTVRG_INTVD_VERGINO_DOGRULAMA',
			        'token' => $token->token,
			        'jp'=>$jp
			    )
			);
			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-Type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);

			$context  = stream_context_create($opts);
			$result = file_get_contents('https://ivd.gib.gov.tr/tvd_server/dispatch', false, $context);
            if($result!='' && $result!=null) {
                $datas=json_decode($result,false);
                return $datas;
            } else {
                throw new Exception('Hata');
            }
            
        } catch (Exception $e) {
            $return= array(
                'status'=>'error',
                'message'=>$e->getMessage()
            );
            return $return; 
        }
        
    }

}