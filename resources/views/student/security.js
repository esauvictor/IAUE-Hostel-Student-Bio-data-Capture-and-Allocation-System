// security.js
(function() {
    'use strict';
    
    // DevTools monitoring
    function checkDevTools() {
        const threshold = 160;
        const widthDiff = window.outerWidth - window.innerWidth;
        const heightDiff = window.outerHeight - window.innerHeight;
        
        if (widthDiff > threshold || heightDiff > threshold) {
            document.documentElement.innerHTML = '<h1 style="text-align:center;margin-top:20%">Security Violation Detected</h1>';
            fetch('/security-log', {
                method: 'POST',
                body: JSON.stringify({event: "devtools_open"}),
                headers: {'Content-Type': 'application/json'}
            });
            setTimeout(() => location.reload(), 2000);
        }
    }
    
    // Random interval checks
    setInterval(checkDevTools, Math.random() * 500 + 100);
    
    // Console protection
    window.console = new Proxy({}, {
        get(target, prop) {
            if (['log','info','error','warn'].includes(prop)) {
                return function() {
                    checkDevTools();
                    if (location.hostname === 'localhost') {
                        return console[prop](...arguments);
                    }
                };
            }
            return Reflect.get(...arguments);
        }
    });
    
    // Frame busting
    if (window !== window.top) {
        window.top.location = window.location;
    }
    
    // Right-click protection
    document.addEventListener('contextmenu', (e) => {
        if (!e.target.isContentEditable && 
            e.target.tagName !== 'INPUT' && 
            e.target.tagName !== 'TEXTAREA') {
            e.preventDefault();
        }
    }, {capture: true});
})();