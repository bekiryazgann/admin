$(window).on("load",function(){"use strict";var e="#f3f3f3",o=document.querySelector("#statistics-bar-chart"),t=document.querySelector("#statistics-line-chart"),s=document.querySelector("#line-area-chart-1"),a=document.querySelector("#line-area-chart-2"),r=document.querySelector("#line-area-chart-3"),i=document.querySelector("#line-area-chart-4"),d=document.querySelector("#line-area-chart-5"),l=document.querySelector("#line-area-chart-6"),n=document.querySelector("#line-area-chart-7"),e={chart:{height:70,type:"bar",stacked:!0,toolbar:{show:!1}},grid:{show:!1,padding:{left:0,right:0,top:-15,bottom:-15}},plotOptions:{bar:{horizontal:!1,columnWidth:"20%",startingShape:"rounded",colors:{backgroundBarColors:[e,e,e,e,e],backgroundBarRadius:5}}},legend:{show:!1},dataLabels:{enabled:!1},colors:[window.colors.solid.warning],series:[{name:"2020",data:[45,85,65,45,65]}],xaxis:{labels:{show:!1},axisBorder:{show:!1},axisTicks:{show:!1}},yaxis:{show:!1},tooltip:{x:{show:!1}}};new ApexCharts(o,e).render(),o={chart:{height:70,type:"line",toolbar:{show:!1},zoom:{enabled:!1}},grid:{borderColor:"#EBEBEB",strokeDashArray:5,xaxis:{lines:{show:!0}},yaxis:{lines:{show:!1}},padding:{top:-30,bottom:-10}},stroke:{width:3},colors:[window.colors.solid.info],series:[{data:[0,20,5,30,15,45]}],markers:{size:2,colors:window.colors.solid.info,strokeColors:window.colors.solid.info,strokeWidth:2,strokeOpacity:1,strokeDashArray:0,fillOpacity:1,discrete:[{seriesIndex:0,dataPointIndex:5,fillColor:"#ffffff",strokeColor:window.colors.solid.info,size:5}],shape:"circle",radius:2,hover:{size:3}},xaxis:{labels:{show:!0,style:{fontSize:"0px"}},axisBorder:{show:!1},axisTicks:{show:!1}},yaxis:{show:!1},tooltip:{x:{show:!1}}},new ApexCharts(t,o).render(),e={chart:{height:100,type:"area",toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.primary],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:2.5},fill:{type:"gradient",gradient:{shadeIntensity:.9,opacityFrom:.7,opacityTo:.5,stops:[0,80,100]}},series:[{name:"Subscribers",data:[28,40,36,52,38,60,55]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(s,e).render(),t={chart:{height:100,type:"area",toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.success],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:2.5},fill:{type:"gradient",gradient:{shadeIntensity:.9,opacityFrom:.7,opacityTo:.5,stops:[0,80,100]}},series:[{name:"Revenue",data:[350,275,400,300,350,300,450]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(a,t).render(),o={chart:{height:100,type:"area",toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.danger],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:2.5},fill:{type:"gradient",gradient:{shadeIntensity:.9,opacityFrom:.7,opacityTo:.5,stops:[0,80,100]}},series:[{name:"Sales",data:[10,15,7,12,3,16]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(r,o).render(),s={chart:{height:100,type:"area",toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.warning],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:2.5},fill:{type:"gradient",gradient:{shadeIntensity:.9,opacityFrom:.7,opacityTo:.5,stops:[0,80,100]}},series:[{name:"Orders",data:[10,15,8,15,7,12,8]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(i,s).render(),e={chart:{height:100,type:"line",dropShadow:{enabled:!0,top:5,left:0,blur:4,opacity:.1},toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.primary],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:5},fill:{type:"gradient",gradient:{shadeIntensity:1,gradientToColors:["#A9A2F6"],opacityFrom:1,opacityTo:1,stops:[0,100,100,100]}},series:[{name:"Traffic Rate",data:[150,200,125,225,200,250]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(d,e).render(),a={chart:{height:100,type:"line",dropShadow:{enabled:!0,top:5,left:0,blur:4,opacity:.1},toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.success],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:5},fill:{type:"gradient",gradient:{shadeIntensity:1,gradientToColors:["#55DD92"],opacityFrom:1,opacityTo:1,stops:[0,100,100,100]}},series:[{name:"Active Users",data:[750,1e3,900,1250,1e3,1200,1100]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(l,a).render(),t={chart:{height:100,type:"line",dropShadow:{enabled:!0,top:5,left:0,blur:4,opacity:.1},toolbar:{show:!1},sparkline:{enabled:!0},grid:{show:!1,padding:{left:0,right:0}}},colors:[window.colors.solid.warning],dataLabels:{enabled:!1},stroke:{curve:"smooth",width:5},fill:{type:"gradient",gradient:{shadeIntensity:1,gradientToColors:["#ffc085"],opacityFrom:1,opacityTo:1,stops:[0,100,100,100]}},series:[{name:"Newsletter",data:[365,390,365,400,375,400]}],xaxis:{labels:{show:!1},axisBorder:{show:!1}},yaxis:[{y:0,offsetX:0,offsetY:0,padding:{left:0,right:0}}],tooltip:{x:{show:!1}}},new ApexCharts(n,t).render()});