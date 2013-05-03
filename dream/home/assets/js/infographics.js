;(function (window, Extensions, Raphael, undefined) {
    'use strict';

    window.Extensions = Extensions;

    Extensions.Inst = Extensions.Inst || {};

    var groupDelays = [],
        requestsSent = [],
        graphsDrawn = [];

    Extensions.Infographic = new Class({
        Extends: Options,

        options: {
            circle: {
                strokeWidth: 2,
                diameter: 120,
                colorBG: '#e4e4e4',
                colorArc: '#16a6b6'
            },

            line: {
                dimensions: {
                    x: 680,
                    y: 250
                },

                legend: {
                    circleDiameter: 7,
                    circleMarginRight: 7,
                    itemMarginRight: 35,
                    marginTop: 14,
                    marginBottom: 40
                },

                font: {
                    'font-size': 14,
                    fill: '#6b6b6b',
                    'font-family': '"freightsans_regular",sans-serif'
                },

                xAxisHeight: 25
            }
        },

        paper: undefined,

        initialize: function(graph, options) {
            this.setOptions(options);

            this.graph  = graph;
            this.type   = this.graph.get('data-graph-type');
            this.group  = this.graph.get('data-graph-group');
            this.delay  = 0;

            if (this.group !== null) {
                this._groupActions();
            }

            this[this.type]();
        },

        _groupActions: function() {
            if (typeof groupDelays[this.group] === 'undefined') {
                groupDelays[this.group] = 0;
            } else {
                groupDelays[this.group] += 250;

                this.delay = groupDelays[this.group];
            }
        },

        circle: function() {
            var diameter    = this.options.circle.diameter,
                strokeWidth = this.options.circle.strokeWidth,
                radius      = diameter / 2,
                radStroke   = radius - (strokeWidth / 2),
                circumference = 2 * Math.PI * radStroke,
                section     = this.graph.getParents('[data-interactive]'),
                percent     = parseInt(this.graph.get('data-percent'));

//            if (Browser.ie && Browser.version < 8) {
//                radStroke--;
//            }

            var p = new Element('p', {
                'class': 'h1 fonts-display-cnd'
            });

            this.graph.grab(p, 'top');

            // Set up canvas
            this.paper = new Raphael(this.graph, diameter, diameter); // element, canvas.x, canvas.y

            // Draw background circle (arc holder)
            this.paper
                .circle(radius, radius, radStroke) // 59px radius makes room for 2px stroke
                .attr({
                    stroke: this.options.circle.colorBG,
                    'stroke-width': strokeWidth
                });

            // Arc function - see http://raphaeljs.com/polar-clock.html
            this.paper.customAttributes.arc = function (xloc, yloc, value, total, R) {
                var alpha   = 360 / total * value,
                    a       = (90 - alpha) * Math.PI / 180,
                    x       = xloc + R * Math.cos(a),
                    y       = yloc - R * Math.sin(a),
                    path;

                if (total === value) {
                    path = [
                        ['M', xloc, yloc - R],
                        ['A', R, R, 0, 1, 1, xloc - 0.01, yloc - R]
                    ];
                } else {
                    path = [
                        ['M', xloc, yloc - R],
                        ['A', R, R, 0, +(alpha > 180), 1, x, y]
                    ];
                }

                return {
                    path: path
                };
            };

            var arc = this.paper.path().attr({
                    stroke: this.options.circle.colorArc,
                    'stroke-width': strokeWidth,
                    arc: [radius, radius, 0, 100, radStroke]
                }),

                updateNum = function () {},

                // Arc animation (<> refers to Raphael.easing_formula - see http://raphaeljs.com/reference.html#Raphael.easing_formulas)
                anim = Raphael.animation({
                    arc: [radius, radius, percent, 100, radStroke]
                }, 1500, '<>', function () {
                    clearInterval(updateNum);

                    adjustText(percent);
                }),

                numTrans = new Fx.Morph(p, {
                        duration: 200
                    }).set({
                        opacity: 0
                    });

            function adjustText(val) {
                p.set({
                    text: val + '%'
                });
            }

            function increment() {
                adjustText(
                    Math.round((arc.getTotalLength() / circumference) * 100)
                );
            }

            var interactionHandler = interaction.bind(this);

            function interaction() {
                setTimeout(function () {
                    numTrans.start({
                        opacity: 1
                    });

                    // Update percentage counter
                    updateNum = setInterval(increment, 16.7);   // 16.7 milliseconds = 1 jiffy at 60Hz

                    // Call arc animation (with calculated delay)
                    arc.animate(anim);
                }, this.delay);

                section.removeEvent('interact', interactionHandler);
            }

            // Interaction
            section.addEvent('interact', interactionHandler);

            if (Extensions.isMobile) {
                section.fireEvent('interact');
            }
        },

        counter: function() {
            var graph       = this.graph,
                total       = graph.get('data-count'),
                duration    = 5000,
                numTrans    = new Fx.Morph(graph, {
                    duration: 200
                }).set({
                    opacity: 0
                }),
                section     = graph.getParents('[data-interactive]'),
                i = 0,
                updateNum = function () {};

            var startTime = new Date().getTime();

            function increment() {
                i = Math.ceil(
                    total * ((new Date().getTime() - startTime) / duration)
                );

                if (i >= total) {
                    i = total;

                    clearInterval(updateNum);
                }

                graph.set({
                    text: i
                });
            }

            // Interaction
            var interactionHandler = interaction.bind(this);

            function interaction() {
                setTimeout(function () {
                    numTrans.start({
                        opacity: 1
                    });

                    updateNum = setInterval(increment, 16.7);

                }, this.delay);

                section.removeEvent('interact', interactionHandler);
            }

            section.addEvent('interact', interactionHandler);

            if (Extensions.isMobile) {
                section.fireEvent('interact');
            }
        },

        _getYAxisVal: function(items) {
            var max = 0;

            // Func to find array max value
            function getLargest(arr) {
                var largest = Math.max.apply(Math, arr);

                return largest > max ?
                    largest :
                    max;
            }

            // Set y axis to maximum item point value
            items.each(function (item, i) {
                max = getLargest(
                    item.points
                );
            });

            return max;
        },

        /**
         *
         * @param graphs
         * @return {Boolean}
         * @private
         */
        _doLine: function(graphs) {
            var _this = this;

            // Filter for graph ID
            graphs = graphs.filter(function (graph) {
                return graph.id === _this.graph.get('data-graph-id');
            });

            // If no matching graph ID was found
            if (!graphs.length) {
                return false;
            }

            var graph = graphs[0];

            graph.breaks = graph.breaks.filter(function (breakp) {
                return breakp.widths.indexOf(_this.breakpoint) !== -1 &&
                    breakp.widths.indexOf(_this.prevBreakpoint) === -1;
            });

            this.prevBreakpoint = this.breakpoint;

            if (!graph.breaks.length) {
                return false;
            }

            var isRedraw = typeof this.paper !== 'undefined';

            if (isRedraw) {
                this.animateTimeout.each(function (timeout) {
                    clearTimeout(timeout);
                });

                this.paper.remove();
            }

            this.animateTimeout = [];

            var breakp = graph.breaks[0],
                
                legendWidth = 0,

                cumulative,

                labelTotal = breakp.labels.x.length,

                pathGraphHeight =
                    this.options.line.legend.circleDiameter +
                    this.options.line.legend.marginTop +
                    this.options.line.legend.marginBottom,

                graphHeight =
                    breakp.dimensions.y -
                    pathGraphHeight -
                    this.options.line.xAxisHeight,

                pointGraphHeight = Math.round(graphHeight + pathGraphHeight),

                axes = {
                    y: this._getYAxisVal(graph.items),
                    x: breakp.labels.x.length
                },

                ratio = {
                    x: breakp.dimensions.x / axes.x,
                    y: graphHeight / axes.y
                },

                startPath = 'M0,' + pointGraphHeight + ' ',

                section = this.graph.getParents('section[data-interactive]')[0];

            function moveLegendPart(part) {
                part.transform('T' + cumulative + ',' + _this.options.line.legend.marginTop);
            }

            // Set up canvas
            this.paper = new Raphael(
                this.graph, // element
                breakp.dimensions.x, // canvas.x
                breakp.dimensions.y // canvas.y
            );

            // Draw labels
            breakp.labels.x.each(function (label, i) {
                _this.paper.text(
                    (i * (breakp.dimensions.x / labelTotal)) +
                        ((breakp.dimensions.x / labelTotal) / 2),
                    breakp.dimensions.y - (_this.options.line.font['font-size'] / 2),
                    label
                )
                .attr(
                    Object.merge(_this.options.line.font, {
                        'text-anchor': 'middle'
                    })
                );
            });

            function calcPathPlot(xVal, yMinus, i, length) {
                return 'L' + (
                        xVal
                    ) +

                    ',' + (
                        Math.round(pointGraphHeight - yMinus)
                    ) +

                    (i !== (length - 1) ?
                        ' ' :
                        ' ' + breakp.dimensions.x + ',' + pointGraphHeight + 'z'
                    );
            }

            graph.items.each(function (item, i) {
                var pointTotal = item.points.length;

                // Path beginning - move to x: 0, y: graph-height
                item.path = 'M0,' + pointGraphHeight + ' ';

                // Add item path points
                item.points.each(function (point, j) {
                    var xVal = Math.round(j * ratio.x);

                    if (i === 0) {
                        startPath += calcPathPlot(
                            xVal,
                            0,
                            j,
                            pointTotal
                        );
                    }

                    item.path += calcPathPlot(
                        xVal,
                        (point * ratio.y),
                        j,
                        pointTotal
                    );
                });

                // Draw elements to paper
                item.drawn = {
                    // Graph path
                    path: _this.paper.path(
                            startPath
                        ).attr({
                            fill: item.color,
                            opacity: .9,
                            'stroke-width': 0
                        }),

                    // Legend: coloured circle
                    legendCircle: _this.paper.circle(
                            0,
                            _this.options.line.legend.marginTop,
                            _this.options.line.legend.circleDiameter
                        )
                        .attr({
                            fill: item.color,
                            'stroke-width': 0
                        }),

                    // Legend: text content
                    legendText: _this.paper.text(
                            0,
                            _this.options.line.legend.marginTop, item.text
                        )
                        .attr(
                            Object.merge(_this.options.line.font, {
                                'text-anchor': 'start'
                            })
                        )
                };

                // Get text width & set as item property
                item.textWidth = item.drawn.legendText.getBBox().width;

                // Increment cumulative legend width
                legendWidth +=
                    _this.options.line.legend.circleDiameter +
                    _this.options.line.legend.circleMarginRight +
                    item.textWidth +

                    // Only include trailing slash if not final item
                    (i !== (graph.items.length - 1) ?
                        _this.options.line.legend.itemMarginRight :
                        0
                    );
            });

            cumulative = ((breakp.dimensions.x - legendWidth) / 2);

            // Format legend spacing
            graph.items.reverse().each(function (item) {
                moveLegendPart(item.drawn.legendCircle);

                cumulative +=
                    _this.options.line.legend.circleDiameter +
                    _this.options.line.legend.circleMarginRight;

                moveLegendPart(item.drawn.legendText);

                cumulative +=
                    item.textWidth +
                    _this.options.line.legend.itemMarginRight;
            });

            function animatePath(item, newPath) {
                item
                    .stop()
                    .animate({
                        path: newPath
                    },
                    1000,
                    'elastic'
                );
            }


            var interactionHandler = interaction.bind(this);

            function interaction() {
                graph.items.each(function (item, i) {
                    _this.animateTimeout[i] = setTimeout(function () {
                        animatePath(item.drawn.path, item.path);
                    }, i * 500);
                });

                section.removeEvent('interact', interactionHandler);
            }

            section.addEvent('interact', interactionHandler);

            if (isRedraw || Extensions.isMobile) {
                section.fireEvent('interact');
            }
        },

        line: function() {
            var _this = this,
                parts = 0;

            function checkParts() {
                parts++;

                if (parts >= 2) {
                    _this._doLine(requestsSent[_this.options.line.url].clone());
                }
            }

            if (typeof requestsSent[this.options.line.url] === 'undefined') {
                new Request.JSON({
                    url: '/assets/js/infographics.json',
                    onSuccess: function (_graphData) {
                        requestsSent[_this.options.line.url] = _graphData;

                        checkParts();
                    }
                }).send();
            } else {
                checkParts();
            }

            jRes.addFunc({
                breakpoint: '*',
                enter: function() {
                    _this.breakpoint = jRes.getBreakpoint();

                    checkParts();
                }
            });
        }
    });

    window.addEvent('domready', function () {
        Extensions.instantiate([
            {
                sel : '[data-infographic]',
                ext : 'Infographic',
                opt : {
                    line : {
                        url : '/assets/js/infographics.json'
                    }
                }
            }
        ]);
    });

})(window, window.Extensions || {}, window.Raphael);