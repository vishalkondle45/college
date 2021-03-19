<!doctype html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="en-IN">

<head>
    <meta charset="UTF-8">
    <meta content="origin" name="referrer">
    <meta content="/images/branding/googleg/1x/googleg_standard_color_128dp.png" itemprop="image">
    <link href="/manifest?pwa=webhp" crossorigin="use-credentials" rel="manifest">
    <title>Google</title>
    <script nonce="eZh4wR1Bjg/y7Me6R/anIA==">
        (function() {
            window.google = {
                kEI: '8jhUYIa-DrCG4-EPpOqZgA0',
                kEXPI: '31',
                u: '8a25db2a',
                kBL: 'OkAh'
            };
            google.sn = 'webhp';
            google.kHL = 'en-IN';
        })();
        (function() {
            var f = [];
            google.getEI = function(a) {
                for (var b; a && (!a.getAttribute || !(b = a.getAttribute("eid")));) a = a.parentNode;
                return b || google.kEI
            };
            google.getLEI = function(a) {
                for (var b = null; a && (!a.getAttribute || !(b = a.getAttribute("leid")));) a = a.parentNode;
                return b
            };
            google.ml = function() {
                return null
            };
            google.log = function(a, b, c, d, g) {
                if (c = google.logUrl(a, b, c, d, g)) {
                    a = new Image;
                    var e = f.length;
                    f[e] = a;
                    a.onerror = a.onload = a.onabort = function() {
                        delete f[e]
                    };
                    a.src = c
                }
            };
            google.logUrl = function(a, b, c, d, g) {
                var e = "";
                c || -1 != b.search("&ei=") || (e = "&ei=" + google.getEI(d), -1 == b.search("&lei=") && (d = google.getLEI(d)) && (e += "&lei=" + d));
                d = "";
                !c && window._cshid && -1 == b.search("&cshid=") && "slh" != a && (d = "&cshid=" + window._cshid);
                c = c || "/" + (g || "gen_204") + "?atyp=i&ct=" + a + "&cad=" + b + e + "&zx=" + Date.now() + d;
                /^http:/i.test(c) && "https:" == window.location.protocol && (google.ml(Error("a"), !1, {
                    src: c,
                    glmm: 1
                }), c = "");
                return c
            };
        }).call(this);
        (function() {
            google.y = {};
            google.sy = [];
            google.x = function(a, b) {
                if (a) var c = a.id;
                else {
                    do c = Math.random(); while (google.y[c])
                }
                google.y[c] = [a, b];
                return !1
            };
            google.sx = function(a) {
                google.sy.push(a)
            };
            google.lm = [];
            google.plm = function(a) {
                google.lm.push.apply(google.lm, a)
            };
            google.lq = [];
            google.load = function(a, b, c) {
                google.lq.push([
                    [a], b, c
                ])
            };
            google.loadAll = function(a, b) {
                google.lq.push([a, b])
            };
            google.bx = !1;
            google.lx = function() {};
        }).call(this);
        google.f = {};
        (function() {
            document.documentElement.addEventListener("submit", function(b) {
                var a;
                if (a = b.target) {
                    var c = a.getAttribute("data-submitfalse");
                    a = "1" == c || "q" == c && !a.elements.q.value ? !0 : !1
                } else a = !1;
                a && (b.preventDefault(), b.stopPropagation())
            }, !0);
            document.documentElement.addEventListener("click", function(b) {
                var a;
                a: {
                    for (a = b.target; a && a != document.documentElement; a = a.parentElement)
                        if ("A" == a.tagName) {
                            a = "1" == a.getAttribute("data-nohref");
                            break a
                        } a = !1
                }
                a && b.preventDefault()
            }, !0);
        }).call(this);
        (function() {
            google.hs = {
                h: true,
                peh: true,
                sie: false
            };
        })();
        (function() {
            google.c = {
                biml: true,
                btfi: false,
                datfo: false,
                gl: true,
                lhc: false,
                ll: false,
                lmv: true,
                sdi: true
            };
            (function() {
                var e = window.performance;
                google.timers = {};
                google.startTick = function(a) {
                    google.timers[a] = {
                        t: {
                            start: Date.now()
                        },
                        e: {},
                        m: {}
                    }
                };
                google.tick = function(a, b, c) {
                    google.timers[a] || google.startTick(a);
                    c = void 0 !== c ? c : Date.now();
                    b instanceof Array || (b = [b]);
                    for (var d = 0, f; f = b[d++];) google.timers[a].t[f] = c
                };
                google.c.e = function(a, b, c) {
                    google.timers[a].e[b] = c
                };
                google.c.b = function(a) {
                    var b = google.timers.load.m;
                    b[a] && google.ml(Error("a"), !1, {
                        m: a
                    });
                    b[a] = !0
                };
                google.c.u = function(a) {
                    var b = google.timers.load.m;
                    if (b[a]) {
                        b[a] = !1;
                        for (a in b)
                            if (b[a]) return;
                        google.csiReport()
                    } else google.ml(Error("b"), !1, {
                        m: a
                    })
                };

                function g(a, b, c, d) {
                    a.addEventListener ? a.addEventListener(b, c, d || !1) : a.attachEvent && a.attachEvent("on" + b, c)
                }

                function h(a, b, c, d) {
                    a.addEventListener ? a.removeEventListener(b, c, d || !1) : a.attachEvent && a.detachEvent("on" + b, c)
                }
                google.rll = function(a, b, c) {
                    var d = function(f) {
                        c(f);
                        h(a, "load", d);
                        h(a, "error", d)
                    };
                    g(a, "load", d);
                    b && g(a, "error", d)
                };
                google.aft = function(a) {
                    a.setAttribute("data-iml", Date.now())
                };
                google.startTick("load");
                var k = google.timers.load;
                a: {
                    var l = k.t;
                    if (e) {
                        var m = e.timing;
                        if (m) {
                            var n = m.navigationStart,
                                p = m.responseStart;
                            if (p > n && p <= l.start) {
                                l.start = p;
                                k.wsrt = p - n;
                                break a
                            }
                        }
                        e.now && (k.wsrt = Math.floor(e.now()))
                    }
                }
                google.c.b("pr");
                google.c.b("xe");
                if (google.c.gl) {
                    var q = function(a) {
                        a && google.aft(a.target)
                    };
                    g(document.documentElement, "load", q, !0);
                    google.c.glu = function() {
                        h(document.documentElement, "load", q, !0)
                    }
                };
            }).call(this);
        })();
        (function() {
            function l() {
                return window.performance && window.performance.navigation && window.performance.navigation.type
            };

            function n(a, b) {
                return !a || !b && p(a) ? 0 : a.getBoundingClientRect ? q(a, b, function(c) {
                    return c.getBoundingClientRect()
                }) : 1
            }

            function p(a) {
                return "none" == a.style.display ? !0 : document.defaultView && document.defaultView.getComputedStyle ? (a = document.defaultView.getComputedStyle(a), !!a && ("hidden" == a.visibility || "0px" == a.height && "0px" == a.width)) : !1
            }

            function q(a, b, c) {
                var d = c(a);
                a = d.left + window.pageXOffset;
                c = d.top + window.pageYOffset;
                var f = d.width;
                d = d.height;
                var e = 0;
                if (!b && 0 >= d && 0 >= f) return e;
                b = window.innerHeight || document.documentElement.clientHeight;
                0 > c + d ? e = 2 : c >= b && (e = 4);
                if (0 > a + f || a >= (window.innerWidth || document.documentElement.clientWidth)) e |= 8;
                e || (e = 1, c + d > b && (e |= 4));
                return e
            };
            var r = window.location,
                t = "aft frt hct prt pprt sct".split(" ");

            function u(a) {
                return (a = r.search.match(new RegExp("[?&]" + a + "=(\\d+)"))) ? Number(a[1]) : -1
            };
            var v = window.innerHeight || document.documentElement.clientHeight,
                w = 0,
                x = 0,
                y = 0,
                z = 0,
                A = 0,
                B = 0,
                C = 0,
                D = !0,
                E = !0,
                F = -1;

            function G(a, b, c, d) {
                var f = google.timers.load.t[a];
                f && (c || d && b && b < f) || google.tick("load", a, b)
            }

            function H(a, b, c) {
                a && (G("frt", c, !1, !0), ++z, I());
                b && (G("aft", c, !1, !0), ++B, I());
                G("iml", c, !1, !0);
                ++x;
                (google.c.biml || b) && J()
            }

            function J() {
                var a = google.c.biml ? x == w : A == B;
                !E && a && google.c.u("il")
            }

            function I() {
                if (!D && B == A && z == y) {
                    google.c.e("load", "ima", String(A));
                    google.c.e("load", "imad", String(C));
                    google.c.e("load", "aftp", String(Math.round(F)));
                    var a = google.timers.load,
                        b = a.m;
                    if (!b || !b.prs) {
                        var c = l() ? 0 : u("qsubts");
                        0 < c && (b = u("fbts"), 0 < b && (a.t.start = Math.max(c, b)));
                        var d = a.t,
                            f = d.start;
                        b = {
                            wsrt: a.wsrt
                        };
                        for (var e = 0, k; k = t[e++];) {
                            var m = d[k];
                            m && f && (b[k] = m - f)
                        }
                        0 < c && (b.gsasrt = a.t.start - c);
                        c = a.e;
                        a = "/gen_204?s=" + google.sn + "&t=aft&atyp=csi&ei=" + google.kEI + "&rt=";
                        d = "";
                        for (g in b) a += "" + d + g + "." + b[g], d = ",";
                        for (var h in c) a += "&" + h + "=" + c[h];
                        window._cshid && (a += "&cshid=" + window._cshid);
                        2 == l() && (a += "&bb=1");
                        1 == l() && (a += "&r=1");
                        window.opener && (a += "&wo=1");
                        if ("gsasrt" in b) {
                            var g = u("qsd");
                            0 < g && (a += "&qsd=" + g)
                        }
                        google.kBL && (a += "&bl=" + google.kBL);
                        g = a;
                        navigator.sendBeacon ? navigator.sendBeacon(g, "") : google.log("", "", g)
                    }
                    if (google.aftq) {
                        for (g = 0; h = google.aftq[g++];) try {
                            h()
                        } catch (K) {
                            google.ml(K, !1)
                        }
                        google.aftq = null
                    }
                }
            }
            var L = "src bsrc url ll image img-url".split(" ");

            function M(a) {
                for (var b = 0, c; c = L[b++];)
                    if (a.getAttribute("data-" + c)) return !0;
                return !1
            }
            google.c.b("il");
            google.c.setup = function(a, b, c) {
                var d = a.getAttribute("data-atf");
                if (d) return Number(d);
                var f = "string" != typeof a.src || !a.src,
                    e = !!a.getAttribute("data-bsrc");
                d = a.getAttribute("data-deferred");
                var k = !d && M(a);
                k && a.setAttribute("data-lzy_", 1);
                var m = n(a, e && google.c.lmv);
                a.setAttribute("data-atf", m);
                var h = !!(m & 1);
                f = (f || a.complete) && !d && !e && !(google.c.ll && h && k);
                e = !google.c.lhc && Number(a.getAttribute("data-iml")) || 0;
                ++w;
                if (f && !e || a.hasAttribute("data-noaft")) ++x;
                else {
                    if (k = google.c.btfi && m & 4 && e && F < v) {
                        var g =
                            a.getBoundingClientRect().top + window.pageYOffset;
                        !c || g < c ? F = h ? v : g : k = !1
                    }
                    h && (++A, d && ++C);
                    b && ++y;
                    k && G("aft", e, !1, !0);
                    f && e ? H(b, h, e) : (h && (!c || c >= v) && (F = v), google.rll(a, !0, function() {
                        H(b, h, Date.now())
                    }))
                }
                return m
            };
            google.c.ubr = function(a, b, c) {
                google.c.btfi ? 0 > F && (c && (F = c), G("aft", b)) : G("aft", b, !0);
                D && (D = !1, I());
                a && E && (G("prt", b), G("iml", b, !0), E = !1, J(), google.c.setup = function() {
                    return 0
                }, google.c.ubr = function() {})
            };
        }).call(this);
        (function() {
            var b = [function() {
                google.tick && google.tick("load", "dcl")
            }];
            google.dclc = function(a) {
                b.length ? b.push(a) : a()
            };

            function c() {
                for (var a; a = b.shift();) a()
            }
            window.addEventListener ? (document.addEventListener("DOMContentLoaded", c, !1), window.addEventListener("load", c, !1)) : window.attachEvent && window.attachEvent("onload", c);
        }).call(this);
        (function() {
            var b = [];
            google.jsc = {
                xx: b,
                x: function(a) {
                    b.push(a)
                },
                mm: [],
                m: function(a) {
                    google.jsc.mm.length || (google.jsc.mm = a)
                }
            };
        }).call(this);
        (function() {
            var e = this || self;

            var g = {};

            function w(a, b) {
                if (null === b) return !1;
                if ("contains" in a && 1 == b.nodeType) return a.contains(b);
                if ("compareDocumentPosition" in a) return a == b || !!(a.compareDocumentPosition(b) & 16);
                for (; b && a != b;) b = b.parentNode;
                return b == a
            };
            var y = function(a, b) {
                    return function(d) {
                        d || (d = window.event);
                        return b.call(a, d)
                    }
                },
                D = "undefined" != typeof navigator && /Macintosh/.test(navigator.userAgent),
                E = function() {
                    this._mouseEventsPrevented = !0
                };
            var F = function() {
                    this.h = this.g = null
                },
                H = function(a, b) {
                    var d = G;
                    d.g = a;
                    d.h = b;
                    return d
                };
            F.prototype.i = function() {
                var a = this.g;
                this.g && this.g != this.h ? this.g = this.g.__owner || this.g.parentNode : this.g = null;
                return a
            };
            var I = function() {
                this.j = [];
                this.g = 0;
                this.h = null;
                this.l = !1
            };
            I.prototype.i = function() {
                if (this.l) return G.i();
                if (this.g != this.j.length) {
                    var a = this.j[this.g];
                    this.g++;
                    a != this.h && a && a.__owner && (this.l = !0, H(a.__owner, this.h));
                    return a
                }
                return null
            };
            var G = new F,
                J = new I;
            var N = function() {
                    this.s = [];
                    this.g = [];
                    this.h = [];
                    this.l = {};
                    this.i = null;
                    this.j = [];
                    K(this, "_custom")
                },
                O = "undefined" != typeof navigator && /iPhone|iPad|iPod/.test(navigator.userAgent),
                P = String.prototype.trim ? function(a) {
                    return a.trim()
                } : function(a) {
                    return a.replace(/^\s+/, "").replace(/\s+$/, "")
                },
                Q = /\s*;\s*/,
                da = function(a, b) {
                    return function l(c, f) {
                        f = void 0 === f ? !0 : f;
                        var k = b;
                        if ("_custom" == k) {
                            k = c.detail;
                            if (!k || !k._type) return;
                            k = k._type
                        }
                        var m = k;
                        "click" == m && (D && c.metaKey || !D && c.ctrlKey || 2 == c.which || null == c.which &&
                            4 == c.button || c.shiftKey) ? m = "clickmod" : "keydown" == m && !c.a11ysc && (m = "maybe_click");
                        var u = c.srcElement || c.target;
                        k = R(m, c, u, "", null);
                        if (c.path) {
                            J.j = c.path;
                            J.g = 0;
                            J.h = this;
                            J.l = !1;
                            var L = J
                        } else L = H(u, this);
                        for (var p; p = L.i();) {
                            var h = p;
                            var q = void 0;
                            var r = h;
                            p = m;
                            var n = r.__jsaction;
                            if (!n) {
                                var x;
                                n = null;
                                "getAttribute" in r && (n = r.getAttribute("jsaction"));
                                if (x = n) {
                                    n = g[x];
                                    if (!n) {
                                        n = {};
                                        for (var z = x.split(Q), aa = z ? z.length : 0, A = 0; A < aa; A++) {
                                            var v = z[A];
                                            if (v) {
                                                var B = v.indexOf(":"),
                                                    M = -1 != B,
                                                    ba = M ? P(v.substr(0, B)) : "click";
                                                v = M ? P(v.substr(B +
                                                    1)) : v;
                                                n[ba] = v
                                            }
                                        }
                                        g[x] = n
                                    }
                                    r.__jsaction = n
                                } else n = ca, r.__jsaction = n
                            }
                            r = n;
                            "maybe_click" == p && r.click ? (q = p, p = "click") : "clickkey" == p ? p = "click" : "click" != p || r.click || (p = "clickonly");
                            q = {
                                o: q ? q : p,
                                action: r[p] || "",
                                event: null,
                                v: !1
                            };
                            k = R(q.o, q.event || c, u, q.action || "", h, k.timeStamp);
                            if (q.v || q.action) break
                        }
                        k && "touchend" == k.eventType && (k.event._preventMouseEvents = E);
                        if (q && q.action) {
                            if ("mouseenter" == m || "mouseleave" == m)
                                if (u = c.relatedTarget, !("mouseover" == c.type && "mouseenter" == m || "mouseout" == c.type && "mouseleave" == m) || u && (u ===
                                        h || w(h, u))) k.action = "", k.actionElement = null;
                                else {
                                    m = {};
                                    for (var t in c) "function" !== typeof c[t] && "srcElement" !== t && "target" !== t && (m[t] = c[t]);
                                    m.type = "mouseover" == c.type ? "mouseenter" : "mouseleave";
                                    m.target = m.srcElement = h;
                                    m.bubbles = !1;
                                    k.event = m;
                                    k.targetElement = h
                                }
                        } else k.action = "", k.actionElement = null;
                        h = k;
                        a.i && !h.event.a11ysgd && (t = R(h.eventType, h.event, h.targetElement, h.action, h.actionElement, h.timeStamp), "clickonly" == t.eventType && (t.eventType = "click"), a.i(t, !0));
                        if (h.actionElement || "maybe_click" == h.eventType)
                            if (a.i) !h.actionElement ||
                                "A" != h.actionElement.tagName || "click" != h.eventType && "clickmod" != h.eventType || (c.preventDefault ? c.preventDefault() : c.returnValue = !1), (c = a.i(h)) && f && l.call(this, c, !1);
                            else {
                                if ((f = e.document) && !f.createEvent && f.createEventObject) try {
                                    var C = f.createEventObject(c)
                                } catch (ha) {
                                    C = c
                                } else C = c;
                                h.event = C;
                                a.j.push(h)
                            }
                    }
                },
                R = function(a, b, d, c, f, l) {
                    return {
                        eventType: a,
                        event: b,
                        targetElement: d,
                        action: c,
                        actionElement: f,
                        timeStamp: l || Date.now()
                    }
                },
                ca = {},
                ea = function(a, b) {
                    return function(d) {
                        var c = a,
                            f = b,
                            l = !1;
                        "mouseenter" == c ? c =
                            "mouseover" : "mouseleave" == c && (c = "mouseout");
                        if (d.addEventListener) {
                            if ("focus" == c || "blur" == c || "error" == c || "load" == c) l = !0;
                            d.addEventListener(c, f, l)
                        } else d.attachEvent && ("focus" == c ? c = "focusin" : "blur" == c && (c = "focusout"), f = y(d, f), d.attachEvent("on" + c, f));
                        return {
                            o: c,
                            m: f,
                            capture: l
                        }
                    }
                },
                K = function(a, b) {
                    if (!a.l.hasOwnProperty(b)) {
                        var d = da(a, b),
                            c = ea(b, d);
                        a.l[b] = d;
                        a.s.push(c);
                        for (d = 0; d < a.g.length; ++d) {
                            var f = a.g[d];
                            f.h.push(c.call(null, f.g))
                        }
                        "click" == b && K(a, "keydown")
                    }
                };
            N.prototype.m = function(a) {
                return this.l[a]
            };
            var V = function(a, b) {
                    var d = new fa(b);
                    a: {
                        for (var c = 0; c < a.g.length; c++)
                            if (S(a.g[c], b)) {
                                b = !0;
                                break a
                            } b = !1
                    }
                    if (b) return a.h.push(d), d;
                    T(a, d);
                    a.g.push(d);
                    U(a);
                    return d
                },
                U = function(a) {
                    for (var b = a.h.concat(a.g), d = [], c = [], f = 0; f < a.g.length; ++f) {
                        var l = a.g[f];
                        W(l, b) ? (d.push(l), X(l)) : c.push(l)
                    }
                    for (f = 0; f < a.h.length; ++f) l = a.h[f], W(l, b) ? d.push(l) : (c.push(l), T(a, l));
                    a.g = c;
                    a.h = d
                },
                T = function(a, b) {
                    var d = b.g;
                    O && (d.style.cursor = "pointer");
                    for (d = 0; d < a.s.length; ++d) b.h.push(a.s[d].call(null, b.g))
                },
                Y = function(a, b) {
                    a.i = b;
                    a.j &&
                        (0 < a.j.length && b(a.j), a.j = null)
                },
                fa = function(a) {
                    this.g = a;
                    this.h = []
                },
                S = function(a, b) {
                    for (a = a.g; a != b && b.parentNode;) b = b.parentNode;
                    return a == b
                },
                W = function(a, b) {
                    for (var d = 0; d < b.length; ++d)
                        if (b[d].g != a.g && S(b[d], a.g)) return !0;
                    return !1
                },
                X = function(a) {
                    for (var b = 0; b < a.h.length; ++b) {
                        var d = a.g,
                            c = a.h[b];
                        d.removeEventListener ? d.removeEventListener(c.o, c.m, c.capture) : d.detachEvent && d.detachEvent("on" + c.o, c.m)
                    }
                    a.h = []
                };
            var Z = new N;
            V(Z, window.document.documentElement);
            K(Z, "click");
            K(Z, "focus");
            K(Z, "focusin");
            K(Z, "blur");
            K(Z, "focusout");
            K(Z, "error");
            K(Z, "load");
            K(Z, "change");
            K(Z, "dblclick");
            K(Z, "input");
            K(Z, "keyup");
            K(Z, "keydown");
            K(Z, "keypress");
            K(Z, "mousedown");
            K(Z, "mouseenter");
            K(Z, "mouseleave");
            K(Z, "mouseout");
            K(Z, "mouseover");
            K(Z, "mouseup");
            K(Z, "paste");
            K(Z, "touchstart");
            K(Z, "touchend");
            K(Z, "touchcancel");
            K(Z, "speech");
            (function(a) {
                google.jsad = function(b) {
                    Y(a, b)
                };
                google.jsaac = function(b) {
                    return V(a, b)
                };
                google.jsarc = function(b) {
                    X(b);
                    for (var d = !1, c = 0; c < a.g.length; ++c)
                        if (a.g[c] === b) {
                            a.g.splice(c, 1);
                            d = !0;
                            break
                        } if (!d)
                        for (d = 0; d < a.h.length; ++d)
                            if (a.h[d] === b) {
                                a.h.splice(d, 1);
                                break
                            } U(a)
                }
            })(Z);
            window.gws_wizbind = function(a) {
                return {
                    trigger: function(b) {
                        var d = a.m(b.type);
                        d || (K(a, b.type), d = a.m(b.type));
                        var c = b.target || b.srcElement;
                        d && d.call(c.ownerDocument.documentElement, b)
                    },
                    bind: function(b) {
                        Y(a, b)
                    }
                }
            }(Z);
        }).call(this);
        (function() {
            window.google.xjsu = '/xjs/_/js/k\x3dxjs.s.en_GB.13Y5EQP_Scc.O/ck\x3dxjs.s.ilan4-72slk.L.W.O/m\x3dcdos,dpf,hsm,jsa,d,csi/am\x3dMIAAACCCAgAAAAiAAggrAwKAeAAgkICCJAAAAAAwgX1AwH8TALhgEwcAAAAAQABcEmiUGpAoCIAAAABAVldLgBCA/d\x3d1/dg\x3d2/br\x3d1/ct\x3dzgms/rs\x3dACT90oFnpDnO1NPdmTPCDmuN93ytsrPaFQ';
        })();

        function _DumpException(e) {
            throw e;
        }

        function _F_installCss(c) {}
    </script>
    <script defer="" src="/xjs/_/js/k=xjs.s.en_GB.13Y5EQP_Scc.O/ck=xjs.s.ilan4-72slk.L.W.O/m=cdos,dpf,hsm,jsa,d,csi/am=MIAAACCCAgAAAAiAAggrAwKAeAAgkICCJAAAAAAwgX1AwH8TALhgEwcAAAAAQABcEmiUGpAoCIAAAABAVldLgBCA/d=1/dg=2/br=1/ct=zgms/rs=ACT90oFnpDnO1NPdmTPCDmuN93ytsrPaFQ" nonce="eZh4wR1Bjg/y7Me6R/anIA=="></script>
    <script nonce="eZh4wR1Bjg/y7Me6R/anIA==">
        ;
        this.gbar_ = {
            CONFIG: [
                [
                    [0, "www.gstatic.com", "og.qtm.en_US.G0xtzSlPsf8.O", "co.in", "en", "538", 0, [4, 2, ".40.40.40.40.40.40.", "", "1300102,3700280,3700817,3700830,3700874", "362844975", "0"], null, "8jhUYKH1D-WT4-EPiYiCgA0", null, 0, "og.qtm.4cwBuE8sxqA.L.W.O", "AA2YrTtTmlVSU_hfl4YThsKXZqgSdlvEvg", "AA2YrTtzd9o2G7_4ubQDhEQdYOcDq4ZGvQ", "", 2, 1, 200, "IND", null, null, "1", "538", 1], null, [1, 0.1000000014901161, 2, 1],
                    [1, 0.001000000047497451, 1],
                    [1, 0, 0, null, "0", "vishal.kondle@gmail.com", "", "AOEwXKr8LfrYul1H_1TKSAg6HHl-feOEjP_nSRvEdw-229AzOR-ATvYYypQv_N7CsZ1ENJOBa73vVrDKVlv48U5SpaTroT4zyw"],
                    [0, 0, "", 1, 0, 0, 0, 0, 0, 0, null, 0, 0, null, 0, 0, null, null, 0, 0, 0, "", "", "", "", "", "", null, 0, 0, 0, 0, 0, null, null, null, "rgba(32,33,36,1)", "rgba(255,255,255,1)", 0, 0, 1, null, null, 0, 0, 0],
                    ["%1$s (default)", "Brand account", 0, "%1$s (delegated)", 1, null, 83, "https://www.google.com/webhp?authuser=$authuser", null, null, null, 1, "https://accounts.google.com/ListAccounts?listPages=0\u0026authuser=0\u0026pid=538\u0026gpsia=1\u0026source=ogb\u0026atic=1\u0026mo=1\u0026mn=1\u0026hl=en\u0026ts=157", 0, "dashboard", null, null, null, null, "Profile", "", 0, null, "Signed out", "https://accounts.google.com/AccountChooser?source=ogb\u0026continue=$continue\u0026Email=$email\u0026ec=GAhAmgQ", "https://accounts.google.com/RemoveLocalAccount?source=ogb", "Remove", "Sign in", 0, 1, 1, 0, 1, 0, 0, "000770F2031EF6E93AC76A1E293FCCECBB0D617321F0D1DCBF::1616132338264", null, null, "Session expired", null, null, "https://docs.google.com/picker", "Visitor", null, "Default", "Delegated", "Sign out of all accounts", 1, 0, null, 0, 0, 0, "myaccount.google.com"], null, ["1", "gci_91f30755d6a6b787dcc2a4062e6e9824.js", "googleapis.client:gapi.iframes", "0", "en"], null, null, null, null, ["m;/_/scs/abc-static/_/js/k=gapi.gapi.en.RrjSsKk8Szw.O/d=1/ct=zgms/rs=AHpOoo8bhQb3qTfNhmC8kzOOB-dQGGlNzA/m=__features__", "https://apis.google.com", "", "", "1", "", null, 1, "es_plusone_gc_20210301.0_p0", "en", null, 0],
                    [0.009999999776482582, "co.in", "538", [null, "", "0", null, 1, 5184000, null, null, "", null, null, null, null, null, 0, null, 0, 0, 1, 0, 0, 0, null, null, 0, 0], null, null, null, 0, null, null, ["5061451", "google\\.(com|ru|ca|by|kz|com\\.mx|com\\.tr)$", 1]],
                    [1, 1, null, 40400, 538, "IND", "en", "362844975.0", 8, 0.009999999776482582, 1, 0, null, null, 1, 0, "3700817,3700830,3700874", null, null, null, "8jhUYKH1D-WT4-EPiYiCgA0", 0, 0],
                    [
                        [null, null, null, "https://www.gstatic.com/og/_/js/k=og.qtm.en_US.G0xtzSlPsf8.O/rt=j/m=qabr,qgl,q_dnp,qdid,qcwid,qmutsd,qbg,qbd,qapid,qald/exm=qaaw,qadd,qaid,qein,qhaw,qhbr,qhch,qhga,qhid,qhin,qhpr/d=1/ed=1/rs=AA2YrTtTmlVSU_hfl4YThsKXZqgSdlvEvg"],
                        [null, null, null, "https://www.gstatic.com/og/_/ss/k=og.qtm.4cwBuE8sxqA.L.W.O/m=qdid,qcwid/excm=qaaw,qadd,qaid,qein,qhaw,qhbr,qhch,qhga,qhid,qhin,qhpr/d=1/ed=1/ct=zgms/rs=AA2YrTtzd9o2G7_4ubQDhEQdYOcDq4ZGvQ"]
                    ], null, null, [""],
                    [
                        [
                            [null, null, [null, null, null, "https://ogs.google.com/u/0/widget/app?bc=1"], 0, 448, 328, 57, 4, 1, 0, 0, 63, 64, 8000, "https://www.google.co.in/intl/en/about/products", 67, 1, 69, null, 1, 70, "Can't seem to load the app launcher right now. Try again or go to the %1$sGoogle Products%2$s page.", 3, 0, 0, 74, 4000]
                        ], 0, [null, null, null, "https://www.gstatic.com/og/_/js/k=og.qtm.en_US.G0xtzSlPsf8.O/rt=j/m=qdsh/d=1/ed=1/rs=AA2YrTtTmlVSU_hfl4YThsKXZqgSdlvEvg"], "1", "538", 1, 0, null, "en", 0
                    ],
                    [300000, "/u/0", "/u/0/_/gog/get", "AOEwXKr8LfrYul1H_1TKSAg6HHl-feOEjP_nSRvEdw-229AzOR-ATvYYypQv_N7CsZ1ENJOBa73vVrDKVlv48U5SpaTroT4zyw", "https", 0, "aa.google.com", "rt=j\u0026sourceid=538", "", "eZh4wR1Bjg/y7Me6R/anIA==", "", 0, 0, null, 0],
                    [
                        ["mousedown", "touchstart", "touchmove", "wheel", "keydown"], 300000
                    ]
                ]
            ],
        };
        this.gbar_ = this.gbar_ || {};
        (function(_) {
            var window = this;
            try {
                /*

                 Copyright The Closure Library Authors.
                 SPDX-License-Identifier: Apache-2.0
                */
                var ea, ha, ia, ja, ka, la, na, oa, sa, ta, Da, Ea, Fa;
                _.aa = function(a) {
                    if (Error.captureStackTrace) Error.captureStackTrace(this, _.aa);
                    else {
                        var b = Error().stack;
                        b && (this.stack = b)
                    }
                    a && (this.message = String(a))
                };
                _.ca = function(a, b) {
                    return 0 <= (0, _.ba)(a, b)
                };
                _.n = function(a, b) {
                    return null != a ? !!a : !!b
                };
                _.p = function(a, b) {
                    void 0 == b && (b = "");
                    return null != a ? a : b
                };
                _.da = function(a, b) {
                    void 0 == b && (b = 0);
                    return null != a ? a : b
                };
                ea = function(a) {
                    var b = 0;
                    return function() {
                        return b < a.length ? {
                            done: !1,
                            value: a[b++]
                        } : {
                            done: !0
                        }
                    }
                };
                ha = "function" == typeof Object.defineProperties ? Object.defineProperty : function(a, b, c) {
                    if (a == Array.prototype || a == Object.prototype) return a;
                    a[b] = c.value;
                    return a
                };
                ia = function(a) {
                    a = ["object" == typeof globalThis && globalThis, a, "object" == typeof window && window, "object" == typeof self && self, "object" == typeof global && global];
                    for (var b = 0; b < a.length; ++b) {
                        var c = a[b];
                        if (c && c.Math == Math) return c
                    }
                    throw Error("a");
                };
                ja = ia(this);
                ka = function(a, b) {
                    if (b) a: {
                        var c = ja;a = a.split(".");
                        for (var d = 0; d < a.length - 1; d++) {
                            var e = a[d];
                            if (!(e in c)) break a;
                            c = c[e]
                        }
                        a = a[a.length - 1];d = c[a];b = b(d);b != d && null != b && ha(c, a, {
                            configurable: !0,
                            writable: !0,
                            value: b
                        })
                    }
                };
                ka("Symbol", function(a) {
                    if (a) return a;
                    var b = function(e, f) {
                        this.j = e;
                        ha(this, "description", {
                            configurable: !0,
                            writable: !0,
                            value: f
                        })
                    };
                    b.prototype.toString = function() {
                        return this.j
                    };
                    var c = 0,
                        d = function(e) {
                            if (this instanceof d) throw new TypeError("b");
                            return new b("jscomp_symbol_" + (e || "") + "_" + c++, e)
                        };
                    return d
                });
                ka("Symbol.iterator", function(a) {
                    if (a) return a;
                    a = Symbol("c");
                    for (var b = "Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "), c = 0; c < b.length; c++) {
                        var d = ja[b[c]];
                        "function" === typeof d && "function" != typeof d.prototype[a] && ha(d.prototype, a, {
                            configurable: !0,
                            writable: !0,
                            value: function() {
                                return la(ea(this))
                            }
                        })
                    }
                    return a
                });
                la = function(a) {
                    a = {
                        next: a
                    };
                    a[Symbol.iterator] = function() {
                        return this
                    };
                    return a
                };
                _.ma = function(a) {
                    var b = "undefined" != typeof Symbol && Symbol.iterator && a[Symbol.iterator];
                    return b ? b.call(a) : {
                        next: ea(a)
                    }
                };
                na = "function" == typeof Object.create ? Object.create : function(a) {
                    var b = function() {};
                    b.prototype = a;
                    return new b
                };
                if ("function" == typeof Object.setPrototypeOf) oa = Object.setPrototypeOf;
                else {
                    var pa;
                    a: {
                        var qa = {
                                a: !0
                            },
                            ra = {};
                        try {
                            ra.__proto__ = qa;
                            pa = ra.a;
                            break a
                        } catch (a) {}
                        pa = !1
                    }
                    oa = pa ? function(a, b) {
                        a.__proto__ = b;
                        if (a.__proto__ !== b) throw new TypeError("d`" + a);
                        return a
                    } : null
                }
                sa = oa;
                _.r = function(a, b) {
                    a.prototype = na(b.prototype);
                    a.prototype.constructor = a;
                    if (sa) sa(a, b);
                    else
                        for (var c in b)
                            if ("prototype" != c)
                                if (Object.defineProperties) {
                                    var d = Object.getOwnPropertyDescriptor(b, c);
                                    d && Object.defineProperty(a, c, d)
                                } else a[c] = b[c];
                    a.T = b.prototype
                };
                ta = function(a, b) {
                    a instanceof String && (a += "");
                    var c = 0,
                        d = !1,
                        e = {
                            next: function() {
                                if (!d && c < a.length) {
                                    var f = c++;
                                    return {
                                        value: b(f, a[f]),
                                        done: !1
                                    }
                                }
                                d = !0;
                                return {
                                    done: !0,
                                    value: void 0
                                }
                            }
                        };
                    e[Symbol.iterator] = function() {
                        return e
                    };
                    return e
                };
                ka("Array.prototype.entries", function(a) {
                    return a ? a : function() {
                        return ta(this, function(b, c) {
                            return [b, c]
                        })
                    }
                });
                ka("Array.prototype.keys", function(a) {
                    return a ? a : function() {
                        return ta(this, function(b) {
                            return b
                        })
                    }
                });
                ka("Number.MAX_SAFE_INTEGER", function() {
                    return 9007199254740991
                });
                ka("Array.prototype.values", function(a) {
                    return a ? a : function() {
                        return ta(this, function(b, c) {
                            return c
                        })
                    }
                });
                var ua = function(a, b) {
                        return Object.prototype.hasOwnProperty.call(a, b)
                    },
                    va = "function" == typeof Object.assign ? Object.assign : function(a, b) {
                        for (var c = 1; c < arguments.length; c++) {
                            var d = arguments[c];
                            if (d)
                                for (var e in d) ua(d, e) && (a[e] = d[e])
                        }
                        return a
                    };
                ka("Object.assign", function(a) {
                    return a || va
                });
                ka("WeakMap", function(a) {
                    function b() {}

                    function c(l) {
                        var m = typeof l;
                        return "object" === m && null !== l || "function" === m
                    }

                    function d(l) {
                        if (!ua(l, f)) {
                            var m = new b;
                            ha(l, f, {
                                value: m
                            })
                        }
                    }

                    function e(l) {
                        var m = Object[l];
                        m && (Object[l] = function(q) {
                            if (q instanceof b) return q;
                            Object.isExtensible(q) && d(q);
                            return m(q)
                        })
                    }
                    if (function() {
                            if (!a || !Object.seal) return !1;
                            try {
                                var l = Object.seal({}),
                                    m = Object.seal({}),
                                    q = new a([
                                        [l, 2],
                                        [m, 3]
                                    ]);
                                if (2 != q.get(l) || 3 != q.get(m)) return !1;
                                q.delete(l);
                                q.set(m, 4);
                                return !q.has(l) && 4 == q.get(m)
                            } catch (u) {
                                return !1
                            }
                        }()) return a;
                    var f = "$jscomp_hidden_" + Math.random();
                    e("freeze");
                    e("preventExtensions");
                    e("seal");
                    var g = 0,
                        k = function(l) {
                            this.j = (g += Math.random() + 1).toString();
                            if (l) {
                                l = _.ma(l);
                                for (var m; !(m = l.next()).done;) m = m.value, this.set(m[0], m[1])
                            }
                        };
                    k.prototype.set = function(l, m) {
                        if (!c(l)) throw Error("g");
                        d(l);
                        if (!ua(l, f)) throw Error("h`" + l);
                        l[f][this.j] = m;
                        return this
                    };
                    k.prototype.get = function(l) {
                        return c(l) && ua(l, f) ? l[f][this.j] : void 0
                    };
                    k.prototype.has = function(l) {
                        return c(l) && ua(l, f) && ua(l[f], this.j)
                    };
                    k.prototype.delete = function(l) {
                        return c(l) &&
                            ua(l, f) && ua(l[f], this.j) ? delete l[f][this.j] : !1
                    };
                    return k
                });
                ka("Array.from", function(a) {
                    return a ? a : function(b, c, d) {
                        c = null != c ? c : function(k) {
                            return k
                        };
                        var e = [],
                            f = "undefined" != typeof Symbol && Symbol.iterator && b[Symbol.iterator];
                        if ("function" == typeof f) {
                            b = f.call(b);
                            for (var g = 0; !(f = b.next()).done;) e.push(c.call(d, f.value, g++))
                        } else
                            for (f = b.length, g = 0; g < f; g++) e.push(c.call(d, b[g], g));
                        return e
                    }
                });
                ka("Map", function(a) {
                    if (function() {
                            if (!a || "function" != typeof a || !a.prototype.entries || "function" != typeof Object.seal) return !1;
                            try {
                                var k = Object.seal({
                                        x: 4
                                    }),
                                    l = new a(_.ma([
                                        [k, "s"]
                                    ]));
                                if ("s" != l.get(k) || 1 != l.size || l.get({
                                        x: 4
                                    }) || l.set({
                                        x: 4
                                    }, "t") != l || 2 != l.size) return !1;
                                var m = l.entries(),
                                    q = m.next();
                                if (q.done || q.value[0] != k || "s" != q.value[1]) return !1;
                                q = m.next();
                                return q.done || 4 != q.value[0].x || "t" != q.value[1] || !m.next().done ? !1 : !0
                            } catch (u) {
                                return !1
                            }
                        }()) return a;
                    var b = new WeakMap,
                        c = function(k) {
                            this.o = {};
                            this.j =
                                f();
                            this.size = 0;
                            if (k) {
                                k = _.ma(k);
                                for (var l; !(l = k.next()).done;) l = l.value, this.set(l[0], l[1])
                            }
                        };
                    c.prototype.set = function(k, l) {
                        k = 0 === k ? 0 : k;
                        var m = d(this, k);
                        m.list || (m.list = this.o[m.id] = []);
                        m.Wa ? m.Wa.value = l : (m.Wa = {
                            next: this.j,
                            $b: this.j.$b,
                            head: this.j,
                            key: k,
                            value: l
                        }, m.list.push(m.Wa), this.j.$b.next = m.Wa, this.j.$b = m.Wa, this.size++);
                        return this
                    };
                    c.prototype.delete = function(k) {
                        k = d(this, k);
                        return k.Wa && k.list ? (k.list.splice(k.index, 1), k.list.length || delete this.o[k.id], k.Wa.$b.next = k.Wa.next, k.Wa.next.$b =
                            k.Wa.$b, k.Wa.head = null, this.size--, !0) : !1
                    };
                    c.prototype.clear = function() {
                        this.o = {};
                        this.j = this.j.$b = f();
                        this.size = 0
                    };
                    c.prototype.has = function(k) {
                        return !!d(this, k).Wa
                    };
                    c.prototype.get = function(k) {
                        return (k = d(this, k).Wa) && k.value
                    };
                    c.prototype.entries = function() {
                        return e(this, function(k) {
                            return [k.key, k.value]
                        })
                    };
                    c.prototype.keys = function() {
                        return e(this, function(k) {
                            return k.key
                        })
                    };
                    c.prototype.values = function() {
                        return e(this, function(k) {
                            return k.value
                        })
                    };
                    c.prototype.forEach = function(k, l) {
                        for (var m = this.entries(),
                                q; !(q = m.next()).done;) q = q.value, k.call(l, q[1], q[0], this)
                    };
                    c.prototype[Symbol.iterator] = c.prototype.entries;
                    var d = function(k, l) {
                            var m = l && typeof l;
                            "object" == m || "function" == m ? b.has(l) ? m = b.get(l) : (m = "" + ++g, b.set(l, m)) : m = "p_" + l;
                            var q = k.o[m];
                            if (q && ua(k.o, m))
                                for (k = 0; k < q.length; k++) {
                                    var u = q[k];
                                    if (l !== l && u.key !== u.key || l === u.key) return {
                                        id: m,
                                        list: q,
                                        index: k,
                                        Wa: u
                                    }
                                }
                            return {
                                id: m,
                                list: q,
                                index: -1,
                                Wa: void 0
                            }
                        },
                        e = function(k, l) {
                            var m = k.j;
                            return la(function() {
                                if (m) {
                                    for (; m.head != k.j;) m = m.$b;
                                    for (; m.next != m.head;) return m =
                                        m.next, {
                                            done: !1,
                                            value: l(m)
                                        };
                                    m = null
                                }
                                return {
                                    done: !0,
                                    value: void 0
                                }
                            })
                        },
                        f = function() {
                            var k = {};
                            return k.$b = k.next = k.head = k
                        },
                        g = 0;
                    return c
                });
                ka("Set", function(a) {
                    if (function() {
                            if (!a || "function" != typeof a || !a.prototype.entries || "function" != typeof Object.seal) return !1;
                            try {
                                var c = Object.seal({
                                        x: 4
                                    }),
                                    d = new a(_.ma([c]));
                                if (!d.has(c) || 1 != d.size || d.add(c) != d || 1 != d.size || d.add({
                                        x: 4
                                    }) != d || 2 != d.size) return !1;
                                var e = d.entries(),
                                    f = e.next();
                                if (f.done || f.value[0] != c || f.value[1] != c) return !1;
                                f = e.next();
                                return f.done || f.value[0] == c || 4 != f.value[0].x || f.value[1] != f.value[0] ? !1 : e.next().done
                            } catch (g) {
                                return !1
                            }
                        }()) return a;
                    var b = function(c) {
                        this.j = new Map;
                        if (c) {
                            c =
                                _.ma(c);
                            for (var d; !(d = c.next()).done;) this.add(d.value)
                        }
                        this.size = this.j.size
                    };
                    b.prototype.add = function(c) {
                        c = 0 === c ? 0 : c;
                        this.j.set(c, c);
                        this.size = this.j.size;
                        return this
                    };
                    b.prototype.delete = function(c) {
                        c = this.j.delete(c);
                        this.size = this.j.size;
                        return c
                    };
                    b.prototype.clear = function() {
                        this.j.clear();
                        this.size = 0
                    };
                    b.prototype.has = function(c) {
                        return this.j.has(c)
                    };
                    b.prototype.entries = function() {
                        return this.j.entries()
                    };
                    b.prototype.values = function() {
                        return this.j.values()
                    };
                    b.prototype.keys = b.prototype.values;
                    b.prototype[Symbol.iterator] = b.prototype.values;
                    b.prototype.forEach = function(c, d) {
                        var e = this;
                        this.j.forEach(function(f) {
                            return c.call(d, f, f, e)
                        })
                    };
                    return b
                });
                ka("Object.entries", function(a) {
                    return a ? a : function(b) {
                        var c = [],
                            d;
                        for (d in b) ua(b, d) && c.push([d, b[d]]);
                        return c
                    }
                });
                ka("Object.is", function(a) {
                    return a ? a : function(b, c) {
                        return b === c ? 0 !== b || 1 / b === 1 / c : b !== b && c !== c
                    }
                });
                ka("Array.prototype.includes", function(a) {
                    return a ? a : function(b, c) {
                        var d = this;
                        d instanceof String && (d = String(d));
                        var e = d.length;
                        c = c || 0;
                        for (0 > c && (c = Math.max(c + e, 0)); c < e; c++) {
                            var f = d[c];
                            if (f === b || Object.is(f, b)) return !0
                        }
                        return !1
                    }
                });
                ka("String.prototype.includes", function(a) {
                    return a ? a : function(b, c) {
                        if (null == this) throw new TypeError("e`includes");
                        if (b instanceof RegExp) throw new TypeError("f`includes");
                        return -1 !== this.indexOf(b, c || 0)
                    }
                });
                ka("Array.prototype.fill", function(a) {
                    return a ? a : function(b, c, d) {
                        var e = this.length || 0;
                        0 > c && (c = Math.max(0, e + c));
                        if (null == d || d > e) d = e;
                        d = Number(d);
                        0 > d && (d = Math.max(0, e + d));
                        for (c = Number(c || 0); c < d; c++) this[c] = b;
                        return this
                    }
                });
                var wa = function(a) {
                    return a ? a : Array.prototype.fill
                };
                ka("Int8Array.prototype.fill", wa);
                ka("Uint8Array.prototype.fill", wa);
                ka("Uint8ClampedArray.prototype.fill", wa);
                ka("Int16Array.prototype.fill", wa);
                ka("Uint16Array.prototype.fill", wa);
                ka("Int32Array.prototype.fill", wa);
                ka("Uint32Array.prototype.fill", wa);
                ka("Float32Array.prototype.fill", wa);
                ka("Float64Array.prototype.fill", wa);
                _.ya = _.ya || {};
                _.t = this || self;
                _.za = function() {};
                _.Aa = function(a) {
                    a.Ye = void 0;
                    a.na = function() {
                        return a.Ye ? a.Ye : a.Ye = new a
                    }
                };
                _.Ba = function(a) {
                    var b = typeof a;
                    return "object" == b && null != a || "function" == b
                };
                _.Ca = "closure_uid_" + (1E9 * Math.random() >>> 0);
                Da = function(a, b, c) {
                    return a.call.apply(a.bind, arguments)
                };
                Ea = function(a, b, c) {
                    if (!a) throw Error();
                    if (2 < arguments.length) {
                        var d = Array.prototype.slice.call(arguments, 2);
                        return function() {
                            var e = Array.prototype.slice.call(arguments);
                            Array.prototype.unshift.apply(e, d);
                            return a.apply(b, e)
                        }
                    }
                    return function() {
                        return a.apply(b, arguments)
                    }
                };
                _.v = function(a, b, c) {
                    Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? _.v = Da : _.v = Ea;
                    return _.v.apply(null, arguments)
                };
                _.w = function(a, b) {
                    a = a.split(".");
                    var c = _.t;
                    a[0] in c || "undefined" == typeof c.execScript || c.execScript("var " + a[0]);
                    for (var d; a.length && (d = a.shift());) a.length || void 0 === b ? c[d] && c[d] !== Object.prototype[d] ? c = c[d] : c = c[d] = {} : c[d] = b
                };
                _.x = function(a, b) {
                    function c() {}
                    c.prototype = b.prototype;
                    a.T = b.prototype;
                    a.prototype = new c;
                    a.prototype.constructor = a;
                    a.kl = function(d, e, f) {
                        for (var g = Array(arguments.length - 2), k = 2; k < arguments.length; k++) g[k - 2] = arguments[k];
                        return b.prototype[e].apply(d, g)
                    }
                };
                Fa = function(a) {
                    return a
                };
                _.Ga = function(a) {
                    var b = null,
                        c = _.t.trustedTypes;
                    if (!c || !c.createPolicy) return b;
                    try {
                        b = c.createPolicy(a, {
                            createHTML: Fa,
                            createScript: Fa,
                            createScriptURL: Fa
                        })
                    } catch (d) {
                        _.t.console && _.t.console.error(d.message)
                    }
                    return b
                };
                _.x(_.aa, Error);
                _.aa.prototype.name = "CustomError";
                _.ba = Array.prototype.indexOf ? function(a, b) {
                    return Array.prototype.indexOf.call(a, b, void 0)
                } : function(a, b) {
                    if ("string" === typeof a) return "string" !== typeof b || 1 != b.length ? -1 : a.indexOf(b, 0);
                    for (var c = 0; c < a.length; c++)
                        if (c in a && a[c] === b) return c;
                    return -1
                };
                _.Ha = Array.prototype.forEach ? function(a, b, c) {
                    Array.prototype.forEach.call(a, b, c)
                } : function(a, b, c) {
                    for (var d = a.length, e = "string" === typeof a ? a.split("") : a, f = 0; f < d; f++) f in e && b.call(c, e[f], f, a)
                };
                _.Ia = Array.prototype.filter ? function(a, b, c) {
                    return Array.prototype.filter.call(a, b, c)
                } : function(a, b, c) {
                    for (var d = a.length, e = [], f = 0, g = "string" === typeof a ? a.split("") : a, k = 0; k < d; k++)
                        if (k in g) {
                            var l = g[k];
                            b.call(c, l, k, a) && (e[f++] = l)
                        } return e
                };
                _.Ja = Array.prototype.map ? function(a, b, c) {
                    return Array.prototype.map.call(a, b, c)
                } : function(a, b, c) {
                    for (var d = a.length, e = Array(d), f = "string" === typeof a ? a.split("") : a, g = 0; g < d; g++) g in f && (e[g] = b.call(c, f[g], g, a));
                    return e
                };
                _.Ka = Array.prototype.some ? function(a, b) {
                    return Array.prototype.some.call(a, b, void 0)
                } : function(a, b) {
                    for (var c = a.length, d = "string" === typeof a ? a.split("") : a, e = 0; e < c; e++)
                        if (e in d && b.call(void 0, d[e], e, a)) return !0;
                    return !1
                };
                var Ma;
                _.La = function(a, b, c) {
                    for (var d in a) b.call(c, a[d], d, a)
                };
                Ma = "constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" ");
                _.Na = function(a, b) {
                    for (var c, d, e = 1; e < arguments.length; e++) {
                        d = arguments[e];
                        for (c in d) a[c] = d[c];
                        for (var f = 0; f < Ma.length; f++) c = Ma[f], Object.prototype.hasOwnProperty.call(d, c) && (a[c] = d[c])
                    }
                };
                var Oa;
                _.Pa = function() {
                    void 0 === Oa && (Oa = _.Ga("ogb-qtm#html"));
                    return Oa
                };
                var Ra;
                _.Sa = function(a, b) {
                    this.j = a === _.Qa && b || "";
                    this.o = Ra
                };
                _.Sa.prototype.Sb = !0;
                _.Sa.prototype.Db = function() {
                    return this.j
                };
                _.Ta = function(a) {
                    return a instanceof _.Sa && a.constructor === _.Sa && a.o === Ra ? a.j : "type_error:Const"
                };
                Ra = {};
                _.Qa = {};
                var Ua;
                _.Va = function(a, b) {
                    this.j = b === Ua ? a : ""
                };
                _.h = _.Va.prototype;
                _.h.Sb = !0;
                _.h.Db = function() {
                    return this.j.toString()
                };
                _.h.We = !0;
                _.h.uc = function() {
                    return 1
                };
                _.h.toString = function() {
                    return this.j + ""
                };
                _.Xa = function(a) {
                    return _.Wa(a).toString()
                };
                _.Wa = function(a) {
                    return a instanceof _.Va && a.constructor === _.Va ? a.j : "type_error:TrustedResourceUrl"
                };
                Ua = {};
                _.Ya = function(a) {
                    var b = _.Pa();
                    a = b ? b.createScriptURL(a) : a;
                    return new _.Va(a, Ua)
                };
                _.Za = String.prototype.trim ? function(a) {
                    return a.trim()
                } : function(a) {
                    return /^[\s\xa0]*([\s\S]*?)[\s\xa0]*$/.exec(a)[1]
                };
                var cb, db, eb, $a;
                _.ab = function(a, b) {
                    this.j = b === $a ? a : ""
                };
                _.h = _.ab.prototype;
                _.h.Sb = !0;
                _.h.Db = function() {
                    return this.j.toString()
                };
                _.h.We = !0;
                _.h.uc = function() {
                    return 1
                };
                _.h.toString = function() {
                    return this.j.toString()
                };
                _.bb = function(a) {
                    return a instanceof _.ab && a.constructor === _.ab ? a.j : "type_error:SafeUrl"
                };
                cb = /^(?:audio\/(?:3gpp2|3gpp|aac|L16|midi|mp3|mp4|mpeg|oga|ogg|opus|x-m4a|x-matroska|x-wav|wav|webm)|font\/\w+|image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp|x-icon)|video\/(?:mpeg|mp4|ogg|webm|quicktime|x-matroska))(?:;\w+=(?:\w+|"[\w;,= ]+"))*$/i;
                db = /^data:(.*);base64,[a-z0-9+\/]+=*$/i;
                eb = /^(?:(?:https?|mailto|ftp):|[^:/?#]*(?:[/?#]|$))/i;
                _.gb = function(a) {
                    if (a instanceof _.ab) return a;
                    a = "object" == typeof a && a.Sb ? a.Db() : String(a);
                    if (eb.test(a)) a = _.fb(a);
                    else {
                        a = String(a);
                        a = a.replace(/(%0A|%0D)/g, "");
                        var b = a.match(db);
                        a = b && cb.test(b[1]) ? _.fb(a) : null
                    }
                    return a
                };
                _.hb = function(a) {
                    if (a instanceof _.ab) return a;
                    a = "object" == typeof a && a.Sb ? a.Db() : String(a);
                    eb.test(a) || (a = "about:invalid#zClosurez");
                    return _.fb(a)
                };
                $a = {};
                _.fb = function(a) {
                    return new _.ab(a, $a)
                };
                _.ib = _.fb("about:invalid#zClosurez");
                _.kb = function(a, b) {
                    this.j = b === _.jb ? a : ""
                };
                _.kb.prototype.Sb = !0;
                _.kb.prototype.Db = function() {
                    return this.j
                };
                _.kb.prototype.toString = function() {
                    return this.j.toString()
                };
                _.jb = {};
                _.lb = new _.kb("", _.jb);
                a: {
                    var nb = _.t.navigator;
                    if (nb) {
                        var ob = nb.userAgent;
                        if (ob) {
                            _.mb = ob;
                            break a
                        }
                    }
                    _.mb = ""
                }
                _.y = function(a) {
                    return -1 != _.mb.indexOf(a)
                };
                var rb;
                _.pb = function() {
                    return _.y("Trident") || _.y("MSIE")
                };
                _.qb = function() {
                    return _.y("Firefox") || _.y("FxiOS")
                };
                _.sb = function() {
                    return _.y("Safari") && !(rb() || _.y("Coast") || _.y("Opera") || _.y("Edge") || _.y("Edg/") || _.y("OPR") || _.qb() || _.y("Silk") || _.y("Android"))
                };
                rb = function() {
                    return (_.y("Chrome") || _.y("CriOS")) && !_.y("Edge")
                };
                _.tb = function() {
                    return _.y("Android") && !(rb() || _.qb() || _.y("Opera") || _.y("Silk"))
                };
                var ub;
                _.vb = function(a, b, c) {
                    this.j = c === ub ? a : "";
                    this.o = b
                };
                _.h = _.vb.prototype;
                _.h.We = !0;
                _.h.uc = function() {
                    return this.o
                };
                _.h.Sb = !0;
                _.h.Db = function() {
                    return this.j.toString()
                };
                _.h.toString = function() {
                    return this.j.toString()
                };
                _.wb = function(a) {
                    return a instanceof _.vb && a.constructor === _.vb ? a.j : "type_error:SafeHtml"
                };
                ub = {};
                _.xb = function(a, b) {
                    var c = _.Pa();
                    a = c ? c.createHTML(a) : a;
                    return new _.vb(a, b, ub)
                };
                _.yb = new _.vb(_.t.trustedTypes && _.t.trustedTypes.emptyHTML || "", 0, ub);
                _.zb = _.xb("<br>", 0);
                _.Ab = function(a) {
                    var b = !1,
                        c;
                    return function() {
                        b || (c = a(), b = !0);
                        return c
                    }
                }(function() {
                    var a = document.createElement("div"),
                        b = document.createElement("div");
                    b.appendChild(document.createElement("div"));
                    a.appendChild(b);
                    b = a.firstChild.firstChild;
                    a.innerHTML = _.wb(_.yb);
                    return !b.parentElement
                });
                var Bb;
                Bb = function() {
                    return _.y("iPhone") && !_.y("iPod") && !_.y("iPad")
                };
                _.Cb = function() {
                    return Bb() || _.y("iPad") || _.y("iPod")
                };
                _.Db = function() {
                    return -1 != _.mb.toLowerCase().indexOf("webkit") && !_.y("Edge")
                };
                _.Eb = function(a) {
                    _.Eb[" "](a);
                    return a
                };
                _.Eb[" "] = _.za;
                var Sb, Tb, Yb;
                _.Fb = _.y("Opera");
                _.z = _.pb();
                _.Gb = _.y("Edge");
                _.Hb = _.Gb || _.z;
                _.Ib = _.y("Gecko") && !_.Db() && !(_.y("Trident") || _.y("MSIE")) && !_.y("Edge");
                _.Jb = _.Db();
                _.Kb = _.y("Macintosh");
                _.Lb = _.y("Windows");
                _.Mb = _.y("Linux") || _.y("CrOS");
                _.Nb = _.y("Android");
                _.Ob = Bb();
                _.Pb = _.y("iPad");
                _.Qb = _.y("iPod");
                _.Rb = _.Cb();
                Sb = function() {
                    var a = _.t.document;
                    return a ? a.documentMode : void 0
                };
                a: {
                    var Ub = "",
                        Vb = function() {
                            var a = _.mb;
                            if (_.Ib) return /rv:([^\);]+)(\)|;)/.exec(a);
                            if (_.Gb) return /Edge\/([\d\.]+)/.exec(a);
                            if (_.z) return /\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);
                            if (_.Jb) return /WebKit\/(\S+)/.exec(a);
                            if (_.Fb) return /(?:Version)[ \/]?(\S+)/.exec(a)
                        }();Vb && (Ub = Vb ? Vb[1] : "");
                    if (_.z) {
                        var Wb = Sb();
                        if (null != Wb && Wb > parseFloat(Ub)) {
                            Tb = String(Wb);
                            break a
                        }
                    }
                    Tb = Ub
                }
                _.Xb = Tb;
                if (_.t.document && _.z) {
                    var Zb = Sb();
                    Yb = Zb ? Zb : parseInt(_.Xb, 10) || void 0
                } else Yb = void 0;
                _.$b = Yb;
                _.ac = _.qb();
                _.bc = Bb() || _.y("iPod");
                _.cc = _.y("iPad");
                _.dc = _.tb();
                _.ec = rb();
                _.fc = _.sb() && !_.Cb();
                var gc;
                gc = {};
                _.hc = null;
                _.ic = function() {
                    if (!_.hc) {
                        _.hc = {};
                        for (var a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789".split(""), b = ["+/=", "+/", "-_=", "-_.", "-_"], c = 0; 5 > c; c++) {
                            var d = a.concat(b[c].split(""));
                            gc[c] = d;
                            for (var e = 0; e < d.length; e++) {
                                var f = d[e];
                                void 0 === _.hc[f] && (_.hc[f] = e)
                            }
                        }
                    }
                };
                _.jc = function(a) {
                    this.o = 0;
                    this.j = a
                };
                _.jc.prototype.next = function() {
                    return this.o < this.j.length ? {
                        done: !1,
                        value: this.j[this.o++]
                    } : {
                        done: !0,
                        value: void 0
                    }
                };
                "undefined" != typeof Symbol && "undefined" != typeof Symbol.iterator && (_.jc.prototype[Symbol.iterator] = function() {
                    return this
                });
                _.A = function() {};
                _.kc = "function" == typeof Uint8Array;
                _.B = function(a, b, c, d, e, f) {
                    a.j = null;
                    b || (b = c ? [c] : []);
                    a.K = c ? String(c) : void 0;
                    a.C = 0 === c ? -1 : 0;
                    a.A = b;
                    a: {
                        c = a.A.length;b = -1;
                        if (c && (b = c - 1, c = a.A[b], !(null === c || "object" != typeof c || Array.isArray(c) || _.kc && c instanceof Uint8Array))) {
                            a.D = b - a.C;
                            a.B = c;
                            break a
                        } - 1 < d ? (a.D = Math.max(d, b + 1 - a.C), a.B = null) : a.D = Number.MAX_VALUE
                    }
                    a.J = {};
                    if (e)
                        for (d = 0; d < e.length; d++) b = e[d], b < a.D ? (b += a.C, a.A[b] = a.A[b] || _.lc) : (_.mc(a), a.B[b] = a.B[b] || _.lc);
                    if (f && f.length)
                        for (d = 0; d < f.length; d++) _.nc(a, f[d])
                };
                _.lc = [];
                _.mc = function(a) {
                    var b = a.D + a.C;
                    a.A[b] || (a.B = a.A[b] = {})
                };
                _.E = function(a, b) {
                    if (b < a.D) {
                        b += a.C;
                        var c = a.A[b];
                        return c !== _.lc ? c : a.A[b] = []
                    }
                    if (a.B) return c = a.B[b], c === _.lc ? a.B[b] = [] : c
                };
                _.oc = function(a, b) {
                    return null != _.E(a, b)
                };
                _.F = function(a, b) {
                    a = _.E(a, b);
                    return null == a ? a : !!a
                };
                _.pc = function(a, b, c) {
                    a = _.E(a, b);
                    return null == a ? c : a
                };
                _.qc = function(a, b, c) {
                    return _.pc(a, b, void 0 === c ? 0 : c)
                };
                _.rc = function(a, b, c) {
                    c = void 0 === c ? !1 : c;
                    a = _.F(a, b);
                    return null == a ? c : a
                };
                _.sc = function(a, b, c) {
                    c = void 0 === c ? 0 : c;
                    a = _.E(a, b);
                    a = null == a ? a : +a;
                    return null == a ? c : a
                };
                _.H = function(a, b, c) {
                    b < a.D ? a.A[b + a.C] = c : (_.mc(a), a.B[b] = c);
                    return a
                };
                _.nc = function(a, b) {
                    for (var c, d, e = 0; e < b.length; e++) {
                        var f = b[e],
                            g = _.E(a, f);
                        null != g && (c = f, d = g, _.H(a, f, void 0))
                    }
                    return c ? (_.H(a, c, d), c) : 0
                };
                _.I = function(a, b, c) {
                    a.j || (a.j = {});
                    if (!a.j[c]) {
                        var d = _.E(a, c);
                        d && (a.j[c] = new b(d))
                    }
                    return a.j[c]
                };
                _.J = function(a, b, c) {
                    a.j || (a.j = {});
                    var d = c ? c.tb() : c;
                    a.j[b] = c;
                    return _.H(a, b, d)
                };
                _.A.prototype.tb = function() {
                    if (this.j)
                        for (var a in this.j) {
                            var b = this.j[a];
                            if (Array.isArray(b))
                                for (var c = 0; c < b.length; c++) b[c] && b[c].tb();
                            else b && b.tb()
                        }
                    return this.A
                };
                _.A.prototype.o = _.kc ? function() {
                    var a = Uint8Array.prototype.toJSON;
                    Uint8Array.prototype.toJSON = function() {
                        var b;
                        void 0 === b && (b = 0);
                        _.ic();
                        b = gc[b];
                        for (var c = [], d = 0; d < this.length; d += 3) {
                            var e = this[d],
                                f = d + 1 < this.length,
                                g = f ? this[d + 1] : 0,
                                k = d + 2 < this.length,
                                l = k ? this[d + 2] : 0,
                                m = e >> 2;
                            e = (e & 3) << 4 | g >> 4;
                            g = (g & 15) << 2 | l >> 6;
                            l &= 63;
                            k || (l = 64, f || (g = 64));
                            c.push(b[m], b[e], b[g] || "", b[l] || "")
                        }
                        return c.join("")
                    };
                    try {
                        return JSON.stringify(this.A && this.tb(), tc)
                    } finally {
                        Uint8Array.prototype.toJSON = a
                    }
                } : function() {
                    return JSON.stringify(this.A &&
                        this.tb(), tc)
                };
                var tc = function(a, b) {
                    return "number" !== typeof b || !isNaN(b) && Infinity !== b && -Infinity !== b ? b : String(b)
                };
                _.A.prototype.toString = function() {
                    return this.tb().toString()
                };
                _.K = function() {
                    this.Rb = this.Rb;
                    this.$a = this.$a
                };
                _.K.prototype.Rb = !1;
                _.K.prototype.isDisposed = function() {
                    return this.Rb
                };
                _.K.prototype.ta = function() {
                    this.Rb || (this.Rb = !0, this.R())
                };
                _.K.prototype.R = function() {
                    if (this.$a)
                        for (; this.$a.length;) this.$a.shift()()
                };
                var uc = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(uc, _.A);
                _.vc = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(_.vc, _.A);
                _.vc.prototype.Yc = function(a) {
                    return _.H(this, 3, a)
                };
                _.wc = function() {
                    this.j = {};
                    this.o = {}
                };
                _.yc = function(a, b) {
                    var c = _.wc.na();
                    if (a in c.j) {
                        if (c.j[a] != b) throw new xc(a);
                    } else {
                        c.j[a] = b;
                        if (b = c.o[a])
                            for (var d = 0, e = b.length; d < e; d++) b[d].j(c.j, a);
                        delete c.o[a]
                    }
                };
                _.Ac = function(a, b) {
                    if (b in a.j) return a.j[b];
                    throw new zc(b);
                };
                _.Aa(_.wc);
                var Bc = function() {
                    _.aa.call(this)
                };
                _.r(Bc, _.aa);
                var xc = function() {
                    _.aa.call(this)
                };
                _.r(xc, Bc);
                var zc = function() {
                    _.aa.call(this)
                };
                _.r(zc, Bc);
                _.Cc = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(_.Cc, _.A);
                var Dc = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(Dc, _.A);
                _.Ec = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(_.Ec, _.A);
                _.Ec.prototype.zf = function(a) {
                    return _.H(this, 24, a)
                };
                var Fc = function(a) {
                    _.K.call(this);
                    this.A = a;
                    this.j = [];
                    this.o = {}
                };
                _.r(Fc, _.K);
                Fc.prototype.resolve = function(a) {
                    var b = this.A;
                    a = a.split(".");
                    for (var c = a.length, d = 0; d < c; ++d)
                        if (b[a[d]]) b = b[a[d]];
                        else return null;
                    return b instanceof Function ? b : null
                };
                Fc.prototype.xd = function() {
                    for (var a = this.j.length, b = this.j, c = [], d = 0; d < a; ++d) {
                        var e = b[d].j(),
                            f = this.resolve(e);
                        if (f && f != this.o[e]) try {
                            b[d].xd(f)
                        } catch (g) {} else c.push(b[d])
                    }
                    this.j = c.concat(b.slice(a))
                };
                var Gc = function(a) {
                    _.K.call(this);
                    this.A = a;
                    this.C = this.j = null;
                    this.B = 0;
                    this.D = {};
                    this.o = !1;
                    a = window.navigator.userAgent;
                    0 <= a.indexOf("MSIE") && 0 <= a.indexOf("Trident") && (a = /\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a)) && a[1] && 9 > parseFloat(a[1]) && (this.o = !0)
                };
                _.r(Gc, _.K);
                Gc.prototype.F = function(a, b) {
                    this.j = b;
                    this.C = a;
                    b.preventDefault ? b.preventDefault() : b.returnValue = !1
                };
                _.Hc = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(_.Hc, _.A);
                _.Ic = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(_.Ic, _.A);
                var Jc, Mc, Lc;
                _.Kc = function(a) {
                    var b = window.google && window.google.logUrl ? "" : "https://www.google.com";
                    b += "/gen_204?";
                    b += a.j(2040 - b.length);
                    Jc(_.gb(b) || _.ib)
                };
                Jc = function(a) {
                    var b = new Image,
                        c = Lc;
                    b.onerror = b.onload = b.onabort = function() {
                        c in Mc && delete Mc[c]
                    };
                    Mc[Lc++] = b;
                    b.src = _.bb(a)
                };
                Mc = [];
                Lc = 0;
                _.Pc = function() {
                    this.data = {}
                };
                _.Pc.prototype.o = function() {
                    window.console && window.console.log && window.console.log("Log data: ", this.data)
                };
                _.Pc.prototype.j = function(a) {
                    var b = [],
                        c;
                    for (c in this.data) b.push(encodeURIComponent(c) + "=" + encodeURIComponent(String(this.data[c])));
                    return ("atyp=i&zx=" + (new Date).getTime() + "&" + b.join("&")).substr(0, a)
                };
                var Qc = function(a, b) {
                    this.data = {};
                    var c = _.I(a, Dc, 8) || new Dc;
                    window.google && window.google.kEI && (this.data.ei = window.google.kEI);
                    this.data.sei = _.p(_.E(a, 10));
                    this.data.ogf = _.p(_.E(c, 3));
                    var d = window.google && window.google.sn ? /.*hp$/.test(window.google.sn) ? !1 : !0 : _.n(_.F(a, 7));
                    this.data.ogrp = d ? "1" : "";
                    this.data.ogv = _.p(_.E(c, 6)) + "." + _.p(_.E(c, 7));
                    this.data.ogd = _.p(_.E(a, 21));
                    this.data.ogc = _.p(_.E(a, 20));
                    this.data.ogl = _.p(_.E(a, 5));
                    b && (this.data.oggv = b)
                };
                _.r(Qc, _.Pc);
                var Rc = [1, 2, 3, 4, 5, 6, 9, 10, 11, 13, 14, 28, 29, 30, 34, 35, 37, 38, 39, 40, 42, 43, 48, 49, 50, 51, 52, 53, 62, 500],
                    Uc = function(a, b, c, d, e, f) {
                        Qc.call(this, a, b);
                        _.Na(this.data, {
                            oge: d,
                            ogex: _.p(_.E(a, 9)),
                            ogp: _.p(_.E(a, 6)),
                            ogsr: Math.round(1 / (Sc(d) ? _.da(_.sc(c, 3, 1)) : _.da(_.sc(c, 2, 1E-4)))),
                            ogus: e
                        });
                        if (f) {
                            "ogw" in f && (this.data.ogw = f.ogw, delete f.ogw);
                            "ved" in f && (this.data.ved = f.ved, delete f.ved);
                            a = [];
                            for (var g in f) 0 != a.length && a.push(","), a.push(Tc(g)), a.push("."), a.push(Tc(f[g]));
                            f = a.join("");
                            "" != f && (this.data.ogad = f)
                        }
                    };
                _.r(Uc, Qc);
                var Tc = function(a) {
                        a = String(a);
                        return a.replace(".", "%2E").replace(",", "%2C")
                    },
                    Sc = function(a) {
                        if (!Vc) {
                            Vc = {};
                            for (var b = 0; b < Rc.length; b++) Vc[Rc[b]] = !0
                        }
                        return !!Vc[a]
                    },
                    Vc = null;
                var Wc = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(Wc, _.A);
                var $c = function() {
                    var a = Xc,
                        b = Yc,
                        c = Zc;
                    this.o = a;
                    this.j = b;
                    this.B = _.da(_.sc(a, 2, 1E-4), 1E-4);
                    this.D = _.da(_.sc(a, 3, 1), 1);
                    b = Math.random();
                    this.A = _.n(_.F(a, 1)) && b < this.B;
                    this.C = _.n(_.F(a, 1)) && b < this.D;
                    a = 0;
                    _.n(_.F(c, 1)) && (a |= 1);
                    _.n(_.F(c, 2)) && (a |= 2);
                    _.n(_.F(c, 3)) && (a |= 4);
                    this.F = a
                };
                $c.prototype.log = function(a, b) {
                    try {
                        if (Sc(a) ? this.C : this.A) {
                            var c = new Uc(this.j, "quantum:gapiBuildLabel", this.o, a, this.F, b);
                            _.Kc(c)
                        }
                    } catch (d) {}
                };
                _.ad = function(a, b, c, d, e) {
                    Qc.call(this, a, b);
                    _.Na(this.data, {
                        jexpid: _.p(_.E(a, 9)),
                        srcpg: "prop=" + _.p(_.E(a, 6)),
                        jsr: Math.round(1 / d),
                        emsg: c.name + ":" + c.message
                    });
                    if (e) {
                        e._sn && (e._sn = "og." + e._sn);
                        for (var f in e) this.data[encodeURIComponent(f)] = e[f]
                    }
                };
                _.r(_.ad, Qc);
                _.bd = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(_.bd, _.A);
                var ed = function() {
                    var a = cd;
                    this.C = dd;
                    this.o = _.da(_.sc(a, 2, .001), .001);
                    this.D = _.n(_.F(a, 1)) && Math.random() < this.o;
                    this.F = _.da(_.qc(a, 3, 1), 1);
                    this.B = 0;
                    this.j = this.A = null;
                    _.rc(a, 4, !0)
                };
                ed.prototype.log = function(a, b) {
                    if (this.j) {
                        var c = new uc;
                        _.H(c, 1, a.message);
                        _.H(c, 2, a.stack);
                        _.H(c, 3, a.lineNumber);
                        _.H(c, 5, 1);
                        var d = new _.vc;
                        _.J(d, 40, c);
                        this.j.log(98, d)
                    }
                    try {
                        if (this.D && this.B < this.F) {
                            try {
                                var e = (this.A || _.Ac(_.wc.na(), "lm")).B(a, b)
                            } catch (f) {
                                e = new _.ad(this.C, "quantum:gapiBuildLabel", a, this.o, b)
                            }
                            _.Kc(e);
                            this.B++
                        }
                    } catch (f) {}
                };
                _.fd = function(a) {
                    this.j = a;
                    this.o = void 0;
                    this.A = []
                };
                _.fd.prototype.then = function(a, b, c) {
                    this.A.push(new gd(a, b, c));
                    _.hd(this)
                };
                _.fd.prototype.resolve = function(a) {
                    if (void 0 !== this.j || void 0 !== this.o) throw Error("p");
                    this.j = a;
                    _.hd(this)
                };
                _.hd = function(a) {
                    if (0 < a.A.length) {
                        var b = void 0 !== a.j,
                            c = void 0 !== a.o;
                        if (b || c) {
                            b = b ? a.B : a.C;
                            c = a.A;
                            a.A = [];
                            try {
                                _.Ha(c, b, a)
                            } catch (d) {
                                console.error(d)
                            }
                        }
                    }
                };
                _.fd.prototype.B = function(a) {
                    a.o && a.o.call(a.j, this.j)
                };
                _.fd.prototype.C = function(a) {
                    a.A && a.A.call(a.j, this.o)
                };
                var gd = function(a, b, c) {
                    this.o = a;
                    this.A = b;
                    this.j = c
                };
                _.L = function() {
                    this.B = new _.fd;
                    this.j = new _.fd;
                    this.G = new _.fd;
                    this.D = new _.fd;
                    this.F = new _.fd;
                    this.J = new _.fd;
                    this.C = new _.fd;
                    this.A = new _.fd;
                    this.o = new _.fd;
                    this.K = new _.fd
                };
                _.h = _.L.prototype;
                _.h.vi = function() {
                    return this.B
                };
                _.h.Di = function() {
                    return this.j
                };
                _.h.Ki = function() {
                    return this.G
                };
                _.h.Ci = function() {
                    return this.D
                };
                _.h.Ii = function() {
                    return this.F
                };
                _.h.zi = function() {
                    return this.J
                };
                _.h.Ai = function() {
                    return this.C
                };
                _.h.ni = function() {
                    return this.A
                };
                _.h.mi = function() {
                    return this.o
                };
                _.Aa(_.L);
                var id = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(id, _.A);
                _.kd = function() {
                    return _.I(_.jd, _.Ec, 1)
                };
                _.ld = function() {
                    return _.I(_.jd, _.Cc, 5)
                };
                var md;
                window.gbar_ && window.gbar_.CONFIG ? md = window.gbar_.CONFIG[0] || {} : md = [];
                _.jd = new id(md);
                var cd, dd, Yc, Zc, Xc;
                cd = _.I(_.jd, _.bd, 3) || new _.bd;
                dd = _.kd() || new _.Ec;
                _.nd = new ed;
                Yc = _.kd() || new _.Ec;
                Zc = _.ld() || new _.Cc;
                Xc = _.I(_.jd, Wc, 4) || new Wc;
                _.od = new $c;
                _.w("gbar_._DumpException", function(a) {
                    _.nd ? _.nd.log(a) : console.error(a)
                });
                _.pd = new Gc(_.nd);
                _.od.log(8, {
                    m: "BackCompat" == document.compatMode ? "q" : "s"
                });
                _.w("gbar.A", _.fd);
                _.fd.prototype.aa = _.fd.prototype.then;
                _.w("gbar.B", _.L);
                _.L.prototype.ba = _.L.prototype.Di;
                _.L.prototype.bb = _.L.prototype.Ki;
                _.L.prototype.bd = _.L.prototype.Ii;
                _.L.prototype.bf = _.L.prototype.vi;
                _.L.prototype.bg = _.L.prototype.Ci;
                _.L.prototype.bh = _.L.prototype.zi;
                _.L.prototype.bi = _.L.prototype.Ai;
                _.L.prototype.bj = _.L.prototype.ni;
                _.L.prototype.bk = _.L.prototype.mi;
                _.w("gbar.a", _.L.na());
                var qd = new Fc(window);
                _.yc("api", qd);
                var rd = _.ld() || new _.Cc,
                    sd = _.p(_.E(rd, 8));
                window.__PVT = sd;
                _.yc("eq", _.pd);

            } catch (e) {
                _._DumpException(e)
            }
            try {
                var td = function(a) {
                    (0, _.B)(this, a, 0, -1, null, null)
                };
                _.x(td, _.A);
                var ud = function() {
                    _.K.call(this);
                    this.o = [];
                    this.j = []
                };
                _.r(ud, _.K);
                ud.prototype.A = function(a, b) {
                    this.o.push({
                        features: a,
                        options: b
                    })
                };
                ud.prototype.init = function(a, b, c) {
                    window.gapi = {};
                    var d = window.___jsl = {};
                    d.h = _.p(_.E(a, 1));
                    _.oc(a, 12) && (d.dpo = _.n(_.F(a, 12)));
                    d.ms = _.p(_.E(a, 2));
                    d.m = _.p(_.E(a, 3));
                    d.l = [];
                    _.E(b, 1) && (a = _.E(b, 3)) && this.j.push(a);
                    _.E(c, 1) && (c = _.E(c, 2)) && this.j.push(c);
                    _.w("gapi.load", (0, _.v)(this.A, this));
                    return this
                };
                var vd = _.I(_.jd, _.Hc, 14) || new _.Hc,
                    wd = _.I(_.jd, _.Ic, 9) || new _.Ic,
                    xd = new td,
                    yd = new ud;
                yd.init(vd, wd, xd);
                _.yc("gs", yd);

            } catch (e) {
                _._DumpException(e)
            }
        })(this.gbar_);
        // Google Inc.
    </script>
    <style>
        h1,
        ol,
        ul,
        li,
        button {
            margin: 0;
            padding: 0
        }

        button {
            border: none;
            background: none
        }

        body {
            background: #fff
        }

        body,
        input,
        button {
            font-size: 14px;
            font-family: arial, sans-serif;
            color: #222
        }

        a {
            color: #1a0dab;
            text-decoration: none
        }

        a:hover,
        a:active {
            text-decoration: underline
        }

        a:visited {
            color: #609
        }

        html,
        body {
            min-width: 400px
        }

        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0
        }

        .gb_Wa:not(.gb_Fd) {
            font: 13px/27px Roboto, RobotoDraft, Arial, sans-serif;
            z-index: 986
        }

        @-webkit-keyframes gb__a {
            0% {
                opacity: 0
            }

            50% {
                opacity: 1
            }
        }

        @keyframes gb__a {
            0% {
                opacity: 0
            }

            50% {
                opacity: 1
            }
        }

        a.gb_0 {
            border: none;
            color: #4285f4;
            cursor: default;
            font-weight: bold;
            outline: none;
            position: relative;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            white-space: nowrap;
            -webkit-user-select: none
        }

        a.gb_0:hover:after,
        a.gb_0:focus:after {
            background-color: rgba(0, 0, 0, .12);
            content: '';
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%
        }

        a.gb_0:hover,
        a.gb_0:focus {
            text-decoration: none
        }

        a.gb_0:active {
            background-color: rgba(153, 153, 153, .4);
            text-decoration: none
        }

        a.gb_1 {
            background-color: #4285f4;
            color: #fff
        }

        a.gb_1:active {
            background-color: #0043b2
        }

        .gb_2 {
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .16);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .16)
        }

        .gb_0,
        .gb_1,
        .gb_3,
        .gb_4 {
            display: inline-block;
            line-height: 28px;
            padding: 0 12px;
            -webkit-border-radius: 2px;
            border-radius: 2px
        }

        .gb_3 {
            background: #f8f8f8;
            border: 1px solid #c6c6c6
        }

        .gb_4 {
            background: #f8f8f8
        }

        .gb_3,
        #gb a.gb_3.gb_3,
        .gb_4 {
            color: #666;
            cursor: default;
            text-decoration: none
        }

        #gb a.gb_4.gb_4 {
            cursor: default;
            text-decoration: none
        }

        .gb_4 {
            border: 1px solid #4285f4;
            font-weight: bold;
            outline: none;
            background: #4285f4;
            background: -webkit-linear-gradient(top, #4387fd, #4683ea);
            background: linear-gradient(top, #4387fd, #4683ea);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#4387fd, endColorstr=#4683ea, GradientType=0)
        }

        #gb a.gb_4.gb_4 {
            color: #fff
        }

        .gb_4:hover {
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 1px 0 rgba(0, 0, 0, .15)
        }

        .gb_4:active {
            -webkit-box-shadow: inset 0 2px 0 rgba(0, 0, 0, .15);
            box-shadow: inset 0 2px 0 rgba(0, 0, 0, .15);
            background: #3c78dc;
            background: -webkit-linear-gradient(top, #3c7ae4, #3f76d3);
            background: linear-gradient(top, #3c7ae4, #3f76d3);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#3c7ae4, endColorstr=#3f76d3, GradientType=0)
        }

        .gb_Ba {
            display: none !important
        }

        .gb_Ca {
            visibility: hidden
        }

        .gb_cd {
            display: inline-block;
            vertical-align: middle
        }

        .gb_Bf {
            position: relative
        }

        .gb_D {
            display: inline-block;
            outline: none;
            vertical-align: middle;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 40px;
            width: 40px;
            color: #000;
            cursor: pointer;
            text-decoration: none
        }

        #gb#gb a.gb_D {
            color: #000;
            cursor: pointer;
            text-decoration: none
        }

        .gb_Za {
            border-color: transparent;
            border-bottom-color: #fff;
            border-style: dashed dashed solid;
            border-width: 0 8.5px 8.5px;
            display: none;
            position: absolute;
            left: 11.5px;
            top: 43px;
            z-index: 1;
            height: 0;
            width: 0;
            -webkit-animation: gb__a .2s;
            animation: gb__a .2s
        }

        .gb_0a {
            border-color: transparent;
            border-style: dashed dashed solid;
            border-width: 0 8.5px 8.5px;
            display: none;
            position: absolute;
            left: 11.5px;
            z-index: 1;
            height: 0;
            width: 0;
            -webkit-animation: gb__a .2s;
            animation: gb__a .2s;
            border-bottom-color: #ccc;
            border-bottom-color: rgba(0, 0, 0, .2);
            top: 42px
        }

        x:-o-prefocus,
        div.gb_0a {
            border-bottom-color: #ccc
        }

        .gb_F {
            background: #fff;
            border: 1px solid #ccc;
            border-color: rgba(0, 0, 0, .2);
            color: #000;
            -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
            display: none;
            outline: none;
            overflow: hidden;
            position: absolute;
            right: 8px;
            top: 62px;
            -webkit-animation: gb__a .2s;
            animation: gb__a .2s;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -webkit-user-select: text
        }

        .gb_cd.gb_ma .gb_Za,
        .gb_cd.gb_ma .gb_0a,
        .gb_cd.gb_ma .gb_F,
        .gb_ma.gb_F {
            display: block
        }

        .gb_cd.gb_ma.gb_Cf .gb_Za,
        .gb_cd.gb_ma.gb_Cf .gb_0a {
            display: none
        }

        .gb_Df {
            position: absolute;
            right: 8px;
            top: 62px;
            z-index: -1
        }

        .gb_Ka .gb_Za,
        .gb_Ka .gb_0a,
        .gb_Ka .gb_F {
            margin-top: -10px
        }

        .gb_cd:first-child,
        #gbsfw:first-child+.gb_cd {
            padding-left: 4px
        }

        .gb_qa.gb_Te .gb_cd:first-child {
            padding-left: 0
        }

        .gb_Ue {
            position: relative
        }

        .gb_Nc .gb_Ue,
        .gb_0d .gb_Ue {
            float: right
        }

        .gb_D {
            padding: 8px;
            cursor: pointer
        }

        .gb_qa .gb_4c:not(.gb_0):focus img {
            background-color: rgba(0, 0, 0, 0.20);
            outline: none;
            -webkit-border-radius: 50%;
            border-radius: 50%
        }

        .gb_Ve button:focus svg,
        .gb_Ve button:hover svg,
        .gb_Ve button:active svg,
        .gb_D:focus,
        .gb_D:hover,
        .gb_D:active,
        .gb_D[aria-expanded=true] {
            outline: none;
            -webkit-border-radius: 50%;
            border-radius: 50%
        }

        .gb_wc .gb_Ve.gb_We button:focus svg,
        .gb_wc .gb_Ve.gb_We button:focus:hover svg,
        .gb_Ve button:focus svg,
        .gb_Ve button:focus:hover svg,
        .gb_D:focus,
        .gb_D:focus:hover {
            background-color: rgba(60, 64, 67, 0.1)
        }

        .gb_wc .gb_Ve.gb_We button:active svg,
        .gb_Ve button:active svg,
        .gb_D:active {
            background-color: rgba(60, 64, 67, 0.12)
        }

        .gb_wc .gb_Ve.gb_We button:hover svg,
        .gb_Ve button:hover svg,
        .gb_D:hover {
            background-color: rgba(60, 64, 67, 0.08)
        }

        .gb_ja .gb_D.gb_Na:hover {
            background-color: transparent
        }

        .gb_D[aria-expanded=true],
        .gb_D:hover[aria-expanded=true] {
            background-color: rgba(95, 99, 104, 0.24)
        }

        .gb_D[aria-expanded=true] .gb_Xe,
        .gb_D[aria-expanded=true] .gb_Ze {
            fill: #5f6368;
            opacity: 1
        }

        .gb_wc .gb_Ve button:hover svg,
        .gb_wc .gb_D:hover {
            background-color: rgba(232, 234, 237, 0.08)
        }

        .gb_wc .gb_Ve button:focus svg,
        .gb_wc .gb_Ve button:focus:hover svg,
        .gb_wc .gb_D:focus,
        .gb_wc .gb_D:focus:hover {
            background-color: rgba(232, 234, 237, 0.10)
        }

        .gb_wc .gb_Ve button:active svg,
        .gb_wc .gb_D:active {
            background-color: rgba(232, 234, 237, 0.12)
        }

        .gb_wc .gb_D[aria-expanded=true],
        .gb_wc .gb_D:hover[aria-expanded=true] {
            background-color: rgba(255, 255, 255, 0.12)
        }

        .gb_wc .gb_D[aria-expanded=true] .gb_Xe,
        .gb_wc .gb_D[aria-expanded=true] .gb_Ze {
            fill: #ffffff;
            opacity: 1
        }

        .gb_cd {
            padding: 4px
        }

        .gb_qa.gb_Te .gb_cd {
            padding: 4px 2px
        }

        .gb_qa.gb_Te .gb_Oa.gb_cd {
            padding-left: 6px
        }

        .gb_F {
            z-index: 991;
            line-height: normal
        }

        .gb_F.gb_0e {
            left: 8px;
            right: auto
        }

        @media (max-width:350px) {
            .gb_F.gb_0e {
                left: 0
            }
        }

        .gb_1e .gb_F {
            top: 56px
        }

        .gb_C .gb_D,
        .gb_E .gb_C .gb_D {
            background-position: -64px -29px
        }

        .gb_j .gb_C .gb_D {
            background-position: -29px -29px;
            opacity: 1
        }

        .gb_C .gb_D,
        .gb_C .gb_D:hover,
        .gb_C .gb_D:focus {
            opacity: 1
        }

        .gb_Hd {
            display: none
        }

        .gb_Vc {
            font-family: Google Sans, Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
            font-size: 20px;
            font-weight: 400;
            letter-spacing: .25px;
            line-height: 48px;
            margin-bottom: 2px;
            opacity: 1;
            overflow: hidden;
            padding-left: 16px;
            position: relative;
            text-overflow: ellipsis;
            vertical-align: middle;
            top: 2px;
            white-space: nowrap;
            -webkit-flex: 1 1 auto;
            flex: 1 1 auto
        }

        .gb_Vc.gb_Wc {
            color: #3c4043
        }

        .gb_qa.gb_ra .gb_Vc {
            margin-bottom: 0
        }

        .gb_Xc.gb_Zc .gb_Vc {
            padding-left: 4px
        }

        .gb_qa.gb_ra .gb_0c {
            position: relative;
            top: -2px
        }

        .gb_qa {
            color: black;
            min-width: 320px;
            position: relative;
            -webkit-transition: box-shadow 250ms;
            transition: box-shadow 250ms
        }

        .gb_qa.gb_Ec {
            min-width: 240px
        }

        .gb_qa.gb_Id .gb_Jd {
            display: none
        }

        .gb_qa.gb_Id .gb_Kd {
            height: 56px
        }

        header.gb_qa {
            display: block
        }

        .gb_qa svg {
            fill: currentColor
        }

        .gb_Ld {
            position: fixed;
            top: 0;
            width: 100%
        }

        .gb_Md {
            -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
            box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.2)
        }

        .gb_Nd {
            height: 64px
        }

        .gb_qa:not(.gb_Ic) .gb_2c.gb_3c:not(.gb_Od):not(.gb_Pd),
        .gb_qa:not(.gb_Ic) .gb_Cd:not(.gb_Od):not(.gb_Pd),
        .gb_qa.gb_Qd .gb_2c.gb_3c.gb_Od,
        .gb_qa.gb_Qd .gb_Cd.gb_Od,
        .gb_qa.gb_Qd .gb_2c.gb_3c.gb_Pd,
        .gb_qa.gb_Qd .gb_Cd.gb_Pd {
            display: none !important
        }

        .gb_Kd {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: relative;
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: space-between;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            min-width: -webkit-min-content;
            min-width: min-content
        }

        .gb_qa:not(.gb_ra) .gb_Kd {
            padding: 8px
        }

        .gb_qa.gb_Rd .gb_Kd {
            -webkit-flex: 1 0 auto;
            flex: 1 0 auto
        }

        .gb_qa .gb_Kd.gb_Sd.gb_Td {
            min-width: 0
        }

        .gb_qa.gb_ra .gb_Kd {
            padding: 4px;
            padding-left: 8px;
            min-width: 0
        }

        .gb_Jd {
            height: 48px;
            vertical-align: middle;
            white-space: nowrap;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-user-select: none
        }

        .gb_Vd>.gb_Jd {
            display: table-cell;
            width: 100%
        }

        .gb_Xc {
            padding-right: 30px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-flex: 1 0 auto;
            flex: 1 0 auto
        }

        .gb_qa.gb_ra .gb_Xc {
            padding-right: 14px
        }

        .gb_Wd {
            -webkit-flex: 1 1 100%;
            flex: 1 1 100%
        }

        .gb_Wd>:only-child {
            display: inline-block
        }

        .gb_Xd.gb_Oc {
            padding-left: 4px
        }

        .gb_Xd.gb_Zd,
        .gb_qa.gb_Rd .gb_Xd,
        .gb_qa.gb_ra:not(.gb_0d) .gb_Xd {
            padding-left: 0
        }

        .gb_qa.gb_ra .gb_Xd.gb_Zd {
            padding-right: 0
        }

        .gb_qa.gb_ra .gb_Xd.gb_Zd .gb_ja {
            margin-left: 10px
        }

        .gb_Oc {
            display: inline
        }

        .gb_qa.gb_Ic .gb_Xd.gb_1d,
        .gb_qa.gb_0d .gb_Xd.gb_1d {
            padding-left: 2px
        }

        .gb_Vc {
            display: inline-block
        }

        .gb_Xd {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 48px;
            line-height: normal;
            padding: 0 4px;
            padding-left: 30px;
            -webkit-flex: 0 0 auto;
            flex: 0 0 auto;
            -webkit-box-pack: flex-end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end
        }

        .gb_0d {
            height: 48px
        }

        .gb_qa.gb_0d {
            min-width: initial;
            min-width: auto
        }

        .gb_0d .gb_Xd {
            float: right;
            padding-left: 32px
        }

        .gb_0d .gb_Xd.gb_2d {
            padding-left: 0
        }

        .gb_3d {
            font-size: 14px;
            max-width: 200px;
            overflow: hidden;
            padding: 0 12px;
            text-overflow: ellipsis;
            white-space: nowrap;
            -webkit-user-select: text
        }

        .gb_4d {
            -webkit-transition: background-color .4s;
            transition: background-color .4s
        }

        .gb_5d {
            color: black
        }

        .gb_wc {
            color: white
        }

        .gb_qa a,
        .gb_Bc a {
            color: inherit
        }

        .gb_t {
            color: rgba(0, 0, 0, 0.87)
        }

        .gb_qa svg,
        .gb_Bc svg,
        .gb_Xc .gb_6d,
        .gb_Nc .gb_6d {
            color: #5f6368;
            opacity: 1
        }

        .gb_wc svg,
        .gb_Bc.gb_Fc svg,
        .gb_wc .gb_Xc .gb_6d,
        .gb_wc .gb_Xc .gb_vc,
        .gb_wc .gb_Xc .gb_0c,
        .gb_Bc.gb_Fc .gb_6d {
            color: rgba(255, 255, 255, .87)
        }

        .gb_wc .gb_Xc .gb_uc:not(.gb_7d) {
            opacity: .87
        }

        .gb_Wc {
            color: inherit;
            opacity: 1;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased
        }

        .gb_wc .gb_Wc,
        .gb_5d .gb_Wc {
            opacity: 1
        }

        .gb_8d {
            position: relative
        }

        .gb_9d {
            font-family: arial, sans-serif;
            line-height: normal;
            padding-right: 15px
        }

        a.gb_g,
        span.gb_g {
            color: rgba(0, 0, 0, 0.87);
            text-decoration: none
        }

        .gb_wc a.gb_g,
        .gb_wc span.gb_g {
            color: white
        }

        a.gb_g:focus {
            outline-offset: 2px
        }

        a.gb_g:hover {
            text-decoration: underline
        }

        .gb_h {
            display: inline-block;
            padding-left: 15px
        }

        .gb_h .gb_g {
            display: inline-block;
            line-height: 24px;
            vertical-align: middle
        }

        .gb_ae {
            font-family: Google Sans, Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: .25px;
            line-height: 16px;
            margin-left: 10px;
            margin-right: 8px;
            min-width: 96px;
            padding: 9px 23px;
            text-align: center;
            vertical-align: middle;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        .gb_qa.gb_0d .gb_ae {
            margin-left: 8px
        }

        #gb a.gb_4.gb_4.gb_ae,
        #gb a.gb_3.gb_3.gb_ae {
            cursor: pointer
        }

        .gb_4.gb_ae:hover {
            background: #2b7de9;
            -webkit-box-shadow: 0 1px 2px 0 rgba(66, 133, 244, 0.3), 0 1px 3px 1px rgba(66, 133, 244, 0.15);
            box-shadow: 0 1px 2px 0 rgba(66, 133, 244, 0.3), 0 1px 3px 1px rgba(66, 133, 244, 0.15)
        }

        .gb_4.gb_ae:focus,
        .gb_4.gb_ae:hover:focus {
            background: #5094ed;
            -webkit-box-shadow: 0 1px 2px 0 rgba(66, 133, 244, 0.3), 0 1px 3px 1px rgba(66, 133, 244, 0.15);
            box-shadow: 0 1px 2px 0 rgba(66, 133, 244, 0.3), 0 1px 3px 1px rgba(66, 133, 244, 0.15)
        }

        .gb_4.gb_ae:active {
            background: #63a0ef;
            -webkit-box-shadow: 0 1px 2px 0 rgba(66, 133, 244, 0.3), 0 1px 3px 1px rgba(66, 133, 244, 0.15);
            box-shadow: 0 1px 2px 0 rgba(66, 133, 244, 0.3), 0 1px 3px 1px rgba(66, 133, 244, 0.15)
        }

        .gb_ae:not(.gb_3) {
            background: #1a73e8;
            border: 1px solid transparent
        }

        .gb_qa.gb_ra .gb_ae {
            padding: 9px 15px;
            min-width: 80px
        }

        .gb_be {
            text-align: left
        }

        #gb a.gb_ae.gb_3,
        #gb .gb_wc a.gb_ae,
        #gb.gb_wc a.gb_ae {
            background: #ffffff;
            border-color: #dadce0;
            -webkit-box-shadow: none;
            box-shadow: none;
            color: #1a73e8
        }

        #gb a.gb_4.gb_ka.gb_ce.gb_ae {
            background: #8ab4f8;
            border: 1px solid transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
            color: #202124
        }

        #gb a.gb_ae.gb_3:hover,
        #gb .gb_wc a.gb_ae:hover,
        #gb.gb_wc a.gb_ae:hover {
            background: #f8fbff;
            border-color: #cce0fc
        }

        #gb a.gb_4.gb_ka.gb_ce.gb_ae:hover {
            background: #93baf9;
            -webkit-box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.3)
        }

        #gb a.gb_ae.gb_3:focus,
        #gb a.gb_ae.gb_3:focus:hover,
        #gb .gb_wc a.gb_ae:focus,
        #gb .gb_wc a.gb_ae:focus:hover,
        #gb.gb_wc a.gb_ae:focus,
        #gb.gb_wc a.gb_ae:focus:hover {
            background: #f4f8ff;
            border-color: #c9ddfc
        }

        #gb a.gb_4.gb_ka.gb_ce.gb_ae:focus,
        #gb a.gb_4.gb_ka.gb_ce.gb_ae:focus:hover {
            background: #a6c6fa;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        #gb a.gb_ae.gb_3:active,
        #gb .gb_wc a.gb_ae:active,
        #gb.gb_wc a.gb_ae:active {
            background: #ecf3fe
        }

        #gb a.gb_4.gb_ka.gb_ce.gb_ae:active {
            background: #a1c3f9;
            -webkit-box-shadow: 0 1px 2px rgba(60, 64, 67, 0.3), 0 2px 6px 2px rgba(60, 64, 67, 0.15);
            box-shadow: 0 1px 2px rgba(60, 64, 67, 0.3), 0 2px 6px 2px rgba(60, 64, 67, 0.15)
        }

        #gb a.gb_ae.gb_3:not(.gb_ka):active {
            -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 2px 6px 2px rgba(60, 64, 67, 0.15);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 2px 6px 2px rgba(60, 64, 67, 0.15)
        }

        .gb_ja {
            background-color: rgba(255, 255, 255, 0.88);
            border: 1px solid #dadce0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            cursor: pointer;
            display: inline-block;
            max-height: 48px;
            overflow: hidden;
            outline: none;
            padding: 0;
            vertical-align: middle;
            width: 134px;
            -webkit-border-radius: 8px;
            border-radius: 8px
        }

        .gb_ja.gb_ka {
            background-color: transparent;
            border: 1px solid #5f6368
        }

        .gb_la {
            display: inherit
        }

        .gb_ja.gb_ka .gb_la {
            background: #ffffff;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            display: inline-block;
            left: 8px;
            margin-right: 5px;
            position: relative;
            padding: 3px;
            top: -1px
        }

        .gb_ja:hover {
            border: 1px solid #d2e3fc;
            background-color: rgba(248, 250, 255, 0.88)
        }

        .gb_ja.gb_ka:hover {
            border: 1px solid #5f6368;
            background-color: rgba(232, 234, 237, 0.08)
        }

        .gb_ja:focus {
            border: 1px solid #fff;
            background-color: rgba(255, 255, 255);
            -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 1px 3px 1px rgba(60, 64, 67, 0.15);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 1px 3px 1px rgba(60, 64, 67, 0.15)
        }

        .gb_ja.gb_ka:focus {
            border: 1px solid #e8eaed;
            background-color: #38383b
        }

        .gb_ja.gb_ka:active,
        .gb_ja.gb_ma.gb_ka:focus {
            border: 1px solid #5f6368;
            background-color: #333438
        }

        .gb_na {
            display: inline-block;
            padding-left: 7px;
            padding-bottom: 2px;
            text-align: center;
            vertical-align: middle;
            line-height: 32px;
            width: 78px
        }

        .gb_ja.gb_ka .gb_na {
            line-height: 26px;
            width: 72px;
            padding-left: 0;
            padding-bottom: 0
        }

        .gb_na.gb_oa {
            background-color: #f1f3f4;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            margin-left: 8px;
            padding-left: 0
        }

        .gb_na.gb_oa .gb_pa {
            vertical-align: middle
        }

        .gb_qa:not(.gb_ra) .gb_ja {
            margin-left: 10px;
            margin-right: 4px
        }

        .gb_sa {
            max-height: 32px;
            width: 78px
        }

        .gb_ja.gb_ka .gb_sa {
            max-height: 26px;
            width: 72px
        }

        .gb_Da {
            -webkit-background-size: 32px 32px;
            background-size: 32px 32px;
            border: 0;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            display: block;
            margin: 0;
            position: relative;
            height: 32px;
            width: 32px;
            z-index: 0
        }

        .gb_Ea {
            background-color: #e8f0fe;
            border: 1px solid rgba(32, 33, 36, .08);
            position: relative
        }

        .gb_Ea.gb_Da {
            height: 30px;
            width: 30px
        }

        .gb_Ea.gb_Da:hover,
        .gb_Ea.gb_Da:active {
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .gb_Fa {
            background: #fff;
            border: none;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            bottom: 2px;
            -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
            height: 14px;
            margin: 2px;
            position: absolute;
            right: 0;
            width: 14px
        }

        .gb_Ha {
            color: #1f71e7;
            font: 400 22px/32px Google Sans, Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
            text-align: center;
            text-transform: uppercase
        }

        @media (min-resolution:1.25dppx),
        (-o-min-device-pixel-ratio:5/4),
        (-webkit-min-device-pixel-ratio:1.25),
        (min-device-pixel-ratio:1.25) {
            .gb_Da::before {
                display: inline-block;
                -webkit-transform: scale(.5);
                transform: scale(.5);
                -webkit-transform-origin: left 0;
                transform-origin: left 0
            }

            .gb_Ia::before {
                display: inline-block;
                -webkit-transform: scale(.5);
                transform: scale(.5);
                -webkit-transform-origin: left 0;
                transform-origin: left 0
            }

            .gb_l .gb_Ia::before {
                -webkit-transform: scale(0.416666667);
                transform: scale(0.416666667)
            }
        }

        .gb_Da:hover,
        .gb_Da:focus {
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 1px 0 rgba(0, 0, 0, .15)
        }

        .gb_Da:active {
            -webkit-box-shadow: inset 0 2px 0 rgba(0, 0, 0, .15);
            box-shadow: inset 0 2px 0 rgba(0, 0, 0, .15)
        }

        .gb_Da:active::after {
            background: rgba(0, 0, 0, .1);
            -webkit-border-radius: 50%;
            border-radius: 50%;
            content: '';
            display: block;
            height: 100%
        }

        .gb_Ja {
            cursor: pointer;
            line-height: 40px;
            min-width: 30px;
            opacity: .75;
            overflow: hidden;
            vertical-align: middle;
            text-overflow: ellipsis
        }

        .gb_D.gb_Ja {
            width: auto
        }

        .gb_Ja:hover,
        .gb_Ja:focus {
            opacity: .85
        }

        .gb_Ka .gb_Ja,
        .gb_Ka .gb_La {
            line-height: 26px
        }

        #gb#gb.gb_Ka a.gb_Ja,
        .gb_Ka .gb_La {
            font-size: 11px;
            height: auto
        }

        .gb_Ma {
            border-top: 4px solid #000;
            border-left: 4px dashed transparent;
            border-right: 4px dashed transparent;
            display: inline-block;
            margin-left: 6px;
            opacity: .75;
            vertical-align: middle
        }

        .gb_Na:hover .gb_Ma {
            opacity: .85
        }

        .gb_ja>.gb_Oa {
            padding: 3px 3px 3px 4px
        }

        .gb_Pa.gb_Ca {
            color: #fff
        }

        .gb_j .gb_Ja,
        .gb_j .gb_Ma {
            opacity: 1
        }

        #gb#gb.gb_j.gb_j a.gb_Ja,
        #gb#gb .gb_j.gb_j a.gb_Ja {
            color: #fff
        }

        .gb_j.gb_j .gb_Ma {
            border-top-color: #fff;
            opacity: 1
        }

        .gb_E .gb_Da:hover,
        .gb_j .gb_Da:hover,
        .gb_E .gb_Da:focus,
        .gb_j .gb_Da:focus {
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .15), 0 1px 2px rgba(0, 0, 0, .2);
            box-shadow: 0 1px 0 rgba(0, 0, 0, .15), 0 1px 2px rgba(0, 0, 0, .2)
        }

        .gb_Qa .gb_Oa,
        .gb_Ra .gb_Oa {
            position: absolute;
            right: 1px
        }

        .gb_Oa.gb_i,
        .gb_Sa.gb_i,
        .gb_Na.gb_i {
            -webkit-flex: 0 1 auto;
            flex: 0 1 auto;
            -webkit-flex: 0 1 main-size;
            flex: 0 1 main-size
        }

        .gb_Ta.gb_Ua .gb_Ja {
            width: 30px !important
        }

        .gb_Va {
            height: 40px;
            position: absolute;
            right: -5px;
            top: -5px;
            width: 40px
        }

        .gb_Wa .gb_Va,
        .gb_Xa .gb_Va {
            right: 0;
            top: 0
        }

        .gb_Oa .gb_D {
            padding: 4px
        }

        .gb_ee {
            display: none
        }

        sentinel {}

        .z1asCe {
            display: inline-block;
            fill: currentColor;
            height: 24px;
            line-height: 24px;
            position: relative;
            width: 24px
        }

        .z1asCe svg {
            display: block;
            height: 100%;
            width: 100%
        }
    </style>
</head>

<body jsmodel="TvHxbe">
    <style>
        .L3eUgb {
            display: flex;
            flex-direction: column;
            height: 100%
        }

        .o3j99 {
            flex-shrink: 0;
            box-sizing: border-box
        }

        .n1xJcf {
            height: 60px
        }

        .LLD4me {
            min-height: 150px;
            max-height: 290px;
            height: calc(100% - 560px)
        }

        .yr19Zb {
            min-height: 92px
        }

        .ikrT4e {
            max-height: 160px
        }

        .qarstb {
            flex-grow: 1
        }
    </style>
    <div class="L3eUgb" data-hveid="1">
        <div class="o3j99 n1xJcf Ne6nSd">
            <style>
                .Ne6nSd {
                    display: flex;
                    align-items: center;
                    padding: 6px
                }

                .LX3sZb {
                    display: inline-block;
                    flex-grow: 1
                }
            </style>
            <div class="LX3sZb">
                <div class="gb_qa gb_0d gb_Wa" id="gb">
                    <div class="gb_Xd gb_Ta gb_Jd" data-ogsr-up="">
                        <div>
                            <div class="gb_9d gb_i gb_og gb_fg" data-ogbl="">
                                <div class="gb_h gb_i"><a class="gb_g" data-pid="23" href="https://mail.google.com/mail/?authuser=0&amp;ogbl" target="_top">Gmail</a></div>
                                <div class="gb_h gb_i"><a class="gb_g" data-pid="2" href="https://www.google.co.in/imghp?hl=en&amp;authuser=0&amp;ogbl" target="_top">Images</a></div>
                            </div>
                        </div>
                        <div class="gb_Ue">
                            <div class="gb_Oc">
                                <div class="gb_C gb_cd gb_i gb_Cf" data-ogsr-fb="true" data-ogsr-alt="" id="gbwa">
                                    <div class="gb_Bf"><a class="gb_D" aria-label="Google apps" href="https://www.google.co.in/intl/en/about/products" aria-expanded="false" role="button" tabindex="0"><svg class="gb_Xe" focusable="false" viewbox="0 0 24 24">
                                                <path d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path>
                                            </svg></a></div>
                                </div>
                            </div>
                            <div class="gb_Oa gb_cd gb_og gb_i gb_Cf">
                                <div class="gb_Bf gb_Sa gb_og gb_i"><a class="gb_D gb_Na gb_i" aria-label="Google Account: Vishal Kondle  &#10;(vishal.kondle@gmail.com)" href="https://accounts.google.com/SignOutOptions?hl=en&amp;continue=https://www.google.com/" role="button" tabindex="0"><img class="gb_Da gbii" src="https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s32-c-mo" srcset="https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s32-c-mo 1x, https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s64-c-mo 2x " alt="" aria-hidden="true" data-noaft=""></a>
                                    <div class="gb_0a"></div>
                                    <div class="gb_Za"></div>
                                </div>
                                <div class="gb_1a gb_F gb_l gb_2a" aria-label="Account Information" aria-hidden="true">
                                    <div class="gb_ab">
                                        <div class="gb_bb"><img class="gb_Ia gbip gb_fb" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s83-c-mo" data-srcset="https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s83-c-mo 1x, https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s192-c-mo 2x " title="Profile" alt="" aria-hidden="true">
                                            <div class="gb_jb gb_fb"><a class="gb_kb gb_Tf gb_fb gb_Zf" aria-label="Change profile picture." href="https://myaccount.google.com/?utm_source=OGB&amp;authuser=0"><svg class="gb_lb" enable-background="new 0 0 24 24" focusable="false" height="26" viewbox="0 0 24 24" width="18" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <path d="M20 5h-3.17L15 3H9L7.17 5H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 14H4V7h16v12zM12 9c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"></path>
                                                    </svg></a></div>
                                        </div>
                                        <div class="gb_cb">
                                            <div class="gb_mb gb_nb">Vishal Kondle</div>
                                            <div class="gb_ob">vishal.kondle@gmail.com</div><a class="gb_sb gb_Uf gbp1 gb_Re gb_4c" href="https://myaccount.google.com/?utm_source=OGB&amp;authuser=0&amp;utm_medium=act" target="_blank">Manage your Google Account</a>
                                        </div>
                                    </div>
                                    <div class="gb_Fb gb_Jb">
                                        <div class="gb_1f gb_gc gb_Ba">
                                            <div class="gb_hc"></div>
                                        </div>
                                        <div class="gb_Xf gb_Nb" aria-hidden="false"><a class="gb_Mb gb_Wb" aria-hidden="true" href="https://www.google.com/webhp?authuser=0"><img class="gb_Zb gb_fb" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://lh3.googleusercontent.com/ogw/ADGmqu9H0QU9iMUa6VI9-TASCfQvZl8s1XsHNmqJimO_=s48-c-mo" alt="" aria-hidden="true">
                                                <div class="gb_Pb">
                                                    <div>
                                                        <div class="gb_5b">Default</div>
                                                    </div>
                                                    <div class="gb_1b">Vishal Kondle</div>
                                                    <div class="gb_3b">vishal.kondle@gmail.com</div>
                                                </div>
                                            </a><a class="gb_Mb" href="https://www.google.com/webhp?authuser=1"><img class="gb_Zb gb_fb" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://lh3.googleusercontent.com/ogw/ADGmqu-lC44GXhVJnqI-t8SJoWLp8ntvnKVL72jizEnJ=s48-c-mo" alt="" aria-hidden="true">
                                                <div class="gb_Pb">
                                                    <div class="gb_1b">Vishal Kondle</div>
                                                    <div class="gb_3b">kondles1@gmail.com</div>
                                                </div>
                                            </a><a class="gb_Mb" href="https://www.google.com/webhp?authuser=2"><img class="gb_Zb gb_fb" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://lh3.googleusercontent.com/ogw/ADGmqu84LOwB9o0Iy9yteYXoCWi8JUbnuxBApXT_37gv=s48-c-mo" alt="" aria-hidden="true">
                                                <div class="gb_Pb">
                                                    <div class="gb_1b">Unprofessional Films</div>
                                                    <div class="gb_3b">kirrakfilmakers@gmail.com</div>
                                                </div>
                                            </a><a class="gb_Mb" href="https://www.google.com/webhp?authuser=3"><img class="gb_Zb gb_fb" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://lh3.googleusercontent.com/ogw/ADGmqu_5iXdkgzkeRrpqdA3V7RzyoynIV3uyqJw6srcD=s48-c-mo" alt="" aria-hidden="true">
                                                <div class="gb_Pb">
                                                    <div class="gb_1b">pavan sanga</div>
                                                    <div class="gb_3b">pavansanga1661@gmail.com</div>
                                                </div>
                                            </a></div>
                                        <div class="gb_zb" aria-hidden="true"><svg class="gb_Ab" focusable="false" height="20" viewbox="0 0 20 20" width="20" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path d="M0 0h20v20H0V0z" fill="none"></path>
                                                <path d="M6.18 7L10 10.82 13.82 7 15 8.17l-5 5-5-5z"></path>
                                            </svg></div><a class="gb_7b gb_Ba gb_Qb" href="https://myaccount.google.com/brandaccounts?authuser=0&amp;continue=https://www.google.com/&amp;service=https://www.google.com/webhp%3Fauthuser%3D%24authuser" aria-hidden="true">
                                            <div class="gb_8b"><svg focusable="false" height="20" viewbox="0 0 24 24" width="20" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v10.79C16.52 14.37 13.23 14 12 14s-4.52.37-7 1.79V5h14zM5 19v-.77C6.74 16.66 10.32 16 12 16s5.26.66 7 2.23V19H5zm7-6c1.94 0 3.5-1.56 3.5-3.5S13.94 6 12 6 8.5 7.56 8.5 9.5 10.06 13 12 13zm0-5c.83 0 1.5.67 1.5 1.5S12.83 11 12 11s-1.5-.67-1.5-1.5S11.17 8 12 8z" fill="#5F6368"></path>
                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                </svg></div>
                                            <div class="gb_ac gb_bc">All Brand accounts</div><svg class="gb_cc" focusable="false" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" fill="#5F6368"></path>
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="gb_Rb" tabindex="-1"><a class="gb_wb gb_Qf" href="https://accounts.google.com/AddSession?hl=en&amp;continue=https://www.google.com/&amp;ec=GAlAmgQ">
                                            <div class="gb_xb"><svg class="gb_yb" enable-background="new 0 0 24 24" focusable="false" height="20" viewbox="0 0 24 24" width="20" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path d="M9 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 7c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6 5H3v-.99C3.2 16.29 6.3 15 9 15s5.8 1.29 6 2v1zm3-4v-3h-3V9h3V6h2v3h3v2h-3v3h-2z"></path>
                                                </svg></div>
                                            <div class="gb_Bb">Add another account</div>
                                        </a></div>
                                    <div class="gb_Rf gb_Cb"><a class="gb_Db gb_Vf gb_4f gb_Re gb_4c" id="gb_71" href="https://accounts.google.com/Logout?hl=en&amp;continue=https://www.google.com/&amp;timeStmp=1616132338&amp;secTok=.AG5fkS-613XfxhJNkrCqCJNA2nbfZMl_6A&amp;ec=GAdAmgQ" target="_top">Sign out of all accounts</a></div>
                                    <div class="gb_Sf gb_tb"><a class="gb_ub gb_Ib" href="https://policies.google.com/privacy?hl=en&amp;authuser=0" target="_blank">Privacy Policy</a><span class="gb_Pa" aria-hidden="true">&bull;</span><a class="gb_ub gb_Hb" href="https://myaccount.google.com/termsofservice?hl=en&amp;authuser=0" target="_blank">Terms of Service</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="o3j99 LLD4me yr19Zb LS8OJ">
            <style>
                .LS8OJ {
                    display: flex;
                    flex-direction: column;
                    align-items: center
                }

                .k1zIA {
                    height: 100%;
                    margin-top: auto
                }
            </style>
            <div class="k1zIA rSk4se">
                <style>
                    .rSk4se {
                        max-height: 92px
                    }

                    .lnXdpd {
                        max-height: 100%;
                        max-width: 100%;
                        object-fit: contain;
                        object-position: center bottom;
                        width: auto
                    }
                </style><img class="lnXdpd" alt="Google" height="92" src="/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" srcset="/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png 1x, /images/branding/googlelogo/2x/googlelogo_color_272x92dp.png 2x" width="272">
            </div>
        </div>
        <div class="o3j99 ikrT4e om7nvf">
            <style>
                .om7nvf {
                    padding: 20px
                }
            </style>
            <dialog class="spch-dlg" id="spch-dlg">
                <div class="spch s2fp-h" style="display:none" id="spch"></div>
            </dialog>
            <form action="/search" method="GET" role="search">
                <div jsmodel="vWNDde" jsdata="MuIEvd;_;Bvf35k">
                    <div jscontroller="mvYTse" jsmodel="TMlYFc" class="A8SBwf" jsdata="LVplcb;_;" jsaction="lX6RWd:w3Wsmc;DkpM0b:d3sQLd;IQOavd:dFyQEf;XzZZPe:jI3wzf;Aghsf:AVsnlb;iHd9U:Q7Cnrc;f5hEHe:G0jgYd;vmxUb:j3bJnb;R2c5O:LuRugf;R3Yrj:DURTdb;qiCkJd:ANdidc;NOg9L:HLgh3;uGoIkd:epUokb;zLdLw:eaGBS;rcuQ6b:npT2md">
                        <style>
                            .A8SBwf {
                                position: relative;
                                margin: 0 auto;
                                padding-top: 6px;
                                width: 484px;
                                width: auto;
                                max-width: 484px;
                            }

                            #searchform.big .A8SBwf {
                                width: 584px;
                                width: auto;
                                max-width: 584px
                            }

                            .A8SBwf {
                                width: auto;
                                max-width: 584px
                            }

                            .RNNXgb {
                                background: #fff;
                                display: flex;
                                border: 1px solid #dfe1e5;
                                box-shadow: none;
                                border-radius: 24px;
                                z-index: 3;
                                height: 44px;
                                margin: 0 auto;
                                width: 482px;
                                width: auto;
                            }

                            .minidiv .RNNXgb {
                                background: #fff;
                                height: 32px;
                                border-radius: 16px;
                                margin: 10px 0 0
                            }

                            .emcav .RNNXgb {
                                border-bottom-left-radius: 0;
                                border-bottom-right-radius: 0;
                                border-color: rgba(223, 225, 229, 0);
                                box-shadow: 0 1px 6px rgba(32, 33, 36, .28)
                            }

                            .minidiv .emcav .RNNXgb {
                                border-bottom-left-radius: 0;
                                border-bottom-right-radius: 0
                            }

                            .emcav.emcat .RNNXgb {
                                border-bottom-left-radius: 24px;
                                border-bottom-right-radius: 24px
                            }

                            .minidiv .emcav.emcat .RNNXgb {
                                border-bottom-left-radius: 16px;
                                border-bottom-right-radius: 16px
                            }

                            .RNNXgb:hover,
                            .sbfc .RNNXgb {
                                background-color: #fff;
                                box-shadow: 0 1px 6px rgba(32, 33, 36, .28);
                                border-color: rgba(223, 225, 229, 0)
                            }

                            .UUbT9 {
                                width: auto
                            }

                            #searchform.big .RNNXgb {
                                width: 582px;
                                width: auto
                            }

                            .RNNXgb {
                                width: auto;
                                max-width: 584px
                            }

                            .SDkEP {
                                flex: 1;
                                display: flex;
                                padding: 5px 8px 0 16px;
                                padding-left: 14px;
                            }

                            .minidiv .SDkEP {
                                padding-top: 0
                            }

                            .FPdoLc {
                                padding-top: 18px;
                                top: 53px;
                                z-index: 0;
                            }

                            #searchform.big .FPdoLc {}

                            .iblpc {
                                display: flex;
                                align-items: center;
                                padding-right: 13px;
                                margin-top: -5px
                            }

                            .minidiv .iblpc {
                                margin-top: 0
                            }
                        </style>
                        <div class="RNNXgb" jsname="RNNXgb">
                            <div class="SDkEP">
                                <div class="iblpc" jsname="uFMOof">
                                    <style>
                                        .hsuHs {
                                            margin: auto
                                        }

                                        .wFncld {
                                            margin-top: 3px;
                                            color: #9aa0a6;
                                            height: 20px;
                                            width: 20px
                                        }
                                    </style>
                                    <div class="hsuHs"><span class="wFncld z1asCe MZy1Rb"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
                                                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                            </svg></span></div>
                                </div>
                                <div jscontroller="iDPoPb" class="a4bIc" jsname="gLFyf" jsaction="h5M12e;input:d3sQLd;blur:jI3wzf">
                                    <style>
                                        .gLFyf {
                                            background-color: transparent;
                                            border: none;
                                            margin: 0;
                                            padding: 0;
                                            color: rgba(0, 0, 0, .87);
                                            word-wrap: break-word;
                                            outline: none;
                                            display: flex;
                                            flex: 100%;
                                            -webkit-tap-highlight-color: transparent;
                                            margin-top: -37px;
                                            height: 34px;
                                            font-size: 16px
                                        }

                                        .minidiv .gLFyf {
                                            margin-top: -35px;
                                        }

                                        .a4bIc {
                                            display: flex;
                                            flex: 1;
                                            flex-wrap: wrap
                                        }

                                        .pR49Ae {
                                            color: transparent;
                                            flex: 100%;
                                            white-space: pre;
                                            height: 34px
                                        }

                                        .pR49Ae span {
                                            background: url("/images/experiments/wavy-underline.png") repeat-x scroll 0 100% transparent;
                                            padding: 0 0 10px 0;
                                        }
                                    </style>
                                    <div class="pR49Ae gsfi" jsname="vdLsw"></div><input class="gLFyf gsfi" jsaction="paste:puy29d;" maxlength="2048" name="q" type="text" aria-autocomplete="both" aria-haspopup="false" autocapitalize="off" autocomplete="off" autocorrect="off" autofocus="" role="combobox" spellcheck="false" title="Search" value="" aria-label="Search" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ39UDCAQ">
                                </div>
                                <div class="dRYYxd">
                                    <style>
                                        .dRYYxd {
                                            display: flex;
                                            flex: 0 0 auto;
                                            margin-top: -5px;
                                            align-items: stretch;
                                            flex-direction: row
                                        }

                                        .minidiv .dRYYxd {
                                            margin-top: 0
                                        }
                                    </style>
                                    <style>
                                        .clear-button {
                                            flex: 1 0 auto;
                                            display: none;
                                            cursor: pointer;
                                            align-items: center;
                                            border: 0;
                                            background: transparent;
                                            outline: none;
                                            padding: 0 8px;
                                            line-height: 44px
                                        }

                                        .XoaYSb {
                                            display: flex
                                        }

                                        .lBbtTb {
                                            height: 100%;
                                            color: #80868b;
                                            vertical-align: middle;
                                            outline: none
                                        }

                                        .minidiv .clear-button {
                                            line-height: 32px
                                        }

                                        .minidiv .lBbtTb {
                                            width: 20px
                                        }
                                    </style>
                                    <style>
                                        .clear-button {
                                            padding-right: 4px
                                        }

                                        .lBbtTb {
                                            margin-right: 12px
                                        }

                                        .FqnKTc {
                                            border-left: 1px solid #dfe1e5;
                                            height: 65%
                                        }
                                    </style>
                                    <div jscontroller="J5Ptqf" class="clear-button" jsname="RP0xob" aria-label="Clear" role="button" jsaction="AVsnlb;rcuQ6b:npT2md" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ05YFCAU"> <span class="lBbtTb z1asCe rzyADb" jsname="itVqKe" tabindex="0"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
                                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                            </svg></span> <span class="FqnKTc"></span> </div>
                                    <style>
                                        .hpuQDe {
                                            flex: 1 0 auto;
                                            display: flex;
                                            cursor: pointer;
                                            align-items: center;
                                            border: 0;
                                            background: transparent;
                                            outline: none;
                                            padding: 0 8px;
                                            width: 24px;
                                            line-height: 44px
                                        }

                                        .HPVvwb {
                                            height: 24px;
                                            width: 24px;
                                            vertical-align: middle
                                        }

                                        .minidiv .hpuQDe {
                                            line-height: 32px
                                        }

                                        .minidiv .HPVvwb {
                                            width: 20px;
                                            height: 20px
                                        }
                                    </style>
                                    <div jscontroller="MC8mtf" class="hpuQDe" aria-label="Search by voice" role="button" tabindex="0" jsaction="h5M12e;rcuQ6b:npT2md" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQvs8DCAY"><svg class="HPVvwb" focusable="false" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m12 15c1.66 0 3-1.31 3-2.97v-7.02c0-1.66-1.34-3.01-3-3.01s-3 1.34-3 3.01v7.02c0 1.66 1.34 2.97 3 2.97z" fill="#4285f4"></path>
                                            <path d="m11 18.08h2v3.92h-2z" fill="#34a853"></path>
                                            <path d="m7.05 16.87c-1.27-1.33-2.05-2.83-2.05-4.87h2c0 1.45 0.56 2.42 1.47 3.38v0.32l-1.15 1.18z" fill="#f4b400"></path>
                                            <path d="m12 16.93a4.97 5.25 0 0 1 -3.54 -1.55l-1.41 1.49c1.26 1.34 3.02 2.13 4.95 2.13 3.87 0 6.99-2.92 6.99-7h-1.99c0 2.92-2.24 4.93-5 4.93z" fill="#ea4335"></path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                        <div jscontroller="tg8oTe" class="UUbT9" style="display:none" jsname="UUbT9" jsaction="mouseout:ItzDCd;mouseleave:MWfikb;hBEIVb:nUZ9le;YMFC3:VKssTb">
                            <style>
                                .UUbT9 {
                                    position: absolute;
                                    width: 100%;
                                    text-align: left;
                                    margin-top: -1px;
                                    z-index: 3;
                                    cursor: default;
                                    -webkit-user-select: none
                                }

                                .aajZCb {
                                    background: #fff;
                                    box-shadow: 0 4px 6px rgba(32, 33, 36, .28);
                                    display: flex;
                                    flex-direction: column;
                                    list-style-type: none;
                                    margin: 0;
                                    padding: 0;
                                    border: 0;
                                    border-radius: 0 0 24px 24px;
                                    padding-bottom: 4px;
                                    overflow: hidden
                                }

                                .minidiv .aajZCb {
                                    border-bottom-left-radius: 16px;
                                    border-bottom-right-radius: 16px
                                }

                                .erkvQe {
                                    flex: auto;
                                    padding-bottom: 8px
                                }

                                .RjPuVb {
                                    height: 1px;
                                    margin: 0 26px 0 0
                                }

                                .S3nFnd {
                                    display: flex
                                }

                                .S3nFnd .RjPuVb,
                                .S3nFnd .aajZCb {
                                    flex: 0 0 auto
                                }

                                .lh87ke:link,
                                .lh87ke:visited {
                                    color: #36c;
                                    cursor: pointer;
                                    font: 11px arial, sans-serif;
                                    padding: 0 5px;
                                    margin-top: -10px;
                                    text-decoration: none;
                                    flex: auto;
                                    align-self: flex-end;
                                    margin: 0 16px 5px 0
                                }

                                .lh87ke:hover {
                                    text-decoration: underline
                                }

                                .xtSCL {
                                    border-top: 1px solid #e8eaed;
                                    margin: 0 20px 0 14px;
                                    padding-bottom: 4px
                                }

                                .sb7 {
                                    background: url() no-repeat;
                                    min-height: 0px;
                                    min-width: 0px;
                                    height: 0px;
                                    width: 0px
                                }

                                .sb27 {
                                    background: url(/images/searchbox/desktop_searchbox_sprites302_hr.webp) no-repeat 0 -21px;
                                    background-size: 20px;
                                    min-height: 20px;
                                    min-width: 20px;
                                    height: 20px;
                                    width: 20px
                                }

                                .sb43 {
                                    background: url(/images/searchbox/desktop_searchbox_sprites302_hr.webp) no-repeat 0 0;
                                    background-size: 20px;
                                    min-height: 20px;
                                    min-width: 20px;
                                    height: 20px;
                                    width: 20px
                                }

                                .sb53.sb53 {
                                    padding: 0 4px;
                                    margin: 0
                                }
                            </style>
                            <div class="RjPuVb" jsname="RjPuVb"></div>
                            <div class="aajZCb" jsname="aajZCb">
                                <div class="xtSCL"></div>
                                <ul class="erkvQe" jsname="erkvQe" role="listbox"></ul>
                                <style>
                                    #ynRric {
                                        display: none
                                    }

                                    .ynRric {
                                        list-style-type: none;
                                        flex-direction: column;
                                        color: #80868b;
                                        font-family: Google Sans, arial, sans-serif-medium, sans-serif;
                                        font-size: 14px;
                                        margin: 0 20px 0 16px;
                                        padding: 8px 0 8px 0;
                                        line-height: 16px
                                    }
                                </style>
                                <li class="ynRric" id="ynRric" role="presentation"></li>
                                <style>
                                    #sbt {
                                        display: none
                                    }

                                    .sbct {
                                        display: flex;
                                        align-items: center;
                                        min-width: 0;
                                        padding: 0
                                    }

                                    .jKWzZXdEJWi__suggestions-inner-container {
                                        flex: auto;
                                        display: flex;
                                        align-items: center;
                                        margin: 0 20px 0 14px
                                    }

                                    .sbtc {
                                        display: flex;
                                        flex: auto;
                                        flex-direction: column;
                                        min-width: 0;
                                        padding: 6px 0
                                    }

                                    .sbic {
                                        display: flex;
                                        align-items: center;
                                        margin: 0 13px 0 1px;
                                    }

                                    .sbic.sbei {
                                        margin: 4px 7px 4px -5px;
                                        border-radius: 4px;
                                        min-height: 32px;
                                        min-width: 32px;
                                        background: center/contain no-repeat
                                    }

                                    .sbre .sbl1 {
                                        line-height: 18px
                                    }

                                    .sbl2 {
                                        line-height: 12px;
                                        font-size: 13px;
                                        color: #80868b;
                                        margin-top: 2px
                                    }

                                    .sbl1 {
                                        display: flex;
                                        font-size: 16px;
                                        color: #212121;
                                        flex: auto;
                                        align-items: center;
                                        word-break: break-word;
                                        padding-right: 8px
                                    }

                                    .minidiv .sbl1 {
                                        font-size: 14px
                                    }

                                    .sbl1p {
                                        color: #52188c
                                    }

                                    .sbl1>span {
                                        flex: auto
                                    }

                                    .sbab {
                                        display: flex;
                                        align-self: stretch
                                    }

                                    .sbdb:hover {
                                        color: #1a73e8;
                                        text-decoration: underline
                                    }

                                    .sbdb {
                                        color: #80868b;
                                        cursor: pointer;
                                        font: 13px arial, sans-serif;
                                        align-self: center
                                    }

                                    .sbhl {
                                        background: #eee
                                    }

                                    .mus_pc {
                                        display: block;
                                        margin: 6px 0
                                    }

                                    .mus_il {
                                        font-family: Arial, HelveticaNeue-Light, HelveticaNeue, Helvetica;
                                        padding-top: 7px;
                                        position: relative
                                    }

                                    .mus_il:first-child {
                                        padding-top: 0
                                    }

                                    .mus_il_at {
                                        margin-left: 10px
                                    }

                                    .mus_il_st {
                                        right: 52px;
                                        position: absolute
                                    }

                                    .mus_il_i {
                                        align: left;
                                        margin-right: 10px
                                    }

                                    .mus_it3 {
                                        margin-bottom: 3px;
                                        max-height: 24px;
                                        vertical-align: bottom
                                    }

                                    .mus_it5 {
                                        height: 24px;
                                        width: 24px;
                                        vertical-align: bottom;
                                        margin-left: 10px;
                                        margin-right: 10px;
                                        transform: rotate(90deg)
                                    }

                                    .mus_tt3 {
                                        color: #767676;
                                        font-size: 12px;
                                        vertical-align: top
                                    }

                                    .mus_tt5 {
                                        color: #dd4b39;
                                        font-size: 14px
                                    }

                                    .mus_tt6 {
                                        color: #3d9400;
                                        font-size: 14px
                                    }

                                    .mus_tt8 {
                                        font-size: 16px;
                                        font-family: Arial, sans-serif
                                    }

                                    .mus_tt17 {
                                        color: #212121;
                                        font-size: 20px
                                    }

                                    .mus_tt18 {
                                        color: #212121;
                                        font-size: 24px
                                    }

                                    .mus_tt19 {
                                        color: #767676;
                                        font-size: 12px
                                    }

                                    .mus_tt20 {
                                        color: #767676;
                                        font-size: 14px
                                    }

                                    .mus_tt23 {
                                        color: #767676;
                                        font-size: 18px
                                    }
                                </style>
                                <li data-view-type="1" class="sbct" id="sbt" role="presentation">
                                    <div class="jKWzZXdEJWi__suggestions-inner-container">
                                        <div class="sbic"></div>
                                        <div class="sbtc" role="option">
                                            <div class="sbl1"><span></span></div>
                                            <div class="sbl2"><span></span></div>
                                        </div>
                                        <div class="sbab">
                                            <div class="sbai">Remove</div>
                                        </div>
                                    </div>
                                </li>
                                <div jsname="VlcLAe" class="tfB0Bf">
                                    <style>
                                        .tfB0Bf {
                                            height: 70px
                                        }

                                        .tfB0Bf input[type="submit"],
                                        .gbqfba {
                                            background-color: #f8f9fa;
                                            border: 1px solid #f8f9fa;
                                            border-radius: 4px;
                                            color: #3c4043;
                                            font-family: arial, sans-serif;
                                            font-size: 14px;
                                            margin: 11px 4px;
                                            padding: 0 16px;
                                            line-height: 27px;
                                            height: 36px;
                                            min-width: 54px;
                                            text-align: center;
                                            cursor: pointer;
                                            user-select: none
                                        }

                                        .tfB0Bf input[type="submit"]:hover {
                                            box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
                                            background-color: #f8f9fa;
                                            border: 1px solid #dadce0;
                                            color: #202124
                                        }

                                        .tfB0Bf input[type="submit"]:focus {
                                            border: 1px solid #4d90fe;
                                            outline: none
                                        }
                                    </style>
                                    <center> <input class="gNO89b" value="Google Search" aria-label="Google Search" name="btnK" type="submit" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ4dUDCAc"> <input class="RNmpXc" value="I'm Feeling Lucky" aria-label="I'm Feeling Lucky" name="btnI" type="submit" jsaction="trigger.kWlxhc" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ19QECAg"> </center>
                                </div>
                            </div>
                            <style>
                                .JUypV {
                                    font-size: 8pt;
                                    margin-top: -16px;
                                    position: absolute;
                                    right: 16px
                                }
                            </style>
                            <div jsname="JUypV" jscontroller="IvlUe" class="JUypV" data-async-context="async_id:duf3-46;authority:0;card_id:;entry_point:0;feature_id:;ftoe:0;header:0;is_jobs_spam_form:0;open:0;preselect_answer_index:-1;suggestions:;suggestions_subtypes:;suggestions_types:;surface:0;title:;type:46">
                                <style>
                                    a.oBa0Fe {
                                        color: #70757a;
                                        float: right;
                                        font-style: italic;
                                        -webkit-tap-highlight-color: rgba(0, 0, 0, .00);
                                        tap-highlight-color: rgba(0, 0, 0, .00)
                                    }

                                    a.aciXEb {
                                        padding: 0 5px;
                                    }

                                    .RTZ84b {
                                        color: #70757a;
                                        cursor: pointer;
                                        padding-right: 8px
                                    }

                                    .XEKxtf {
                                        color: #70757a;
                                        float: right;
                                        font-size: 12px;
                                        line-height: 1.34;
                                        padding-bottom: 4px
                                    }
                                </style>
                                <div jscontroller="xz7cCd" style="display:none" jsaction="rcuQ6b:npT2md"></div>
                                <div id="duf3-46" data-jiis="up" data-async-type="duffy3" data-async-context-required="type,open,feature_id,async_id,entry_point,authority,card_id,ftoe,title,header,suggestions,surface,suggestions_types,suggestions_subtypes,preselect_answer_index,is_jobs_spam_form" class="yp" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ-0EICQ"></div><a class="oBa0Fe wrSo4 aciXEb" href="#" id="sbfblt" data-async-trigger="duf3-46" jsaction="trigger.szjOR" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQtw8ICg">Report inappropriate predictions</a>
                            </div>
                        </div>
                        <div class="FPdoLc tfB0Bf">
                            <center> <input class="gNO89b" value="Google Search" aria-label="Google Search" name="btnK" type="submit" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ4dUDCAs"> <input class="RNmpXc" value="I'm Feeling Lucky" aria-label="I'm Feeling Lucky" name="btnI" type="submit" jsaction="trigger.kWlxhc" data-ved="0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ19QECAw"> </center>
                        </div>
                    </div>
                    <div style="background:url(/images/searchbox/desktop_searchbox_sprites302_hr.webp)"> </div>
                </div>
                <div id="tophf"><input name="sxsrf" value="ALeKk00OYsFSw6Oeirhh1TVqJ3BfRypfgw:1616132338281" type="hidden"><input name="source" type="hidden" value="hp"><input value="8jhUYIa-DrCG4-EPpOqZgA0" name="ei" type="hidden"><input value="AINFCbYAAAAAYFRHAs7W8F_sYbN_D0akMAQY4mrHW9EH" name="iflsig" type="hidden"></div>
            </form>
        </div>
        <div class="o3j99 qarstb">
            <style>
                .vcVZ7d {
                    text-align: center
                }
            </style>
            <div class="vcVZ7d" id="gws-output-pages-elements-homepage_additional_languages__als">
                <style>
                    #gws-output-pages-elements-homepage_additional_languages__als {
                        font-size: small;
                        margin-bottom: 24px
                    }

                    #SIvCob {
                        display: inline-block;
                        line-height: 28px;
                    }

                    #SIvCob a {
                        padding: 0 3px;
                    }

                    .H6sW5 {
                        display: inline-block;
                        margin: 0 2px;
                        white-space: nowrap
                    }

                    .z4hgWe {
                        display: inline-block;
                        margin: 0 2px
                    }
                </style>
                <div id="SIvCob">Google offered in: <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=hi&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCA4">हिन्दी</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=bn&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCA8">বাংলা</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=te&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBA">తెలుగు</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=mr&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBE">मराठी</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=ta&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBI">தமிழ்</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=gu&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBM">ગુજરાતી</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=kn&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBQ">ಕನ್ನಡ</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=ml&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBU">മലയാളം</a> <a href="https://www.google.com/setprefs?sig=0_5vtIhASolTYtVoSr_VOEPh1fYbY%3D&amp;hl=pa&amp;source=homepage&amp;sa=X&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ2ZgBCBY">ਪੰਜਾਬੀ</a> </div>
            </div>
        </div>
        <div class="o3j99 c93Gbe">
            <style>
                .c93Gbe {
                    background: #f2f2f2
                }

                .uU7dJb {
                    padding: 15px 30px;
                    border-bottom: 1px solid #dadce0;
                    font-size: 15px;
                    color: rgba(0, 0, 0, .54)
                }

                .SSwjIe {
                    padding: 0 20px
                }

                .KxwPGc {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between
                }

                @media only screen and (max-width:1200px) {
                    .KxwPGc {
                        justify-content: space-evenly
                    }
                }

                .pHiOh {
                    display: block;
                    padding: 15px;
                    white-space: nowrap
                }

                a.pHiOh {
                    color: #70757a
                }
            </style>
            <div class="uU7dJb">India</div>
            <div jscontroller="BLvsRb" class="KxwPGc SSwjIe" data-sfe="false" data-sfsw="1200" jsaction="rcuQ6b:npT2md">
                <div class="KxwPGc AghGtd"><a class="pHiOh" href="https://about.google/?utm_source=google-IN&amp;utm_medium=referral&amp;utm_campaign=hp-footer&amp;fg=1" ping="/url?sa=t&amp;rct=j&amp;source=webhp&amp;url=https://about.google/%3Futm_source%3Dgoogle-IN%26utm_medium%3Dreferral%26utm_campaign%3Dhp-footer%26fg%3D1&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQkNQCCBc">About</a><a class="pHiOh" href="https://www.google.com/intl/en_in/ads/?subid=ww-ww-et-g-awa-a-g_hpafoot1_1!o2&amp;utm_source=google.com&amp;utm_medium=referral&amp;utm_campaign=google_hpafooter&amp;fg=1" ping="/url?sa=t&amp;rct=j&amp;source=webhp&amp;url=https://www.google.com/intl/en_in/ads/%3Fsubid%3Dww-ww-et-g-awa-a-g_hpafoot1_1!o2%26utm_source%3Dgoogle.com%26utm_medium%3Dreferral%26utm_campaign%3Dgoogle_hpafooter%26fg%3D1&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQkdQCCBg">Advertising</a><a class="pHiOh" href="https://www.google.com/services/?subid=ww-ww-et-g-awa-a-g_hpbfoot1_1!o2&amp;utm_source=google.com&amp;utm_medium=referral&amp;utm_campaign=google_hpbfooter&amp;fg=1" ping="/url?sa=t&amp;rct=j&amp;source=webhp&amp;url=https://www.google.com/services/%3Fsubid%3Dww-ww-et-g-awa-a-g_hpbfoot1_1!o2%26utm_source%3Dgoogle.com%26utm_medium%3Dreferral%26utm_campaign%3Dgoogle_hpbfooter%26fg%3D1&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQktQCCBk">Business</a><a class="pHiOh" href="https://google.com/search/howsearchworks/?fg=1"> How Search works </a></div>
                <div class="KxwPGc iTjxkf"><a class="pHiOh" href="https://policies.google.com/privacy?hl=en-IN&amp;fg=1" ping="/url?sa=t&amp;rct=j&amp;source=webhp&amp;url=https://policies.google.com/privacy%3Fhl%3Den-IN%26fg%3D1&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ8awCCBo">Privacy</a><a class="pHiOh" href="https://policies.google.com/terms?hl=en-IN&amp;fg=1" ping="/url?sa=t&amp;rct=j&amp;source=webhp&amp;url=https://policies.google.com/terms%3Fhl%3Den-IN%26fg%3D1&amp;ved=0ahUKEwiG_7iP0rvvAhUwwzgGHSR1BtAQ8qwCCBs">Terms</a>
                    <div jscontroller="HFyn5c" class="ayzqOc">
                        <style>
                            .ayzqOc {
                                position: relative
                            }

                            .EzVRq {
                                display: block;
                                padding: 15px;
                                white-space: nowrap
                            }

                            a.EzVRq,
                            button.EzVRq {
                                color: #70757a
                            }

                            button.EzVRq {
                                cursor: pointer;
                                width: 100%;
                                text-align: left
                            }

                            button.EzVRq:hover,
                            button.EzVRq:active {
                                text-decoration: underline
                            }

                            .Qff0zd {
                                display: none;
                                position: absolute;
                                list-style: none;
                                background: #fff;
                                border: 1px solid #70757a
                            }
                        </style><button jsname="pzCKEc" class="EzVRq" aria-controls="dEjpnf" aria-haspopup="true" id="Mses6b" jsaction="mousedown:lgs1Pb;FwYIgd;keydown:QXPedb">Settings</button>
                        <ul jsname="xl07Ob" class="Qff0zd" aria-labelledby="Mses6b" id="dEjpnf" role="menu" jsaction="keydown:OEXC3c;focusout:Y48pVb">
                            <li role="none"><a class="EzVRq" href="https://www.google.com/preferences?hl=en-IN&amp;fg=1" role="menuitem" tabindex="-1">Search settings</a></li>
                            <li role="none"><a class="EzVRq" href="/advanced_search?hl=en-IN&amp;fg=1" role="menuitem" tabindex="-1">Advanced search</a></li>
                            <li role="none"><a class="EzVRq" href="https://myactivity.google.com/privacyadvisor/search?utm_source=googlemenu&amp;fg=1" role="menuitem" tabindex="-1">Your data in Search</a></li>
                            <li role="none"><a class="EzVRq" href="https://myactivity.google.com/product/search?utm_source=google&amp;hl=en-IN&amp;fg=1" role="menuitem" tabindex="-1">Search history</a></li>
                            <li role="none"><a class="EzVRq" href="https://support.google.com/websearch/?p=ws_results_help&amp;hl=en-IN&amp;fg=1" role="menuitem" tabindex="-1">Search help</a></li>
                            <li role="none"><button class="EzVRq" data-bucket="websearch" role="menuitem" tabindex="-1" jsaction="trigger.YcfJ">Send feedback</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Fgvgjc">
        <style>
            .Fgvgjc {
                height: 0;
                overflow: hidden
            }
        </style>
        <div class="gTMtLb fp-nh" id="lb">
            <style>
                .gTMtLb {
                    z-index: 1001;
                    position: absolute;
                    top: -1000px
                }
            </style>
        </div>
        <div jscontroller="fEVMic" style="display:none" data-u="0" jsdata="C4mkuf;_;Bvf35o" jsaction="rcuQ6b:npT2md"></div><span style="display:none"><span jscontroller="NBZ7u" style="display:none" data-ampr="1" jsaction="rcuQ6b:npT2md"></span></span>
        <script nonce="eZh4wR1Bjg/y7Me6R/anIA==">
            this.gbar_ = this.gbar_ || {};
            (function(_) {
                var window = this;
                try {
                    /*

                     Copyright The Closure Library Authors.
                     SPDX-License-Identifier: Apache-2.0
                    */
                    _.zd = function() {
                        if (!_.t.addEventListener || !Object.defineProperty) return !1;
                        var a = !1,
                            b = Object.defineProperty({}, "passive", {
                                get: function() {
                                    a = !0
                                }
                            });
                        try {
                            _.t.addEventListener("test", _.za, b), _.t.removeEventListener("test", _.za, b)
                        } catch (c) {}
                        return a
                    }();
                    _.Ad = _.Jb ? "webkitTransitionEnd" : _.Fb ? "otransitionend" : "transitionend";

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    _.Bd = function(a, b, c) {
                        if (!a.o)
                            if (c instanceof Array) {
                                c = _.ma(c);
                                for (var d = c.next(); !d.done; d = c.next()) _.Bd(a, b, d.value)
                            } else {
                                d = (0, _.v)(a.F, a, b);
                                var e = a.B + c;
                                a.B++;
                                b.setAttribute("data-eqid", e);
                                a.D[e] = d;
                                b && b.addEventListener ? b.addEventListener(c, d, !1) : b && b.attachEvent ? b.attachEvent("on" + c, d) : a.A.log(Error("n`" + b))
                            }
                    };

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    var Cd = document.querySelector(".gb_C .gb_D"),
                        Dd = document.querySelector("#gb.gb_Ec");
                    Cd && !Dd && _.Bd(_.pd, Cd, "click");

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    var Bh = function(a) {
                        _.K.call(this);
                        this.C = a;
                        this.A = null;
                        this.o = {};
                        this.D = {};
                        this.j = {};
                        this.B = null
                    };
                    _.r(Bh, _.K);
                    _.Ch = function(a) {
                        if (a.A) return a.A;
                        for (var b in a.j)
                            if (a.j[b].Ze() && a.j[b].Qb()) return a.j[b];
                        return null
                    };
                    _.h = Bh.prototype;
                    _.h.wf = function(a) {
                        a && _.Ch(this) && a != _.Ch(this) && _.Ch(this).Sd(!1);
                        this.A = a
                    };
                    _.h.Bg = function(a) {
                        a = this.j[a] || a;
                        return _.Ch(this) == a
                    };
                    _.h.Le = function(a, b) {
                        b = b.Nc();
                        if (this.o[a] && this.o[a][b])
                            for (var c = 0; c < this.o[a][b].length; c++) try {
                                this.o[a][b][c]()
                            } catch (d) {
                                this.C.log(d)
                            }
                    };
                    _.h.Qh = function(a) {
                        return !this.D[a.Nc()]
                    };
                    _.h.Tg = function(a) {
                        this.j[a] && (_.Ch(this) && _.Ch(this).Nc() == a || this.j[a].Sd(!0))
                    };
                    _.h.Ya = function(a) {
                        this.B = a;
                        for (var b in this.j) this.j[b].Ze() && this.j[b].Ya(a)
                    };
                    _.h.rf = function(a) {
                        this.j[a.Nc()] = a
                    };
                    _.h.Be = function(a) {
                        return a in this.j ? this.j[a] : null
                    };
                    var Dh = new Bh(_.nd);
                    _.yc("dd", Dh);

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    _.fj = function(a, b) {
                        a = a.split(".");
                        b = b || _.t;
                        for (var c = 0; c < a.length; c++)
                            if (b = b[a[c]], null == b) return null;
                        return b
                    };

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    var gj = document.querySelector(".gb_Oa .gb_D"),
                        hj = document.querySelector("#gb.gb_Ec");
                    gj && !hj && _.Bd(_.pd, gj, "click");

                } catch (e) {
                    _._DumpException(e)
                }
            })(this.gbar_);
            // Google Inc.
            this.gbar_ = this.gbar_ || {};
            (function(_) {
                var window = this;
                try {
                    /*

                     Copyright The Closure Library Authors.
                     SPDX-License-Identifier: Apache-2.0
                    */
                    var Gd, Hd, Id, Nd, Od, Pd, Qd, Rd, Sd, Td, Vd, ae, $d, ce;
                    _.Ed = function(a) {
                        var b = a.length;
                        if (0 < b) {
                            for (var c = Array(b), d = 0; d < b; d++) c[d] = a[d];
                            return c
                        }
                        return []
                    };
                    _.Fd = function(a, b) {
                        var c = Array.prototype.slice.call(arguments, 1);
                        return function() {
                            var d = c.slice();
                            d.push.apply(d, arguments);
                            return a.apply(this, d)
                        }
                    };
                    Gd = null;
                    Hd = /^[\w+/_-]+[=]{0,2}$/;
                    Id = function(a) {
                        return (a = a.querySelector && a.querySelector("script[nonce]")) && (a = a.nonce || a.getAttribute("nonce")) && Hd.test(a) ? a : ""
                    };
                    _.Jd = function(a) {
                        if (a && a != _.t) return Id(a.document);
                        null === Gd && (Gd = Id(_.t.document));
                        return Gd
                    };
                    _.Kd = function(a) {
                        var b = typeof a;
                        return "object" != b ? b : a ? Array.isArray(a) ? "array" : b : "null"
                    };
                    _.Ld = function(a) {
                        var b = _.Kd(a);
                        return "array" == b || "object" == b && "number" == typeof a.length
                    };
                    _.Md = function(a, b) {
                        return 0 == a.lastIndexOf(b, 0)
                    };
                    Nd = /&/g;
                    Od = /</g;
                    Pd = />/g;
                    Qd = /"/g;
                    Rd = /'/g;
                    Sd = /\x00/g;
                    Td = /[\x00&<>"']/;
                    _.Ud = function(a, b) {
                        if (b) a = a.replace(Nd, "&amp;").replace(Od, "&lt;").replace(Pd, "&gt;").replace(Qd, "&quot;").replace(Rd, "&#39;").replace(Sd, "&#0;");
                        else {
                            if (!Td.test(a)) return a; - 1 != a.indexOf("&") && (a = a.replace(Nd, "&amp;")); - 1 != a.indexOf("<") && (a = a.replace(Od, "&lt;")); - 1 != a.indexOf(">") && (a = a.replace(Pd, "&gt;")); - 1 != a.indexOf('"') && (a = a.replace(Qd, "&quot;")); - 1 != a.indexOf("'") && (a = a.replace(Rd, "&#39;")); - 1 != a.indexOf("\x00") && (a = a.replace(Sd, "&#0;"))
                        }
                        return a
                    };
                    Vd = function(a, b) {
                        return a < b ? -1 : a > b ? 1 : 0
                    };
                    _.Wd = function(a, b) {
                        var c = 0;
                        a = (0, _.Za)(String(a)).split(".");
                        b = (0, _.Za)(String(b)).split(".");
                        for (var d = Math.max(a.length, b.length), e = 0; 0 == c && e < d; e++) {
                            var f = a[e] || "",
                                g = b[e] || "";
                            do {
                                f = /(\d*)(\D*)(.*)/.exec(f) || ["", "", "", ""];
                                g = /(\d*)(\D*)(.*)/.exec(g) || ["", "", "", ""];
                                if (0 == f[0].length && 0 == g[0].length) break;
                                c = Vd(0 == f[1].length ? 0 : parseInt(f[1], 10), 0 == g[1].length ? 0 : parseInt(g[1], 10)) || Vd(0 == f[2].length, 0 == g[2].length) || Vd(f[2], g[2]);
                                f = f[3];
                                g = g[3]
                            } while (0 == c)
                        }
                        return c
                    };
                    _.Xd = function(a) {
                        var b = _.Jd(a.ownerDocument && a.ownerDocument.defaultView);
                        b && a.setAttribute("nonce", b)
                    };
                    _.Yd = function(a, b) {
                        a.src = _.Wa(b);
                        _.Xd(a)
                    };
                    _.Zd = function(a) {
                        return a = _.Ud(a, void 0)
                    };
                    ae = function(a, b) {
                        var c = $d;
                        return Object.prototype.hasOwnProperty.call(c, a) ? c[a] : c[a] = b(a)
                    };
                    $d = {};
                    _.be = function(a) {
                        return ae(a, function() {
                            return 0 <= _.Wd(_.Xb, a)
                        })
                    };
                    try {
                        (new self.OffscreenCanvas(0, 0)).getContext("2d")
                    } catch (a) {}
                    ce = !_.z || 9 <= Number(_.$b);
                    _.de = !_.Ib && !_.z || _.z && 9 <= Number(_.$b) || _.Ib && _.be("1.9.1");
                    _.ee = _.z && !_.be("9");
                    _.fe = _.z || _.Fb || _.Jb;
                    _.ge = function(a, b) {
                        this.width = a;
                        this.height = b
                    };
                    _.h = _.ge.prototype;
                    _.h.aspectRatio = function() {
                        return this.width / this.height
                    };
                    _.h.Tb = function() {
                        return !(this.width * this.height)
                    };
                    _.h.ceil = function() {
                        this.width = Math.ceil(this.width);
                        this.height = Math.ceil(this.height);
                        return this
                    };
                    _.h.floor = function() {
                        this.width = Math.floor(this.width);
                        this.height = Math.floor(this.height);
                        return this
                    };
                    _.h.round = function() {
                        this.width = Math.round(this.width);
                        this.height = Math.round(this.height);
                        return this
                    };
                    var je;
                    _.he = function(a, b) {
                        return (b || document).getElementsByTagName(String(a))
                    };
                    _.M = function(a, b) {
                        var c = b || document;
                        if (c.getElementsByClassName) a = c.getElementsByClassName(a)[0];
                        else {
                            c = document;
                            var d = b || c;
                            a = d.querySelectorAll && d.querySelector && a ? d.querySelector(a ? "." + a : "") : _.ie(c, "*", a, b)[0] || null
                        }
                        return a || null
                    };
                    _.ie = function(a, b, c, d) {
                        a = d || a;
                        b = b && "*" != b ? String(b).toUpperCase() : "";
                        if (a.querySelectorAll && a.querySelector && (b || c)) return a.querySelectorAll(b + (c ? "." + c : ""));
                        if (c && a.getElementsByClassName) {
                            a = a.getElementsByClassName(c);
                            if (b) {
                                d = {};
                                for (var e = 0, f = 0, g; g = a[f]; f++) b == g.nodeName && (d[e++] = g);
                                d.length = e;
                                return d
                            }
                            return a
                        }
                        a = a.getElementsByTagName(b || "*");
                        if (c) {
                            d = {};
                            for (f = e = 0; g = a[f]; f++) b = g.className, "function" == typeof b.split && _.ca(b.split(/\s+/), c) && (d[e++] = g);
                            d.length = e;
                            return d
                        }
                        return a
                    };
                    _.ke = function(a, b) {
                        _.La(b, function(c, d) {
                            c && "object" == typeof c && c.Sb && (c = c.Db());
                            "style" == d ? a.style.cssText = c : "class" == d ? a.className = c : "for" == d ? a.htmlFor = c : je.hasOwnProperty(d) ? a.setAttribute(je[d], c) : _.Md(d, "aria-") || _.Md(d, "data-") ? a.setAttribute(d, c) : a[d] = c
                        })
                    };
                    je = {
                        cellpadding: "cellPadding",
                        cellspacing: "cellSpacing",
                        colspan: "colSpan",
                        frameborder: "frameBorder",
                        height: "height",
                        maxlength: "maxLength",
                        nonce: "nonce",
                        role: "role",
                        rowspan: "rowSpan",
                        type: "type",
                        usemap: "useMap",
                        valign: "vAlign",
                        width: "width"
                    };
                    _.ne = function(a, b) {
                        var c = String(b[0]),
                            d = b[1];
                        if (!ce && d && (d.name || d.type)) {
                            c = ["<", c];
                            d.name && c.push(' name="', _.Zd(d.name), '"');
                            if (d.type) {
                                c.push(' type="', _.Zd(d.type), '"');
                                var e = {};
                                _.Na(e, d);
                                delete e.type;
                                d = e
                            }
                            c.push(">");
                            c = c.join("")
                        }
                        c = _.le(a, c);
                        d && ("string" === typeof d ? c.className = d : Array.isArray(d) ? c.className = d.join(" ") : _.ke(c, d));
                        2 < b.length && _.me(a, c, b, 2);
                        return c
                    };
                    _.me = function(a, b, c, d) {
                        function e(k) {
                            k && b.appendChild("string" === typeof k ? a.createTextNode(k) : k)
                        }
                        for (; d < c.length; d++) {
                            var f = c[d];
                            if (!_.Ld(f) || _.Ba(f) && 0 < f.nodeType) e(f);
                            else {
                                a: {
                                    if (f && "number" == typeof f.length) {
                                        if (_.Ba(f)) {
                                            var g = "function" == typeof f.item || "string" == typeof f.item;
                                            break a
                                        }
                                        if ("function" === typeof f) {
                                            g = "function" == typeof f.item;
                                            break a
                                        }
                                    }
                                    g = !1
                                }
                                _.Ha(g ? _.Ed(f) : f, e)
                            }
                        }
                    };
                    _.oe = function(a) {
                        return _.le(document, a)
                    };
                    _.le = function(a, b) {
                        b = String(b);
                        "application/xhtml+xml" === a.contentType && (b = b.toLowerCase());
                        return a.createElement(b)
                    };
                    _.pe = function(a) {
                        for (var b; b = a.firstChild;) a.removeChild(b)
                    };
                    _.qe = function(a) {
                        return a && a.parentNode ? a.parentNode.removeChild(a) : null
                    };
                    _.re = function(a) {
                        return _.Ba(a) && 1 == a.nodeType
                    };
                    _.se = function(a) {
                        return 9 == a.nodeType ? a : a.ownerDocument || a.document
                    };
                    _.te = function(a, b, c) {
                        for (var d = 0; a && (null == c || d <= c);) {
                            if (b(a)) return a;
                            a = a.parentNode;
                            d++
                        }
                        return null
                    };

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    _.lj = function(a) {
                        return _.Ya(_.E(a, 4) || "")
                    };
                    _.mj = function(a) {
                        (0, _.B)(this, a, 0, -1, null, null)
                    };
                    _.x(_.mj, _.A);
                    _.nj = function(a, b, c) {
                        a.rel = c;
                        a.href = -1 != c.toLowerCase().indexOf("stylesheet") ? _.Xa(b) : b instanceof _.Va ? _.Xa(b) : b instanceof _.ab ? _.bb(b) : _.bb(_.hb(b))
                    };

                } catch (e) {
                    _._DumpException(e)
                }
                try {
                    var oj = function(a, b, c) {
                            _.od.log(46, {
                                att: a,
                                max: b,
                                url: c
                            })
                        },
                        qj = function(a, b, c) {
                            _.od.log(47, {
                                att: a,
                                max: b,
                                url: c
                            });
                            a < b ? pj(a + 1, b) : _.nd.log(Error("P`" + a + "`" + b), {
                                url: c
                            })
                        },
                        pj = function(a, b) {
                            if (rj) {
                                var c = _.oe("SCRIPT");
                                c.async = !0;
                                c.type = "text/javascript";
                                c.charset = "UTF-8";
                                _.Yd(c, rj);
                                c.onload = _.Fd(oj, a, b, c.src);
                                c.onerror = _.Fd(qj, a, b, c.src);
                                _.od.log(45, {
                                    att: a,
                                    max: b,
                                    url: c.src
                                });
                                _.he("HEAD")[0].appendChild(c)
                            }
                        },
                        sj = function(a) {
                            (0, _.B)(this, a, 0, -1, null, null)
                        };
                    _.x(sj, _.A);
                    var tj = _.I(_.jd, sj, 17) || new sj,
                        uj, rj = (uj = _.I(tj, _.mj, 1)) ? _.lj(uj) : null,
                        vj, wj = (vj = _.I(tj, _.mj, 2)) ? _.lj(vj) : null,
                        xj = function() {
                            pj(1, 2);
                            if (wj) {
                                var a = _.oe("LINK");
                                a.setAttribute("type", "text/css");
                                _.nj(a, wj, "stylesheet");
                                var b = _.Jd();
                                b && a.setAttribute("nonce", b);
                                _.he("HEAD")[0].appendChild(a)
                            }
                        };
                    (function() {
                        var a = _.kd();
                        if (_.F(a, 18)) xj();
                        else {
                            var b = _.E(a, 19) || 0;
                            window.addEventListener("load", function() {
                                window.setTimeout(xj, b)
                            })
                        }
                    })();

                } catch (e) {
                    _._DumpException(e)
                }
            })(this.gbar_);
            // Google Inc.
        </script>
        <div>
            <div>
                <div class="gb_Hd">Google apps</div>
                <div class="gb_ee">
                    <div class="gb_ge">
                        <div>Google Account</div>
                        <div class="gb_nb">Vishal Kondle</div>
                        <div>vishal.kondle@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div><textarea class="csi" name="csi" style="display:none"></textarea>
    <script nonce="eZh4wR1Bjg/y7Me6R/anIA==">
        (function() {
            (function() {
                var c = Date.now();
                if (google.timers && google.timers.load.t) {
                    for (var a = document.getElementsByTagName("img"), d = 0, b = void 0; b = a[d++];) google.c.setup(b, !1, void 0);
                    "hidden" == document.visibilityState && google.c.e("load", "hddn", "1");
                    google.c.e("load", "imn", String(a.length));
                    google.c.ubr(!0, c);
                    google.c.glu && google.c.glu();
                    google.rll(window, !1, function() {
                        google.tick("load", "ol");
                        google.c.u("pr")
                    })
                }
            })();
        }).call(this);
        (function() {
            google.jl = {
                blt: 'none',
                dw: false,
                em: [],
                emw: false,
                lls: 'default',
                pdt: 0,
                snet: true,
                uwp: true
            };
        })();
        (function() {
            var pmc = '{\x22aa\x22:{},\x22abd\x22:{\x22abd\x22:false,\x22deb\x22:false,\x22det\x22:false},\x22async\x22:{},\x22cdos\x22:{\x22bih\x22:722,\x22biw\x22:1536,\x22cdobsel\x22:false,\x22dpr\x22:\x221.25\x22},\x22csi\x22:{},\x22d\x22:{},\x22dpf\x22:{},\x22dvl\x22:{\x22cookie_secure\x22:true,\x22cookie_timeout\x22:21600,\x22jsc\x22:\x22[null,null,null,30000,null,null,null,2,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,[\\\x2286400000\\\x22,\\\x22604800000\\\x22,2.0]\\n,null,1,21600000,1]\\n\x22,\x22msg_err\x22:\x22Location unavailable\x22,\x22msg_gps\x22:\x22Using GPS\x22,\x22msg_unk\x22:\x22Unknown\x22,\x22msg_upd\x22:\x22Update location\x22,\x22msg_use\x22:\x22Use precise location\x22,\x22use_local_storage_fallback\x22:true},\x22gf\x22:{\x22pid\x22:196,\x22si\x22:true},\x22hsm\x22:{},\x22jsa\x22:{\x22csi\x22:true,\x22csir\x22:100},\x22lu\x22:{},\x22mUpTid\x22:{},\x22mu\x22:{\x22murl\x22:\x22https://adservice.google.com/adsid/google/ui\x22},\x22sb_wiz\x22:{\x22rfs\x22:[],\x22scq\x22:\x22\x22,\x22stok\x22:\x22IAZ__ROhtRM7DK6b1XyE3Td3-5s\x22,\x22ueh\x22:\x2223392809_b8cce979_83ff1431_5c071bf2_c6a29771\x22},\x22sf\x22:{},\x22sonic\x22:{},\x22spch\x22:{\x22ae\x22:\x22Please check your microphone. \\u003Ca href\x3d\\\x22https://support.google.com/chrome/?p\x3dui_voice_search\\\x22 target\x3d\\\x22_blank\\\x22\\u003ELearn more\\u003C/a\\u003E\x22,\x22hl\x22:\x22en-IN\x22,\x22im\x22:\x22Click \\u003Cb\\u003EAllow\\u003C/b\\u003E to start voice search\x22,\x22iw\x22:\x22Waiting...\x22,\x22lm\x22:\x22Listening...\x22,\x22lu\x22:\x22%1$s voice search not available\x22,\x22mb\x22:false,\x22ne\x22:\x22No Internet connection\x22,\x22nt\x22:\x22Didn\x27t get that. \\u003Cspan\\u003ETry again\\u003C/span\\u003E\x22,\x22nv\x22:\x22Please check your microphone and audio levels. \\u003Ca href\x3d\\\x22https://support.google.com/chrome/?p\x3dui_voice_search\\\x22 target\x3d\\\x22_blank\\\x22\\u003ELearn more\\u003C/a\\u003E\x22,\x22pe\x22:\x22Voice search has been turned off. \\u003Ca href\x3d\\\x22https://support.google.com/chrome/?p\x3dui_voice_search\\\x22 target\x3d\\\x22_blank\\\x22\\u003EDetails\\u003C/a\\u003E\x22,\x22rm\x22:\x22Speak now\x22}}';
            google.pmc = JSON.parse(pmc);
        })();
        (function() {
            var r = ['sb_wiz', 'aa', 'abd', 'async', 'dvl', 'lu', 'mUpTid', 'mu', 'sf', 'sonic', 'spch'];
            google.plm(r);
        })();
        (function() {
            var m = ['Bvf35k', '[\x22gws-wiz\x22,\x22gws-wiz\x22,\x22\x22,\x22\x22,null,1,0,0,11,\x22en\x22,\x22IAZ__ROhtRM7DK6b1XyE3Td3-5s\x22,\x2223392809b8cce97983ff14315c071bf2c6a29771\x22,\x228jhUYIa-DrCG4-EPpOqZgA0\x22,0,\x22en-IN\x22,null,null,0,3,5,null,8,null,\x22\x22,-1,0,0,null,1,0,null,0,0,0,1,0,0,8,-1,null,0.0,0,null,null,600,0,1,0,0,0,0,0.1,null,0,0,0,100,0,null,1.15,1,0,-1,null,1,0,null,0,0,0,9,0,null,0,12,0,null,0,0,0,0,0,null,null,0]\n', 'Bvf35o', '[null,null,1,30000,null,null,null,2,null,null,3,null,null,null,null,null,1,null,null,null,null,null,null,[19.7514798,75.7138884]\n,null,null,null,null,0,null,null,null,null,null,null,null,0,\x221616132338\x22,null,null,null,null,null,1,null,null,[\x2286400000\x22,\x22604800000\x22,2.0]\n,null,1,21600000,1]\n'];
            var a = m;
            window.W_jd = window.W_jd || {};
            for (var b = 0; b < a.length; b += 2) window.W_jd[a[b]] = JSON.parse(a[b + 1]);
        })();
        (function() {
            window.WIZ_global_data = {
                "eptZe": "/wizrpcui/_/WizRpcUi/",
                "QrtxK": "0",
                "Yllh3e": "%.@.1616132338237318,104383280,3490084132]\n",
                "SNlM0e": "APB-GiVDrvlkDf7HLg2v_Hz6bO2t:1616132338298",
                "LVIXXb": "1",
                "GWsdKe": "en-IN",
                "zChJod": "%.@.]\n",
                "w2btAe": "%.@.\"101808629785868141399\",\"101808629785868141399\",\"0\",null,null,null,1]\n",
                "S06Grb": "101808629785868141399"
            };
            window.IJ_values = [false, false, true, false, "invert(1) hue-rotate(180deg)", "#b8bbbe", false, "1px solid #dfe1e5", false, false, false, "#aecbfa", "#1a73e8", "", false, "#fff", 36, 28, 6, false, "#70757a", "#fff", "0px 5px 26px 0px rgba(0, 0, 0, 0.22), 0px 20px 28px 0px rgba(0, 0, 0, 0.30)", "#4285f4", false, true, 11, 16, 13, 2, false, "#1a73e8", "#188038", "none", "#70757a", "#202124", "#ea4335", "#000", "", "arial,sans-serif-medium,sans-serif", "arial,sans-serif", "#dadce0", "#000", "#dadce0", "#000", "#1a73e8", "rgba(0,0,0,.26)", "rgba(0,0,0,.54)", "rgba(204,204,204,.15)", "rgba(204,204,204,.25)", "rgba(112,117,122,.20)", "rgba(112,117,122,.40)", "#4285f4", "#1558d6", "#34a853", "#ea4335", "#fbbc04", "#f8f9fa", "#f8f9fa", "#f8f9fa", "#70757a", "#202124", "#34a853", "rgba(0,0,0,.12)", "#323232", "#fff", "#fff", "rgba(255,255,255,.30)", "#fff", "rgba(0,0,0,.87)", "#fff", "14px", "500", "pointer", "0 1px 1px rgba(0,0,0,.16)", "#000", "0 4px 16px rgba(0,0,0,0.2)", "#666", true, false, "#fff", "#FFF", "1px solid #dfe1e5", "none", "1px solid #dfe1e5", true, false, false, "8px", "#ebebeb", true, false, "%.@.\"101808629785868141399\",\"101808629785868141399\",\"0\",null,null,null,1]\n", "0", "%.@.null,1,1.25,null,[null,722,1536]\n]\n", "eZh4wR1Bjg/y7Me6R/anIA\u003d\u003d", "%.@.\"#b8bbbe\"]\n", "%.@.0]\n", "%.@.0]\n", "%.@.0,\"\",\"#fff\",36,28,6,0.3,\"#fff\",14,\"#dadce0\",\"#3c4043\",\"#f8f9fa\",\"#bdc1c6\",\"#f8f9fa\",\"#202124\",\"#70757a\",\"#70757a\",\"#202124\",\"#f1f3f4\",\"#e8f0fe\",\"#d2e3fc\",\"#dadce0\",\"#1967d2\",\"#70757a\",\"#1a73e8\",\"#fabb05\",\"#fff\",\"#1a73e8\",\"#d1d1d1\",\"#fff\",1,1,\"1px solid #dfe1e5\",14,500,\"#1967d2\",\"0\",\"#1a73e8\",\"#eeeeee\"]\n", "%.@.[null,null,0]\n,0,null,0,0]\n", "%.@.\"Google Sans,arial,sans-serif\",\"Google Sans,arial,sans-serif-medium,sans-serif\",\"arial,sans-serif\",\"arial,sans-serif-medium,sans-serif\",\"arial,sans-serif-light,sans-serif\"]\n", "en-IN", "%.@.0,\"14px\",\"500\",\"500\",\"0 1px 1px rgba(0,0,0,.16)\",\"pointer\",\"#000\",\"rgba(0,0,0,.26)\",\"rgba(0,0,0,.54)\",\"rgba(0,0,0,.87)\",\"rgba(204,204,204,.15)\",\"rgba(204,204,204,.25)\",\"rgba(112,117,122,.20)\",\"rgba(112,117,122,.40)\",\"#34a853\",\"#4285f4\",\"#1558d6\",\"#ea4335\",\"#fbbc04\",\"#f8f9fa\",\"#f8f9fa\",\"#202124\",\"#34a853\",\"rgba(0,0,0,.12)\",\"#1e8e3e\",\"#fff\",\"rgba(255,255,255,.30)\",\"#fff\",\"rgba(0,0,0,.87)\",\"#fff\",0,0]\n", false, "", "%.@.4]\n", "%.@.\"#202124\",\"#70757a\",\"#4d5156\",\"#5f6368\",\"#fff\",\"rgba(255,255,255,.70)\",28,24,26,20,16,-2,0,-4,2,0,0,24,20,20,14,12]\n", "vishal.kondle@gmail.com", true, "101808629785868141399"];
        })();
        (function() {
            google.llirm = '0px';
            google.ldi = {};
            google.pim = {};
        })();
        google.x(null, function() {
            (function() {
                (function() {
                    google.csct = {};
                    google.csct.ps = 'AOvVaw3JPAuh_Sd6FpguhCHtFXfn\x26ust\x3d1616218738289579';
                })();
            })();
            (function() {
                (function() {
                    google.csct.pi = true;
                })();
            })();
            (function() {
                window.jsl = window.jsl || {};
                window.jsl.dh = window.jsl.dh || function(i, c, d) {
                    try {
                        var e = document.getElementById(i);
                        if (e) {
                            e.innerHTML = c;
                            if (d) {
                                d();
                            }
                        } else {
                            if (window.jsl.el) {
                                window.jsl.el(new Error('Missing ID.'), {
                                    'id': i
                                });
                            }
                        }
                    } catch (e) {
                        if (window.jsl.el) {
                            window.jsl.el(new Error('jsl.dh'));
                        }
                    }
                };
            })();
            (function() {
                window.jsl.dh('spch', '\x3cstyle\x3e.spch-dlg{background:transparent;border:none}.spch{background:#fff;height:100%;left:0;opacity:0;overflow:hidden;position:fixed;text-align:left;top:0;visibility:hidden;width:100%;z-index:10000;transition:visibility 0s linear 0.218s,background-color 0.218s}.close-button{background:none;border:none;color:#777;cursor:pointer;font-size:26px;right:0;height:11px;line-height:15px;margin:15px;opacity:.6;padding:0;position:absolute;top:0;width:15px;z-index:10}.close-button:hover{opacity:.8}.close-button:active{opacity:1}.spchc{display:block;height:42px;position:absolute;pointer-events:none}.inner-container{height:100%;opacity:.1;pointer-events:none;width:100%;transition:opacity .318s ease-in}.s2ml .inner-container,.s2ra .inner-container,.s2er .inner-container{opacity:1;transition:opacity 0s}.s2fp.spch{opacity:1;visibility:visible;transition-delay:0s}.s2tb-h.spch{background:rgba(255,255,255,0);opacity:0;visibility:hidden}.s2tb.spch{background:rgba(255,255,255,0);opacity:1;visibility:visible;transition-delay:0s}.google-logo{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALwAAABACAQAAAAKENVCAAAI/ElEQVR4Ae3ae3BU5RnH8e/ZTbIhhIRbRIJyCZcEk4ZyE4RBAiRBxRahEZBLQYUZAjIgoLUWB6wjKIK2MtAqOLVUKSqWQW0ZaOQq0IFAIZVrgFQhXAOShITEbHY7407mnPfc8u6ya2f0fN6/9rzvc87Z39nbed/l/8OhIKMDQ+hHKp1JJB6FKq5QQhH72MZ1IsDRhvkU4bds9WxlLNE4wqg9q6jBL9G+4knc/HB9qXmuG4goD89TjT+IVkimE/zt6sYh/EG3WmaiOMGHbgQ38YfY3ibKCV6GMabHWY0bo+Ps5jjnuYlCczrSk8Hcgd5U1rONoDnG48Ova2W8RGeMXAxiHfWakT4mOx81oRiG1/C5vYh47KSx5fZid4JvxxVd7MdIp3EK06kNNXYneIWtutgLaIasQUwkJE7wE3SxbycWR8SD93BOiL2YRBwRDN5FwOPchaqecZQTQQ4XAApz0FrFQSLPwQD8mlZNEt8L5841D62/cJVIi2cgPelEAlBOCYfYSxXymjKAXqSQAFRwloPspRp5dzOMHiTThEqK2c1OvGHIsg/30YUWKHzDKfZwEB+2xBn3gUSSwmA+MpluruYDySMPYD23TOrX0V/q+CPZYai+yHw8wKscbmhMD+IVfyevcMlkuvxXxGOphTD4Gi4iJ40C/DZtM12wk8Lfbes/oSN27mGPZW0RnVmvebxIMng3z1Bluddz5Mh9wm8icqZIzPHfZDxW8qhotL6cUVh5zP74XOBg0MEnsgW/bfMxzyIOYdgSIuV5/JJtPmZmSlb7mI6ZGTLVQQafSKHUvp7BxFxhSD6N8UsH4An5aT+J3mNB1T+K3hj8YQ/ezRbpvY3CYKEwYFLYgvfTkQZ9qTN8nS3lIdJJZwTLDdNztfwUrTTDp+hllmnqrxo+sLqi1dWwuFPKYnK5h0we5c/UhhT8fF1FHWsZTis8dGAyB4S+67RF5wVhwC/DGHxvAqI4Imyv50Vi0YpjsW4l4AAuGii63yE+lhCHVlOW6o79TxRN/ee64y/SHb8TO4MOvq3uYh6iO1oufiP0r0VnjtA9K4zBDzSdgKtjJGbyqBfG5dFguC62sZiZoLt0Qy3qvYzCKIZNQQYvXupdxGO0Rni5dLebl1wexuD7A4DuC+gprMwTxu2hwT+E7c9iZYEw7lMaiBPeczAXT3EQwcdwTbP1Eq3RiyaPvcIe/4igj9C5NYzBpwOQKmzbh4IVF4dMviOShHfCEdxYieKY8M5qCUCy8E4oxIWVnwcRfK4wdhqitiyk1JBHJc3UU4UT+HDRYADR1GEnB2s9WYrqssn41/BjxcdrrEOVzRogS4hqOfVY8fI6qzWXYTAbgRwUVMvwYeUzzpKCnMGobvIeDRTuZyajiMLoMG2oRONfwnV5kNDNFH5ZKAD8SbPtFrHYaSr8+nkLgCXC53sCdloJz+RlAFYJv5bisPOG9Cv+U+F+O6AZM4Sx2iz+QKZxWrgArSmEbiAIpwvQGdV/qMFOFUdRdTbUn6QCO9c4bajvJhy/GjuFyOqEqhhIZyUXWEk6esd4imTyKTIG/1e08kghNNEMR7WfgERUpTTmPKrmIdSXGupbiHu3dQFZCagy2MGXzCAekZcPySKDlVSYTwsf5QB9aeBiCWMJxcO0RPU5AW5UPuyJI9xhr/diz4ssF6ohGJXyFmu42Fj5MrTGMILgKTyHqpoCAipR3YE9cURFWOorUCVhrzWyKrFWwGg68hIXG79uGziG1rt0IFhPcC+qj6gioARVJm7sRPMTVCWG+u54sBNHqm19Ji7sZCDrv5gp53ekkcNGvHJvGB+zdVd+M60JRi/eREt9VIQqgfuxM5Q4VEcM9R5ysfMAUaA78iFUzRmIfb2sw+j9m6m042lOEqS1hv+R3Y2svpSJCxJCn9hjR5ztywSgg7BtGwpWFHYLY+8CIB2/5Jppj5BvoE7Qz/a8bCVSrIv+quQrYCLVQl0NXVEpnBF6f4aVX+guvELAPmH7GMk/ZX1BgKJb2szBnEJBEMFHUyY841SsjGcr7bGVabLC8z6dsJPC3ww1sxE9LfTeoAdmeumOPkNzYcUb776Y6aebOh5Hg6m6l1MaZhYGOUn2sjD6MAmYyeIWfiqYhoKNLJNlaC/ryCUGvRhyWUedYfx7KIiack4XfZ5ujMI4XewlxIpzMEL04w31k3STtEW4NWd6Uugr4yFEHt4Ielo4iRvC+P20R6QwTZPnFtpjI4dKi5veAlbwLPnM4NesZDs3Tcd9RgxGIw3jdjCeO1FQSGYiuw39D6A1CJ+u/wsm0pZA/STDEnY9A9DKMtRvZjStAIVOzOJMSAsh+YaMltGXGEChHVPYr+s/igsbPTmHP8T2IR7MvW46voZa0+2voLfAor7GdPtz6C0yHVfNt4S+9KewwXTJ8xtumWyv5T6w14pNIYTu40VcWHHzvvSe3sWFnsIq6foVKCb1qyOw2N2EnZJ7+5aRSFAYS2lQp3maLOy5WS61pyW4MKOwCJ/E5X8BBTMuXsW+tpITQQYPcXws8Zyuk420eOZyQSqqy8zDg4yH+cp2T2cYjp1sim3rTzEEO4/YPKNL9AvpD00K+ZTbnZXwc1KSh9FspNrmDbSZicQirwmzLMI7Qb7EnjxM57hp/TGmEUNjEljAZUNtHW/TGvhA+J6QCx4gicVcNT2r7TyIgoEiGf+99CeVLiTSDKimjK85QSH7qCJ4Cr0YRi9SaI6fG5zlIAUcwS9d34Nsen9Xz3f1hRRQJF0fzVCyyaQdcZRzil18zCUAPtHc3s3mTYIRzWCGkEEH4vFSxmn2s5kSJDgOGP/l4Ii8aOHetzeOsIhiNAX0wVq28O3lwXHbklnIeQJ/PHJhQbh72YXjts3Eq4n0t5h7BL+mzcVx29Kpxy9E70IvV5h7qiEJRxiswC+0feTgJkAhg3d098S/J8IUfhziOUAaouscoYJmpNIO0WXSuYYjLLpxFb9U85KNI4wyKJWKfQKOMEtmm33sXCCbCHC4mMxZIWpx/aglEeNwM4J3KNb8jvmaDTxBIt8jhR8vD22IpYYr1PBD5HA4HP8DxVcxdwELEFUAAAAASUVORK5CYII\x3d) no-repeat center;background-size:94px 32px;height:32px;width:94px;top:8px;opacity:0;float:right;left:255px;pointer-events:none;position:relative;transition:opacity .5s ease-in,left .5s ease-in}.s2tb .google-logo{opacity:0.54;left:270px;transition:opacity .5s ease-out,left .5s ease-out}.s2fp .spchc,.s2fp-h .spchc{margin:auto;margin-top:312px;max-width:572px;min-width:534px;padding:0 223px;position:relative;top:0}.s2tb .spchc,.s2tb-h .spchc{background:#fff;box-shadow:0 2px 6px rgba(0,0,0,.2);margin:0;min-width:100%;overflow:hidden;padding:51px 0 50px 126px;position:absolute}.s2tb-h .inner-container,.s2tb .inner-container{height:100%;width:572px;transition:opacity .318s ease-in}\x3c/style\x3e\x3cstyle\x3e.spch.s2tb.mVRQbc{background:rgba(255,255,255,0.9)}\x3c/style\x3e\x3cbutton class\x3d\x22close-button\x22 id\x3d\x22spchx\x22 aria-label\x3d\x22close\x22\x3e\x26times;\x3c/button\x3e\x3cdiv class\x3d\x22spchc\x22 id\x3d\x22spchc\x22\x3e\x3cdiv class\x3d\x22inner-container\x22\x3e\x3cdiv class\x3d\x22button-container\x22\x3e\x3cstyle\x3e.button{background-color:#fff;border:1px solid #eee;border-radius:100%;bottom:0;box-shadow:0 2px 5px rgba(0,0,0,.1);cursor:pointer;display:inline-block;left:0;opacity:0;pointer-events:none;position:absolute;right:0;top:0;transition:background-color 0.218s,border 0.218s,box-shadow 0.218s}.s2tb-h .button{left:-83px;opacity:0;pointer-events:none;position:absolute;top:-83px;transition-delay:0}.s2fp-h .button,.s2fpm-h .button{opacity:0;pointer-events:none;position:absolute;transition-delay:0}.s2fp .button,.s2tb .button,.s2fpm .button{opacity:1;pointer-events:auto;position:absolute;transform:scale(1);transition-delay:0}.s2ra .button{background-color:#f44;border:0;box-shadow:none}.r8s4j{background-color:#dbdbdb;border-radius:100%;display:inline-block;height:301px;left:-69px;opacity:1;pointer-events:none;position:absolute;top:-69px;width:301px;transform:scale(.01);transition:opacity 0.218s}.s2tb-h .r8s4j,.s2tb .r8s4j{height:151px;left:-28px;top:-28px;width:151px}.button-container{pointer-events:none;position:relative;transition:transform 0.218s,opacity 0.218s ease-in}.s2fp-h .button-container,.s2fp .button-container{height:165px;right:-70px;top:-70px;width:165px;float:right}.s2fpm-h .button-container,.s2fpm .button-container{height:165px;margin:0 auto;top:150px;width:165px}.s2fp-h .button-container,.s2tb-h .button-container,.s2fpm-h .button-container{transform:scale(.1)}.s2fp .button-container,.s2fpm-h .button-container,.s2tb .button-container{transform:scale(1)}.s2tb-h .button-container,.s2tb .button-container{height:95px;right:-31px;top:-27px;width:95px;float:right}.s2ra .button:active{background-color:#cd0000}.button:active{background-color:#eee}\x3c/style\x3e\x3cspan class\x3d\x22r8s4j\x22 id\x3d\x22spchl\x22\x3e\x3c/span\x3e\x3cspan class\x3d\x22button\x22 id\x3d\x22spchb\x22\x3e\x3cdiv class\x3d\x22microphone\x22\x3e\x3cstyle\x3e.microphone{height:87px;left:43px;pointer-events:none;position:absolute;top:47px;width:42px;transform:scale(1)}.s2tb-h .microphone,.s2tb .microphone{left:17px;top:7px;transform:scale(.53)}.receiver{background-color:#999;border-radius:30px;height:46px;left:25px;pointer-events:none;position:absolute;width:24px}.wrapper{bottom:0;height:53px;left:11px;overflow:hidden;pointer-events:none;position:absolute;width:52px}.stem{background-color:#999;bottom:14px;height:14px;left:22px;pointer-events:none;position:absolute;width:9px;z-index:1}.shell{border:7px solid #999;border-radius:28px;bottom:27px;height:57px;pointer-events:none;position:absolute;width:38px;z-index:0;left:0px}.s2ml .receiver,.s2ml .stem{background-color:#f44}.s2ml .shell{border-color:#f44}.s2ra .receiver,.s2ra .stem{background-color:#fff}.s2ra .shell{border-color:#fff}\x3c/style\x3e\x3cspan class\x3d\x22receiver\x22\x3e\x3c/span\x3e\x3cdiv class\x3d\x22wrapper\x22\x3e\x3cspan class\x3d\x22stem\x22\x3e\x3c/span\x3e\x3cspan class\x3d\x22shell\x22\x3e\x3c/span\x3e\x3c/div\x3e\x3c/div\x3e\x3c/span\x3e\x3c/div\x3e\x3cdiv class\x3d\x22text-container\x22\x3e\x3cstyle\x3e.text-container{pointer-events:none}.s2fp-h .text-container,.s2fp .text-container,.s2fpm-h .text-container,.s2fpm .text-container{position:absolute}.s2tb-h .text-container,.s2tb .text-container{position:relative}.spcht{font-weight:normal;line-height:1.2;opacity:0;pointer-events:none;position:absolute;text-align:left;-webkit-font-smoothing:antialiased;transition:opacity .1s ease-in,margin-left .5s ease-in,top 0s linear 0.218s}.s2fp-h .spcht,.s2fpm-h .spcht{margin-left:44px}.s2tb-h .spcht{margin-left:32px}.s2fp-h .spcht,.s2fp .spcht,.s2fpm-h .spcht,.s2fpm .spcht{left:-44px;top:-.2em}.s2fp-h .spcht,.s2fp .spcht{font-size:32px;width:460px}.s2fpm-h .spcht,.s2fpm .spcht{font-size:28px;width:300px}.s2tb-h .spcht,.s2tb .spcht{font-size:27px;left:7px;top:.2em;width:490px}.s2fp .spcht,.s2fpm .spcht,.s2tb .spcht{margin-left:0;opacity:1;transition:opacity .5s ease-out,margin-left .5s ease-out}.spchta{color:#15c;cursor:pointer;font-size:18px;font-weight:500;pointer-events:auto;text-decoration:underline}.spch-2l.spcht,.spch-3l.spcht,.spch-4l.spcht{transition:top 0.218s ease-out}.spch-2l.spcht{top:-.6em}.spch-3l.spcht{top:-1.3em}.spch-4l.spcht{top:-1.7em}.s2fp .spch-5l.spcht{top:-2.5em}.s2tb .spch-5l.spcht{font-size:24px;top:-1.7em;transition:font-size 0.218s ease-out}\x3c/style\x3e\x3cspan class\x3d\x22spcht\x22 style\x3d\x22color:#777\x22 id\x3d\x22spchi\x22\x3e\x3c/span\x3e\x3cspan class\x3d\x22spcht\x22 style\x3d\x22color:#000\x22 id\x3d\x22spchf\x22\x3e\x3c/span\x3e\x3c/div\x3e\x3cdiv class\x3d\x22google-logo\x22\x3e\x3c/div\x3e\x3c/div\x3e\x3cdiv class\x3d\x22permission-bar\x22\x3e\x3cstyle\x3e.permission-bar{margin-top:-100px;opacity:0;pointer-events:none;position:absolute;width:500px;transition:opacity 0.218s ease-in,margin-top .4s ease-in}.s2wfp .permission-bar{margin-top:-300px;opacity:1;transition:opacity .5s ease-out 0.218s,margin-top 0.218s ease-out 0.218s}.permission-bar-gradient{box-shadow:0 1px 0px #4285f4;height:80px;left:0;margin:0;opacity:0;pointer-events:none;position:fixed;right:0;top:-80px;transition:opacity 0.218s,box-shadow 0.218s}.s2wfp .permission-bar-gradient{box-shadow:0 1px 80px #4285f4;opacity:1;pointer-events:none;animation:allow-alert .75s 0 infinite;animation-direction:alternate;animation-timing-function:ease-out;transition:opacity 0.218s,box-shadow 0.218s}@-webkit-keyframes allow-alert {from{opacity:1}to{opacity:.35}}\x3c/style\x3e\x3cdiv class\x3d\x22permission-bar-gradient\x22\x3e\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e');
            })();
            (function() {
                google.drty && google.drty();
            })();
        });
        google.drty && google.drty();
    </script>
</body>

</html>