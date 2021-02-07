
let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


fetch('http://127.0.0.1:8000/api/classes/relation/' + user.id).then(response =>{
    response.json().then(data => {
        console.log(data);
        if(data[0] == null) {
            document.getElementById('allClasses').innerHTML = '<br><br><div><h1 dir="rtl" align="center"> شما در کلاسی عضو نیستید </h1></div><br>';
        } 
        else {
            data.forEach(element => {
                document.getElementById('allClasses').innerHTML += '<br><div> <h1 class="text-class" dir="rtl" align="right"> اسم کلاس: ' + element.className + ' ( استاد: ' + element.creatorName +  ')</h1>'
                 + '<button type="submit" onclick="getClass(' + element.classId + ')" class="btn-signIn">ورود به کلاس</button></div>';
            });
        }
    })
})



function getClass(id){
    localStorage.setItem('currentClass' , id);
    location.href='class.html';
}

let cToJoin;

function search(){
    if (document.getElementById('search').value == ""){
        document.getElementById('searchRes').innerHTML = "";
    }else {

        fetch('http://127.0.0.1:8000/api/classes/find/' + document.getElementById('search').value).then(response =>{
            response.json().then(data=>{
                if(data.id == undefined){
                    document.getElementById('searchRes').innerHTML = '<h1 dir="rtl">کلاسی یافت نشد</h1>';
                } else {
                    document.getElementById('searchRes').innerHTML = '<button onclick="find(' + data.id + 
                    ')"><h1 dir="rtl">اسم کلاس: ' + data.title + ' استاد: ' + data.creatorName + '</h1></button>';
                }
            })
        })
    }
    if (document.getElementById('search').value == ""){
        document.getElementById('searchRes').innerHTML = "";
    }
}


function find(data){
    localStorage.setItem('ctj' , data);
    location.href = 'signInClass.html';
}