<?php
include('parse.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PDF Parser</title>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <style>
*{
   /* margin:0;*/
    padding: 0;
    font-family: sans-serif;
    box-sizing: border-box;
    text-decoration: none;
}

body{
    background: #2c3a47;
}

.container{
    margin-top: 20px;3
    text-align: center;
    position: absolute;
    width: 100%;
}
.container span{
    text-transform: uppercase;
}
.text1{
    color: #e66767;
    font-size: 60px;
    font-weight: 700;
    letter-spacing: 8px;
    animation: text 2s 1;
    margin-top: 20px;
}
@keyframes text {
    0%{
        color: #2c3a47;
        margin-bottom: -30px;
    }
    30%{
        letter-spacing: 25px;
        margin-bottom: -30px;
    }
    /* 85%{
        letter-spacing: 8px;
        margin-bottom: -30px;
    } */
}
#custombutton{
            padding: 12px 50px;
            color: #e66767;
            background-color: #2c3a47;
            border: 1px solid #e66767;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 5%;
            margin-left: 42%;
            transition: .3s linear;
            
}

#custombutton:hover{
    background: #e66767;
    color: #f4f4f4;
}
#custombutton:focus{
    outline:none;
}
#text{
     margin-left: 10px;
     font-family: sans-serif;
     color: #aaa;
}

.next{
    color: white;
    text-align: justify;
    margin-top: 60px;
    margin-left: 40px;
    margin-right: 40px;
    
    white-space: pre-line;
    border:1px solid #e66767;
    border-radius:6px;
}
@media print{
div.p1{
    display:none;
}
div.example{
    display:none;
}
div.next{
    border:none;
    color:black;
}
}

/* 
search-bar */




.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid #e66767;
  color:white;
  border-radius:6px;
  float: left;
  width: 80%;
  background: #2c3a47;
}
.example input[type=text]:focus{
    outline:none;
}

.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2c3a47;
  color: white;
  font-size: 20px;
  border: 1px solid #e66767 ;
  border-radius:6px;
  /*border-left: none;*/
  cursor: pointer;
  transition: .3s linear;
}

.example button:hover {
    background: #e66767;
    color: #f4f4f4;
}

.example::after {
  content: "";
  clear: both;
  display: table;
}
.srch{
    outline:none;
}
</style>
</head>
    <body>
    <div class="example"   style="margin:auto;max-width:300px">

  <input type="text" placeholder="Search.." name="search2" class="search2" id="search2">
  <input type="hidden" name="txt" value="<?=$text;?>"/>
   <button onclick="search_str()" class="srch"><i class="fa fa-search"></i></button>

</div>
   
        
           <div class="next" id="next">           
 <?php echo $text;?>
</div>
     <div class="p1">   
        <button onclick="window.print()" class="btn btn-primary" type="button" id="custombutton">PRINT</button>
    </div>



        
        
    <script>
    function search_str()
    {
        var key=document.getElementById("search2").value;
        if(key==null || key==undefined|| key.length==0)
        return;
        var node = document.getElementById("next");
        textContent = node.textContent;
        var key_lower=key.toLowerCase();
        var textContent_lower=textContent.toLowerCase();
        var n=textContent_lower.search(key_lower);
        var arr_str=[];
        var arr_str1=[];
        var count=0,j=0;
        arr_str[0]="";arr_str1[0]="";
        var pattern=/\n\n/g;
        textContent_lower=textContent_lower.replace(pattern,"\n");
        textContent=textContent.replace(pattern,"\n");
        for(var n=0;n<textContent_lower.length;n++)
        {
            if(textContent_lower.charAt(n)=='\n')
                break;
        }
        for(var i=n+1;i<textContent_lower.length;i++)
        {
            
            if(textContent_lower.charAt(i)=='\n')
                count++;
            arr_str[j]+=textContent_lower.charAt(i);
            arr_str1[j]+=textContent.charAt(i);
            if(count==8)
            {
                j++;
                count=0;
                arr_str[j]="";
                arr_str1[j]="";
            }
        }
        var final_str="";
        for(var i=0;i<arr_str.length;i++)
        {
            
            ind_str=arr_str[i].toString();
            //console.log(ind_str);
            if(ind_str.search(key_lower)!=-1)
            {
                ind_str1=arr_str1[i].toString();
                final_str+=ind_str1;
            //return;
            }
        }
        
        document.getElementById("next").innerHTML = final_str;
        /*if(n==-1)
       {
        return;
       }
       var searched=""
      
       console.log(n,textContent.length);
      for(var i=n;textContent.charAt(i)!='\n' && i<textContent.length;i++)
       {
           searched+=textContent[i];
       }
       
       
       document.getElementById("next").innerHTML = searched;*/
    }
    </script>
     
    </body>
    
</html>