var grossProfit = {
    categories: [["2558"], ["2559"], ["2560"], ["1H/2561"]],
    color: '#178ef4',
    setData: [877, 681, 621, 398],
    tooltip: 'Million Baht',
}

var ebitda = {
    categories: [["2558"], ["2559"], ["2560"], ["1H/2561"]],
    color: '#178ef4',
    setData: [407, 354, 422, 338],
    tooltip: 'Million Baht',
}

var netProfit = {
    categories: [["2558"], ["2559"], ["2560"], ["1H/2561"]],
    color: '#178ef4',
    setData: [101, 57, 132, 161],
    tooltip: 'Million Baht',
}

var position = {
    categories: [["2558"], ["2559"], ["2560"], ["1H/2561"]],
    color: ['#034EA2','#178EF4','#85BA41'],
    tooltip: 'Million Baht',
    series: [{
        name: 'Assets',
        data: [5313, 5274, 5612, 5650],
        stack: 'male'
    },{
        name: 'liabilities',
        data: [4834, 4738, 4941, 4818],
        stack: 'female'
    }, {
        name: 'Equity',
        data: [480,	536, 671, 832],
        stack: 'female'
    }],
}

Highcharts.setOptions({
    lang: {
        thousandsSep: ','
    },
});
var chart, merge = Highcharts.merge;

var perShapeGradient = {
    x1: 0,
    y1: 1,
    x2: 0,
    y2: 0
};

var colors = Highcharts.getOptions().colors;
colors = {
    linearGradient: perShapeGradient,
    stops: [
        [0, 'rgb(26, 71, 131)'],
        [1, 'rgb(133, 186, 65)']
    ],
};

initColumn('gross-profit', grossProfit);
initColumn('ebitda', ebitda);
initColumn('net-profit', netProfit);
initStack('position', position);

function initColumn(selector, obj) {
    if ($(`#${selector}`).length) {
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
        ];

        chart = new Highcharts.Chart({
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

function initStack(selector, obj) {
    if ($(`#${selector}`).length) {
        var categoriesData = obj.categories;

        chart = new Highcharts.Chart({
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

/*

if ($('#net-profit').length) {
    if (website_language == "th") {
        var categoriesData = [["2558"], ["2559"], ["2560"], ["1H/2561"]];
    } else {
        var categoriesData = [["2015"], ["2016"], ["2017"], ["1H/2018"]];
    }
}

*/
