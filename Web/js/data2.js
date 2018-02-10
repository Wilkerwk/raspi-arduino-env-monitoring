$(function() {

var time = [];
var gas1 = [];
var gas2 = [];
//var gas = [];

var series = 1;

$.get('values2.php', function(data) {

data = data.split('/');
for (var i in data) {

switch(series){
case 1:
time.push(data[i]);
series = 2;
break;
case 2:
gas1.push(parseFloat(data[i]));
series = 3;
break;
case 3:
gas2.push(parseFloat(data[i]));
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

$('#chart2').highcharts({
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
text : 'Flammable'
},
labels : {
formatter : function() {
return this.value + ' ppm'
}
}
}, {
	title : {
		text : 'Carbon Monoxide'
	},
	labels : {
		formatter : function() {
			return this.value + ' ppm'
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

name : 'Flammable',
data : gas1,
yAxis:0,
dashStyle : 'shortdot',
tooltip : {
	valueSuffix : ' ppm'
}
},{

name : 'Carbon Monoxide',
data : gas2,
yAxis:1,
tooltip : {
	valueSuffix : ' ppm'
}
}]
});
});
});