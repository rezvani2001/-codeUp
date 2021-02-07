


let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


let cclass = JSON.parse(localStorage['cclass']);


function send(){

    
    let file = document.getElementById('file').files[0];

    let data = new FormData();

    data.append("title" ,  document.getElementById('name').value);
    data.append("explainWork" , document.getElementById('des').value);
    data.append("relatedClassId" , cclass.id);
    data.append("filePath" , file);


    let request = {
        method : "POST",

        headers :{
            "Accept" : "application/json"
        },

        body : data
    }

    fetch('http://127.0.0.1:8000/api/works' , request).then(response => {
        response.json().then(data=>{
            if(data.id == undefined){
                alert('لطفا از پر بودن فیلد ها اطمینان حاصل کنید');
            }else{
                alert('پرسش شما ثبت شد');
                location.replace('class.html');
            }
        })
    })

}