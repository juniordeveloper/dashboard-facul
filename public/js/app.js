/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

// require("./bootstrap");

window.Apex = {
  dataLabels: {
    // enabled: false,
  }
};
var optionsBar = {
  chart: {
    type: "bar",
    height: 450,
    width: "100%",
    foreColor: "#999"
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true,
        position: "top"
      }
    }
  },
  colors: ["#00C5A4", "#FFB900"],
  series: [{
    name: "Total de acidentes",
    data: Object.values(acidentesPorTipo)
  }, {
    name: "Total de mortes",
    data: Object.values(acidentesMortesPorTipo)
  }],
  labels: Object.keys(acidentesPorTipo),
  xaxis: {
    axisBorder: {
      show: true
    },
    axisTicks: {
      show: true
    },
    crosshairs: {
      show: true
    },
    labels: {
      show: true,
      style: {
        fontSize: "14px"
      }
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function formatter(val) {
      return val;
    },
    offsetY: -30,
    style: {
      fontSize: "12px",
      colors: ["#304758"]
    }
  },
  grid: {
    xaxis: {
      lines: {
        show: false
      }
    },
    yaxis: {
      lines: {
        show: true
      }
    }
  },
  yaxis: {
    axisBorder: {
      show: true
    },
    labels: {
      show: true
    }
  },
  legend: {
    floating: true,
    position: "top",
    horizontalAlign: "right",
    offsetY: -36
  },
  title: {
    text: "Total de acidentes com e sem mortes por tipo de aeronave",
    align: "left"
  },
  subtitle: {
    // text: "Sessions and Views",
  },
  tooltip: {
    shared: true,
    intersect: false
  }
};
var chartBar = new ApexCharts(document.querySelector("#bar"), optionsBar);
chartBar.render();
var optionsOperacaoBar = {
  chart: {
    type: "bar",
    height: 450,
    width: "100%",
    foreColor: "#999"
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true,
        position: "top"
      }
    }
  },
  colors: ["#00C5A4", "#FFB900"],
  series: [{
    name: "Total de acidentes",
    data: Object.values(totalAcidentesPorOperacao).map(function (item) {
      return item.total_geral;
    })
  }, {
    name: "Total de mortes",
    data: Object.values(totalAcidentesPorOperacao).map(function (item) {
      return item.total_mortes;
    })
  }],
  labels: Object.keys(totalAcidentesPorOperacao).map(function (item) {
    return item.split(" ");
  }),
  xaxis: {
    axisBorder: {
      show: true
    },
    axisTicks: {
      show: true
    },
    crosshairs: {
      show: true
    },
    labels: {
      show: true,
      style: {
        fontSize: "14px"
      }
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function formatter(val) {
      return val;
    },
    offsetY: -30,
    style: {
      fontSize: "12px",
      colors: ["#304758"]
    }
  },
  grid: {
    xaxis: {
      lines: {
        show: false
      }
    },
    yaxis: {
      lines: {
        show: true
      }
    }
  },
  yaxis: {
    axisBorder: {
      show: true
    },
    labels: {
      show: true
    }
  },
  legend: {
    floating: true,
    position: "top",
    horizontalAlign: "right",
    offsetY: -36
  },
  title: {
    text: "Qual operação existe mais acidentes",
    align: "left"
  },
  subtitle: {
    // text: "Sessions and Views",
  },
  tooltip: {
    shared: true,
    intersect: false
  }
};
var chartBar = new ApexCharts(document.querySelector("#bar_operacao_fator"), optionsOperacaoBar);
chartBar.render();
var optionsNivelDanoBar = {
  chart: {
    type: "bar",
    height: 450,
    width: "100%",
    foreColor: "#999"
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true,
        position: "top"
      }
    }
  },
  colors: ["#00C5A4", "#FFB900"],
  series: [{
    name: "Total de acidentes",
    data: Object.values(totalAcidentesPorNivelDano).map(function (item) {
      return item.total_geral;
    })
  }, {
    name: "Total de mortas",
    data: Object.values(totalAcidentesPorNivelDano).map(function (item) {
      return item.total_mortes;
    })
  }],
  labels: Object.keys(totalAcidentesPorNivelDano).map(function (item) {
    return item.split(" ");
  }),
  xaxis: {
    axisBorder: {
      show: true
    },
    axisTicks: {
      show: true
    },
    crosshairs: {
      show: true
    },
    labels: {
      show: true,
      style: {
        fontSize: "14px"
      }
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function formatter(val) {
      return val;
    },
    offsetY: -30,
    style: {
      fontSize: "12px",
      colors: ["#304758"]
    }
  },
  grid: {
    xaxis: {
      lines: {
        show: false
      }
    },
    yaxis: {
      lines: {
        show: true
      }
    }
  },
  yaxis: {
    axisBorder: {
      show: true
    },
    labels: {
      show: true
    }
  },
  legend: {
    floating: true,
    position: "top",
    horizontalAlign: "right",
    offsetY: -36
  },
  title: {
    text: "Nível do dano aeronave, com a quantidade de mortos",
    align: "left"
  },
  subtitle: {
    // text: "Sessions and Views",
  },
  tooltip: {
    shared: true,
    intersect: false
  }
};
var chartBar = new ApexCharts(document.querySelector("#bar_nivel_dano"), optionsNivelDanoBar);
chartBar.render();

// var optionsMortesBar = {
//     chart: {
//         type: "bar",
//         height: 300,
//         width: "100%",
//         foreColor: "#999",
//     },
//     plotOptions: {
//         bar: {
//             dataLabels: {
//                 enabled: true,
//                 position: "top",
//             },
//         },
//     },
//     colors: ["#FFB900"],
//     series: [
//         {
//             name: "Total de acidentes",
//             data: Object.values(acidentesMortesPorTipo),
//         },
//     ],
//     labels: Object.keys(acidentesMortesPorTipo),
//     xaxis: {
//         axisBorder: {
//             show: true,
//         },
//         axisTicks: {
//             show: true,
//         },
//         crosshairs: {
//             show: true,
//         },
//         labels: {
//             show: true,
//             style: {
//                 fontSize: "14px",
//             },
//         },
//     },
//     dataLabels: {
//         enabled: true,
//         formatter: function (val) {
//             return val;
//         },
//         offsetY: -30,
//         style: {
//             fontSize: "12px",
//             colors: ["#304758"],
//         },
//     },
//     grid: {
//         xaxis: {
//             lines: {
//                 show: false,
//             },
//         },
//         yaxis: {
//             lines: {
//                 show: true,
//             },
//         },
//     },
//     yaxis: {
//         axisBorder: {
//             show: true,
//         },
//         labels: {
//             show: true,
//         },
//     },
//     legend: {
//         floating: true,
//         position: "top",
//         horizontalAlign: "right",
//         offsetY: -36,
//     },
//     title: {
//         text: "Total de acidentes com mortes por tipo de aeronave",
//         align: "left",
//     },
//     subtitle: {
//         // text: "Sessions and Views",
//     },
//     tooltip: {
//         shared: true,
//         intersect: false,
//     },
// };

// var chartMortesBar = new ApexCharts(
//     document.querySelector("#bar_mortes"),
//     optionsMortesBar
// );
// chartMortesBar.render();

var optionsBoxPlotBR = {
  series: [{
    type: "boxPlot",
    data: [{
      x: "Acidentes por ano BR",
      y: boxPlotAcidentesPorAnoBr
    }]
  }],
  chart: {
    type: "boxPlot",
    height: 350
  },
  title: {
    text: "BoxPlot de Acidentes por ano BR",
    align: "left"
  },
  plotOptions: {
    boxPlot: {
      colors: {
        upper: "#5C4742",
        lower: "#A5978B"
      }
    }
  }
};
var chartMortesBar = new ApexCharts(document.querySelector("#box_plot_br"), optionsBoxPlotBR);
chartMortesBar.render();
var optionsBoxPlotSp = {
  series: [{
    type: "boxPlot",
    data: [{
      x: "Acidentes por ano SP",
      y: boxPlotAcidentesPorAnoSP
    }]
  }],
  chart: {
    type: "boxPlot",
    height: 350
  },
  title: {
    text: "BoxPlot de Acidentes por ano SP",
    align: "left"
  },
  plotOptions: {
    boxPlot: {
      colors: {
        upper: "#5a534b",
        lower: "#7e7d7d"
      }
    }
  }
};
var chartMortesBar = new ApexCharts(document.querySelector("#box_plot_sp"), optionsBoxPlotSp);
chartMortesBar.render();
var optionsBoxPlotMortes = {
  series: [{
    type: "boxPlot",
    data: [{
      x: "Mortes por acidentes",
      y: mortesTotalBox
    }]
  }],
  chart: {
    type: "boxPlot",
    height: 350
  },
  title: {
    text: "BoxPlot de Fatalidades por acidente",
    align: "left"
  },
  plotOptions: {
    boxPlot: {
      colors: {
        upper: "#5a534b",
        lower: "#7e7d7d"
      }
    }
  }
};
var chartMortesBar = new ApexCharts(document.querySelector("#box_plot_mortes"), optionsBoxPlotMortes);
chartMortesBar.render();
var optionsAcidentesBrasil = {
  chart: {
    type: "line",
    height: 350,
    width: "100%",
    foreColor: "#999",
    toolbar: {
      show: false
    },
    zoom: {
      enabled: false
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      }
    }
  },
  markers: {
    size: 5,
    style: "hollow",
    strokeWidth: 8,
    strokeColor: "#fff",
    strokeOpacity: 0.25
  },
  colors: ["#f4516c"],
  dataLabels: {
    enabled: true
  },
  series: [{
    name: "Total por ano no BR",
    data: Object.values(totalAcidentesPorAno)
  }],
  labels: Object.keys(totalAcidentesPorAno),
  legend: {
    floating: true,
    position: "top",
    horizontalAlign: "right",
    offsetY: -36
  },
  title: {
    text: "Total de acidentes por ano no Brasil",
    align: "left"
  },
  tooltip: {
    shared: false,
    intersect: false
  }
};
var chartAcidenteBrasil = new ApexCharts(document.querySelector("#acidentes_brasil"), optionsAcidentesBrasil);
chartAcidenteBrasil.render();
var optionsAcidentesSp = {
  chart: {
    type: "line",
    height: 350,
    width: "100%",
    foreColor: "#999",
    toolbar: {
      show: false
    },
    zoom: {
      enabled: false
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      }
    }
  },
  markers: {
    size: 5,
    style: "hollow",
    strokeWidth: 8,
    strokeColor: "#fff",
    strokeOpacity: 0.25
  },
  colors: ["#775DD0"],
  dataLabels: {
    enabled: true
  },
  series: [{
    name: "Total por ano em SP",
    data: Object.values(totalAcidentesPorAnoSp)
  }],
  labels: Object.keys(totalAcidentesPorAnoSp),
  legend: {
    floating: true,
    position: "top",
    horizontalAlign: "right",
    offsetY: -36
  },
  title: {
    text: "Total de acidentes por ano em SP",
    align: "left"
  },
  tooltip: {
    shared: false,
    intersect: false
  }
};
var chartAcidenteSp = new ApexCharts(document.querySelector("#acidentes_sp"), optionsAcidentesSp);
chartAcidenteSp.render();
var optionsCircle1 = {
  chart: {
    type: "radialBar",
    height: 266,
    zoom: {
      enabled: false
    },
    offsetY: 20
  },
  colors: ["#E91E63"],
  plotOptions: {
    radialBar: {
      hollow: {
        size: "70%"
      },
      dataLabels: {
        name: {
          show: false
        },
        value: {
          offsetY: 0
        }
      }
    }
  },
  series: [mediaTotalAcidentesPorAnoSp],
  theme: {
    monochrome: {
      enabled: false
    }
  },
  legend: {
    show: false
  },
  title: {
    text: "Media de acidentes em SP",
    align: "left"
  }
};
var optionsCircle1122 = {
  series: [76, 67, 61, 90, 150],
  chart: {
    height: 390,
    type: "radialBar"
  },
  plotOptions: {
    radialBar: {
      offsetY: 0,
      startAngle: 0,
      endAngle: 270,
      hollow: {
        margin: 5,
        size: "30%",
        background: "transparent",
        image: undefined
      },
      dataLabels: {
        name: {
          show: false
        },
        value: {
          show: true
        }
      }
    }
  },
  colors: ["#1ab7ea", "#0084ff", "#39539E", "#0077B5"],
  labels: ["Media", "Mediana", "Moda", "Minimo", "Maximo"],
  legend: {
    show: true,
    floating: true,
    fontSize: "16px",
    position: "left",
    offsetX: 100,
    offsetY: 15,
    labels: {
      useSeriesColors: true
    },
    markers: {
      size: 0
    },
    formatter: function formatter(seriesName, opts) {
      return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
    },
    itemMargin: {
      vertical: 3
    }
  },
  responsive: [{
    breakpoint: 480,
    options: {
      legend: {
        show: false
      }
    }
  }],
  title: {
    text: "Acidentes em SP",
    align: "left"
  }
};

// var chartCircle1 = new ApexCharts(
//     document.querySelector("#radialBar1"),
//     optionsCircle1122
// );
// chartCircle1.render();

// var optionsCircle4 = {
//     chart: {
//         height: 314,
//         type: "radialBar",
//     },
//     colors: ["#775DD0", "#00C8E1", "#FFB900"],
//     labels: ["q4"],
//     series: [71, 63, 77],
//     labels: ["June", "May", "April"],
//     theme: {
//         monochrome: {
//             enabled: false,
//         },
//     },
//     plotOptions: {
//         radialBar: {
//             offsetY: -30,
//         },
//     },
//     legend: {
//         show: true,
//         position: "left",
//         containerMargin: {
//             right: 0,
//         },
//     },
//     title: {
//         text: "Growth",
//     },
// };

// // var chartCircle4 = new ApexCharts(
// //     document.querySelector("#radialBarBottom"),
// //     optionsCircle4
// // );
// // chartCircle4.render();

var optionsUF = {
  series: [{
    data: totalAcidentesEstado
  }],
  legend: {
    show: true
  },
  chart: {
    height: 350,
    type: "treemap"
  },
  title: {
    text: "Total de acidentes por Estado"
  },
  colors: ["#3B93A5", "#F7B844", "#ADD8C7", "#EC3C65", "#CDD7B6", "#C1F666", "#D43F97", "#1E5D8C", "#421243", "#7F94B0", "#EF6537", "#C0ADDB"],
  plotOptions: {
    treemap: {
      distributed: true,
      enableShades: false
    }
  }
};
var chartUF = new ApexCharts(document.querySelector("#chart_uf"), optionsUF);
chartUF.render();
function generateData(baseval, count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
    var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
    series.push([x, y, z]);
    baseval += 86400000;
    i++;
  }
  return series;
}
function getRandom() {
  return Math.floor(Math.random() * (100 - 1 + 1)) + 1;
}

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;