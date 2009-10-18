
/**this function is used for retriving
 * XMLHttpRequest object
 */
function lox(){
 var xhr;
 if(window.XMLHttpRequest){
 	xhr = new XMLHttpRequest();
 }else if(window.ActiveXObject){
 	xhr = new ActiveXObject("Microsoft.XMLHTTP");
 }else{
    xhr = false;
    window.alert("Your browser does not support XMLHTTP");
 }
    return xhr;
}
//this defines the states
ls ={not:0,created:1,sented:2,processed:3,complete:4};
// cross-browser event handling for IE5+, NS6+ and Mozilla/Gecko
// By Scott Andrew
function addEvent(elm,evType, fn, useCapture){
if (elm.addEventListener){
    elm.addEventListener(evType, fn, useCapture);
    return true;
}else if (elm.attachEvent){
    var r = elm.attachEvent('on' + evType, fn);
    EventCache.add(elm, evType, fn);
    return r;
}else{ elm['on' + evType] = fn; return true;}
}
