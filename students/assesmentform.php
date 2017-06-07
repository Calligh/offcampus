
<?php 
header("Content-type: application/pdf");


/*include('../../connect.php');
$fetch=mysql_query("SELECT * FROM localapplicant WHERE Email='$ses_name' "); 
    if($fetch){
    $row=mysql_fetch_assoc($fetch); 
    
    $First_name=$row['First_name']; 
    $Middle_name=$row['Middle_name']; 
    $Surname=$row['Surname']; 
    $Gender=$row['Gender']; 
    $Mode=$row['Ad_Mode'];
    $Nationality=$row['Nationality'];
    $Program=$row['Program_1'];
    $DOB=$row['DOB']; 
    $Image_name=$row['Image_Name'];
    $ID=$row['Id_Number'];
    $Account_number=$row['Account_Number'];    
    $Name=$First_name.' '.$Middle_name.' '.$Surname;
    $Image='uploads/'.$Image_name;*/
   
require('fpdf/fpdf.php');
   
    
class PDF extends FPDF
{
     
// Page header
function Header()
{
  $time=date("Y/m/d h:i:sa");  
  
      // Logo
    $this->Image('../images/matuer-logo.png',4,4,20);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(70);
    // Title
    $this->Cell(40,0,'Valley View University',0,0,'C');
      // Line break
    $this->Ln(5);
    
    $this->SetFont('Arial','B',10);
     $this->SetTextColor(23,23,23);
    $this->Cell(180,0,'Department of Education ',0,1,'C');
       // Line break
    $this->Ln(5);
    
    $this->SetFont('Arial','B',10);
     $this->SetTextColor(23,23,23);
    $this->Cell(180,0,'Teaching Practice Assesment Form ',0,1,'C');
    
    
    $this->SetTextColor(254,60,49);
    $this->Cell(170,0,$time,0,1,'R');
     // Line break
    $this->Ln(4);
   // $this->Cell(0,0,'',1,1,'');
    // Line break
    $this->Ln(6);
}


// Page footer
function Footer()
{
      $date=date("Y");
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
   $this->Cell(0,10,'Powered By CodeAlliance GH '.$date.' '.'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->Cell(110,4,'Name of students.............................................................................................................',0,0);
$pdf->Cell(80,4,'Level...............................................................',0,2);

$pdf->Ln(2);
$pdf->Cell(100,4,'Identification N0................................................................................................',0,0);
$pdf->Cell(90,4,'Programme.......................................................................',0,2);
$pdf->Ln(2);    
$pdf->Cell(110,4,'Region /Sch. of Practice...................................................................................................',0,0);
$pdf->Cell(80,4,'Form/class......................................................',0,2);

$pdf->Ln(2);    
$pdf->Cell(80,4,'Subject......................................................................................',0,0);
$pdf->Cell(40,4,'Date........................................',0,0);
$pdf->Cell(20,4,'Time...................................................',0,2);

$pdf->Ln(2);
$pdf->Cell(180,4,'Lesson Topic...............................................................................................................................................................................................',0,0);

$pdf->Ln(5);
$pdf->SetFont('Times','B',9);
$pdf->Cell(180,4,'Please indicate by means of a circle the degree to which the student-teacher measure up to the area descibed.',0,2);

$pdf->Ln(3);
$pdf->SetFont('Times','',9);
$pdf->Cell(180,0,'',1,1);
//$pdf->Cell(0,100,'',1,0);
$pdf->Cell(90,4,'AREAS OF DEVELOPMENT',0,0);
$pdf->Cell(90,4,'0     Absent',0,1);

$pdf->Cell(90,4,'',0,0);
$pdf->Cell(90,4,'0.5    -1 Weak',0,1);

$pdf->Cell(90,4,'',0,0);
$pdf->Cell(90,4,'1.5    -2 Below Minimum',0,1);

$pdf->Cell(90,4,'',0,0);
$pdf->Cell(90,4,'2.5    -3 Minimum',0,1);

$pdf->Cell(90,4,'',0,0);
$pdf->Cell(90,4,'3.5    -4 Good',0,1);

$pdf->Cell(90,4,'',0,0);
$pdf->Cell(90,4,'4.5    -5 Outstanding',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'LESSON PLAN',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Objectives (clear,Measurable,appropriate)',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Logical Presentation of Lesson',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Subject Knowledge (Demonstrated in Lesson Plan)',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'INTRODUCTION',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Intersting and Captivating',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Linked to appropriate previous Knowledge',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'MASTERY OF SUBJECT MATTER',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'(Demonstrated through Teaching)',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Relevant subject Matter Accurate information',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'SUBJECT DELIVERY (IN RELATION ',0,0);
$pdf->Cell(90,4,'',0,1);
$pdf->Cell(90,4,' TO TEACHING AND LEARNING)',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Appropriate Teaching Methods and Strategies',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Clear logical Steps in lesson delivery',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Good Pacing/Timing',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'TEACHING/LEARNING RESOURCES (TLR) ',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Use of Adequate and appropriate TLR (competent use ',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'of TLR including board',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'CLASSROOM MANAGEMENT AND ORGANISATION',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Invidual group and whole class management.',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Class Control ',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'STUDENT PARTICIPATION',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Involving students in lesson verbally and non-verbally.',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,"Competent handeling of student's question/ contributions",0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'COMMUNICATION',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Correct use of language',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(90,4,'Clear and audible voice',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'CLOSURE',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Tidy Interesting, linked to objective(s)',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'LESSON EVALUATION',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Lesson Objectcive (s) achieved',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Cell(90,4,'APPEARANCE',0,0);
$pdf->Cell(90,4,'',0,1);

$pdf->Cell(90,4,'Not destructive Mannerism',0,0);
$pdf->Cell(90,4,'0  0.5  1  1.5  2  2.5  3  3.5  4  4.5  5',0,1);

$pdf->Cell(180,0,'',1,1);

$pdf->Ln(10);

$pdf->Cell(180,4,'Total Score...............................   Grade ...................................  Name of Lecturer........................................................................................',0,0);

$pdf->Ln(60);

$pdf->SetFont('Arial','B',10);
 
    $pdf->Cell(180,0,'SUPERVISION SUMMARY',0,1,'C');
        $pdf->Ln(4);

$pdf->SetFont('Times','',9);
$pdf->Cell(110,4,'Name of students.............................................................................................................',0,0);
$pdf->Cell(80,4,'Level...............................................................',0,1);

$pdf->Ln(2);
$pdf->Cell(100,4,'Identification N0................................................................................................',0,0);
$pdf->Cell(90,4,'Program.......................................................................',0,1);
$pdf->Ln(2);    
$pdf->Cell(110,4,'Region /Sch. of Practice...................................................................................................',0,0);
$pdf->Cell(80,4,'Form/class......................................................',0,1);

$pdf->Ln(2);    
$pdf->Cell(80,4,'Subject......................................................................................',0,0);
$pdf->Cell(40,4,'Date........................................',0,0);
$pdf->Cell(20,4,'Time...................................................',0,1);

$pdf->Ln(2);
$pdf->Cell(180,4,'Lesson Topic..........................................................................................................................................................................................',0,1);
    
      $pdf->Ln(20);

$pdf->Cell(180,4,'COMMENTS:',0,1);
$pdf->Ln(1);
$pdf->Cell(180,4,'              A. GOOD POINTS',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'1.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'2.     ..........................................................................................................................................................................................................................',0,1);
$pdf->Ln(6);

$pdf->Cell(180,4,'3.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);
$pdf->Cell(180,4,'4.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);
$pdf->Cell(180,4,'5.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'6.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'7.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'8.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'9.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'10.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'11.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'12.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'13.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'14.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'15.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'16.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'17.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'18.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(4);


 $pdf->Ln(55);

$pdf->Cell(180,4,'B. POINTS FOR DISCUSSION/SUGGESTIONS',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'1.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);
$pdf->Cell(180,4,'2.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'3.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'4.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'5.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'6.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'7.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'8.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'9.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'10.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'11.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'12.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'13.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'14.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'15.     ..........................................................................................................................................................................................................................',0,1);

$pdf->Ln(6);



$pdf->Ln(12);

$pdf->Cell(180,4,'NAME OF SUPERVISOR ...............................................................................................................................................................................',0,1);

$pdf->Ln(6);

$pdf->Cell(180,4,'SIGNATURE ............................................................................................................',0,1);

$pdf->Output();        

    
        
?>