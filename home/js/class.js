

let currentUser = localStorage.getItem('currentUser');
let user = JSON.parse(currentUser);


let cclass;

fetch('http://127.0.0.1:8000/api/classes/' + localStorage['currentClass']).then(response=>{
    response.json().then(data=>{
        cclass = data;

        document.getElementById('detail').innerText = 'نام کلاس: ' + data.title + '\nنام استاد: ' + data.creatorName;
        if(cclass.creatorID == user.id){
            document.getElementById('newWork').innerHTML = '<a href="newQusetion.html"><button type="submit" class="btn-newQ">تمرین جدید + </button></a>';
        }

        localStorage.setItem('cclass' , JSON.stringify(cclass));


        fetch('http://127.0.0.1:8000/api/works/' + cclass.id).then(response=>{
            response.json().then(data=>{
                if(data[0] == undefined ){
                    document.getElementById('works').innerHTML = '<h1 class="name-class">  تمرینی برای این کلاس در نظر گرفته نشده است</h1>';
                } else {
                    data.forEach(element => {
                        document.getElementById('works').innerHTML += '<a onclick="loadWork(' + element.id + ')"><button type="submit" class="btn">' + element.title + '</button><br></a>';
                    });
                }
            })
        })
    })
})
        
    


function loadWork(id){
    fetch('http://127.0.0.1:8000/api/works/get/' + id).then(response=>{
        response.json().then(data=>{
            localStorage.setItem('cc' , JSON.stringify(cclass));

            localStorage.setItem('currentWork' , JSON.stringify(data));
            location.href = 'exercise.html';
        })
    })
}
