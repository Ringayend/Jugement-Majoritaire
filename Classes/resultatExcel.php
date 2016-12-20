<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once('Classes/PHPExcel.php');


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("jugement-majoritaire.herokuapp.com")
                                           ->setLastModifiedBy("jugement-majoritaire.herokuapp.com")
                                           ->setTitle("Resultat vote jugement majoritaire")
                                           ->setSubject("Vote projet")
                                           ->setDescription("Résultats du vote concernant les projets de répartiton")
                                           ->setKeywords("jugement majoritaire resultat projet")
                                           ->setCategory("resultat projet");

// 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nom Projet')
            ->setCellValue('B1', 'Très Bien')
            ->setCellValue('C1', 'Bien')
            ->setCellValue('D1', 'Assez Bien')
            ->setCellValue('E1', 'Passable')
            ->setCellValue('F1','Insuffisant')
            ->setCellValue('G1', 'À Rejeter')
            ->setCellValue('H1', 'Mention majoritaire');

// Add some data
require_once('models/candidat.php');
$candidats = Candidat::all();
$i = 2;
foreach($candidats as $candidat) {

      $a = "A".$i; 
      $b = "B".$i; 
      $c = "C".$i; 
      $d = "D".$i; 
      $e = "E".$i; 
      $f = "F".$i; 
      $g = "G".$i; 
      $h = "H".$i;

      $name = $candidat->name;
      $tb = $candidat->TB;
      $mb = $candidat->B;
      $ab = $candidat->AB;
      $p = $candidat->P;
      $ins =$candidat->I;
      $ar = $candidat->AR;
      $mention = Candidat::note_global($candidat);

      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue($a,$name)
                  ->setCellValue($b, $tb)
                  ->setCellValue($c, $mb)
                  ->setCellValue($d,$ab)
                  ->setCellValue($e,$p)
                  ->setCellValue($f,$ins)
                  ->setCellValue($g,$ar)
                  ->setCellValue($h,$mention);

         $i += 1;
}


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Resultats Vote');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="resultat.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
