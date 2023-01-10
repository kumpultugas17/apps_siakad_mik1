var areaOptions = {
  series: [
    {
      name: "MIK",
      data: [31, 40, 28, 51, 42, 109, 100, 90, 400],
    },
    {
      name: "AKP",
      data: [11, 32, 45, 32, 34, 52, 41, 80, 78],
    },
    {
      name: "ADP",
      data: [11, 32, 45, 32, 34, 52, 200, 300, 200],
    },
  ],
  chart: {
    height: 350,
    type: "area",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    type: "datetime",
    categories: [
      "2014-08-19T00:00:00.000Z",
      "2015-08-19T01:30:00.000Z",
      "2016-08-19T02:30:00.000Z",
      "2017-08-19T03:30:00.000Z",
      "2018-08-19T04:30:00.000Z",
      "2019-08-19T05:30:00.000Z",
      "2020-08-19T06:30:00.000Z",
      "2021-08-19T06:30:00.000Z",
      "2022-08-19T06:30:00.000Z",
    ],
  },
  tooltip: {
    x: {
      format: "yyyy",
    },
  },
}

var area = new ApexCharts(document.querySelector("#area"), areaOptions)

area.render()
