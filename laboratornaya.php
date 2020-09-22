<?php
  require "./includes/config.php";
  require "./registration/db_.php";
  require "word_php_read.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">

    <title><?php echo $config['title'];?></title>
    </head>

    <body>


      <?php include "./includes/header_lab.php"; ?>
      



     <div class="wrapper">
      <div class="content"> 
        <div class="lab_container">
          <div class="lab_page">
            <div class="lab_page_text">

           <div class="lab_page">
              <div class="lab_page_text">

              <?php $result = mysqli_query($connection, "SELECT * FROM `laboratornaya_rabota_titul` WHERE `id` = 0");

                    while ($row = mysqli_fetch_assoc($result)) {
                           $r1 = $row['kafedra'];
                           $r2 = $row['otchet_name'];
                           $r3 = $row['laboratornaya_name'];
                           $r4 = $row['disciplina_name'];
                           $r5 = $row['student_grup'];
                           $r6 = $row['student_name'];
                           $r7 = $row['student_year'];
                           $r8 = $row['prep_dolj'];
                           $r9 = $row['prep_name'];
                           $r10 = $row['prep_year'];
                           $r11 = $row['year'];
                        }
              ?>
              <br><br>Министерство науки и высшего образования Российской федерации<br><br>ТОМСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ<br>
СИСТЕМ УПРАВЛЕНИЯ И РАДИОЭЛЕКТРОНИКИ (ТУСУР)<br><br>
<form action="laboratornaya.php" method="POST">
<input type="text" name="kafedra" placeholder="<?php echo $r1; ?>" size="50" maxlength="75"><br><br><br><br><br><br>
<input type="text" name="otchet_name" placeholder="<?php echo $r2; ?>" size="40" maxlength="75"><br><br>
ОТЧЕТ<br>
<input type="text" name="laboratornaya_name" placeholder="<?php echo $r3; ?>" size="50" maxlength="75"><br><br>
<input type="text" name="disciplina_name" placeholder="<?php echo $r4; ?>" size="75" maxlength="75"><br><br><br><br><br><br>
<div class="lab_page_podpis">
Выполнили: студент гр.<input type="text" name="student_grup" placeholder="<?php echo $r5; ?>" size="17" maxlength="75"><br>
__________<input type="text" name="student_name" placeholder="<?php echo $r6; ?>" size="17" maxlength="75"><br>
«__» ________<input type="text" name="student_year" placeholder="<?php echo $r7; ?>" size="17" maxlength="75"><br><br><br><br>
Принял: <?php if ($_POST['select_prep'] == "Катаев М.Ю.") {$dolj1 = "проф. каф. АСУ, д.т.н."; echo $dolj1;} else { $dolj1 = "доцент каф. АСУ, к.т.н."; echo $dolj1; }?><!--<input type="text" name="prep_dolj" placeholder="<?php echo $r8; ?>" size="17" maxlength="75">--><br>
___________<select name="select_prep" size="1">
<option selected value="Лукьянов А.К.">Лукьянов А.К.</option>
<option value="Катаев М.Ю.">Катаев М.Ю.</option>
<option value="Алфёров С.М.">Алфёров С.М.</option>
</select>
<!--<input type="text" name="prep_name" placeholder="<?php echo $r9; ?>" size="17" maxlength="75">--><br>
«__» ________<input type="text" name="prep_year" placeholder="<?php echo $r10; ?>" size="17" maxlength="75"><br><br><br><br>
</div>
<input type="number" name="year" placeholder="<?php echo $r11; ?>" size="5" maxlenght="5"><br><br>
<input type="submit" name="done" value="Отправить"><br><br><br><br><br><br></div>
</form>

                
              </div>
            </div>  

           </div>
          </div>
         </div>       
        </div>
           

           <?php include "./includes/footer.php"; ?>
   
  
    <?php
if(isset($_POST['done'])) {
 $a1 = $_POST['kafedra'];
 $a2 = $_POST['otchet_name'];
 $a3 = $_POST['laboratornaya_name'];
 $a4 = $_POST['disciplina_name'];
 $a5 = $_POST['student_grup'];
 $a6 = $_POST['student_name'];
 $a7 = $_POST['student_year'];
 $a9 = $_POST['select_prep'];
 $a8 = $dolj1;
 $a10 = $_POST['prep_year'];
 $a11 = $_POST['year'];                                                 
 mysqli_query($connection, "INSERT INTO `laboratornaya_rabota_titul`(kafedra, otchet_name, laboratornaya_name, disciplina_name, student_grup, student_name, student_year, prep_dolj, prep_name, prep_year, year) VALUES ('$a1','$a2','$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$a10', '$a11') ");
}
?>

   
    </body>
</html>

