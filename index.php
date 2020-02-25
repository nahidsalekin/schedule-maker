<?php
include 'connection.php';
include 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Schedule Maker</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mstyle.css">
</head>
<body>
    <br>
    <div class="box">
        <form action="" method="post">
            <fieldset>
                <legend>Choose Courses</legend>
                <div class="inp-total d-flex justify-content-around">
                    <div class="inp-all">
                        <label class="lbl"> &nbsp;</label>
                        <div class="inp-box">
                            <label class="c">Course 1:    </label>
                            <input class="input" type="text" name="course1" id="course1" required 
                            value="<?php echo isset($_POST['course1']) ? $_POST['course1'] : '' ?>">
                        </div>
                        <div class="inp-box">
                            <label class="c">Course 2:    </label>
                            <input class="input" type="text" name="course2" id="course2" required
                            value="<?php echo isset($_POST['course2']) ? $_POST['course2'] : '' ?>">
                        </div>
                        <div class="inp-box">
                            <label class="c">Course 3:    </label>
                            <input class="input" type="text" name="course3" id="course3" required
                            value="<?php echo isset($_POST['course3']) ? $_POST['course3'] : '' ?>">
                        </div>
                        <div class="inp-box">
                            <label class="c">Course 4:    </label>
                            <input class="input" type="text" name="course4" id="course4"
                            value="<?php echo isset($_POST['course4']) ? $_POST['course4'] : '' ?>">
                        </div>
                    </div>

                    <div class="sel-all">
                        <label class="lbl">Section</label>

                        <div class="sel-btn">
                            <button type="button" id="b1" class="btn-sec"><i class="fa fa-chevron-circle-right"></i></button>
                            <select id="s1" name="s1">
                                <option>Random</option>
                             </select>
                        </div>
                        <div class="sel-btn">
                            <button type="button" id="b2" class="btn-sec"><i class="fa fa-chevron-circle-right"></i> </button>
                            <select id="s2" name="s2">
                               <option>Random</option>
                              </select>
                        </div>
                        <div class="sel-btn">
                            <button type="button" id="b3" class="btn-sec"><i class="fa fa-chevron-circle-right"></i></button>
                            <select id="s3" name="s3">
                                 <option>Random</option>
                             </select>
                        </div>
                        <div class="sel-btn">
                            <button type="button" id="b4" class="btn-sec"><i class="fa fa-chevron-circle-right"></i></button>
                            <select id="s4" name="s4">
                                <option>Random</option>
                              </select>
                        </div>
                    </div>

                </div>
                <br><br>

                <div class="sub-res d-flex justify-content-around">
                    <button class="reset btn-light" type="reset">Reset
                    <i class="fa fa-refresh"></i>
               </button>

                    <button type="submit" class="sub" name="sub">Submit
                   <i class="material-icons">arrow_forward</i>
               </button>
                </div>
                <br>
            </fieldset>
        </form>
    </div>
    <br>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $("button").click(function() {
            var id = this.id;
            var received_course = 0;

            if (id == "b1") {
                received_course = document.getElementById("course1").value;
                document.getElementById("s1").options.length = 0;
                var index = "Random";
                $('#s1').append('<option selected="selected">' + index + '</option>');
                $.ajax({
                    url: 'get_section.php',
                    method: 'POST',
                    data: {
                        course: JSON.stringify(received_course)
                    },
                    success: function(retrived) {
                      retrived = JSON.parse(retrived);
                        for (var i = 0; i < retrived.length; i++) {
                            var index = retrived[i];
                            $('#s1').append('<option selected="selected">' + index + '</option>');
                        }
                    }
                });

            } else if (id == "b2") {
                received_course = document.getElementById("course2").value;
                document.getElementById("s2").options.length = 0;
                var index = "Random";
                $('#s2').append('<option selected="selected">' + index + '</option>');
                $.ajax({
                    url: 'get_section.php',
                    method: 'POST',
                    data: {
                        course: JSON.stringify(received_course)
                    },
                    success: function(retrived) {
                      retrived = JSON.parse(retrived);
                        for (var i = 0; i < retrived.length; i++) {
                            var index = retrived[i];
                            $('#s2').append('<option selected="selected">' + index + '</option>');
                        }
                    }
                });
            } else if (id == "b3") {
                received_course = document.getElementById("course3").value;
                document.getElementById("s3").options.length = 0;
                var index = "Random";
                $('#s3').append('<option selected="selected">' + index + '</option>');
                $.ajax({
                    url: 'get_section.php',
                    method: 'POST',
                    data: {
                        course: JSON.stringify(received_course)
                    },
                    success: function(retrived) {
                      retrived = JSON.parse(retrived);
                        for (var i = 0; i < retrived.length; i++) {
                            var index = retrived[i];
                            $('#s3').append('<option selected="selected">' + index + '</option>');
                        }
                    }
                });
            } else if (id == "b4") {
                received_course = document.getElementById("course4").value;
                document.getElementById("s4").options.length = 0;
                var index = "Random";
                $('#s4').append('<option selected="selected">' + index + '</option>');
                $.ajax({
                    url: 'get_section.php',
                    method: 'POST',
                    data: {
                        course: JSON.stringify(received_course)
                    },
                    success: function(retrived) {
                      retrived = JSON.parse(retrived);
                        for (var i = 0; i < retrived.length; i++) {
                            var index = retrived[i];
                            $('#s4').append('<option selected="selected">' + index + '</option>');
                        }
                    }
                });
            }

        });
    </script>
   </body>


<?php
if(isset($_POST['sub'])){

  ?>
  <script>
      $(function() {
          $('html, body').animate({
              scrollTop: $("#print-area").offset().top
          }, 2000);
       });
  </script>
  <?php


  $course1=strtoupper($_POST['course1']);
  $course2=strtoupper($_POST['course2']);
  $course3=strtoupper($_POST['course3']);
  $course4=strtoupper($_POST['course4']);
  $c1s=$_POST['s1'];
  $c2s=$_POST['s2'];
  $c3s=$_POST['s3'];
  $c4s=$_POST['s4'];
  $c1lab=$course1."LAB";
  $c2lab=$course2."LAB";
  $c3lab=$course3."LAB";
  $c4lab=$course4."LAB";
if (strlen($course1) == 0 || strlen($course2) == 0 || strlen($course3) == 0)
 echo "<script>alert('Please Fill up First 3 Courses')</script>";


  $q=$db->query("SELECT * FROM advising_list WHERE course='$course1' or course='$c1lab' or course='$course2' or course='$c2lab' or course='$course3' or course='$c3lab' or course='$course4' or course='$c4lab'");
  $i=0;
  $course=array();
  $section=array();
  $stime=array();
  $etime=array();
  $day=array();
  $room=array();
  $nstime=array();
  $netime=array();
  $nday=array();
  while ($p=$q->fetch(PDO::FETCH_OBJ)) {
    $course[$i]=$p->course;
    $section[$i]=$p->section;
    $stime[$i]=$p->stime;
    $etime[$i]=$p->etime;
    $day[$i]=$p->day;
    $room[$i]=$p->room;

						if(strlen($stime[$i]) == 0 || $stime[$i]=='') {
							$nstime[$i]=0;
							$netime[$i]=0;
						}
						else {
					 $minute=0;
           $time = explode(':', $stime[$i]);

						if(is_numeric($time[0]))
            {
              $minute = ($time[0]*60) + ($time[1]);
              if ($time[0]<8)
  						$minute=$minute+(12*60);
            }
              else {
              //  echo "<script>alert('not numeric')</script>";
                $minute=0;
              }
						$nstime[$i]=$minute;

            $minute=0;
            $time = explode(':', $etime[$i]);
 						if(is_numeric($time[0]))
             {
               $minute = ($time[0]*60) + ($time[1]);
               if ($time[0]<8)
   						$minute=$minute+(12*60);
             }
               else {
               //  echo "<script>alert('not numeric')</script>";
                 $minute=0;
               }
             $netime[$i]=$minute;
             $minute=0;
						}

$i++;
  }
$course[$i]=" ";
$section[$i]=" ";
$course[$i+1]=" ";
$section[$i+1]=" ";
$day[$i]=" ";
$day[$i+1]=" ";
$nday[$i]=" ";
$nday[$i+1]=" ";
$nstime[$i]=" ";
$nstime[$i+1]=" ";
$netime[$i]=" ";
$netime[$i+1]=" ";
for($i=0;$i<sizeof($course);$i++) {
      if(strcmp($course[$i],$course[$i+1])==0 && $section[$i]==$section[$i+1])
      {
        $nday[$i]=$day[$i] . "" . $day[$i+1];
        $nday[$i+1]=$day[$i] . "" . $day[$i+1];
        $i++;
      }
      else {
        $nday[$i]=$day[$i];
      }

    }
    for($i=0;$i<sizeof($course);$i++) {
    if(strcmp($nday[$i],"RT")==0)
      $nday[$i]="TR";
     if(strcmp($nday[$i],"TS")==0)
      $nday[$i]="ST";
     if(strcmp($nday[$i],"WM")==0)
      $nday[$i]="MW";
     if(strcmp($nday[$i],"RS")==0)
      $nday[$i]="SR";
    }

$invalid=1;
if(!in_array($course1,$course) || $course1=="") {
  $invalid=0;
 echo "<script>alert('Course1 is Not Available in the List!')</script>";
}
if(!in_array($course2,$course) || $course2=="") {
  $invalid=0;
 echo "<script>alert('Course2 is Not Available in the List!')</script>";
}
if(!in_array($course3,$course) || $course3=="") {
  $invalid=0;
 echo "<script>alert('Course3 is Not Available in the List!')</script>";
}
$takenc4=1;
if(!in_array($course4,$course) || $course4=="") {
  if($course4=="" || $course4==" ")
    $takenc4=0;
  else {
    $invalid=0;
    echo "<script>alert('Course4 is Not Available in the List!')</script>";
  }
}
if($invalid!=0){

$rtn_course = array();
$rtn_section= array();

  $sectaken=0;$course1sec=0;$course2sec=0;$course3sec=0;$course4sec=0;
			 if($c1s!="Random")
			 {
				 $course1sec=1;
         $sectaken++;
			 }
			 if($c2s!="Random")
			 {
				 $course2sec=1;
         $sectaken++;
			 }
			 if($c3s!="Random")
			 {
				 $course3sec=1;
         $sectaken++;
			 }
			 if($c4s!="Random")
			 {
				 $course4sec=1;
         $sectaken++;
			 }


       if($sectaken>0) {
         include 'secwise.php';
       				if($sectaken==1) {
       					if($course1sec==1) {
       						if($takenc4==1) {
                    secwise($course1,$course2,$course3,$course4,$c1s,$c2s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course3,$course2,$course4,$c1s,$c3s,$c2s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course4,$course3,$course2,$c1s,$c4s,$c3s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course3,$course4,$course2,$c1s,$c3s,$c4s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course2,$course4,$course3,$c1s,$c2s,$c4s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course4,$course2,$course3,$c1s,$c4s,$c2s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       						else {
                    secwise($course1,$course2,$course3,$course4,$c1s,$c2s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course3,$course2,$course4,$c1s,$c3s,$c2s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}

       					}
       					else if($course2sec==1)
       					{
       						if($takenc4==1) {
                    secwise($course2,$course1,$course3,$course4,$c2s,$c1s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course3,$course1,$course4,$c2s,$c3s,$c1s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course4,$course3,$course1,$c2s,$c4s,$c3s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course3,$course4,$course1,$c2s,$c3s,$c4s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course1,$course4,$course3,$c2s,$c1s,$c4s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course4,$course1,$course3,$c2s,$c4s,$c1s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       						else {
                    secwise($course2,$course1,$course3,$course4,$c2s,$c1s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course3,$course1,$course4,$c2s,$c3s,$c1s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  }
       					}
       					else if($course3sec==1)
       					{
       						if($takenc4==1) {
                    secwise($course3,$course2,$course1,$course4,$c3s,$c2s,$c1s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course1,$course2,$course4,$c3s,$c1s,$c2s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course4,$course1,$course2,$c3s,$c4s,$c1s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course1,$course4,$course2,$c3s,$c1s,$c4s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course2,$course4,$course1,$c3s,$c2s,$c4s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course4,$course2,$course1,$c3s,$c4s,$c2s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                }
       						else {
                  secwise($course3,$course2,$course1,$course4,$c3s,$c2s,$c1s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  secwise($course3,$course1,$course2,$course4,$c3s,$c1s,$c2s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}

       					}
       					else if($course4sec==1)
       					{
       						if($takenc4==1) {
                    secwise($course4,$course2,$course3,$course1,$c4s,$c2s,$c3s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course4,$course3,$course2,$course1,$c4s,$c3s,$c2s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course4,$course1,$course3,$course2,$c4s,$c1s,$c3s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course4,$course3,$course1,$course2,$c4s,$c3s,$c1s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course4,$course2,$course1,$course3,$c4s,$c2s,$c1s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course4,$course1,$course2,$course3,$c4s,$c1s,$c2s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  }
       					}
       				}
       				if($sectaken==2) {
       					if($course1sec==1 && $course2sec==1) {
       						if($takenc4==1) {
                    secwise($course1,$course2,$course3,$course4,$c1s,$c2s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course2,$course4,$course3,$c1s,$c2s,$c4s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       						else {
                    secwise($course1,$course2,$course3,$course4,$c1s,$c2s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       						}
       					else if($course1sec==1 && $course3sec==1) {
       						if($takenc4==1) {
                    secwise($course1,$course3,$course2,$course4,$c1s,$c3s,$c2s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course3,$course4,$course2,$c1s,$c3s,$c4s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       						else {
                    secwise($course1,$course3,$course2,$course4,$c1s,$c3s,$c2s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  }
       					}
       					else if($course1sec==1 && $course4sec==1) {
       						if($takenc4==1) {
                    secwise($course1,$course4,$course3,$course2,$c1s,$c4s,$c3s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course1,$course4,$course2,$course3,$c1s,$c4s,$c2s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  }
       					}

       					else if($course2sec==1 && $course3sec==1) {
       						if($takenc4==1) {
                    secwise($course3,$course2,$course1,$course4,$c3s,$c2s,$c1s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course2,$course4,$course1,$c3s,$c2s,$c4s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  }
       						else {
                    secwise($course2,$course3,$course1,$course4,$c2s,$c3s,$c1,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       					}
       					else if($course2sec==1 && $course4sec==1) {
       						if($takenc4==1) {
                    secwise($course2,$course4,$course1,$course3,$c2s,$c4s,$c1s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course2,$course4,$course3,$course1,$c2s,$c4s,$c3s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                  }
       					}
       					else if($course3sec==1 && $course4sec==1) {
       						if($takenc4==1) {
                    secwise($course3,$course4,$course1,$course2,$c3s,$c4s,$c1s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
                    secwise($course3,$course4,$course2,$course1,$c3s,$c4s,$c2s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       					}
       					}
       				if($sectaken==3) {
       					if($course1sec==1 && $course2sec==1 && $course3sec==1) {
                    secwise($course1,$course2,$course3,$course4,$c1s,$c2s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       					else if($course1sec==1 && $course2sec==1 && $course4sec==1) {
                  secwise($course1,$course2,$course4,$course3,$c1s,$c2s,$c4s,$c3s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       					else if($course1sec==1 && $course3sec==1 && $course4sec==1) {
                  secwise($course1,$course3,$course4,$course2,$c1s,$c3s,$c4s,$c2s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       					else if($course2sec==1 && $course3sec==1 && $course4sec==1) {
                  secwise($course2,$course3,$course4,$course1,$c2s,$c3s,$c4s,$c1s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       						}
       				}
       				if($sectaken==4)
       				{
                secwise($course1,$course2,$course3,$course4,$c1s,$c2s,$c3s,$c4s,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
       				}
       			 }

          else {
            include 'random.php';
          if($takenc4==0){
            random_maker($course1,$course2,$course3,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
            random_maker($course2,$course1,$course3,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
            random_maker($course3,$course1,$course2,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
 				 	  random_maker($course2,$course3,$course1,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
 					  random_maker($course1,$course3,$course2,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
            random_maker($course3,$course2,$course1,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
          }
          else{
           random_maker($course1,$course2,$course3,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
           random_maker($course1,$course4,$course3,$course2,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
           random_maker($course1,$course2,$course4,$course3,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course1,$course3,$course4,$course2,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course1,$course3,$course2,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
           random_maker($course1,$course4,$course2,$course3,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);

					 random_maker($course2,$course4,$course1,$course3,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course2,$course4,$course3,$course1,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course2,$course1,$course4,$course3,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course2,$course1,$course3,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course2,$course3,$course4,$course1,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course2,$course3,$course1,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);

					 random_maker($course3,$course4,$course2,$course1,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course3,$course4,$course1,$course2,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course3,$course2,$course4,$course1,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course3,$course2,$course1,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course3,$course1,$course4,$course2,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course3,$course1,$course2,$course4,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);

   				 random_maker($course4,$course1,$course2,$course3,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
				   random_maker($course4,$course1,$course3,$course2,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course4,$course2,$course1,$course3,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course4,$course2,$course3,$course1,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course4,$course3,$course1,$course2,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
					 random_maker($course4,$course3,$course2,$course1,$rtn_course,$rtn_section,$course,$section,$nstime,$netime,$day,$nday);
         }
       }

           $new_course = array();
           $new_section= array();
           $new_stime = array();
           $new_etime= array();
           $new_day= array();

 if($takenc4==1){
   for($i=0;$i<sizeof($rtn_course)-3;$i=$i+4){
      $c1=$rtn_course[$i];
      $c2=$rtn_course[$i+1];
      $c3=$rtn_course[$i+2];
      $c4=$rtn_course[$i+3];
      $s1=$rtn_section[$i];
      $s2=$rtn_section[$i+1];
      $s3=$rtn_section[$i+2];
      $s4=$rtn_section[$i+3];
   for($j=0;$j<sizeof($rtn_course)-3;$j=$j+4){
     if($i==$j)
       continue;
     $nc1=$rtn_course[$j];
     $nc2=$rtn_course[$j+1];
     $nc3=$rtn_course[$j+2];
     $nc4=$rtn_course[$j+3];
     $ns1=$rtn_section[$j];
     $ns2=$rtn_section[$j+1];
     $ns3=$rtn_section[$j+2];
     $ns4=$rtn_section[$j+3];

     if(($c1==($nc1) && $s1==($ns1)) || ($c1==($nc2) && $s1==($ns2)) || ($c1==($nc3) && $s1==($ns3)) || ($c1==($nc4) && $s1==($ns4))) {
		 if(($c2==($nc1) && $s2==($ns1)) || ($c2==($nc2) && $s2==($ns2)) || ($c2==($nc3) && $s2==($ns3)) || ($c1==($nc4) && $s1==($ns4))) {
		 if(($c3==($nc1) && $s3==($ns1)) || ($c3==($nc2) && $s3==($ns2)) || ($c3==($nc3) && $s3==($ns3)) || ($c1==($nc4) && $s1==($ns4))) {
		 if(($c4==($nc1) && $s4==($ns1)) || ($c4==($nc2) && $s4==($ns2)) || ($c4==($nc3) && $s3==($ns3)) || ($c4==($nc4) && $s4==($ns4))) {
		 if(!$c1==("0") || !$c2==("0") || !$c3==("0") || !$c4==("0")) {

       $rtn_course[$j]="0";
       $rtn_course[$j+1]="0";
       $rtn_course[$j+2]="0";
       $rtn_course[$j+3]="0";
       $rtn_section[$j]="0";
       $rtn_section[$j+1]="0";
       $rtn_section[$j+2]="0";
       $rtn_section[$j+3]="0";

   }}}}}

      }

    }
  }
  else {
    for($i=0;$i<sizeof($rtn_course)-2;$i=$i+3){
       $c1=$rtn_course[$i];
       $c2=$rtn_course[$i+1];
       $c3=$rtn_course[$i+2];
       $s1=$rtn_section[$i];
       $s2=$rtn_section[$i+1];
       $s3=$rtn_section[$i+2];
    for($j=0;$j<sizeof($rtn_course)-2;$j=$j+3){
      $nc1=$rtn_course[$j];
      $nc2=$rtn_course[$j+1];
      $nc3=$rtn_course[$j+2];
      $ns1=$rtn_section[$j];
      $ns2=$rtn_section[$j+1];
      $ns3=$rtn_section[$j+2];

      if(($c1==($nc1) && $s1==($ns1)) || ($c1==($nc2) && $s1==($ns2)) || ($c1==($nc3) && $s1==($ns3))) {
      if(($c2==($nc1) && $s2==($ns1)) || ($c2==($nc2) && $s2==($ns2)) || ($c2==($nc3) && $s2==($ns3))) {
      if(($c3==($nc1) && $s3==($ns1)) || ($c3==($nc2) && $s3==($ns2)) || ($c3==($nc3) && $s3==($ns3))) {
      if($i!=$j && (!$c1==("0") || !$c2==("0") || !$c3==("0"))) {

        $rtn_course[$j]="0";
        $rtn_course[$j+1]="0";
        $rtn_course[$j+2]="0";
        $rtn_section[$j]="0";
        $rtn_section[$j+1]="0";
        $rtn_section[$j+2]="0";

    }}}}

       }
      }
    }
    if($takenc4==1){
    for($i=0;$i<sizeof($rtn_course)-3;$i=$i+4){
      $c1=$rtn_course[$i];
      $c2=$rtn_course[$i+1];
      $c3=$rtn_course[$i+2];
      $c4=$rtn_course[$i+3];
      $s1=$rtn_section[$i];
      $s2=$rtn_section[$i+1];
      $s3=$rtn_section[$i+2];
      $s4=$rtn_section[$i+3];

       if($c1=="0" || $c2=="0" || $c3=="0" || $c4=="0"){
       //no solution
       }
       else {
         for($j=0;$j<sizeof($course);$j++) {
								if($course[$j]==$c1 && $section[$j]==$s1) {
									$new_course[]=$course[$j];
                  $new_section[]=$section[$j];
                  $new_stime[]=$stime[$j];
                  $new_etime[]=$etime[$j];
                  $new_day[]=$nday[$j];
								break;
								}
							}
              for($j=0;$j<sizeof($course);$j++) {
                     if($course[$j]==$c2 && $section[$j]==$s2) {
                       $new_course[]=$course[$j];
                       $new_section[]=$section[$j];
                       $new_stime[]=$stime[$j];
                       $new_etime[]=$etime[$j];
                       $new_day[]=$nday[$j];
                     break;
                     }
                   }
                   for($j=0;$j<sizeof($course);$j++) {
                         if($course[$j]==$c3 && $section[$j]==$s3) {
                           $new_course[]=$course[$j];
                            $new_section[]=$section[$j];
                            $new_stime[]=$stime[$j];
                            $new_etime[]=$etime[$j];
                            $new_day[]=$nday[$j];
                         break;
                         }
                       }
                       for($j=0;$j<sizeof($course);$j++) {
                             if($course[$j]==$c4 && $section[$j]==$s4) {
                               $new_course[]=$course[$j];
                                $new_section[]=$section[$j];
                                $new_stime[]=$stime[$j];
                                $new_etime[]=$etime[$j];
                                $new_day[]=$nday[$j];
                             break;
                             }
                           }

                  }
                }
              }
      else {
        for($i=0;$i<sizeof($rtn_course)-2;$i=$i+3){
          $c1=$rtn_course[$i];
          $c2=$rtn_course[$i+1];
          $c3=$rtn_course[$i+2];
          $s1=$rtn_section[$i];
          $s2=$rtn_section[$i+1];
          $s3=$rtn_section[$i+2];
           if($c1=="0" || $c2=="0" || $c3=="0"){
             //no solution
           }
           else {
             for($j=0;$j<sizeof($course);$j++) {
    								if($course[$j]==$c1 && $section[$j]==$s1) {
    									$new_course[]=$course[$j];
                      $new_section[]=$section[$j];
                      $new_stime[]=$stime[$j];
                      $new_etime[]=$etime[$j];
                      $new_day[]=$nday[$j];
    								break;
    								}
    							}
                  for($j=0;$j<sizeof($course);$j++) {
                         if($course[$j]==$c2 && $section[$j]==$s2) {
                           $new_course[]=$course[$j];
                           $new_section[]=$section[$j];
                           $new_stime[]=$stime[$j];
                           $new_etime[]=$etime[$j];
                           $new_day[]=$nday[$j];
                         break;
                         }
                       }
                       for($j=0;$j<sizeof($course);$j++) {
                             if($course[$j]==$c3 && $section[$j]==$s3) {
                               $new_course[]=$course[$j];
                                $new_section[]=$section[$j];
                                $new_stime[]=$stime[$j];
                                $new_etime[]=$etime[$j];
                                $new_day[]=$nday[$j];
                             break;
                             }
                           }
                      }
                    }
              }
?>
<br><br>

<div class="routine"  id="print-area">
  
<div class="print-btn" style="text-align: right">
      <a class="no-print" href="javascript:print('print-area');">Print</a>
</div><br>
  <h2>Generated Routine</h2>
  <?php
  $count=0;$type=0;

  for($i=0;$i<sizeof($new_course);$i++) {
    ?>
    <?php if($count==0) {
						?>	<br><td>[<?= $type+1; ?>]</td><br> <?php
							$type++;
						}
						if($count==4 && $takenc4==1) {
							 $type++;
							 ?>	<br><td>[<?= $type; ?>]</td><br> <?php
							 $count=0;
						 }
             else if($count==3 && $takenc4==0) {
                $type++;
                ?>	<br><td>[<?= $type; ?>]</td><br> <?php
                $count=0;
              }

              ?>

      <td><?= $new_course[$i]; ?></td>----
      <td><?= $new_section[$i]; ?></td>----
      <td><?= $new_stime[$i]; ?></td>----
      <td><?= $new_etime[$i]; ?></td>----
      <td><?= $new_day[$i]; ?></td><br>

    <?php
    if(in_array($new_course[$i].""."LAB",$course)) {
       for($j=0;$j<sizeof($course);$j++) {
         if(strcmp($course[$j],$new_course[$i].""."LAB")==0 && $section[$j]==$new_section[$i]) {
           ?>	<i><td><?= $course[$j]; ?></td>----
              <td><?= $stime[$j]; ?></td>----
              <td><?= $etime[$j]; ?></td>----
              <td><?= $day[$j]; ?></i></td><br>
            <?php
           break;
         }
       }
     }



$count++;
  } ?>
  <br>


</div>



<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;text-align:center;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script>
function print(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML ='<style>' + a + '</style>' +  b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
<?php

}

}

 ?>


</html>
