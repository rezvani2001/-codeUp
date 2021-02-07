
let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


function submit(){
    let data = {
        'creatorID' : user.id,
        'password' : document.getElementById('classPassword').value,
        'creatorName' : user.name + ' ' + user.lastname,
        'title' : document.getElementById('className').value,
        'classKey' : document.getElementById('classId').value,
    }

    console.log(data['creatorName']);

    let request = {
        method: "POST",

        headers :{
            "content-Type" : "application/json"
        },
        
        body : JSON.stringify(data)
    };

    fetch('http://127.0.0.1:8000/api/classes',request).then(response => {
        response.json().then(data => {
            if(data['classKey'] == "The class key has already been taken.") {
                alert('این شناسه در سامانه موجود است، لطفا شناسه جدیدی برای کلاس برگزینید');
                document.getElementById('classId').focus();
            } else if(data['id'] == undefined){
                alert('کلاس شما ساخته نشد، لطفا از تکمیل بودن تمام فیلد ها اطمینان حاصل کنید');
            }
            else{
                console.log(data);
                alert('کلاس شما ساخته شد');
                location.replace('allclass.html');
            }
        })
    });
}