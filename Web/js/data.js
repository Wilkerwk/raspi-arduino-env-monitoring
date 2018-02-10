$(function() {

var time = [];
var temperature = [];
var humidity = [];
//var gas = [];

var series = 1;

$.get('values.php', function(data) {

data = data.split('/');
for (var i in data) {

switch(series){
case 1:
time.push(data[i]);
series = 2;
break;
case 2:
temperature.push(parseFloat(data[i]));
series = 3;
break;
case 3:
humidity.push(parseFloat(data[i]));
series = 1;
break;
//case 4:
//gas.push(parseFloat(data[i]));
//series = 1;
//break;
default:
//None
}
}

time.pop();

$('#chart').highcharts({
chart : {
type : 'spline'
},
title : {
text : ''
},
subtitle : {
text : ''
},
xAxis : {
title : {
text : 'time'
},
categories : time
},
yAxis : [{
title : {
text : 'Temperature'
},
labels : {
formatter : function() {
return this.value + ' \xB0C'
}
}
}, {
	title : {
		text : 'Humidity'
	},
	labels : {
		formatter : function() {
			return this.value + ' %'
		}
	},
opposite :true
}],
tooltip : {
crosshairs : true,
shared : true,
},
plotOptions : {
spline : {
marker : {
radius : 4,
lineColor : '#666666',
lineWidth : 1
}
}
},
series : [{

name : 'Temperature',
data : temperature,
yAxis:0,
dashStyle : 'shortdot',
tooltip : {
	valueSuffix : ' \xB0C'
}
},{

name : 'Humidity',
data : humidity,
yAxis:1,
tooltip : {
	valueSuffix : ' %'
}
}]
});
});
});