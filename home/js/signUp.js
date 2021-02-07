

let user;

let name = document.getElementById('name');
let lastName = document.getElementById('lastName');
let sEmail = document.getElementById('sEmail');
let sPass = document.getElementById('sPass');


function Sclicked(){
    let name = document.getElementById('name').value;
    let lastname = document.getElementById('lastName').value;
    let email = document.getElementById('sEmail').value;
    let password = document.getElementById('sPass').value;


    let data = { name , lastname , email , password };

    let request = {
        method: "POST",

        headers :{
            "content-Type" : "application/json"
        },
        
        body : JSON.stringify(data)
    };

    fetch('http://127.0.0.1:8000/api/user' , request).then(response => {
        response.json().then(data =>{
            user = {
                "id" : data['id'],
                "name" : data['name'],
                "lastname" : data['lastname'],
                "email" : data['email']
            }

            console.log(data);

            if(data['email'] == "The email has already been taken."){
                alert('حساب دیگری با این ایمیل در سامانه وجود دارد');
            } else if (data['id'] == undefined) {
                alert('عملیات ثبت نام موفق نبود، لطفا از پر بودن و صحت ورودی ها اطمینان حاصل کنید');
            } else {
                let myJson = JSON.stringify(data);
                localStorage.setItem('currentUser' , myJson);

                location.replace( "Q&A.html");
            }
              
        });
    });
    console.log(data); 
}
 