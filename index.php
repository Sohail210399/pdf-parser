
<html>
    <head>
        <meta charset="utf-8">
        <title>PDF Parser</title>
        
        <style>
*{
    margin:0;
    padding: 0;
    font-family: sans-serif;
    box-sizing: border-box;
    text-decoration: none;
}

body{
    background: #2c3a47;
}

.container{
    margin-top: 20px;
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
            margin-top: 20%;
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

.parse{
    display: inline-block;
    padding: 12px 50px;
    color: #e66767;
    border: 1px solid #e66767;
    background-color: #2c3a47;
    border-radius: 6px;
    margin-top: 25px;
    transition: .3s linear;
    margin-left: 42%;
    width: 190px;
}

.parse:hover{
    background: #e66767;
    color: #f4f4f4;
}
.parse:focus{
    outline:none;
}

#text{
     margin-left: 10px;
     font-family: sans-serif;
     color: #aaa;
}
        </style>
    </head>
    <body>
        <div class="container">
            <span class="text1">PDF Parser</span>
        </div>

     <div>  
     <form name="file_upload" method="post" action="print.php"  enctype="multipart/form-data" onsubmit="return check_empty()"> 
        <input type="file" id="file" name="file" hidden="hidden"/>
            <button type="button" id="custombutton">CHOOSE  FILE</button>
            <span id="text">No file chosen</span>
        </div>
        </div>
            <input type="submit" class="parse" value="PARSE"  ></input>
        </div>
    </form>
        
        
        
        <script type="text/javascript">
        const file = document.getElementById("file");
        const custombtn = document.getElementById("custombutton");
        const customtxt = document.getElementById("text");

        custombtn.addEventListener("click", function(){
            file.click();
        }
        );

        file.addEventListener("change", function(){
            if(file.value){
                customtxt.innerHTML = file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            }else{
                customtxt.innerHTML = "No file chosen";
            }
        }
        );
        function check_empty()
        {
            var x = document.forms["file_upload"]["file"].value;
            if (x == "") {
                alert("No file chosen!!");
                return false;
            }
        }
        
        </script>
    </body>
</html>