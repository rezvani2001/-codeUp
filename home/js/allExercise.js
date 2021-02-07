
let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


let work = JSON.parse(localStorage.getItem('currentWork'));


fetch('http://127.0.0.1:8000/api/solution/' + work.id).then(response=>{
    response.json().then(data => {
        console.log(data);
        if (data[0] == undefined){
            document.getElementById('table').innerHTML = "پاسخی برای این تمرین ارسال نشده است";
        } else {
            data.forEach(element =>{
                fetch('http://127.0.0.1:8000/api/user/' + element.submitter).then(response=>{
                    response.json().then(data => {
                        console.log(data);
                        document.getElementById('table').innerHTML += '<tr class="student"><td class="name-student">' + data.name + data.lastname + '</td><td><button class="btn"' +
                        'onclick="load(' + element.id + ')">دریافت فایل</button> </td></tr>';
                    })
                })
            });
        }
    })
})


                
                
                    
               
function load(id){
    fetch('http://127.0.0.1:8000/api/solution/file/' + id).then(response=>{
        response.json().then(data => {
            window.open(data[0]);
        })
    })
    
}
            