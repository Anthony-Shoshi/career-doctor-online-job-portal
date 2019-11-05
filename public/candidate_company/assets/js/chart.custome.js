/* ----- Employee Dashboard Chart Js For Applications Statistics ----- */
// function createConfig() {
//     return {
//         type: 'line',
//         data: {
//             labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//             datasets: [{
//                 label: 'Number of Job',
//                 borderColor: window.chartColors.orange,
//                 backgroundColor: window.chartColors.blue,
//                 data: [10, 30, 46, 2, 8, 50, 0],
//                 fill: false,
//             }]
//         },
//         options: {
//             responsive: true,
//             title: {
//                 display: true,
//                 text: 'Sample tooltip with border'
//             },
//             tooltips: {
//                 position: 'nearest',
//                 mode: 'index',
//                 intersect: false,
//                 yPadding: 10,
//                 xPadding: 10,
//                 caretSize: 8,
//                 backgroundColor: 'rgb(252,255,232)',
//                 titleFontColor: window.chartColors.black,
//                 bodyFontColor: window.chartColors.black,
//                 borderColor: 'rgba(0,0,0,1)',
//                 borderWidth: 4
//             },
//         }
//     };
// }
//
// window.onload = function() {
//     var c_container = document.querySelector('.c_container');
//     var div = document.createElement('div');
//     div.classList.add('chart-container');
//
//     var canvas = document.createElement('canvas');
//     div.appendChild(canvas);
//     c_container.appendChild(div);
//
//     var ctx = canvas.getContext('2d');
//     var config = createConfig();
//     new Chart(ctx, config);
// };