<?php
require "./lib/PHPWord/vendor/autoload.php";
require "word_php_read.php";
require "./includes/config.php";
require "./registration/db_.php";

$result = mysqli_query($connection, "SELECT * FROM `laboratornaya_rabota_titul` WHERE `id` = (select max(id) from `laboratornaya_rabota_titul`)");

                    while ($row = mysqli_fetch_assoc($result)) {
                           $c1 = $row['kafedra'];
                           $c2 = $row['otchet_name'];
                           $c3 = $row['laboratornaya_name'];
                           $c4 = $row['disciplina_name'];
                           $c5 = $row['student_grup'];
                           $c6 = $row['student_name'];
                           $c7 = $row['student_year'];
                           $c8 = $row['prep_dolj'];
                           $c9 = $row['prep_name'];
                           $c10 = $row['prep_year'];
                           $c11 = $row['year'];
                        }
                        
              

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(14);

$properties = $phpWord->getDocInfo();

$properties->setCreator('My name');
$properties->setCompany('My factory');
$properties->setTitle('My title');
$properties->setDescription('My description');
$properties->setCategory('My category');
$properties->setLastModifiedBy('My name');
$properties->setCreated(mktime(0, 0, 0, 3, 12, 2014));
$properties->setModified(mktime(0, 0, 0, 3, 14, 2014));
$properties->setSubject('My subject');
$properties->setKeywords('my, key, word');

/* Разбиваем все элементы титула на секции */
$sectionStyle = array(
      'orientation' => 'portrait',
      'marginTop' => \PhpOffice\PhpWord\Shared\Converter::pixelToTwip(20),
      'marginLeft' => 600,
      'marginRight' => 600,
      'ColsNum' => 1,
      'pageNumberingStart' => 1,
      'borderBottomSize' => 100,
      'borderBottomColor' => 'C0C0C0'

);

$section = $phpWord->addSection($sectionStyle);
$text_min_obr = "Министерство науки и высшего образования Российской федерации";
$text_tusur = "ТОМСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ
СИСТЕМ УПРАВЛЕНИЯ И РАДИОЭЛЕКТРОНИКИ (ТУСУР) ";
$text_kafedra = $c1;
$text_otchet_name = $c2;
$text_laboratornaya_name = "ОТЧЕТ";
$text_laboratornaya_name_2 = $c3;
$text_disciplina_name = $c4;
$text_podpis_student_grup = "Выполнили: студент гр. " . $c5;
$text_podpis_student_name = "__________ " . $c6;
$text_podpis_student_year = "«__» ________ " . $c7;
$text_podpis_prep_dolj = "Принял:  " . $c8;
$text_podpis_prep_name = "__________ " . $c9;
$text_podpis_prep_year = "«__» ________ " . $c10;
$text_year = "Томск " . $c11;

$section->addText(htmlspecialchars($text_min_obr),
	                                     array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceBefore'=>800, 'spaceAfter'=>400)

	                                      );

$section->addText(htmlspecialchars($text_tusur),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceAfter'=>600)

                                        );

$section->addText(htmlspecialchars($text_kafedra),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceAfter'=>1000)

                                        );

$section->addText(htmlspecialchars($text_otchet_name),
                                       array('bold'=>true, 'italic'=>false, 'size'=>18),
                                         array('align'=>'center', 'spaceAfter'=>400)

                                        );

$section->addText(htmlspecialchars($text_laboratornaya_name),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceAfter'=>100)

                                        );

$section->addText(htmlspecialchars($text_laboratornaya_name_2),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceAfter'=>100)

                                        );

$section->addText(htmlspecialchars($text_disciplina_name),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceAfter'=>2000)

                                        );

$section->addText(htmlspecialchars($text_podpis_student_grup),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'right', 'spaceAfter'=>100)

                                        );

$section->addText(htmlspecialchars($text_podpis_student_name),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'right', 'spaceAfter'=>100)

                                        );

$section->addText(htmlspecialchars($text_podpis_student_year),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'right', 'spaceAfter'=>800)

                                        );


$section->addText(htmlspecialchars($text_podpis_prep_dolj),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'right', 'spaceAfter'=>100)

                                        );

$section->addText(htmlspecialchars($text_podpis_prep_name),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'right', 'spaceAfter'=>100)

                                        );

$section->addText(htmlspecialchars($text_podpis_prep_year),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'right', 'spaceAfter'=>600)

                                        );

$section->addText(htmlspecialchars($text_year),
                                       array('bold'=>false, 'italic'=>false, 'size'=>14),
                                         array('align'=>'center', 'spaceBefore'=>3000)

                                        );

/* Заканчиваем работу с секциями */

//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
//$objWriter->save('doc.docx');

header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="your_file.docx"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$xmlWriter->save("php://output");

?>