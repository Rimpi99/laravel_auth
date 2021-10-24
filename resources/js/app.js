// require('./bootstrap');

window.updateTask = async (id,token,sts) =>{
    console.log(id,token,sts);

    const fd = new FormData();
    fd.append("task_id",id);
    fd.append("status",sts);
    fd.append("_token",token);

    let raw = await fetch("/api/todos/status",{
        body:fd,
        method:"POST",
        headers:{
            'API-KEY':"helloatg"
        }
    });
    let response = await raw.json();
    if(response.status === 1){
        window.location.reload();
    }
    console.log(response);
}


window.addTask = async (id,token) =>{
    let task = document.querySelector("#floatingTextarea2").value;
    console.log(id,token,task);

    const fd = new FormData();
    fd.append("task",task);
    fd.append("id",id);
    fd.append("_token",token);

    let raw = await fetch("/api/todos/add",{
        body:fd,
        method:"POST",
        headers:{
            'API-KEY':"helloatg"
        }
    });
    let response = await raw.json();
    if(response.status === 1){
        window.location.reload();
    }
    console.log(response);
}