console.log("Website Loaded!");

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}