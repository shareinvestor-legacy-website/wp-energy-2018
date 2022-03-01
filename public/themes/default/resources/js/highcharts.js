class highchart {

    constructor()
    {
        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            },
        });
        var chart, merge = Highcharts.merge;
    }

    initColumn(selector, obj) {
        if ($(`#${selector}`).length) {
            var colors = Highcharts.getOptions().colors;
            colors = {
                linearGradient: {
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0
                },
                stops: [
                    [0, 'rgb(26, 71, 131)'],
                    [1, 'rgb(133, 186, 65)']
                ],
            };
            var categoriesData = obj.categories;

            var set_data = [
                {
                    name: categoriesData[0],
                    y: obj.setData[0],
                    color: obj.color,
                },
                {
                    name: categoriesData[1],
                    y: obj.setData[1],
                    color: obj.color,
                },
                {
                    name: categoriesData[2],
                    y: obj.setData[2],
                    color: obj.color,
                },
                {
                    name: categoriesData[3],
                    y: obj.setData[3],
                    color: colors
                },
                // {
                //     name: categoriesData[4],
                //     y: obj.setData[4],
                //     color: colors
                // }
                // ,
                // {
                //     name: categoriesData[5],
                //     y: obj.setData[5],
                //     color: colors
                // }
            ];

            return new Highcharts.Chart({
                chart: {
                    renderTo: selector,
                    type: 'column'
                },
                title: {
                    text: null
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    categories: categoriesData,
                    lineColor: '#7f7f7f',
                    tickWidth: 0,
                    // plotLines: [{
                    //     color: '#5d5d5d',
                    //     dashStyle: 'Dash',
                    //     width: 1,
                    //     value: 2.5
                    // }],
                    crosshair: true
                },
                yAxis: {
                    className: 'highcharts-color-0',
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: null
                    },
                    gridLineColor: '#1d5124',
                    gridLineWidth: 0,
                    labels: {
                        enabled: false
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:13px;font-weight:bold;">{point.key}</span><br>',
                    pointFormat: `<b>{point.y:,.0f} ${obj.tooltip}</b>`,
                    footerFormat: '',
                    useHTML: true
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'bold'
                            },

                        }
                    }
                },
                series: [{
                    name: name,
                    data: set_data,
                    color: 'white'
                }],
            });
        }
    }

    initStack(selector, obj) {
        if ($(`#${selector}`).length) {
            var categoriesData = obj.categories;

            this.chart = new Highcharts.Chart({
                chart: {
                    renderTo: selector,
                    type: 'column'
                },
                colors: obj.color,
                title: {
                    text: null
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    categories: categoriesData,
                    lineColor: '#7f7f7f',
                    tickWidth: 0,
                    // plotLines: [{
                    //         color: '#5d5d5d',
                    //         dashStyle: 'Dash',
                    //         width: 1,
                    //         value: 2.5
                    //     }],
                        crosshair: true
                },

                yAxis: {
                        allowDecimals: false,
                        min: 0,
                        title: {
                            text: null
                        },
                        gridLineColor: '#1d5124',
                        gridLineWidth: 0,
                        dataLabels: {
                        enabled: true,
                    },
                        labels: {
                            enabled: false
                        }
                },
                legend: {
                    align: 'center',
                    verticalAlign: 'top',
                },
                tooltip: {
                    headerFormat: '<p style="font-size:13px;"><b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color};padding:0;font-weight:bold;">{series.name}: </span>' +
                        '<span style="padding:0;font-weight:bold;">{point.y:,.0f} '+obj.tooltip+'</span></p>',
                    footerFormat: '',
                    shared: true,
                    useHTML: true

                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: obj.series,
            });
        }
    }
}

window.highchart = new highchart;
