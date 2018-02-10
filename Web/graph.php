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
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
<script type="text/javascript" src="js/data.js" ></script>
<script type="text/javascript" src="js/data2.js" ></script>
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<body>

	<nav class="w3-sidenav w3-red" style="width:70px">
	    <img class="w3-padding-16" src="img/logo_telu.png" class="w3-hover-opacity" alt="Norway" style="width:90%; margin:0 auto">
	    <a class="w3-padding-16" href="index.php"><i class="fa fa-dashboard w3-xxlarge"></i></a>
	    <a class="w3-padding-16" href="#"><i class="fa fa-line-chart w3-xxlarge"></i></a>
  	</nav>

	<div class="w3-container" style="margin-left:70px">
	<div>
  	</div>
		<div id="chart" style="height: 400px; margin-top:50px; padding:10px"></div>
		<div id="chart2" style="height: 400px; margin: 0 auto; padding:10px"></div>
	</div>
</body>
</html>
