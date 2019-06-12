jQuery('document').ready(function () {
        let hg = jQuery('#main').height();
        let wg = jQuery('#main').width();
        let elemflt = jQuery('.flt-right');
        
        
        if (elemflt.height()>hg) {
            jQuery('#main').height(elemflt.width()+20);
        }
        
        if (elemflt.find('ul').length==0) {
            return 0;
        }
        
        
        
        elemflt.width(wg*30/100);
        
        
        
        if (hg > 0 && elemflt.length > 0) {
          jQuery('#main').find('p').css('width', wg-elemflt.width());
          jQuery('.flt-right').height(hg+100);
    }
    
});