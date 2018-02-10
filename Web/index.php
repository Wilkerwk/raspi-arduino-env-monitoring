<!DOCTYPE html>
<html>
<head>
  
  <title>Data Center</title>

  <script>
  var limit="00:15"

  var title = document.title
  var parselimit=limit.split(":")
  parselimit=parselimit[0]*60+parselimit[1]*1

  function mulaiRef(){
    if (parselimit==1)
      window.location.reload()
    else{ 
      parselimit-=1
      menit=Math.floor(parselimit/60)
      detik=parselimit%60
      if (menit!=0)
        time=menit+" menit dan "+detik+" detik sebelum refresh"
      else
        time=detik+" detik sebelum refresh"
      document.title = title + ' (' + time +')'
      setTimeout("mulaiRef()",1000)
    }
  }

  if (window.addEventListener)
    window.addEventListener("load", mulaiRef, false)
  else if (window.attachEvent)
    window.attachEvent("load", mulaiRef)
  </script>

  <script src="js/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<body>

  <nav class="w3-sidenav w3-red" style="width:70px">
    <img class="w3-padding-16" src="img/logo_telu.png" class="w3-hover-opacity" alt="Norway" style="width:90%; margin:0 auto">
    <a class="w3-padding-16" href="index.php"><i class="fa fa-dashboard w3-xxlarge"></i></a>
    <a class="w3-padding-16" href="graph.php"><i class="fa fa-line-chart w3-xxlarge"></i></a>
  </nav>

  <?php

    $username="root";
    $password="root";
    $database="doaIbuProject";

    mysql_connect('localhost',$username,$password);
    @mysql_select_db($database) or die ("Unable to select database");

    $query="SELECT * from sensorDataExt";
    $result=mysql_query($query);
    $num=mysql_numrows($result);

    mysql_close();

    $i=0;
    while ($i <$num)
    {
      $temp = mysql_result($result,$i,"temperature");
      $temp2 = mysql_result($result,$i,"humidity");
      $temp3 = mysql_result($result,$i,"gas1");
      $temp4 = mysql_result($result,$i,"gas2");
      $tempValues=$temp;
      $tempValues2=$temp2;
      $tempValues3=$temp3;
      $tempValues4=$temp4;
      $i++;
    }

  ?>

  <div class="w3-container" style="margin-left:70px">
  <div class="w3-border-bottom w3-border-deep-orange">
    <h1><b>Data Center Direktorat Sistem Informasi</b></h1>
    <h1><b>Telkom University</b></h1>
  </div>
    <div class="w3-half" style="padding:20px">

      <p style="left:233px"><b><u>Temperature</u></b></p>
        <div class="de">
            <div class="den">
              <div class="dene">
                <div class="denem">
                  <div class="deneme">
                <span><?php echo $tempValues;?></span><strong>&deg;c</strong>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <p style="left:235px"><b><u>Flammable</u></b></p>
        <div class="de">
            <div class="den">
              <div class="dene">
                <div class="denem">
                  <div class="deneme">
                <span3><?php echo $tempValues3;?></span3><strong2><b>ppm</b></strong2>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>


    <div class="w3-half" style="padding:20px">

      <p style="left:246px"><b><u>Humidity</u></b></p>
        <div class="de">
            <div class="den">
              <div class="dene">
                <div class="denem">
                  <div class="deneme">
                <span2><?php echo $tempValues2;?></span2><strong>%</strong>
                  </div>
                </div>
              </div>
            </div>
        </div>

      <p style="left:215px"><b><u>Carbon Monoxide</u></b></p>
        <div class="de">
            <div class="den">
              <div class="dene">
                <div class="denem">
                  <div class="deneme">
                <span4><?php echo $tempValues4;?></span4><strong2><b>ppm</b></strong2>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>
  </div>   
</body>
</html>
