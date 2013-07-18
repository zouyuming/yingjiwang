/*
 * 依赖highcharts 2.3.3、jquery 1.8
 * 
 */
if (!window.JS_lib) {
	window.JS_lib = {};
}

Highcharts.getOptions().colors = [
	'#4CA8E1', //blue
	'#FE6161', //red
	'#7ECA97', //green
	'#FEC147', //yellow
	'#3D96AE', 
	'#DB843D', 
	'#92A8CD', 
	'#A47D7C', 
	'#B5CA92'];

JS_lib.Highcharts = {
	renderLineChart: function(container,queryString, xAxies, series, clickFunction, options) {//console.log("参数："+queryString)
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 270,
				type: 'line'
			},
			exporting: {
//				enabled:true,
                                 buttons: {
                                    exportButton: {
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
                                                //替换或反转义&字符
                                                queryString = queryString.replace(/&amp;/g,"&");
                                                if(container == 'media_volume_trend_chart_container'){
                                                    if(options.target == "competition"){
                                                        //打开export页面下载图表数据,针对竞品页面折线图（舆情信息总量分布走势图）
                                                        window.open( Config.BaseURL + 'competition/compare_trendency/exportExcelDataForCompetitionLineChart?container=media_volume_trend_chart_container&' + queryString);
                                                        
                                                    }else{
                                                        //打开export页面下载图表数据
                                                        window.open( Config.BaseURL + 'graph/volume_trendency/exportExcelDataForVolumeLineChart?container=media_volume_trend_chart_container&' + queryString);
                                                    }
                                                }else if(container == 'media_senti_detail_chart_container'){
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/senti_trendency/exportExcelDataForSentiLineChart?container=media_senti_detail_chart_container&' + queryString);
                                                }
                                            }
                                        }, 
                                        null, 
                                        null
                                        ]
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: xAxies,
				startOnTick: true,
				gridLineWidth: 1,
				gridLineColor: '#F2F2F2',
				tickmarkPlacement: 'on',
				pointPlacement: 'on'
			},
			yAxis: {
				title: {
					text: ''
				},
				min: 0,
				gridLineWidth: 1,
				gridLineColor: '#F2F2F2'
			},
			tooltip: {
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
					this.x +': '+ this.y;
				}
			},
			plotOptions: {
                                spline: {
                                    marker: {
                                        radius: 4,
                                        lineColor: '#666666',
                                        lineWidth: 1
                                    }
                                },
				series: {
					allowPointSelect: true,
					marker: {
						states: {
							select: {
								fillColor: '#FFFFFF',
								lineWidth: 6,
								lineColor: null,
								radius: 8
							}
						},
						symbol: 'circle',
						fillColor: '#FFFFFF',
						lineWidth: 2,
						lineColor: null // inherit from series
					},
					cursor: 'pointer',
					point: {
						events: {
							click: function() {
								clickFunction(this.series.name, this.series.xAxis.categories[this.x]);
							}
						}
					}
				}
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				x: -100,
				y: 0,
				floating: true,
				borderWidth: 0
			},
			series: series,
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},
        
        renderLineHomeChart: function(container, xAxies, series, clickFunction, options) {
                var self = JS_lib.Highcharts;
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 235,
                                width:710,
				type: 'line'
			},
			exporting: {
//				enabled:true,
                                 buttons: {
                                    exportButton: {
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
                                                self.exportExcelDataForHomeLineChart();
                                            }
                                        }, 
                                        null, 
                                        null
                                        ]
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: xAxies,
				startOnTick: true,
				gridLineWidth: 1,
				gridLineColor: '#F2F2F2',
				tickmarkPlacement: 'on',
				pointPlacement: 'on'
			},
			yAxis: {
				title: {
					text: ''
				},
				min: 0,
				gridLineWidth: 1,
				gridLineColor: '#F2F2F2'
			},
			tooltip: {
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
					this.x +': '+ this.y;
				}
			},
			plotOptions: {
                                spline: {
                                    marker: {
                                        radius: 4,
                                        lineColor: '#666666',
                                        lineWidth: 1
                                    }
                                },
				series: {
					allowPointSelect: true,
					marker: {
						states: {
							select: {
								fillColor: '#FFFFFF',
								lineWidth: 6,
								lineColor: null,
								radius: 8
							}
						},
						symbol: 'circle',
						fillColor: '#FFFFFF',
						lineWidth: 2,
						lineColor: null // inherit from series
					},
					cursor: 'pointer',
					point: {
						events: {
							click: function() {
//								clickFunction(this.series.name, this.series.xAxis.categories[this.x]);
							}
						}
					}
				}
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				x: -100,
				y: 0,
				floating: true,
				borderWidth: 0
			},
			series: series,
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},

        /**
         * 导出首页折线图原始图表生成数据
         */
        exportExcelDataForHomeLineChart: function() {
            /*
            var self = WebpageManager;
            self.logAction("get_query_string_for_export");
            self.setMethod("get");
            self.searchForm.form('submit', {
                success: function (data) { // console.log(typeof(data));return;
                    //将搜索Form表单的anction和method属性重置
                    self.setAction('search');
                    self.setMethod("post");
                    data = $.parseJSON(data);
                    if(data.status == "false"){
                        $.messager.alert('Info', "结果数据超过"+data.pagesize+"条，请缩小查询范围分批导出!");
                    }else{
                        //替换或反转义&字符
                        var queryString = data.queryString.replace(/&amp;/g,"&");
                        //打开export页面下载查询到的信息
                        window.open(Config.CurrentURL + 'search_for_export' + '?' + queryString);
                    }
                }
            });
            */
            //打开export页面下载图表数据
            window.open( Config.BaseURL + 'graph/graphview/exportExcelDataForHomeLineChart');
            /*
            $.ajax({
                url: Config.BaseURL + 'graph/graphview/exportExcelDataForHomeLineChart',
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                    if (data) {
                        //if (data.error) {
                        $.messager.alert('Info', data.message);
                    //} else {

                    //}
                    }
                }
            });*/
            return true;
        },
        
        
        renderLineChartByHour: function(container, flag, queryString, xAxies, series, clickFunction, options) {
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 270,
				type: 'line'
			},
			exporting: {
//				enabled:true,
                                 buttons: {
                                    exportButton: {
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
                                                //替换或反转义&字符
                                                queryString = queryString.replace(/&amp;/g,"&");
                                                if(flag == 'volume_trendency'){
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/volume_trendency/exportExcelDataForVolumeLineChart?container=volume_trendency&' + queryString);
                                                    /*
                                                    $.ajax({
                                                        url: Config.BaseURL  + 'graph/volume_trendency/exportExcelDataForVolumeLineChart?container=volume_trendency',
                                                        type: 'post',
                                                        dataType: 'json',
                                                        success: function (data) {
                                                            console.log(data)
                                                            if (data) {
                                                                //if (data.error) {
                                                                $.messager.alert('Info', data.message);
                                                            //} else {

                                                            //}
                                                            }
                                                        }
                                                    });
                                                    */
                                                }else if(flag == 'senti_trendency'){
                                                    //var url = Config.BaseURL + 'graph/senti_trendency/exportExcelDataForSentiLineChart?container=senti_trendency' + queryString;
                                                    //console.log(url);return;
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/senti_trendency/exportExcelDataForSentiLineChart?container=senti_trendency&' + queryString);
                                                }
                                                
                                                     
                                            }
                                        }, 
                                        null, 
                                        null
                                        ]
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: xAxies,
				startOnTick: true,
				gridLineWidth: 1,
				gridLineColor: '#F2F2F2',
				tickmarkPlacement: 'on',
				pointPlacement: 'on'
			},
			yAxis: {
				title: {
					text: ''
				},
				min: 0,
				gridLineWidth: 1,
				gridLineColor: '#F2F2F2'
			},
			tooltip: {
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
					this.x +'点 : '+ this.y +'条';
				}
			},
			plotOptions: {
                                spline: {
                                    marker: {
                                        radius: 4,
                                        lineColor: '#666666',
                                        lineWidth: 1
                                    }
                                },
				series: {
					allowPointSelect: true,
					marker: {
						states: {
							select: {
								fillColor: '#FFFFFF',
								lineWidth: 6,
								lineColor: null,
								radius: 8
							}
						},
						symbol: 'circle',
						fillColor: '#FFFFFF',
						lineWidth: 2,
						lineColor: null // inherit from series
					},
					cursor: 'pointer',
					point: {
						events: {
							click: function() {
								clickFunction(this.series.name, this.series.xAxis.categories[this.x]);
							}
						}
					}
				}
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				x: -100,
				y: 0,
				floating: true,
				borderWidth: 0
			},
			series: series,
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},
        
	rendePieChart: function(container, flag, queryString, data, clickFunction,media,time, options) {
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 145
			},
			exporting: {
//				enabled:true,
                                 buttons: {
                                    exportButton: {
                                        x: 0,
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
                                                //替换或反转义&字符
                                                queryString = queryString.replace(/&amp;/g,"&");
                                                if(flag == 'media_pie_chart'){
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/senti_trendency/exportExcelDataForPieChart?flag=media_pie_chart&' + queryString);
                                                }else if(flag == 'senti_pie_chart'){
                                                    //var url = Config.BaseURL + 'graph/senti_trendency/exportExcelDataForSentiLineChart?container=senti_trendency' + queryString;
                                                    //console.log(url);return;
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/volume_trendency/exportExcelDataForPieChart?flag=senti_pie_chart&' + queryString);
                                                }
                                                
                                                     
                                            }
                                        }, 
                                        null, 
                                        null
                                        ]
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					innerSize: 50,
					borderWidth: 0,
					shadow: false,
					size: '95%',
					dataLabels: {
						enabled: true,
						color: '#FFFFFF',
						distance: -15,
						formatter: function() {
							return Highcharts.numberFormat(this.percentage, 2) +' %';
						}
					},
                                        events: {
                                            click: function(e) {
                                              clickFunction(e.point.name,time,media);
                                            }
                                        }
				}
                                
			},
			tooltip: {
				enabled: false
			},
			series: [{
				type: 'pie',
				data: data
			}],
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},
        
        rendeMediaPieChart: function(container, flag, queryString, data, clickFunction, options) {
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 170
			},
			exporting: {
//				enabled:true,
                                 buttons: {
                                    exportButton: {
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
                                                //替换或反转义&字符
                                                queryString = queryString.replace(/&amp;/g,"&");
                                                if(flag == 'media_pie_chart'){
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/pie_trendency/exportExcelDataForPieChart?flag=media_pie_chart&' + queryString);
                                                }else if(flag == 'senti_pie_chart'){
                                                    //var url = Config.BaseURL + 'graph/senti_trendency/exportExcelDataForSentiLineChart?container=senti_trendency' + queryString;
                                                    //console.log(url);return;
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'graph/pie_trendency/exportExcelDataForPieChart?flag=senti_pie_chart&' + queryString);
                                                }
                                                
                                                     
                                            }
                                        }, 
                                        null, 
                                        null
                                        ]
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					innerSize: 50,
					borderWidth: 0,
					shadow: false,
					size: '95%',
					dataLabels: {
						enabled: true,
						color: '#FFFFFF',
						distance: -15,
						formatter: function() {
							return Highcharts.numberFormat(this.percentage, 2) +' %';
						}
					},
                                        events: {
                                            click: function(e) {
                                              clickFunction(e.point.name);
                                            }
                                        }
				}
                                
			},
			tooltip: {
				enabled: false
			},
			series: [{
				type: 'pie',
				data: data
			}],
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},
        /*生成情感极性饼图*//*生成媒体类型饼图*/
        rendeHomeMediaPieChart: function(container, data, clickFunction, options) {
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 170
			},
			exporting: {
				enabled:false,
                                 buttons: {
                                    exportButton: {
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
//                                                self.exportExcelDataForHomeLineChart();
                                            }
                                        }, 
                                        null, 
                                        null
                                        ],
                                        x : -10
//                                        y : -10
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					innerSize: 50,
					borderWidth: 0,
					shadow: false,
					size: '95%',
					dataLabels: {
						enabled: true,
						color: '#FFFFFF',
						distance: -15,
						formatter: function() {
							return Highcharts.numberFormat(this.percentage, 2)  +' %';
						}
					}
				}
                                
			},
			tooltip: {
				formatter: function() {
					return this.point.name +': '+ this.y +'条';
				}
			},
			series: [{
				type: 'pie',
				data: data
			}],
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},
        
        rendeComparePieChart: function(container, data, queryString, flag, clickFunction,key_id, options) {
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: container,
				height: 145
			},
			exporting: {
//				enabled:true,
                                 buttons: {
                                    exportButton: {
                                        x: 0,
                                        menuItems: [{
                                            text: '导出PNG图片',
                                            onclick: function() {
                                                this.exportChart(); // 800px by default
                                            }
                                        },{
                                            text: '导出Excel',
                                            onclick: function() {
//                                                this.exportChart({
//                                                    width: 250
//                                                });
                                                //替换或反转义&字符
                                                queryString = queryString.replace(/&amp;/g,"&");
                                                if(flag == 'media_pie_chart'){
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'competition/pie_trendency/exportExcelDataForCompetitionPieChart?flag=media_pie_chart&key_id=' + key_id + '&' + queryString);
                                                }else if(flag == 'senti_pie_chart'){
                                                    //var url = Config.BaseURL + 'graph/senti_trendency/exportExcelDataForSentiLineChart?container=senti_trendency' + queryString;
                                                    //console.log(url);return;
                                                    //打开export页面下载图表数据
                                                    window.open( Config.BaseURL + 'competition/pie_trendency/exportExcelDataForCompetitionPieChart?flag=senti_pie_chart&key_id=' + key_id + '&' + queryString);
                                                }
                                                
                                                     
                                            }
                                        }, 
                                        null, 
                                        null
                                        ]
                                    },
                                    printButton: {
                                        enabled: false
                                    }
                                }
			},
			title: {
				text: ''
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					innerSize: 50,
					borderWidth: 0,
					shadow: false,
					size: '95%',
					dataLabels: {
						enabled: true,
						color: '#FFFFFF',
						distance: -15,
						formatter: function() {
							return Highcharts.numberFormat(this.percentage, 2) +' %';
						}
					},
                                        events: {
                                            click: function(e) {
                                              clickFunction(e.point.name,key_id);
                                            }
                                        }
				}
                                
			},
			tooltip: {
				enabled: false
			},
			series: [{
				type: 'pie',
				data: data
			}],
                        navigation: {
                            buttonOptions: {
                                backgroundColor: 'white'
                            }
                        }
		});
		return chart;
	},
        rendeClockChart:function(container, data){
        var chart = new Highcharts.Chart({
    
            chart: {
                renderTo: container,
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                height: 110,
                width:110,
                margin:[0,0,0,0],
                borderRadius:60,
                plotBorderColor:'#fdfdfd',
                plotShadow: false
            },
            title: {
                text: ''
            },
            exporting: {
                enabled:false
            },
            legend:{
                borderColor:'black'
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                    backgroundColor: {
                        linearGradient: {
                            x1: 0, 
                            y1: 0, 
                            x2: 0, 
                            y2: 1
                        },
                        stops: [
                        [0, '#FFF'],
                        [1, '#333']
                        ]
                    },
                    borderWidth: 0,
                    outerRadius: '109%'
                }, {
                    backgroundColor: {
                        linearGradient: {
                            x1: 0, 
                            y1: 0, 
                            x2: 0, 
                            y2: 1
                        },
                        stops: [
                        [0, '#333'],
                        [1, '#FFF']
                        ]
                    },
                    borderWidth: 1,
                    outerRadius: '107%'
                }, {
                // default background
                }, {
                    backgroundColor: '#DDD',
                    borderWidth: 0,
                    outerRadius: '105%',
                    innerRadius: '103%'
                }]
            },
           
            // the value axis
            yAxis: {
                min: 0,
                max: 100,
            
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
    
                tickPixelInterval: 30,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto',
                    style:{color:'#DFDFDF',display:'none'}
                },
                title: {
                    text: ''
                },
                plotBands: [{
                    from: 0,
                    to: 60,
                    color: '#DF5353' // red
                }, {
                    from: 60,
                    to: 85,
                    color: '#FEC147' // yellow
                }, {
                    from: 85,
                    to: 100,
                    color: '#55BF3B' // green
                }]        
            },
    
            series: [{
                name: '健康度',
                data: [data],
                tooltip: {
                    valueSuffix: ''
                }
            }]
        }
        );
    }
}