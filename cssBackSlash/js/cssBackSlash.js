(function () {
    window.onload = function() {
        let txtA = document.querySelectorAll('[name="title"],[name="chapo"],[name="content"]');
        
        for (i=0;i<txtA.length;i++){  
          if(txtA[i].tagName == 'INPUT'){
            let content = txtA[i].value;
            txtA[i].value=  escapeRegex(content); 
          }
          else {  let content = txtA[i].innerHTML;
            txtA[i].innerHTML=  escapeRegex(content); 
          } 	            
        }
        function escapeRegex(string) {	
            return string.replace(/[\\]/g, '\\$&');
        }
    }

})();;