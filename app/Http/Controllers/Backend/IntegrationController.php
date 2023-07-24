<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Excel;
use file;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class IntegrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('backend.integration');
    }

    public function imortexcel_insert(Request $request){   
    // echo "Hello";exit;    
        $get_allusers = DB::table('users')->get()->toarray();
        foreach($get_allusers as $v){
            $vget[] = $v->email;
        }
        
        $this->validate($request, [
           'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('uploaded_file');
       
        $spreadsheet = IOFactory::load($the_file->getRealPath());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range( 2, $row_limit );
        $column_range = range( 'E', $column_limit );
        $startcount = 0;
        $data = array();
        $ontraport_id = array();
        $duplicate = array();
        foreach ( $row_range as $row ) {
            if(in_array($sheet->getCell( 'C' . $row )->getValue(),$vget)){
                $duplicate[] =   $sheet->getCell( 'C' . $row )->getValue();              
            }else{
                $data[] = [
                    'name' =>$sheet->getCell( 'A' . $row )->getValue(),
                    'lastname' => $sheet->getCell( 'B' . $row )->getValue(),
                    'email' => $sheet->getCell( 'C' . $row )->getValue(),
                    'phone' => $sheet->getCell( 'D' . $row )->getValue(),
                    'password' => $sheet->getCell( 'E' . $row )->getValue(),
                ];

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'firstname='.$sheet->getCell( 'A' . $row )->getValue().'&lastname='.$sheet->getCell( 'B' . $row )->getValue().'&email='.$sheet->getCell( 'C' . $row )->getValue().'&office_phone='.$sheet->getCell( 'D' . $row )->getValue().'&Password_259='.$sheet->getCell( 'E' . $row )->getValue().'',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                        'Accept: application/json',
                        'Api-Appid: 2_6929_bCscgdVwQ',
                        'Api-Key: CdLnV6OitztlmdU'
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $decode_response = json_decode($response);
                $ontraport_id[] = $decode_response->data->id;
                $startcount++;
            }
        }        
       
        $count_data = count($data);
        $newarray = array();
        for($i=0; $i<=$count_data-1; $i++){
            $newarray[]=[
                'name'=>$data[$i]['name'],
                'lastname'=>$data[$i]['lastname'],
                'email'=>$data[$i]['email'],
                'phone'=>$data[$i]['phone'],
                'password'=>$data[$i]['password'],
                'ontra_id'=>$ontraport_id[$i],
            ];
        }
        $insert = DB::table('users')->insert($newarray);
        if($insert){
            $response["status"] = 1;            
            $response["msg"] = 'Data updated successfully';
            return response($response);
            //echo json_encode($response);          
        }else{
            $response['status'] = 2;
            $response['msg'] = 'Data not updated successfully';
            echo json_encode($response);
        }
    }
    

  


    
}
    