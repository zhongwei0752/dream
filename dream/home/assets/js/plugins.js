/*
 ---
 description: native css animations.

 license: MIT-style

 authors:
 - Thierry Bela

 contributor:
 - Andreas Schempp (https://github.com/aschempp)

 credits:
 - amadeus (CSSEvents)
 - Andr茅 Fiedler, eskimoblood (Fx.Tween.CSS3)

 requires:
 core/1.4:
 - Array
 - Element.Style
 - Fx.CSS

 provides: [Element.getPrefixed]

 ...
 */

!function (context) {
    "use strict";

    var set = Element.prototype.setStyle,
        get = Element.prototype.getStyle,
        div = new Element('div'),
        prefixes = ['Khtml','O','Ms','Moz','Webkit'],
        cache = {};

    Element.implement({

        getPrefixed: function (prop) {

            prop = prop.camelCase();

            if(cache[prop] != undefined) return cache[prop];

            cache[prop] = prop;

            //return unprefixed property if supported. prefixed properties sometimes do not work fine (MozOpacity is an empty string in FF4)
            if(!(prop in this.style)) {

                var upper = prop.charAt(0).toUpperCase() + prop.slice(1);

                for(var i = prefixes.length; i--;) if(prefixes[i] + upper in this.style) {

                    cache[prop] = prefixes[i] + upper;
                    break
                }
            }

            return cache[prop]
        },

        setStyle: function (property, value) {

            return set.call(this, this.getPrefixed(property), value);
        },
        getStyle: function (property) {

            return get.call(this, this.getPrefixed(property));
        }
    })

}(this);


/*
 ---
 description: native css animations.

 license: MIT-style

 authors:
 - Thierry Bela

 contributor:
 - Andreas Schempp (https://github.com/aschempp)

 credits:
 - amadeus (CSSEvents)
 - Andr茅 Fiedler, eskimoblood (Fx.Tween.CSS3)

 requires:
 core/1.4:
 - Array
 - Element.Style
 - Fx.CSS

 provides: [FxCSS]

 ...
 */

!function (context) {
    "use strict";

    var div = new Element('div'),
        transition,
        prefix = Browser.safari || Browser.chrome || Browser.Platform.ios ? 'webkit' : (Browser.opera ? 'o' : (Browser.ie ? 'ms' : '')),
        prefixes = ['Khtml','O','Ms','Moz','Webkit'],
        cache = {};

    transition = div.getPrefixed('transition');

    //eventTypes
    ['transitionEnd' /*, 'transitionStart', 'animationStart', 'animationIteration', 'animationEnd' */].each(function(eventType) {

        Element.NativeEvents[eventType.toLowerCase()] = 2;

        var customType = eventType;

        if (prefix) customType = prefix + customType.capitalize();
        else customType = customType.toLowerCase();

        Element.NativeEvents[customType] = 2;
        Element.Events[eventType.toLowerCase()] = {base: customType }
    });

    //detect if transition property is supported
    Fx.css3Transition = (function (prop) {

        //
        if(prop in div.style) return true;

        var prefixes = ['Khtml','O','ms','Moz','Webkit'], i = prefixes.length, upper = prop.charAt(0).toUpperCase() + prop.slice(1);

        while(i--) if(prefixes[i] + upper in div.style) return true;

        return false
    })(transition);

    Fx.transitionTimings = {
        'ease': '.25,.1,.25,1',
        'ease:in': '.42,0,1,1',
        'ease:out': '0,0,.58,1',
        'ease:in:out': '.42,0,.58,1',
        'linear'		: '0,0,1,1',
        'expo:in'		: '.71,.01,.83,0',
        'expo:out'		: '.14,1,.32,.99',
        'expo:in:out'	: '.85,0,.15,1',
        'circ:in'		: '.34,0,.96,.23',
        'circ:out'		: '0,.5,.37,.98',
        'circ:in:out'	: '.88,.1,.12,.9',
        'sine:in'		: '.22,.04,.36,0',
        'sine:out'		: '.04,0,.5,1',
        'sine:in:out'	: '.37,.01,.63,1',
        'quad:in'		: '.14,.01,.49,0',
        'quad:out'		: '.01,0,.43,1',
        'quad:in:out'	: '.47,.04,.53,.96',
        'cubic:in'		: '.35,0,.65,0',
        'cubic:out'		: '.09,.25,.24,1',
        'cubic:in:out'	: '.66,0,.34,1',
        'quart:in'		: '.69,0,.76,.17',
        'quart:out'		: '.26,.96,.44,1',
        'quart:in:out'	: '.76,0,.24,1',
        'quint:in'		: '.64,0,.78,0',
        'quint:out'		: '.22,1,.35,1',
        'quint:in:out'	: '.9,0,.1,1'
    };

    //borderBottomLeftRadius

    context.FxCSS = {

        css: false,
        propRegExp: /([a-z]+)([A-Z][a-z]+)([A-Z].+)/,
        propRadiusRegExp: /([a-z]+)([A-Z][a-z]+)([A-Z][a-z]+)(Radius)/,
        initialize: function(element, options) {

            this.element = this.subject = document.id(element);
            this.transitionend = this.transitionend.bind(this);
            this.parent(Object.append({transition: 'sine:in:out'}, options))
        },
        isRunning: function () { return this.css || this.parent() || false },
        checkTransition: function (style, keys) {

            style = div.getPrefixed(style);

            var index = keys.indexOf(style);

            //is this browser extending shorthand properties ?
            if(index == -1) {

                if(this.propRadiusRegExp.test(style)) {

                    var matches = this.propRadiusRegExp.exec(style);

                    index = keys.indexOf(matches[1] + matches[4]);

                    if(index != -1) {

                        keys.splice(index, 1);
                        keys.append(['TopLeft', 'TopRight', 'BottomLeft', 'BottomRight'].
                            map(function (prop) { return matches[1] + prop + matches[4] }));

                        index = keys.indexOf(style)
                    }
                }
                else if(this.propRegExp.test(style)) {

                    var matches = this.propRegExp.exec(style);

                    index = keys.indexOf(matches[1] + matches[3]);

                    if(index != -1) {

                        keys.splice(index, 1);
                        keys.append(['Left', 'Top', 'Right', 'Bottom'].
                            map(function (prop) { return matches[1] + prop + matches[3] }));

                        index = keys.indexOf(style)
                    }
                }
            }

            if(index != -1) keys.splice(index, 1);

            return keys.length == 0
        },
        transitionend: function (e) {

            if(this.checkTransition(e.event.propertyName, this.keys)) {

                this.subject.removeEvent('transitionend', this.transitionend).style[transition] = '';
                this.stop()
            }
        },
        stop: function () {

            if(this.css) {

                this.css = false;
                this.fireEvent('complete', this.subject);

                if(!this.callChain()) this.fireEvent('chainComplete', this.subject);

                return this
            }

            return this.parent()
        },
        cancel: function() {

            if (this.css) {

                this.css = false;
                Array.from(this.subject).each(function (element) { element.removeEvents('transitionend').style[transition] = '' }, this);

                return this.fireEvent('cancel', this.subject).clearChain();
            }

            return this.parent()
        }
    }

}(this);


/*
 ---
 description: native css animations with morph and tween, support of the css3 transform rule.

 license: MIT-style

 authors:
 - Thierry Bela

 requires:
 Fx.CSS:
 - Fx.CSS
 core/1.4:
 - Array
 - Element.Style
 - Fx.Morph

 provides: none

 ...
 */

!function () {

    "use strict";

    Fx.Morph.implement(Object.append({

        start: function(properties) {

//            if (!this.check(properties)) {
//                return this;
//            }

            this.css = typeof this.options.transition == 'string' && Fx.transitionTimings[this.options.transition] && Fx.css3Transition;

            if (typeof properties == 'string') properties = this.search(properties);

            var from = {}, to = {};

            for (var p in properties){

                var parsed = this.prepare(this.element, p, properties[p]);

                from[p] = parsed.from;
                to[p] = parsed.to;
            }

            if(this.css) {

                var transition = this.element.getPrefixed('transition'),
                    styles = Object.map(to, function (value) { value = Array.from(value)[0]; return value.parser.serve(value.value) }),
                    tmp = new Element('div'),
                //keys,
                    element = this.element,
                    css = ' ' + this.options.duration + 'ms cubic-bezier(' + Fx.transitionTimings[this.options.transition] + ')';

                this.element.setStyle(transition, 'none').
                    setStyles(Object.map(from, function (value) { value = Array.from(value)[0]; return value.parser.serve(value.value) }));

                tmp.cssText = this.element.cssText;
                tmp.setStyles(styles);

                this.keys = Object.keys(styles).map(function(style) {

                    return element.getPrefixed(style)
                }).
                    //check if styles are unchanged
                    filter(function (style) {

                        //element.style.borderRadius is an empty string in webkit, this will not work
                        if(style == 'borderRadius') {

                            return !(tmp.style['borderTopLeftRadius'] == element.style['borderTopLeftRadius'] &&
                                tmp.style['borderTopRightRadius'] == element.style['borderTopRightRadius'] &&
                                tmp.style['borderBottomRightRadius'] == element.style['borderBottomRightRadius'] &&
                                tmp.style['borderBottomLeftRadius'] == element.style['borderBottomLeftRadius']);
                        }

                        return !(tmp.style[style] == element.style[style]);

                    });

                if(this.keys.length === 0) {
                    return this.stop();
                }

                element.addEvent('transitionend', this.transitionend).
                    setStyle(transition, this.keys.map(function (prop) { return element.getPrefixed(prop).hyphenate() + css }).join());

                element.setStyles(styles);

                return this;
            }

            return this.parent(from, to);
        }

    }, FxCSS))
}();


/*
 ---
 description: css3 transform rule parser.

 license: MIT-style

 authors:
 - Thierry Bela

 credits:
 - Pat Cullen (Fx.CSS.Transform)

 requires:
 core/1.3:
 - Array
 - Fx.CSS

 provides: [Fx.CSS.Parsers.Transform]

 ...
 */

//TODO: handle matrix style -> turn matrix to rotation & translation ?
!function (undefined) {
    "use strict";
    /*
     Number.implement({
     toRad: function() { return this * Math.PI/180; },
     toDeg: function() { return this * 180/Math.PI; }
     }); */

    Fx.CSS.implement({

        compute: function(from, to, delta) {

            var computed = [];

            from = Array.from(from);
            to = Array.from(to);

            (Math.min(from.length, to.length)).times(function(i){

                computed.push({value: from[i].parser.compute(from[i].value, to[i].value, delta), parser: from[i].parser});
            });
            computed.$family = Function.from('fx:css:value');
            return computed;
        },

        prepare: function(element, property, values) {

            values = Array.from(values);

            if (values[1] == null){

                values[1] = values[0];
                values[0] = element.getStyle(property);
            }

            var parser, parsed;

            if(property.test(/^((Moz|Webkit|Ms|O|Khtml)T|t)ransform/)) {

                parser = Fx.CSS.Parsers.Transform;
                parsed = values.map(function (value) { return {value: parser.parse(value), parser: parser} })
            }

            else parsed = values.map(this.parse);

            return {from: parsed[0], to: parsed[1]};
        }
    });

    var deg = ['skew', 'rotate'],
        px = ['translate'],
        generics = ['scale'],
        coordinates = ['X', 'Y', 'Z'],
        number = '\\s*([-+]?([0-9]*\.)?[0-9]+(e[+-]?[0-9]+)?)',
        degunit = 'deg|rad',
        pxunit = 'px|%';

    px = px.concat(coordinates.map(function (side) { return px[0] + side }));
    generics = generics.concat(coordinates.map(function (side) { return generics[0] + side }));
    deg = deg.concat(coordinates.map(function (side) { return deg[0] + side })).concat(coordinates.map(function (side) { return deg[1] + side }));

    Object.append(Element.Styles, {

        rgba: 'rgba(@, @, @, @)',
        borderRadius: '@px @px @px @px',
        boxShadow: 'rgb(@, @, @) @px @px @px',
        textShadow: '@px @px @px rgb(@, @, @)'
    });

    Object.append(Element.ShortStyles, {

        borderTopLeftRadius: '@px',
        borderTopRightRadius: '@px',
        borderBottomLeftRadius: '@px',
        borderBottomRightRadius: '@px'
    });

    Object.append(Fx.CSS.Parsers, {

        Transform: {

            parse: function(value){

                if(!value) return false;

                var transform = {},
                    match;

                if((match = value.match(new RegExp('translate3d\\((' + number + ')(' + pxunit + ')?\\s*,\\s*('+ number + ')(' + pxunit + ')?\\s*,\\s*(' + number + ')(' + pxunit + ')?\\s*\\)')))) {

                    transform.translate3d = {value: [parseFloat(match[1]), parseFloat(match[6]), parseFloat(match[12])], unit: match[5] || match[7] || match[13] || ''}
                }

                if((match = value.match(new RegExp('rotate3d\\(\\s*(' + number + ')\\s*,\\s*('+ number + ')\\s*,\\s*(' + number + ')\\s*,\\s*(' + number + ')(' + degunit + ')?\\s*\\)')))) {

                    transform.rotate3d = {value: [parseFloat(match[1]), parseFloat(match[5]), parseFloat(match[9]), parseFloat(match[13])], unit: match[17] || ''}
                }

                if(px.every(function (t) {

                    if((match = value.match(new RegExp(t + '\\(' + number + '(' + pxunit + ')?\\s*(,' + number + '(' + pxunit + ')?\\s*)\\)', 'i')))) {

                        var x = parseFloat(match[1]),
                            y = parseFloat(match[6]);

                        //allow optional unit for 0
                        if(!match[4] && x != 0) return false;

                        if(match[5]) {

                            if(!match[9] && y != 0) return false;
                            transform[t] = {value: [x, y], unit: match[4] || ''}
                        }

                        else transform[t] = {value: x, unit: match[4] || ''}
                    }

                    else if((match = value.match(new RegExp(t + '\\(' + number + '(' + pxunit + ')?\\s*\\)', 'i')))) {

                        var x = parseFloat(match[1]);

                        //allow optional unit for 0
                        if(!match[4] && x != 0) return false;

                        transform[t] = {value: x, unit: match[4] || ''}
                    }

                    return true
                }) &&

                    deg.every(function (t) {

                        //1 - number
                        //4 - unit
                        //5 - number defined
                        //6 - number
                        //9 - unit
                        if((match = value.match(new RegExp(t + '\\(' + number + '(' + degunit + ')?\\s*(,' + number + '(' + degunit + ')?)\\s*\\)')))) {

                            var x = parseFloat(match[1]),
                                y = parseFloat(match[6]);

                            //allow optional unit for 0
                            if(!match[4] && x != 0) return false;

                            if(match[5]) {

                                if(!match[9] && y != 0) return false;
                                transform[t] = {value: [parseFloat(match[1]), parseFloat(match[6])], unit: match[5]}
                            }

                            else transform[t] = {value: parseFloat(match[1]), unit: match[4]}
                        }

                        else if((match = value.match(new RegExp(t + '\\(' + number + '(' + degunit + ')?\\s*\\)')))) {

                            var x = parseFloat(match[1]);

                            //allow optional unit for 0
                            if(!match[4] && x != 0) return false;

                            transform[t] = {value: parseFloat(match[1]), unit: match[4] || ''}
                        }

                        return true
                    }) && generics.every(function (t) {

                    if((match = value.match(new RegExp(t + '\\(\\s*(([0-9]*\\.)?[0-9]+)\\s*(,\\s*(([0-9]*\\.)?[0-9]+)\\s*)?\\)')))) {

                        if(match[3]) transform[t] = [parseFloat(match[1]), parseFloat(match[4])];

                        else transform[t] = parseFloat(match[1])
                    }

                    return true

                })) return Object.getLength(transform) == 0 ? false : transform;

                return false
            },
            compute: function(from, to, delta){

                var computed = {};

                Object.each(to, function (value, key) {

                    if(value instanceof Array) {

                        computed[key] = Array.from(from[key] == null ? value : Array.from(from[key])).map(function (val, index) {

                            return Fx.compute(val == null ? value[index] : val, value[index], delta)
                        })
                    }

                    else computed[key] = Fx.compute(from[key] == null ? value : from[key], value, delta)
                });

                return computed
            },
            serve: function(transform){

                var style = '';

                deg.each(function (t) {

                    if(transform[t] != null) {

                        if(transform[t].value instanceof Array) style +=  t + '(' + transform[t].value.map(function (val) { return val + transform[t].unit }) + ') ';
                        else style += t + '(' + transform[t].value + transform[t].unit + ') '
                    }
                });

                px.each(function (t) {

                    if(transform[t] != null) {

                        style += t + '(' + Array.from(transform[t].value).map(function (value) { return value + transform[t].unit }) + ') '
                    }
                });

                generics.each(function (t) { if(transform[t] != null) style += t + '(' + transform[t] + ') ' });

                if(transform.translate3d) style += ' translate3d(' + transform.translate3d.value[0]+ transform + transform.translate3d.unit + ',' + transform.translate3d.value[1] +  + transform.translate3d.unit + ',' + transform.translate3d.value[2]+  + transform.translate3d.unit + ')';
                if(transform.rotate3d) style += ' rotate3d(' + transform.rotate3d.value[0]+ ',' + transform.rotate3d.value[1]+ ',' + transform.rotate3d.value[2]+ ', ' + transform.rotate3d.value[4] + transform.rotate3d.unit + ')';

                return style
            }
        }
    })
}();

/*
 ---
 description:     ScrollSpy

 authors:
 - David Walsh (http://davidwalsh.name)

 license:
 - MIT-style license

 requires:
 core/1.2.1:   '*'

 provides:
 - ScrollSpy
 ...
 */
var ScrollSpy = new Class({

    /* implements */
    Implements: [Options,Events],

    /* options */
    options: {
        container: window,
        max: 0,
        min: 0,
        mode: 'vertical'/*,
         onEnter: $empty,
         onLeave: $empty,
         onScroll: $empty,
         onTick: $empty
         */
    },

    /* initialization */
    initialize: function(options) {
        /* set options */
        this.setOptions(options);
        this.container = document.id(this.options.container);
        this.enters = this.leaves = 0;
        this.inside = false;

        /* listener */
        var self = this;
        this.listener = function(e) {
            /* if it has reached the level */
            var position = self.container.getScroll(),
                xy = position[self.options.mode == 'vertical' ? 'y' : 'x'];
            /* if we reach the minimum and are still below the max... */
            if(xy >= self.options.min && (self.options.max == 0 || xy <= self.options.max)) {
                /* trigger enter event if necessary */
                if(!self.inside) {
                    /* record as inside */
                    self.inside = true;
                    self.enters++;
                    /* fire enter event */
                    self.fireEvent('enter',[position,self.enters,e]);
                }
                /* trigger the "tick", always */
                self.fireEvent('tick',[position,self.inside,self.enters,self.leaves,e]);
            }
            /* trigger leave */
            else if(self.inside){
                self.inside = false;
                self.leaves++;
                self.fireEvent('leave',[position,self.leaves,e]);
            }
            /* fire scroll event */
            self.fireEvent('scroll',[position,self.inside,self.enters,self.leaves,e]);
        };

        /* make it happen */
        this.addListener();
    },

    /* starts the listener */
    start: function() {
        this.container.addEvent('scroll',this.listener);
    },

    /* stops the listener */
    stop: function() {
        this.container.removeEvent('scroll',this.listener);
    },

    /* legacy */
    addListener: function() {
        this.start();
    }
});


/*
 * jRespond.js (a simple way to globally manage javascript on responsive websites)
 * version 0.8.3
 * (c) 2012 Jeremy Fields [jeremy.fields@viget.com]
 * released under the MIT license
 */
(function(win,doc,undefined) {

    'use strict';

    win.jRespond = function(breakpoints) {

        // array for registered functions
        var mediaListeners = [];

        // array that corresponds to mediaListeners and holds the current on/off state
        var mediaInit = [];

        // array of media query breakpoints; adjust as needed
        var mediaBreakpoints = breakpoints;

        // store the current breakpoint
        var curr = '';

        // window resize event timer stuff
        var resizeTimer;
        var resizeW = 0;
        var resizeTmrFast = 100;
        var resizeTmrSlow = 500;
        var resizeTmrSpd = resizeTmrSlow;

        // cross browser window width
        var winWidth = function() {

            var w = 0;

            // IE
            if (!window.innerWidth) {

                if (!(document.documentElement.clientWidth === 0)) {

                    // strict mode
                    w = document.documentElement.clientWidth;
                } else {

                    // quirks mode
                    w = document.body.clientWidth;
                }
            } else {

                // w3c
                w = window.innerWidth;
            }

            return w;
        };

        // send media to the mediaListeners array
        var addFunction = function(elm) {

            var brkpt = elm['breakpoint'];
            var entr = elm['enter'] || undefined;

            // add function to stack
            mediaListeners.push(elm);

            // add corresponding entry to mediaInit
            mediaInit.push(false);

            if (testForCurr(brkpt)) {
                if (entr !== undefined) {
                    entr.call();
                }
                mediaInit[(mediaListeners.length - 1)] = true;
            }
        };

        // loops through all registered functions and determines what should be fired
        var cycleThrough = function() {

            var enterArray = [];
            var exitArray = [];

            for (var i = 0; i < mediaListeners.length; i++) {
                var brkpt = mediaListeners[i]['breakpoint'];
                var entr = mediaListeners[i]['enter'] || undefined;
                var exit = mediaListeners[i]['exit'] || undefined;

                if (brkpt === '*') {
                    if (entr !== undefined) {
                        enterArray.push(entr);
                    }
                    if (exit !== undefined) {
                        exitArray.push(exit);
                    }
                } else if (testForCurr(brkpt)) {
                    if (entr !== undefined && !mediaInit[i]) {
                        enterArray.push(entr);
                    }
                    mediaInit[i] = true;
                } else {
                    if (exit !== undefined && mediaInit[i]) {
                        exitArray.push(exit);
                    }
                    mediaInit[i] = false;
                }
            }

            // loop through exit functions to call
            for (var j = 0; j < exitArray.length; j++) {
                exitArray[j].call();
            }

            // then loop through enter functions to call
            for (var k = 0; k < enterArray.length; k++) {
                enterArray[k].call();
            }
        };

        // checks for the correct breakpoint against the mediaBreakpoints list
        var returnBreakpoint = function(width) {

            var foundBrkpt = false;

            // look for existing breakpoint based on width
            for (var i = 0; i < mediaBreakpoints.length; i++) {

                // if registered breakpoint found, break out of loop
                if (width >= mediaBreakpoints[i]['enter'] && width <= mediaBreakpoints[i]['exit']) {
                    foundBrkpt = true;

                    break;
                }
            }

            // if breakpoint is found and it's not the current one
            if (foundBrkpt && curr !== mediaBreakpoints[i]['label']) {
                curr = mediaBreakpoints[i]['label'];

                // run the loop
                cycleThrough();

                // or if no breakpoint applies
            } else if (!foundBrkpt && curr !== '') {
                curr = '';

                // run the loop
                cycleThrough();
            }

        };

        // takes the breakpoint/s arguement from an object and tests it against the current state
        var testForCurr = function(elm) {

            // if there's an array of breakpoints
            if (typeof elm === 'object') {
                if (elm.join().indexOf(curr) >= 0) {
                    return true;
                }

                // if the string is '*' then run at every breakpoint
            } else if (elm === '*') {
                return true;

                // or if it's a single breakpoint
            } else if (typeof elm === 'string') {
                if (curr === elm) {
                    return true;
                }
            }
        };

        // self-calling function that checks the browser width and delegates if it detects a change
        var checkResize = function() {

            // get current width
            var w = winWidth();

            // if there is a change speed up the timer and fire the returnBreakpoint function
            if (w !== resizeW) {
                resizeTmrSpd = resizeTmrFast;

                returnBreakpoint(w);

                // otherwise keep on keepin' on
            } else {
                resizeTmrSpd = resizeTmrSlow;
            }

            resizeW = w;

            // calls itself on a setTimeout
            setTimeout(checkResize, resizeTmrSpd);
        };
        checkResize();

        // return
        return {
            addFunc: function(elm) { addFunction(elm); },
            getBreakpoint: function() { return curr; }
        };

    };

}(this,this.document));

var jRes = jRespond([
    {
        label: 'mobileS',
        enter: 0,
        exit: 360
    },
    {
        label: 'mobileM',
        enter: 361,
        exit: 540
    },
    {
        label: 'mobileL',
        enter: 541,
        exit: 898
    },
    {
        label: 'small',
        enter: 899,
        exit: 1016
    },
    {
        label: 'mid',
        enter: 1017,
        exit: 1180
    },
    {
        label: 'wide',
        enter: 1181,
        exit: 10000
    }
]);