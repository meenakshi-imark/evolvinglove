<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Excel;
use file;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;


class UploadController extends Controller
{
    public function index(){
       
        return view('backend.content-upload');
    }

    public function upload(Request $request){
        $the_file = $request->file('uploaded_file');
        $spreadsheet = IOFactory::load($the_file->getRealPath());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range( 2, 9 );
        $column_range = range( 'I', 9 );
        $startcount = 0;
        $data = array();
        foreach ( $row_range as $row ) {
            $data[] = [
                'possibility' =>$sheet->getCell( 'B' . $row )->getValue(),
                'appreciation' => $sheet->getCell( 'C' . $row )->getValue(),
                'truth' => $sheet->getCell( 'D' . $row )->getValue(),
                'harmony' => $sheet->getCell( 'E' . $row )->getValue(),
                'freedom' => $sheet->getCell( 'F' . $row )->getValue(),
                'devotion' => $sheet->getCell( 'G' . $row )->getValue(),
                'passion' => $sheet->getCell( 'H' . $row )->getValue(),
                'partnership' => $sheet->getCell( 'I' . $row )->getValue(),
            ];
        }
        // echo'<pre>';print_r($data);echo'</pre>';exit();

        $a =0;
        for($i=0; $i<count($data); $i++){
            $a++;
            $updatedata = DB::table('lookup_texts')->where('id',$a)->update($data[$i]);
        }

        
        $row_range1    = range( 12, 19);
        foreach ( $row_range1 as $row1 ) {
            $data1[] = [
                'complaint' =>$sheet->getCell( 'B' . $row1 )->getValue(),
                'defense' => $sheet->getCell( 'C' . $row1 )->getValue(),
                'control' => $sheet->getCell( 'D' . $row1 )->getValue(),
                'collapse' => $sheet->getCell( 'E' . $row1 )->getValue(),
                'avoidance' => $sheet->getCell( 'F' . $row1 )->getValue(),
                'anxious' => $sheet->getCell( 'G' . $row1 )->getValue(),
                'addiction' => $sheet->getCell( 'H' . $row1 )->getValue(),
                'dependence' => $sheet->getCell( 'I' . $row1 )->getValue(),
            ];
        }
        $b =0;
        for($j=0; $j<count($data1); $j++){
            $b++;
            $updatedata1 = DB::table('shadow_lookup_texts')->where('id',$b)->update($data1[$j]);
        }

        $column_range1 = range( 'I', 14 );
        $row_range2    = range(22, 29);
        foreach ( $row_range2 as $row2 ) {
            $data2[] = [
                'primary_gift' =>$sheet->getCell( 'B' . $row2 )->getValue(),
                'primary_qualities' => $sheet->getCell( 'C' . $row2 )->getValue(),
                'primary_theme' => $sheet->getCell( 'D' . $row2 )->getValue(),
                'relationship_skills_natural' => $sheet->getCell( 'E' . $row2 )->getValue(),
                'relationship_skills_develop' => $sheet->getCell( 'F' . $row2 )->getValue(),  
                'energetic_profile' => $sheet->getCell( 'G' . $row2 )->getValue(),  
                'energetic_gifts' => $sheet->getCell( 'H' . $row2 )->getValue(),  
                'primary_communication' => $sheet->getCell( 'I' . $row2 )->getValue(),  
                'primary_decision' => $sheet->getCell( 'J' . $row2 )->getValue(),  
                'primary_parenting' => $sheet->getCell( 'K' . $row2 )->getValue(),  
                'primary_erotic' => $sheet->getCell( 'L' . $row2 )->getValue(),  
                'resolution_stages' => $sheet->getCell( 'M' . $row2 )->getValue(), 
                'primary_strategy' => $sheet->getCell( 'N' . $row2 )->getValue(), 
            ];
        }
        // echo'<pre>';print_r($data2);echo'</pre>';exit();
        foreach($data2 as $d2){
            $data2_new[] = [
                'primary_gift' =>$d2['primary_gift'],
                'primary_qualities' => $d2['primary_qualities'],
                'primary_theme' => $d2['primary_theme'],
                'relationship_skills_natural' => $d2['relationship_skills_natural'],
                'relationship_skills_develop' => $d2['relationship_skills_develop'],  
                'energetic_profile' => $d2['energetic_profile'],
                'energetic_gifts' => $d2['energetic_gifts'],
                'primary_communication' => $d2['primary_communication'],
                'primary_decision' => $d2['primary_decision'],  
                'primary_parenting' => $d2['primary_parenting'],
                'primary_erotic' => $d2['primary_erotic'],
            ];
            $data2_new1[] = [
                'resolution_stages' => $d2['resolution_stages'],
                'primary_strategy' => $d2['primary_strategy'],
            ];
        }

       
        $c =0;
        for($k=0; $k<count($data2_new); $k++){
            $c++;
            $updatedata3 = DB::table('lookup_texts')->where('id',$c)->update($data2_new[$k]);
        }

        $d=0;
        for($l=0; $l<count($data2_new1); $l++){
            $d++;
            $updatedata4 = DB::table('shadow_lookup_texts')->where('id',$d)->update($data2_new1[$l]);
        }
       

        $column_range1 = range( 'I', 9 );
        $row_range3    = range(32, 39);
        foreach ( $row_range3 as $row3 ) {
        $data3[] = [
            'secondary_gift' =>$sheet->getCell( 'B' . $row3 )->getValue(),
            'secondary_qualities' => $sheet->getCell( 'C' . $row3 )->getValue(),
            'secondary_theme' => $sheet->getCell( 'D' . $row3 )->getValue(),
            'secondary_communication' => $sheet->getCell( 'E' . $row3 )->getValue(),
            'secondary_decision' => $sheet->getCell( 'F' . $row3 )->getValue(),
            'secondary_parenting' => $sheet->getCell( 'G' . $row3 )->getValue(),
            'secondary_erotic' => $sheet->getCell( 'H' . $row3 )->getValue(),
            'secondary_strategy' => $sheet->getCell( 'I' . $row3 )->getValue(),
        ];
        }

        foreach($data3 as $d3){
            $data3_new[] = [
                'secondary_gift' =>$d3['secondary_gift'],
                'secondary_qualities' => $d3['secondary_qualities'],
                'secondary_theme' => $d3['secondary_theme'],
                'secondary_communication' => $d3['secondary_communication'],
                'secondary_decision' => $d3['secondary_decision'],  
                'secondary_parenting' => $d3['secondary_parenting'],
                'secondary_erotic' => $d3['secondary_erotic'],
            ];
            $data3_new1[] = [
                'secondary_strategy' => $d3['secondary_strategy'],
            ];
        }
        $e =0;
        for($m=0; $m<count($data3_new); $m++){
            $c++;
            $updatedata4 = DB::table('lookup_texts')->where('id',$e)->update($data2_new[$m]);
        }

        $f=0;
        for($n=0; $n<count($data2_new1); $n++){
            $d++;
            $updatedata5 = DB::table('shadow_lookup_texts')->where('id',$f)->update($data3_new1[$n]);
        }

       
        $column_range2 = range( 'E', 5 );
        $row_range4    = range(42, 43);
        foreach ( $row_range4 as $row4 ) {
            $data4[] = [
                'about' =>$sheet->getCell( 'B' . $row4 )->getValue(),
                'feedback' => $sheet->getCell( 'C' . $row4 )->getValue(),
                'focus' => $sheet->getCell( 'D' . $row4 )->getValue(),
                'growth' => $sheet->getCell( 'E' . $row4 )->getValue(),
            ];
        }

        $g=0;
        for($o=0; $o<count($data4); $o++){
            $g++;
            DB::table('content_references')->where('id',$g)->update($data4[$o]);
        }
      
        $column_range3 = range( 'E', 5 );
        $row_range5    = range(46, 53);
        foreach ( $row_range5 as $row5 ) {
            $data5[] = [
                'emphasizing1' =>$sheet->getCell( 'B' . $row5 )->getValue(),
                'emphasizing2' => $sheet->getCell( 'C' . $row5 )->getValue(),
                'emphasizing3' => $sheet->getCell( 'D' . $row5 )->getValue(),
                'emphasizing4' => $sheet->getCell( 'E' . $row5 )->getValue(),
            ];
        }

        $h=0;
        for($p=0; $p<count($data5); $p++){
            $h++;
            DB::table('tendencies')->where('id',$h)->update($data5[$p]);
        }
       
        $column_range4 = range( 'B', 2 );
        $row_range6    = range(56, 59);
        foreach ( $row_range6 as $row6 ) {
            $data6[] = [
                'emphasizing' =>$sheet->getCell( 'B' . $row6 )->getValue(),
            ];
        }
        $aa = 0;
        for($q=0; $q<count($data6); $q++){
            $aa++;
            DB::table('communication_emphasizing')->where('id',$aa)->update($data6[$q]);
        }

        
        $column_range5 = range( 'B', 2 );
        $row_range7    = range(62, 65);
        foreach ( $row_range7 as $row7 ) {
            $data7[] = [
                'emphasizing' =>$sheet->getCell( 'B' . $row7 )->getValue(),
            ];
        }
        $bb=0;
        for($r=0; $r<count($data7); $r++){
            $bb++;
            DB::table('decision_emphasizing')->where('id',$bb)->update($data7[$r]);
        }
        

        $column_range6 = range( 'B', 2 );
        $row_range8    = range(68, 71);
        foreach ( $row_range8 as $row8 ) {
            $data8[] = [
                'emphasizing' =>$sheet->getCell( 'B' . $row8 )->getValue(),
            ];
        }
        $cc =0;
        for($s=0; $s<count($data8); $s++){
            $cc++;
            DB::table('parenting_emphasizing')->where('id',$cc)->update($data8[$s]);
        }
       

        $column_range7 = range( 'B', 2 );
        $row_range9    = range(74, 79);
        foreach ( $row_range9 as $row9 ) {
            $data9[] = [
                'emphasizing' =>$sheet->getCell( 'B' . $row9 )->getValue(),
            ];
        }

        $dd = 0;
        for($t=0; $t<count($data9); $t++){
            $dd++;
            DB::table('erotic_emphasizing')->where('id',$dd)->update($data9[$t]);
        }
        
       

        $column_range8 = range( 'R', 18 );
        $row_range10    = range(82, 89);
        foreach ( $row_range10 as $row10 ) {
            $data10[] = [
                'energetic_shadow' =>$sheet->getCell( 'B' . $row10 )->getValue(),
                'primary_shadow' =>$sheet->getCell( 'C' . $row10 )->getValue(),
                'primary_remedy' =>$sheet->getCell( 'D' . $row10 )->getValue(),
                'primary_decision_shadow' =>$sheet->getCell( 'E' . $row10 )->getValue(),
                'primary_decision_remedy' =>$sheet->getCell( 'F' . $row10 )->getValue(),
                'primary_parenting_shadow' =>$sheet->getCell( 'G' . $row10 )->getValue(),
                'primary_parenting_remedy' =>$sheet->getCell( 'H' . $row10 )->getValue(),
                'primary_erotic_shadow' =>$sheet->getCell( 'I' . $row10 )->getValue(),
                'primary_erotic_remedy' =>$sheet->getCell( 'J' . $row10 )->getValue(),
                'primary_qualities' =>$sheet->getCell( 'K' . $row10 )->getValue(),
                'toxic_cycle' =>$sheet->getCell( 'L' . $row10 )->getValue(),
                'primary_toxic_cycle' =>$sheet->getCell( 'M' . $row10 )->getValue(),
                'primay_toxic_remedy' =>$sheet->getCell( 'N' . $row10 )->getValue(),
                'primary_needs' =>$sheet->getCell( 'O' . $row10 )->getValue(),
                'primary_doubts' =>$sheet->getCell( 'P' . $row10 )->getValue(),
                'primary_trigger' =>$sheet->getCell( 'Q' . $row10 )->getValue(),
                'primary_conflict' =>$sheet->getCell( 'R' . $row10 )->getValue(),
            ];
        }
        foreach($data10 as $d10){
            $data10_new[] = [
                'energetic_shadow' =>$d10['energetic_shadow'],
                'primary_shadow' =>$d10['primary_shadow'],
                'primary_remedy' =>$d10['primary_remedy'],
                'primary_decision_shadow' =>$d10['primary_decision_shadow'],
                'primary_decision_remedy' =>$d10['primary_decision_remedy'],
                'primary_parenting_shadow' =>$d10['primary_parenting_shadow'],
                'primary_parenting_remedy' =>$d10['primary_parenting_remedy'],
                'primary_erotic_shadow' =>$d10['primary_erotic_shadow'],
                'primary_erotic_remedy' =>$d10['primary_erotic_remedy'],
            ];
            $data10_new1[] = [
                'primary_qualities' =>$d10['primary_qualities'],
                'toxic_cycle' =>$d10['toxic_cycle'],
                'primary_toxic_cycle' =>$d10['primary_toxic_cycle'],
                'primay_toxic_remedy' =>$d10['primay_toxic_remedy'],
                'primary_needs' =>$d10['primary_needs'],
                'primary_doubts' =>$d10['primary_doubts'],
                'primary_trigger' =>$d10['primary_trigger'],
                'primary_conflict' =>$d10['primary_conflict'],
            ];
        }

        $ee =0;
        for($u=0; $u<count($data10_new); $u++){
            $ee++;
            DB::table('lookup_texts')->where('id',$ee)->update($data10_new[$u]);
        }

        $ff=0;
        for($v=0; $v<count($data10_new1); $v++){
            $ff++;
            DB::table('shadow_lookup_texts')->where('id',$ff)->update($data10_new1[$v]);
        }


        $column_range9 = range( 'P', 16 );
        $row_range11    = range(92, 99);
        foreach ( $row_range11 as $row11 ) {
            $data11[] = [
                'secondary_shadow' =>$sheet->getCell( 'B' . $row11 )->getValue(),
                'secondary_remedy' =>$sheet->getCell( 'C' . $row11 )->getValue(),
                'secondary_decision_shadow' =>$sheet->getCell( 'D' . $row11 )->getValue(),
                'secondary_decision_remedy' =>$sheet->getCell( 'E' . $row11 )->getValue(),
                'secondary_parenting_shadow' =>$sheet->getCell( 'F' . $row11 )->getValue(),
                'secondary_parenting_remedy' =>$sheet->getCell( 'G' . $row11 )->getValue(),
                'secondary_erotic_shadow' =>$sheet->getCell( 'H' . $row11 )->getValue(),
                'secondary_erotic_remedy' =>$sheet->getCell( 'I' . $row11 )->getValue(),

                'secondary_qualities' =>$sheet->getCell( 'J' . $row11 )->getValue(),
                'secondary_toxic_cyle' =>$sheet->getCell( 'K' . $row11 )->getValue(),
                'secondary_toxic_remedy' =>$sheet->getCell( 'L' . $row11 )->getValue(),
                'secondary_needs' =>$sheet->getCell( 'M' . $row11 )->getValue(),
                'secondary_doubts' =>$sheet->getCell( 'N' . $row11 )->getValue(),
                'secondary_trigger' =>$sheet->getCell( 'O' . $row11 )->getValue(),
                'secondary_conflict' =>$sheet->getCell( 'P' . $row11 )->getValue(),
            ];
        }

        foreach($data11 as $d11){
            $data11_new[] = [
                'secondary_shadow' =>$d11['secondary_shadow'],
                'secondary_remedy' =>$d11['secondary_remedy'],
                'secondary_decision_shadow' =>$d11['secondary_decision_shadow'],
                'secondary_decision_remedy' =>$d11['secondary_decision_remedy'],
                'secondary_parenting_shadow' =>$d11['secondary_parenting_shadow'],
                'secondary_parenting_remedy' =>$d11['secondary_parenting_remedy'],
                'secondary_erotic_shadow' =>$d11['secondary_erotic_shadow'],
                'secondary_erotic_remedy' =>$d11['secondary_erotic_remedy'],
            ];
            $data11_new1[] = [
                'secondary_qualities' =>$d11['secondary_qualities'],
                'secondary_toxic_cyle' =>$d11['secondary_toxic_cyle'],
                'secondary_toxic_remedy' =>$d11['secondary_toxic_remedy'],
                'secondary_needs' =>$d11['secondary_needs'],
                'secondary_doubts' =>$d11['secondary_doubts'],
                'secondary_trigger' =>$d11['secondary_trigger'],
                'secondary_conflict' =>$d11['secondary_conflict'],
            ];
        }

        $gg =0;
        for($w=0; $w<count($data11_new); $w++){
            $gg++;
            DB::table('lookup_texts')->where('id',$gg)->update($data11_new[$w]);
        }

        $hh=0;
        for($x=0; $x<count($data11_new1); $x++){
            $ff++;
            DB::table('shadow_lookup_texts')->where('id',$hh)->update($data11_new1[$x]);
        }

        $column_range10 = range( 'E', 5 );
        $row_range12    = range(102, 109);
        foreach ( $row_range12 as $row12 ) {
            $data12[] = [
                'emphasizing1' =>$sheet->getCell( 'B' . $row12 )->getValue(),
                'emphasizing2' =>$sheet->getCell( 'C' . $row12 )->getValue(),
                'emphasizing3' =>$sheet->getCell( 'D' . $row12 )->getValue(),
                'emphasizing4' =>$sheet->getCell( 'E' . $row12 )->getValue(),
            ];
        }

        $ii=0;
        for($y=0; $y<count($data12); $y++){
            $ii++;
            DB::table('sensitivities')->where('id',$ii)->update($data12[$y]);
        }
       
        $column_range11 = range( 'K', 11 );
        $row_range13    = range(112, 119);
        foreach ( $row_range13 as $row13 ) {
            $data13[] = [
                'regulate_preference' =>$sheet->getCell( 'B' . $row13 )->getValue(),
                'restore_preference' =>$sheet->getCell( 'C' . $row13 )->getValue(),
                'reinterpret_preference' =>$sheet->getCell( 'D' . $row13 )->getValue(),
                'restructure_preference' =>$sheet->getCell( 'E' . $row13 )->getValue(),
                'release_preference' =>$sheet->getCell( 'F' . $row13 )->getValue(),
                'regulate_growth' =>$sheet->getCell( 'G' . $row13 )->getValue(),
                'restore_growth' =>$sheet->getCell( 'H' . $row13 )->getValue(),
                'reinterpret_growth' =>$sheet->getCell( 'I' . $row13 )->getValue(),
                'restructure_growth' =>$sheet->getCell( 'J' . $row13 )->getValue(),
                'release_growth' =>$sheet->getCell( 'K' . $row13 )->getValue(),
            ];
        }
        $jj=0;
        for($z=0; $z<count($data13); $z++){
            $jj++;
            DB::table('shadow_lookup_texts')->where('id',$jj)->update($data13[$z]);
        }

        $response['status'] = 1;
        $response['msg'] = 'Data updated successfully';
        echo json_encode($response);  exit();
    }

   
}