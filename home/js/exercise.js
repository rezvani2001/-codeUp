

let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);

let cclass = JSON.parse(localStorage.getItem('cc'));


let work = JSON.parse(localStorage.getItem('currentWork'));

document.getElementById('title').innerText = work.title;
document.getElementById('des').innerText = work.explainWork;


if(user.id == cclass.creatorID){
    document.getElementById('sbtn').innerText = 'جواب های ارسالی';
    document.getElementById('sbtn').onclick = function () {
        location.href = 'allExercise.html'
    };

    document.getElementById('ans').innerHTML ="";

}


if (work.filePath == null) {
    document.getElementById('file').innerText = "";
} else {
    fetch('http://127.0.0.1:8000/api/works/file/' + work.id).then(response=>{
        response.json().then(data =>{
            console.log(data[0]);
            document.getElementById('dlbtn').onclick = function() {
                window.open(data[0]);
            }
        })
    })
}


function submitSolution(){
    let file = document.getElementById('ansfile').files[0];



    let data = new FormData();

    data.append("submitter" , user.id);
    data.append("workId" , work.id);
    data.append("exp" , "hey");
    data.append("filePath" , file);



   
    console.log(data);

    request = {
        method: "POST",
    
        headers :{
            "Accept" : "application/json"
        },
            
        body : data
    };

    fetch('http://127.0.0.1:8000/api/solution' , request ).then(response => {
        response.json().then(data => {
            if(data[0] == "failed") {
                alert('آپلود فایل با مشکل مواجه شد! لطفا دوباره تلاش کنید');
            } else {
                console.log(data);
                alert('فایل شما با موفقیت ثبت شد');
            }
        });
            
    });

}


