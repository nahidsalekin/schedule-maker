<?php
function validity($c1,$c2,$course,$section,$nstime,$netime,$day,$nday)
{
  $temp1=$nday[$c1];
   $a1=$temp1[0];
   $b1=' ';
   $temp2=$nday[$c2];
   $a2=$temp2[0];
   $b2='.';
  if(strlen($temp1)==2)
    $b1=$temp1[1];
  if(strlen($temp2)==2)
    $b2=$temp2[1];

  if(strlen($temp1)==1 && strlen($temp2)==1){
    if(($day[$c1]==$day[$c2]) && ($nstime[$c2]<=$nstime[$c1] && $netime[$c2]>=$nstime[$c1]))
      return 0;
    if(($day[$c1]==$day[$c2]) && ($nstime[$c2]<=$netime[$c1] && $netime[$c2]>=$netime[$c1]))
      return 0;
  }
  else if(strlen($temp1)==2 && strlen($temp2)==1){
    if(($a1==$a2 || $b1==$a2) && ($nstime[$c2]<=$nstime[$c1] && $netime[$c2]>=$nstime[$c1]))
      return 0;
    if(($a1==$a2 || $b1==$a2) && ($nstime[$c2]<=$netime[$c1] && $netime[$c2]>=$netime[$c1]))
      return 0;
  }
  else if(strlen($temp1)==1 && strlen($temp2)==2){
    if(($a1==$a2 || $a1==$b2) && ($nstime[$c2]<=$nstime[$c1] && $netime[$c2]>=$nstime[$c1]))
      return 0;
    if(($a1==$a2 || $a1==$b2) && ($nstime[$c2]<=$netime[$c1] && $netime[$c2]>=$netime[$c1]))
      return 0;
  }
  else {
    if(($a1==$a2 || $a1==$b2 || $b1==$a2 || $b1==$b2) && ($nstime[$c2]<=$nstime[$c1] && $netime[$c2]>=$nstime[$c1]))
      return 0;
    if(($a1==$a2 || $a1==$b2 || $b1==$a2 || $b1==$b2) && ($nstime[$c2]<=$netime[$c1] && $netime[$c2]>=$netime[$c1]))
      return 0;
  }
  return 1;
}
function get_lab($current,$course,$section)
{
  if(in_array($course[$current].""."LAB",$course)) {
    for($k=0;$k<sizeof($course);$k++) {
      if(strcmp($course[$k],$course[$current].""."LAB")==0 && $section[$k]==$section[$current]) {
        return $k;
      }
    }
  }
  return 0;
}
function random_maker($taken1,$taken2,$taken3,$taken4,& $rtn_course,& $rtn_section,$course,$section,$nstime,$netime,$day,$nday)
{
           	 $cp1=0; $cp2=0; $cp3=0; $cp4=0;
           	 $lab1=0;$lab2=0;$lab3=0;$lab4=0;
           	 $cd1=" ";$cd2= " ";$cd3=" ";
           		 for($type1=0;$type1<sizeof($course);$type1++) {
           			for($i=$cp1;$i<sizeof($course);$i++) {
           				if(strcmp($taken1,$course[$i])==0) {
           					if(strcmp($course[$i],$course[$i+1])==0 && $section[$i]==$section[$i+1])
           						continue;
           					$cp1=$i;
           					$cd1=$nday[$i];
           					break;
           				}
           						}

           		 if(in_array($course[$cp1].""."LAB",$course)) {
           				for($j=0;$j<sizeof($course);$j++) {
           					if(strcmp($course[$j],$course[$cp1].""."LAB")==0 && $section[$j]==$section[$cp1]) {
           						$lab1=$j;
           						break;
           					}
           				}
                }

           			for($i=0;$i<sizeof($course);$i++) {
           				if(strcmp($taken2,$course[$i])==0 && strcmp($day[$i],"")!=0) {
           					if(strcmp($course[$i],$course[$i+1])==0 && $section[$i]==$section[$i+1])
           						continue;

                      $valid=validity($cp1,$i,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                        if($lab1>0){
                        $valid=validity($lab1,$i,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

                        $lab2=get_lab($i,$course,$section);

                      if($lab2>0){
           						$valid=validity($cp1,$lab2,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                      }

                        if($lab1>0 && $lab2>0){
                        $valid=validity($lab1,$lab2,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

           					$cp2=$i;
           					$cd2=$nday[$i];
           					break;
           				}
           				}

           	    for($i=0;$i<sizeof($course);$i++) {
           				if(strcmp($taken3,$course[$i])==0) {
           					if($cd1==$nday[$i] && $cd2==$nday[$i])
           						continue;
           					if(strcmp($course[$i],$course[$i+1])==0 && $section[$i]==$section[$i+1])
           						continue;

                      $valid=validity($cp1,$i,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                      $valid=validity($cp2,$i,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;

                        if($lab1>0){
                        $valid=validity($lab1,$i,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }
                        if($lab2>0){
                        $valid=validity($lab2,$i,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

                        $lab3=get_lab($i,$course,$section);

                      if($lab3>0){
           						$valid=validity($cp1,$lab3,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                      }
                      if($lab3>0){
           						$valid=validity($cp2,$lab3,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                      }

                        if($lab1>0 && $lab3>0){
                        $valid=validity($lab1,$lab3,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }
                        if($lab2>0 && $lab3>0){
                        $valid=validity($lab2,$lab3,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

           						$cp3=$i;
           						$cd3=$nday[$i];
           						break;
           				}
                  }

           		if(strlen($taken4)>0) {
           			for($i=0;$i<sizeof($course);$i++) {
           				if($taken4==$course[$i]) {

           					if($cd1==$nday[$i] && $cd2==$nday[$i])
           						continue;
           					if($cd1==$nday[$i] && $cd3==$nday[$i])
           						continue;
           					if($cd2==$nday[$i] && $cd3==$nday[$i])
           						continue;

           					if($course[$i]==$course[$i+1] && $section[$i]==$section[$i+1])
           							continue;

                        $valid=validity($cp1,$i,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        $valid=validity($cp2,$i,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        $valid=validity($cp3,$i,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;

                          if($lab1>0){
                          $valid=validity($i,$lab1,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          if($lab2>0){
                          $valid=validity($i,$lab2,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          if($lab3>0){
                          $valid=validity($i,$lab3,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          $lab4=get_lab($i,$course,$section);

                        if($lab4>0){
                        $valid=validity($cp1,$lab4,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }
                        if($lab4>0){
                        $valid=validity($cp2,$lab4,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }
                        if($lab4>0){
                        $valid=validity($cp3,$lab4,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

                          if($lab1>0 && $lab4>0){
                          $valid=validity($lab1,$lab4,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          if($lab2>0 && $lab4>0){
                          $valid=validity($lab2,$lab4,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          if($lab3>0 && $lab4>0){
                          $valid=validity($lab3,$lab4,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
           					    $cp4=$i;
           						break;
           				}
           				}
           		}
              if($cp1!=0 && $cp2!=0 && $cp3!=0){
                if (strlen($taken4)>0 && $cp4==0) {
                  //break;
                }
                else {
                   $rtn_course[]=$course[$cp1];
                   $rtn_section[]=$section[$cp1];
                   $rtn_course[]=$course[$cp2];
                   $rtn_section[]=$section[$cp2];
                   $rtn_course[]=$course[$cp3];
                   $rtn_section[]=$section[$cp3];

                   if($cp4>0){
                   $rtn_course[]=$course[$cp4];
                   $rtn_section[]=$section[$cp4];
                 }
               }
             }
           		$cp2=0;$cp3=0;$cp4=0;$lab1=0;$lab2=0;$lab3=0;$lab4=0;
           		if(strcmp($taken1,$course[$cp1+1])==0)
           			$cp1++;
           		else
           			break;
           		}
	}
 ?>
