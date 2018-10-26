Highcharts.setOptions({
    lang: {
        thousandsSep: ','
    },
});
var website_language = $("html").attr("lang");
var chart, merge = Highcharts.merge;
var perShapeGradient = {
    x1: 0,
    y1: 1,
    x2: 0,
    y2: 0
};
var colors = Highcharts.getOptions().colors;
colors = [{
    linearGradient: perShapeGradient,
    stops: [
        [0, 'rgb(26, 71, 131)'],
        [1, 'rgb(133, 186, 65)']
    ]
}]

if ($('#gross-profit').length) {
    if (website_language == "th") {
        var categoriesData = [["2558"], ["2559"], ["2560"], ["1H/2561"]];
    } else {
        var categoriesData = [["2015"], ["2016"], ["2017"], ["1H/2018"]];
    }
    var set_data = [
        {
            name: categoriesData[0],
            y: 877,
            color: '#178ef4',
        },
        {
            name: categoriesData[1],
            y: 681,
            color: '#178ef4',
        },
        {
            name: categoriesData[2],
            y: 621,
            color: '#178ef4',
        },
        {
            name: categoriesData[3],
            y: 398,
            color: colors[0]
        },
    ];
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'gross-profit',
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
            plotLines: [{
                color: '#5d5d5d',
                dashStyle: 'Dash',
                width: 1,
                value: 2.5
            }],
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
            pointFormat: '<b>{point.y:,.0f} Million Baht</b>',
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
                    //color: colors[0],
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

if ($('#ebitda').length) {
    if (website_language == "th") {
        var categoriesData = [["2558"], ["2559"], ["2560"], ["1H/2561"]];
    } else {
        var categoriesData = [["2015"], ["2016"], ["2017"], ["1H/2018"]];
    }
    var set_data = [
        {
            name: categoriesData[0],
            y: 407,
            color: '#178ef4',
        },
        {
            name: categoriesData[1],
            y: 354,
            color: '#178ef4',
        },
        {
            name: categoriesData[2],
            y: 422,
            color: '#178ef4',
        },
        {
            name: categoriesData[3],
            y: 338,
            color: colors[0]
        },
    ];
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'ebitda',
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
            plotLines: [{
                color: '#5d5d5d',
                dashStyle: 'Dash',
                width: 1,
                value: 2.5
            }],
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
            pointFormat: '<b>{point.y:,.0f} Million Baht</b>',
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
                    //color: colors[0],
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

if ($('#net-profit').length) {
    if (website_language == "th") {
        var categoriesData = [["2558"], ["2559"], ["2560"], ["1H/2561"]];
    } else {
        var categoriesData = [["2015"], ["2016"], ["2017"], ["1H/2018"]];
    }
    var set_data = [
        {
            name: categoriesData[0],
            y: 101,
            color: '#178ef4',
        },
        {
            name: categoriesData[1],
            y: 57,
            color: '#178ef4',
        },
        {
            name: categoriesData[2],
            y: 132,
            color: '#178ef4',
        },
        {
            name: categoriesData[3],
            y: 161,
            color: colors[0]
        },
    ];
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'net-profit',
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
            plotLines: [{
                color: '#5d5d5d',
                dashStyle: 'Dash',
                width: 1,
                value: 2.5
            }],
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
            pointFormat: '<b>{point.y:,.0f} Million Baht</b>',
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
                    //color: colors[0],
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

if ($('#position').length) {
    if (website_language == "th") {
        var categoriesData = [["2558"], ["2559"], ["2560"], ["1H/2561"]];
    } else {
        var categoriesData = [["2015"], ["2016"], ["2017"], ["1H/2018"]];
    }
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'position',
            type: 'column'
        },
        colors: ['#034EA2','#178EF4','#85BA41'],
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
            plotLines: [{
                    color: '#5d5d5d',
                    dashStyle: 'Dash',
                    width: 1,
                    value: 2.5
                }],
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
                '<span style="padding:0;font-weight:bold;">{point.y:,.0f} Million Baht</span></p>',
            footerFormat: '',
            shared: true,
            useHTML: true

        },

        plotOptions: {
            column: {
                stacking: 'normal'
            }
        },

        series: [{
            name: 'Assets',
            data: [5313,	5274,	5612,	5650],
            stack: 'male'
        },{
            name: 'liabilities',
            data: [4834,	4738,	4941,	4818],
            stack: 'female'
        }, {
            name: 'Equity',
            data: [480,	536,	671,	832],
            stack: 'female'
        }]
    });

 }
