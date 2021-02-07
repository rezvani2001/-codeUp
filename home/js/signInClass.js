

let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);

let cToJoin = localStorage.getItem('ctj');

console.log(cToJoin);

fetch('http://127.0.0.1:8000/api/classes/' + cToJoin).then(response => {
    response.json().then(data => {
        document.getElementById('content').innerHTML = '<p class="name-class" id="content" dir="rtl">نام کلاس: ' + data.title + '<br> نام استاد: ' + data.creatorName + '</p>';
    })
})


function submit(){

    fetch('http://127.0.0.1:8000/api/classes/join/' + cToJoin + '/' + user.id + '/' + document.getElementById('pass').value).then(response=>{
        console.log(document.getElementById('pass').value);
        response.json().then(data => {
            console.log(data);
            if (data[0] == 'done'){
                alert('با موفقیت به کلاس وارد شدید');
                location.href = 'allClass.html';
            }else {
                alert('پسوورد کلاس اشتباه است');
                document.getElementById('pass').focus();
            }
        })
    })
}


