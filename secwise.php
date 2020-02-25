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
function secwise($taken1,$taken2,$taken3,$taken4,$sec1,$sec2,$sec3,$sec4,& $rtn_course,& $rtn_section,$course,$section,$nstime,$netime,$day,$nday)
{
           	 $cp1=0; $cp2=0; $cp3=0; $cp4=0;
           	 $lab1=0;$lab2=0;$lab3=0;$lab4=0;
           	 $cd1=" ";$cd2= " ";$cd3=" ";
             $i2=$cp2;$i3=$cp3;$i4=$cp4;
           		 for($type1=0;$type1<sizeof($course);$type1++) {
           			for($i1=0;$i1<sizeof($course);$i1++) {
           				if(strcmp($taken1,$course[$i1])==0 && $sec1==$section[$i1]) {
           					if(strcmp($course[$i1],$course[$i1+1])==0 && $section[$i1]==$section[$i1+1])
           						continue;
           					$cp1=$i1;
           					$cd1=$nday[$i1];
           					break;
           				}
           						}
                  $lab1=get_lab($cp1,$course,$section);

           			for($i2;$i2<sizeof($course);$i2++) {
           				if(strcmp($taken2,$course[$i2])==0 && strcmp($day[$i2],"")!=0) {
           					if(strcmp($course[$i2],$course[$i2+1])==0 && $section[$i2]==$section[$i2+1])
           						continue;
                      if($sec2!="Random"){
                        if($sec2!=$section[$i2])
                          continue;
                      }

                      $valid=validity($cp1,$i2,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                        if($lab1>0){
                        $valid=validity($lab1,$i2,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

                        $lab2=get_lab($i2,$course,$section);

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

           					$cp2=$i2;
           					$cd2=$nday[$i2];
           					break;
           				}
           				}

           	    for($i3;$i3<sizeof($course);$i3++) {
           				if(strcmp($taken3,$course[$i3])==0) {
                    if($sec3!="Random"){
                      if($sec3!=$section[$i3])
                        continue;
                    }
           					if($cd1==$nday[$i3] && $cd2==$nday[$i3])
           						continue;
           					if(strcmp($course[$i3],$course[$i3+1])==0 && $section[$i3]==$section[$i3+1])
           						continue;

                      $valid=validity($cp1,$i3,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;
                      $valid=validity($cp2,$i3,$course,$section,$nstime,$netime,$day,$nday);
                      if($valid==0)
                        continue;

                        if($lab1>0){
                        $valid=validity($i3,$lab1,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }
                        if($lab2>0){
                        $valid=validity($i3,$lab2,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        }

                        $lab3=get_lab($i3,$course,$section);

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

           						$cp3=$i3;
           						$cd3=$nday[$i3];
           						break;
           				}
                  }

           		if(strlen($taken4)>1) {
           			for($i4;$i4<sizeof($course);$i4++) {
           				if($taken4==$course[$i4]) {
                    if($sec4!="Random"){
                      if($sec4!=$section[$i4])
                        continue;
                    }
           					if($cd1==$nday[$i4] && $cd2==$nday[$i4])
           						continue;
           					if($cd1==$nday[$i4] && $cd3==$nday[$i4])
           						continue;
           					if($cd2==$nday[$i4] && $cd3==$nday[$i4])
           						continue;

           					if($course[$i4]==$course[$i4+1] && $section[$i4]==$section[$i4+1])
           							continue;

                        $valid=validity($cp1,$i4,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        $valid=validity($cp2,$i4,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;
                        $valid=validity($cp3,$i4,$course,$section,$nstime,$netime,$day,$nday);
                        if($valid==0)
                          continue;

                          if($lab1>0){
                          $valid=validity($i4,$lab1,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          if($lab2>0){
                          $valid=validity($i4,$lab2,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          if($lab3>0){
                          $valid=validity($i4,$lab3,$course,$section,$nstime,$netime,$day,$nday);
                          if($valid==0)
                            continue;
                          }
                          $lab4=get_lab($i4,$course,$section);

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
           					    $cp4=$i4;
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
             // echo $course[$cp1],"--->",$section[$cp1];
              //echo $course[$cp2],"--->",$section[$cp2];
             // echo $course[$cp3],"--->",$section[$cp3];
             // echo $course[$cp4],"--->",$section[$cp4],"<br>";
            }


          }
        }
          if($sec2=="Random" && $sec1!="Random" && $sec3!="Random" && $sec4!="Random")
           		{
                if(strcmp($taken2,$course[$cp2+1])==0)
                  $i2=$cp2+1;
                  else
                     break;
              }
          else {
            $cp2=0;$lab2=0;
          }
          if($sec3=="Random" && $sec1!="Random" && $cp4==0)
           		{
                if(strcmp($taken3,$course[$cp3+1])==0)
                  $i3=$cp3+1;
                  else
                     break;
              }
          else {
            $cp3=0;$lab3=0;
          }
          if($sec4=="Random" && strlen($taken4)>1)
           		{
                if($taken4==$course[$cp4+1])
                  $i4=$cp4+1;
                  else
                     break;
              }
          else {
            if ($sec4!="Random") {
              break;
            }
            $cp4=0;$lab4=0;
          }
              //$lab1=0;
           		}
	}
 ?>
