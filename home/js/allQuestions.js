

let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


fetch('http://127.0.0.1:8000/api/question').then(response => {
    response.json().then(data =>{
        console.log(data);
        data.forEach(element => {
            document.getElementById('questions').innerHTML +=
            
           ' <div class="question" dir="rtl" align="right"  required> <a onclick="answer(' + element.id + ')" class="btn-q" ><h1 class="title">' + element.title + '</h1></a><br>'
            +'<h2 class="text-q">' + element.questionText.replaceAll('\n',"</br>") + '</h2></div>'
        });
    });
});




let id;
function load(id){
    document.getElementById('questions').innerHTML = "";
    console.log(id);

    document.getElementById('back').href = "allQuestion.html";

    fetch('http://127.0.0.1:8000/api/question/' + id).then(response => {
        response.json().then(data => {
            document.getElementById('questions').innerHTML +=
            ' <div class="question" dir="rtl" align="right"  required> <a onclick="answer(' + data.id + ')" class="btn-q" ><h1 class="title">' + data.title + '</h1></a><br>'
            +'<h2 class="text">' + data.questionText.replaceAll('\n',"</br>") + '</h2></div>'
        })
    })

    fetch('http://127.0.0.1:8000/api/answer/' + id).then(response => {
        response.json().then(data => {
            data.forEach(element => {
            document.getElementById('answers').innerHTML += 
            '<div class="question" dir="rtl"  align="right" required>' 
            + "<a>" + element.answerText.replaceAll('\n','</br>') +  "</a>"
            + "</div>"
            + "<p></p>" +"<br></br>";
            })
        })
    });



    document.getElementById('addAnswer').innerHTML = 
    '<h2 class="answer" dir="rtl" align="right" required>جواب شما</h2><br>'
    + '<div class="text-area"> <textarea  name="message" rows="10" id="answerTxt" cols="150" dir="rtl" align="right "></textarea> <br><br>'
    +'<button type="submit" onClick="addAnswer(' + id + ')" class="btn-answer">ارسال پاسخ </button></div>'

}




function addAnswer(id){

    if(user == undefined || user == null){
        alert('لطفا وارد سامانه شوید');
        location.href='SignIn.html';
    } else if (document.getElementById('answerTxt').value == ""){
        alert('متن پاسخ نمیتواند خالی باشد');
        document.getElementById('answerTxt').focus();
    } else {
        let answerText = document.getElementById('answerTxt').value;

        let data = {
            "answerText" : answerText,
            "answeredBy" : user.id,
            "questionId" : id
        }


        let request = {
            method : "POST",
    
            headers :{
                "content-Type" : "application/json"
            },
    
            body : JSON.stringify(data)
        }


        fetch("http://127.0.0.1:8000/api/answer",request).then(response =>{
            response.json().then(data =>{
                if (data.id != undefined && data.id != null){
                    alert('پاسخ شما ثبت شد');
                    load(id);
                } else {
                    alert('ثبت پاسخ موفقیت آمیز نبود، لطفا دوباره تلاش کنید');
                }
            })
        })
    }
}



function answer(id) {
    var divAnswer=document.getElementById("div-answer");

    divAnswer.style.marginTop=0;
    document.getElementById("name-page").textContent ="پرسش" ;
    document.getElementById('newbtn').innerHTML = "";

    load(id);
}