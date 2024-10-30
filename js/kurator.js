

jQuery(document).ready(function(){



    var isGa = false;
    var isGtag = false;

    if(typeof(gtag) !== 'undefined') {
        isGtag= true;
    }
    else if(typeof(ga) !== 'undefined') {
        isGa = true;
    }
    
    if(!isGa && !isGtag) {
        console.error('[Kurator Plugin]: ga is not initialized');
    }
    else {
        var category = 'Kurator';
        var action = 'redirect';
        var label = jQuery('.kurator-link').text();
        
        jQuery('.kurator-link').click(function() {
            if(isGa) {
                ga('send', 'event', category, action, label);
            }
            if(isGtag) {
                gtag('event', action, {
                  'event_category': category,
                  'event_label': label
                });
            }
        });
    } 
});
