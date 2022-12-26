<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <style>
         h1{
          
           
          text-align:center;
          padding:5px;
          background-color: rgb(0, 166, 255);
          
          margin-top:20px;
      }
      #cont{
        border:2px solid rgb(0, 166, 255);
      }
      label{
        font-weight: bold;
      }
    </style>
</head>
<body>
   <div class="container" id="cont">
    <h1>Add cars Details</h1>
    <form id="myform" onsubmit="return task()">
        <div class="mb-3">
            <label for="carname" class="form-label">Car Model Name</label>
            <input type="text" class="form-control" id="carname" placeholder="car name" required>
          </div>
          <div class="mb-3">
            <label for="company" class="form-label">Company name</label>
            <input type="text" class="form-control" id="company" placeholder="company name" required>
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" placeholder="Stock Quantity" required>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" placeholder="City" required>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit" id="bt1">Add Details</button>
            <button class="btn btn-secondary" type="button" id="bt2">View list</button>
          </div>
    </form>
    
   </div>
   <script>
        const bt1=document.querySelector('#bt1');
        const bt2=document.querySelector('#bt2');
        
        bt2.addEventListener('click',()=>{
            window.location.href='/carlist';
        });
       function task(){
        let req=new XMLHttpRequest();
            const carname=document.querySelector('#carname').value;
            const company=document.querySelector('#company').value;
            const stock=document.querySelector('#stock').value;
            const city=document.querySelector('#city').value;
            req.open('GET','/savedata/'+carname+'/'+company+'/'+stock+'/'+city,true);
            req.addEventListener('readystatechange',()=>{
                // if(req.readyState==4 && req.Status==200){
                    
                // }
                var res=req.responseText;
                    res=JSON.parse(res);
                    // console.log(res);  

                document.getElementById("myform").reset();
            });
            req.send();
        
            return false;
       }

   </script>
</body>
</html>