
let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


function submitIt(){
    let subject = document.getElementById('subject').value;
    let content = document.getElementById('text').value;

    if (user == undefined) {
        alert('لطفا وارد سامانه شوید')
        location.replace('signIn.html');
    }

    let data = {
        "questionText" : content,
        "title" : subject,
        "askedBy" : user.id
    }

    let request = {
        method : "POST",

        headers :{
            "content-Type" : "application/json"
        },

        body : JSON.stringify(data)
    }


    fetch('http://127.0.0.1:8000/api/question' , request).then(Response => {
        Response.json().then(data => {
           
            if (data.title == "The title field is required.") alert('موضوع نمی تواند خالی باشد');
            else if (data.questionText == "The question text field is required.") alert('متن پرسش نمیتواند خالی باشد');
            else {
                alert('پرسش شما ثبت شد');
                location.replace ('allQuestion.html');
            }
        })
    })

}