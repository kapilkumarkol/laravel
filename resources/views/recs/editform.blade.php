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
    <h1>Edit cars Details</h1>
    <form id="myform" onsubmit="return change()">
        <div class="mb-3">
            <label for="carname" class="form-label">Car Model Name</label>
            <input type="text" class="form-control"  id="carname" placeholder="car name"  required>
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
            <button class="btn btn-primary" type="submit" id="bt1">save Changes</button>
            <button class="btn btn-secondary" type="button" id="bt2">View list</button>
          </div>
    </form>
    
   </div>
   <script>
            alert('Note:-dont refresh the page otherwise data will be lost and you have to edit data again to commit changes!!!!!');
         const bt1=document.querySelector('#bt1');
         const bt2=document.querySelector('#bt2');
            bt2.addEventListener('click',()=>{
            window.location.href='/carlist';
            });
        let res=localStorage.getItem('data');
            res=JSON.parse(res);
            // console.log(res);
       let id=res.id;
       let carname=res.model;
       let company=res.company;
       let stock=res.stock;
       let city=res.city;
       let carName=document.querySelector('#carname');
       let companyName=document.querySelector('#company');
       let stockName=document.querySelector('#stock');
       let cityName=document.querySelector('#city');
                carName.value=carname;
                companyName.value=company;
                stockName.value=stock;
                cityName.value=city;
                localStorage.clear();
       function change(){
         return false;
       }

       bt1.addEventListener('click',()=>{
        var crnm=document.querySelector('#carname').value;
            var cmpnm=document.querySelector('#company').value;
            var stknm=document.querySelector('#stock').value;
            var ctnm=document.querySelector('#city').value;
                    let obj=new XMLHttpRequest();
                        obj.open('GET','/changedata/'+id+'/'+crnm+'/'+cmpnm+'/'+stknm+'/'+ctnm,true);
                        obj.addEventListener('readystatechange',()=>{
                            if(obj.readystate==4 || obj.Status==200){
                                var res=obj.responseText;
                                res=JSON.parse(res);
                                console.log(res);
                            }
                        })
                        obj.send();
                        document.getElementById("myform").reset();
       });

       bt1.addEventListener('click',()=>{
        window.location.href='/carlist';
       });
        



       

                
   </script>
</body>
</html>