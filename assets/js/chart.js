$(document).ready(function() {
	const data = [];
  const nlData = [];
  const bmdData = [];
  const mdData = [];

  let prev = 100;
  const nl = 370;
  const bmd = 460;
  const md = 550;

  const min = 0;
  const max = 7;
  
  for (let i = 0; i < 100; i++) {
    // prev += 5 - Math.random(100, 620) * 10;
    prev += Math.floor(Math.random() * (max - min) + min); 
    data.push({x: i, y: prev});
    // prev2 += 5 - Math.random() * 10;
    nlData.push({x: i, y: nl});
    bmdData.push({x: i, y: bmd});
    mdData.push({x: i, y: md});
  }

  const totalDuration = 10000;
  const delayBetweenPoints = totalDuration / data.length;
  const previousY = (ctx) => ctx.index === 0 ? ctx.chart.scales.y.getPixelForValue(100) : ctx.chart.getDatasetMeta(ctx.datasetIndex).data[ctx.index - 1].getProps(['y'], true).y;

  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      datasets: [{
        borderColor: 'red',
        borderWidth: 1,
        radius: 0,
        data: data,
      },
      {
        label: 'NL',
        borderColor: 'rgba(0, 158, 251)',
        borderWidth: 1,
        radius: 0,
        data: nlData,
      },
      {
        label: 'BMD',
        borderColor: 'rgba(238, 240, 20)',
        borderWidth: 1,
        radius: 0,
        data: bmdData,
      },
      {
        label: 'MD',
        borderColor: 'rgba(255, 0, 0)',
        borderWidth: 1,
        radius: 0,
        data: mdData,
      }
    ]
    },
    options: {
      animation: {
        x: {
          type: 'number',
          easing: 'linear',
          duration: delayBetweenPoints,
          from: NaN, // the point is initially skipped
          delay(ctx) {
            if (ctx.type !== 'data' || ctx.xStarted) {
              return 0;
            }
            ctx.xStarted = true;
            return ctx.index * delayBetweenPoints;
          }
        },
        y: {
          type: 'number',
          easing: 'linear',
          duration: delayBetweenPoints,
          from: previousY,
          delay(ctx) {
            if (ctx.type !== 'data' || ctx.yStarted) {
              return 0;
            }
            ctx.yStarted = true;
            return ctx.index * delayBetweenPoints;
          }
        }
      },
      interaction: {
        intersect: false
      },
      plugins: {
        legend: false
      },
      scales: {
        x: {
          type: 'linear'
        }
      }
    }
  });  
});