window.onload = function() {
let txtA = document.querySelector('[name="content"]');
let content = txtA.innerHTML;	
function escapeRegex(string) {	
    return string.replace(/[\\]/g, '\\$&');
}
txtA.innerHTML=  escapeRegex(content);  
}