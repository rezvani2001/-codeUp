const url = "http://127.0.0.1:8000/api/user/";

let user;


function clicked(){
    
    let mail =  document.getElementById('lEmail').value + '/';
    let pass =  document.getElementById('lPass').value;

    if(mail == "/"){
        alert("email is required");
        document.getElementById("lEmail").focus();
    }else {
        if(pass == ""){
            alert("password is required");
            document.getElementById("lPass").focus();
        }else{
            fetch(url + mail + pass)
            .then(response => response.json())
            .then(data =>{
                console.log(data);
                if (data[0] == "not found"){
                    document.getElementById("lEmail").focus();
                    alert('email not found');
                } else if(data[0] == "wrong password"){
                    document.getElementById("lPass").focus();
                    alert('wrong password');
                }else{

                    user = {
                        "id" : data['id'],
                        "name" : data['name'],
                        "lastname" : data['lastname'],
                        "email" : data['email']
                    }

                    let myJson = JSON.stringify(data);

                    localStorage.setItem('currentUser' , myJson);
                    location.replace( "Q&A.html");

                    console.log(user);

                }
            });
        }
    }
}