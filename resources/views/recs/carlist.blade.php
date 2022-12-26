<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align:center;
            padding:5px;
            background-color: rgb(0, 166, 255);
            
            margin-top:20px;
        }
       #bt2{
            float: right;
            margin-right: 20px;
        }
        #bt1{
            margin-left: 20px;
        }

    </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h1>Car Details</h1><hr>

        <button type="button" class="btn btn-primary btn-sm" id="bt1">View List</button>

        <button type="button" class="btn btn-secondary btn-sm" id="bt2">Add Details</button>


    <hr>
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Car Name</th>
      <th scope="col">Company name</th>
      <th scope="col">Stock</th>
      <th scope="col">City</th>
      <th scope="col">Created-At</th>
      <th scope="col">Updated-At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tbl">

  </tbody>
 </table>



      <script>
        
        const bt1 =document.querySelector('#bt1');
        const bt2 =document.querySelector('#bt2');
        const table =document.querySelector('#tbl');
        bt1.addEventListener('click',()=>{
        let obj=new XMLHttpRequest();
        obj.open('GET','reclist',true);
        obj.addEventListener('readystatechange',()=>{
            table.innerHTML="";
            if(obj.readyState==4 && obj.status==200){
                var res=obj.responseText;
                res=JSON.parse(res);
                console.log(res);
                let i=0;
                for(x of res){
                    let row=table.insertRow(i++);
                    // console.log(x.id);
                    let j=0;
                    for(y in x){
                        let col=row.insertCell(j++);
                        col.innerText=x[y];
                        if(j==Object.keys(x).length){
                            col=row.insertCell(j++);
                            col.innerHTML=`<button type="button" class="btn btn-outline-success" onclick="goto(${x.id});senddata(${x.id})">Edit</button> <button type="button" onclick="del(${x.id})" class="btn btn-outline-danger">Delete</button>`

                        }
                    }
                }

            }
        })
        obj.send();
       });

       bt2.addEventListener('click',()=>{
        window.location.href='/viewform';
       });

       function goto(id){
        window.location.href='/editform/'+id;
       }
       function senddata(id){
        let reqObj=new XMLHttpRequest();
            reqObj.open('GET','senddata/'+id,true);
            reqObj.addEventListener('readystatechange',()=>{
                if(reqObj.readyState==4 || reqObj.Status==200){
                    var res=reqObj.responseText;
                    var result=JSON.parse(res);
                   localStorage.setItem('data', JSON.stringify(result));  
                }
                
                    
            });
            reqObj.send();
        
       }

       function del(id){
        let del=new XMLHttpRequest();
            del.open('GET','deldata/'+id,true);
            del.addEventListener('readystatechange',()=>{
                if(del.readyState==4 || del.Status==200){
                    var res=del.responseText;
                    var d=JSON.parse(res);
                   console.log(d); 
                }
                
                    
            });
            del.send(); 
       }
      </script>

</body>
</html> 
