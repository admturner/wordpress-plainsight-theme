The images in this directory are for the ColorBox JavaScript plugin. Explanation below.

/*
    Images to correct IE issues.
    This goes with the ColorBox Core Style (referenced below), which is stored in the
    /js/ directory and the stylesheet in the /css/colorbox/ directory.
    
    ColorBox Core Style
    The following rules are the styles that are consistant between themes.
    Avoid changing this area to maintain compatability with future versions of ColorBox.
*/


/*
    The following fixes png-transparency for IE6.  
    It is also necessary for png-transparency in IE7 & IE8 to avoid 'black halos' with the fade transition
    
    Since this method does not support CSS background-positioning, it is incompatible with CSS sprites.
    Colorbox preloads navigation hover classes to account for this.
    
    !! Important Note: AlphaImageLoader src paths are relative to the HTML document,
    while regular CSS background images are relative to the CSS document.
*/