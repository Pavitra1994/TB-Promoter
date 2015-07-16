<! Author Name: S.Pavitra, B.Tech (Information Technology and Mathematical Innovation), 
				Cluster Innovation Centre University of Delhi, Email: pavi.kalaimathi@gmail.com
				Chandrani Kumari, B.Tech (Information Technology and Mathematical Innovation), 
				Cluster Innovation Centre University of Delhi, Email: chandraniku@gmail.com
                Asani Bhaduri, PhD, Cluster Innovation Centre University of Delhi, Email: asanii.bhaduri@gmail.com  
  
  Software Description:
  
    This software identifies promoters in a user given mycobacterial nucleotide sequence and the corresponding complementary sequence. The program searches for    two kinds of promoters ( -10 and -35 region) preceding the transciption origin. The user can either select the promoter type or can input a promoter 	   	    sequence. The program searches for the selected or queried promoter in the query nucleotide sequence and shows the result with the positions of the found    promoters. Bolded regions would represent -10 promoters. Bolded and Italised regions would represent -35 promoters.
    
    Promoter: A nucleotide sequence that helps or directs the initiation of transcription of a gene
    
    Functions used in this program:
     
    1. ten():  searches for -10 promoters and their positions
    2. tfive(): searches for -35 promoters and their positions
    3. both(): searches for both -10 and  -35 promoters and their positions
   
    
<!Doctype HTML>
 <html>
    <head>

        <div align="center">
	        <div id="header" style="background-color:black;">
	          <h1><font color="white">TB-Promoter</font></h1>
	          <b><font color="white">(Identification of Promoters in Mycobacterial nucleotide sequence)</font></b>
	
	         </div>
	    </div>

        <style>
	    body { 
         background: url('pic1.png ') no-repeat center center fixed;    
          background-size:cover;
	          }
        </style>
		
    </head>
    <title>Promoter search</title>

    <body>

        <br> <br>
        <!-- input box -->
        <div align="center">
            <form action="test.php" method="POST">
             <tr>
			 
			 
			
			
				 <b><font color="white">Enter nucleotide sequence:</font></b><br> 
				 <textarea  name="comment" required rows="6" cols="50" ></textarea><br>
				  
				 <br>
				 <b> <font color="white"> Select Promoter type :</font></b>

				 <!--<input type="submit" formtarget="_self" value="Submit to this window">-->
		 
					 <select id="combo" name="combo">
                      <option value="-10"> -10</option>
			<option value="-35"> -35</option>
            <option value="-10 and -35"> -10 and -35</option>
            <option value="Any other"> Any other</option>
					   </select>
					 <br>
					 					
					   
                       <option value="Any Other"> </option>
		</select></td>
		</tr>
		<tr>
			<td><b><font color="white">If Any other :</font></b></td>
			<td><input type="text" id="other" placeholder="ANY OTHER" name="motif"  ></td>

		</tr>
        </tr>
        </tr>
        </tr>
        </br>
        </br>
		       
		       <input type="submit" name="Search" value = "SUBMIT" align="center-left">
		  
		    </form> 
		</div>	
		<br><br><br><br><br>
		<div align="right">
	<a href="http://tuberculist.epfl.ch/" target="_blank" ><font color="white"> TUBERCULIST </font></a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="http://www.ncbi.nlm.nih.gov/nucleotide/" target="_blank"><font color="white"> NCBI </font></a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="http://www.tbdb.org/" target="_blank"><font color="white">TBDB </font></a>
	</div>
     <div  align="center" id="header" style="background-color:#999;">
    <p align="centre"> &copy; S.Pavitra | Chandrani Kumari | Asani Bhaduri </Br>
    Cluster Innovation Centre, University of Delhi </p>
    </div>

     <div align="center">
	 
	 <div id="header" style="background-color:black;">
	 
         
	 <h1><font color="white">RESULTS</font></h1>
	 </div>
	
     <div align="center">
	 <div id="header" style="background-color:#DCDCDC;">
	
	    <?php
		
	        if(isset($_POST['Search']))
	        {    
			    
		//The nucleotide sequence given by the user in the  text field whose name is comment is stored in the variable '$sequence'
       			$sequence=$_POST['comment'];
				
				$ptype=$_POST['combo'];
				$motifs=$_POST['motif'];
	  
                switch($ptype)
                {
                  case "-10";
				
				   $n=ten($sequence);
                    if ($n==0)
					{
					 echo " No -10 promoters found ";
					}  
					
         
                  break;
	 
				 case "-35";
				  
						$n=tfive($sequence);
					  if ($n==0)
					  {
						   echo "No -35 promoters found";
					  }
				 break;
				 
				 case "-10 and -35";
			
						 $n=both($sequence);
					  if ($n==0)
					  {
						   echo "No Promoter found";
					  }
				 break;
				 
				 case "Any other";
			        $n=anyother($sequence,$motifs);
					  if ($n==0)
					  {
						   echo "promoter not found";
					  }
				 break;
				}
	        }

	   ?>
	 </div>
	 
	 <br/><br/><br/><br/><br/><br/>
	</body>
</html>







<?php

 // 'ten' function will search for the -10 promoters in the query nucleotide sequence  and then in its reverse i.e the complementary sequence 
function ten($comment)
{
  $count=0;
  
  $revseq = strrev($comment);

$com1= $comment;
$com2= $revseq;

// following are the list of -10 promoters 
$A="TATAAT";
$B="TATACT";
$C="CGTTG";
$D="CGTTAA";
$E="GGTTG";
$F="GGGTTT";
$G="CGTCG";
$H="TAACAT";
$I="CGTCCT";
$J="TCCGAA";
$K="CGTGTC";
$L="CGTCA";
$L1="TAGGCT";
$L2="GATGTT";
$L3="CAGGAT";
$L4="TAGTGT";
$L5="TACCAT";
$L6="TATTAT";
$L7="TTCAAT";
$L8="TATGCT";
$L9="TATCAT";




$prom=array($A,$B,$C,$D,$E,$F,$G,$H,$I,$J,$K,$L,$L1,$L2,$L3,$L4,$L5,$L6,$L7,$L8,$L9);   
 $promlength=count($prom);
 
$i=0;
$j=0;
$k=0;


for ($i=0; $i<=$promlength-1; $i++){
	
	$g=((strlen($comment))-(strlen($prom[$i])-1));
	for ($j=0; $j < $g; $j++){
		$d= substr($comment,$j,strlen($prom[$i]));
	$d2=substr($revseq,$j,strlen($prom[$i]));
		$e=$prom[$i];
		$f=strcmp( $d,$e);
		if ($f==0){
			echo "promoter: ".$d." at position: ". ($j+1)."</br>";
		} 
		$f2=strcmp( $d2,$e);
		if ($f2==0){
				echo "promoter: ".$d2." at position: ". ($j+1)."in the reverse strand"."</br>";
		} 
	}
}

$i=0;
for ($i=0; $i<=$promlength-1; $i++){
	$comment=str_ireplace($prom[$i],"<b>".$prom[$i]."</b>",$comment);
	$revseq=str_ireplace($prom[$i],"<b>".$prom[$i]."</b>",$revseq);
}



"</br>";
"</br>";

if ($comment != $com1) {
 $count=1;
echo wordwrap($comment,30,"<br>\n")."</br></br>"; 
 
 }
 
			
 if ($revseq != $com2) {
 $count=2;

 echo 'in the reverse compelement strand'."</br></br>";
 
 echo wordwrap($revseq,30,"<br>\n"); 
 }

 return $count;

}

// 'tfive()' function will search for the -35 promoters in the query nucleotide sequence  and then in its reverse i.e the complementary sequence 

function tfive($comment)
{
$count=0;

 $revseq = strrev($comment);
 
 
$com1= $comment;
$com2= $revseq;

//list of the -35 pomoters
$M='TTGACA';
$N='GTGG';
$O='TTGACT';
$P='AGAAAG';
$Q='GGAAC';
$Q1='GGGAC';
$S='GGACC';
$S1='GGGCC';
$R='AGTTTG';
$T='GGGAAC';
$T1='CGGAAC';
$U='GTCACA';
$V='CCCATC';
$W='TGAACC';
$X='GGAAC';
$prom=array($M,$N,$O,$P,$Q,$Q1,$R,$S,$S1,$T,$T1,$U,$V,$W,$X);

 $promlength=count($prom);
 
$i=0;
$j=0;
for ($i=0; $i<=$promlength-1; $i++){
	$g=((strlen($comment))-(strlen($prom[$i])-1));
	for ($j=0; $j < $g; $j++){
		$d= substr($comment,$j,strlen($prom[$i]));
	$d2=	substr($revseq,$j,strlen($prom[$i]));
		$e=$prom[$i];
		$f=strcmp( $d,$e);
		if ($f==0){
			echo "promoter: ".$d." at position: ". ($j+1)."</br>";
		} 
		$f2=strcmp( $d2,$e);
		if ($f2==0){
		
			echo "promoter: ".$d2." at position: ". ($j+1)."in the reverse strand"."</br>";
		} 
	}
}


$i=0;
$j=0;
for ($i=0; $i<=$promlength-1; $i++){
	$comment=str_ireplace($prom[$i],"<b><i>".$prom[$i]."</i></b>",$comment);
	$revseq=str_ireplace($prom[$i],"<b><i>".$prom[$i]."</i></b>",$revseq);
	
}
"</br>";
"</br>";
if ($comment != $com1) {
 $count=1;

 echo wordwrap($comment,30,"<br>\n");t."</br></br>";

 }
 
 "</br>";
 "</br>";
  if ($revseq != $com2) {
 $count=2;
  
 
 echo 'in the reverse compelement strand'."</br></br>";
 
 echo  wordwrap($revseq,30,"<br>\n");
 }
 return $count;

}





function both($comment)
{
$count=0;
 $revseq = strrev($comment);
 
$com2= $revseq;
$com1= $comment;
// list of -10 and -35 promoters
$A="TATAAT";
$B="TATACT";
$C="CGTTG";
$D="CGTTAA";
$E="GGTTG";
$F="GGGTTT";
$G="CGTCG";
$H="TAACAT";
$I="CGTCCT";
$J="TCCGAA";
$K="CGTGTC";
$L="CGTCA";
$M='TTGACA';
$N='GTGG';
$O='TTGACT';
$P='AGAAAG';
$Q='GGAAC';
$Q1='GGGAC';
$S='GGACC';
$S1='GGGCC';
$R='AGTTTG';
$T='GGGAAC';
$T1='CGGAAC';
$U='GTCACA';
$V='CCCATC';
$W='TGAACC';
$X='GGAAC';
$L1="TAGGCT";
$L2="GATGTT";
$L3="CAGGAT";
$L4="TAGTGT";
$L5="TACCAT";
$L6="TATTAT";
$L7="TTCAAT";
$L8="TATGCT";
$L9="TATCAT";
$prom=array($A,$B,$C,$D,$E,$F,$G,$H,$I,$J,$K,$L,$L1,$L2,$L3,$L4,$L5,$L6,$L7,$L8,$L9,$M,$N,$O,$P,$Q,$Q1,$R,$S,$S1,$T,$T1,$U,$V,$W,$X);


 $promlength=count($prom);
 
$i=0;
$j=0;

for ($i=0; $i<=$promlength-1; $i++){
	$g=((strlen($comment))-(strlen($prom[$i])-1));
	for ($j=0; $j < $g; $j++){
		$d= substr($comment,$j,strlen($prom[$i]));
		$d2=	substr($revseq,$j,strlen($prom[$i]));
		$e=$prom[$i];
		$f=strcmp( $d,$e);
		if ($f==0){
			echo "promoter: ".$d." at position: ". ($j+1)."</br>";
		} $f2=strcmp( $d2,$e);
		if ($f2==0){
		
			echo "promoter: ".$d2." at position: ". ($j+1)."in the reverse strand"."</br>";
		} 
	}
}

"</br>";
"</br>";
$i=0;
$j=0;

for ($i=0; $i<=20; $i++){
	$comment=str_ireplace($prom[$i],"<b><i>".$prom[$i]."</i></b>",$comment);
	$revseq=str_ireplace($prom[$i],"<b><i>".$prom[$i]."</i></b>",$revseq);
}
for ($i=12; $i<=$promlength-1; $i++){
	$comment=str_ireplace($prom[$i],"<b>".$prom[$i]."</b>",$comment);
	$revseq=str_ireplace($prom[$i],"<b>".$prom[$i]."</b>",$revseq);
	
}

if ($comment != $com1) {
 $count=1;

 echo wordwrap($comment,30,"<br>\n")."</br></br>";
 
 
}
 "</br>";
  "</br>";
 if ($revseq != $com2) {
 $count=2;
 
 echo 'in the reverse compelement strand'."</br></br>";
  
 echo  wordwrap($revseq,30,"<br>\n");
 }
 

 return $count;

}


//anyother() function searches for the promoter provided by the user
function anyother($comment,$motif)
{
 
 $count=0;
  $revseq = strrev($comment);

$com1= $comment;
$com2= $revseq;


$j=0;
	
	$g=((strlen($comment))-(strlen($motif)-1));
	for ($j=0; $j < $g; $j++){
		$d= substr($comment,$j,strlen($motif));
	$d2=substr($revseq,$j,strlen($motif));
		$e=$motif;
		$f=strcmp( $d,$e);
		if ($f==0){
			echo "promoter: ".$d." at position: ". ($j+1)."</br>";
		} 
		$f2=strcmp( $d2,$e);
		if ($f2==0){
				echo "promoter: ".$d2." at position: ". ($j+1)."in the reverse strand"."</br>";
		} 
	}



	$comment=str_ireplace($motif,"<b>".$motif."</b>",$comment);
	$revseq=str_ireplace($motif,"<b>".$motif."</b>",$revseq);


"</br>";
"</br>";

if ($comment != $com1) {
 $count=1;
echo wordwrap($comment,30,"<br>\n")."</br></br>"; 
 
 }
 
			
 if ($revseq != $com2) {
 $count=2;

 echo 'in the reverse compelement strand'."</br></br>";
 
 echo wordwrap($revseq,30,"<br>\n"); 
 }

 return $count;
}

?>




