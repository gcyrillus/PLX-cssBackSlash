        let escape = document.querySelectorAll('form input:not([type="submit"]), form textarea');
        let form = document.querySelector('form');
        function saveSlashes(str){
            return str.replace(/[\\]/g, '\\$&');
        }
        form.addEventListener('formdata',function(e){
            let formData = e.formData;
            for (i=0;i<escape.length;i++){ 
                let content = escape[i].getAttribute("name");
                formData.set(content, saveSlashes(formData.get(content))); 
            }
        });
