///////   BOTAO CUSTOMIZADO PARA UPLOAD DE IMAGENS   ///////
'use strict'
    let photo = document.getElementById('imgfile');
    let file = document.getElementById('image');

    photo.addEventListener('click', () => {
        file.click();
    });
    
    file.addEventListener('change', () => {
        
        if(file.files.length == 0){
            return;
        }
        
        let reader = new FileReader();
        reader.onload = () => {
            photo.src = reader.result;
        }
        reader.readAsDataURL(file.files[0]);
    });