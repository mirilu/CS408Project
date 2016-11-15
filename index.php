<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <script type ="text/javascript" lang="Javascript">

            function changetoPop() {
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('mainpage').setAttribute('class', 'is-blurred')
                login('show');

            }

            function showInput() {
                if(document.getElementById("user_input").value == ""){
                    document.getElementById('display').innerHTML =
                        "guest" + Math.floor((Math.random() * 10000) + 1);
                }
                else{   
                document.getElementById('display').innerHTML =
                        document.getElementById("user_input").value;
            }
                login('hide');

            }

            function giveUsername() {
                document.getElementById('display').innerHTML =
                        "guest" + Math.floor((Math.random() * 10000) + 1);
                login('hide');
            }

            function login(showhide) {
                if (showhide === "show") {
                    document.getElementById('popup').style.visibility = "visible";
                } else if (showhide === "hide") {
                    document.getElementById('overlay').style.display = 'none';
                    document.getElementById('mainpage').setAttribute('class', 'null')
                    document.getElementById('popup').style.visibility = "hidden";

                }
            }

        </script>
        <meta charset="UTF-8">
        <title>ChatRoom</title>
        <style type="text/css">
            #popup{
                margin: 100; 
                margin-left: 35%; 
                margin-right: 40%;
                margin-top: 70px; 
                padding-top: 20px; 
                width: 30%; 
                height: 180px; 
                position: fixed; 
                background: #F8F8FF; 
                border: solid #000000 1px; 
                z-index: 9; 
                font-family: Helvetica; 
                visibility: hidden; 
            }
            #mainpage{
                width: 95%;
                height: 80vh;
                border: solid 17px beige;
                padding: 15px;
                overflow: auto;
                position: relative;
                font-family: Tahoma;
           
            }
            
            #chatbox{
                width: 94%;
                height: 75vh;  
                border: solid 1px black; 
            }
            
           
            .is-blurred {
                position: absolute;
                -webkit-filter: blur(6px);
                -moz-filter: blur(6px);
                -ms-filter: blur(6px);
                -o-filter: blur(6px);
                filter: blur(6px);

            }
            
            
            #overlay    {
                position: fixed;
                display: none;
                left: 0px;
                top: 0px;
                right: 0px;
                bottom: 0px;
                background: rgba(255,255,255,.8);
                z-index: 999;
            }

        </style>

    </head>

    <body>
        <div id ='overlay'>


            <div id = "popup">      
                <form action = "javascript:;" method = "post" name="login">
                    <br><center> Must have a username: </center> 
                    <br> <center>Enter a username or leave blank and click "Enter"</center></br>
                    <center><input type="text" id = "user_input" size="40" /> <br></center>
                    <center><input type="submit" value="Enter" name="Enter" onclick = "showInput();"/> </center>
                </form>
            </div> 
        </div>
        <h1><center> Welcome to the Chat Room </center></h1>

        <div id ="mainpage">
            <div id ="chatbox">
                    <span id ="display" style = " bottom:0;"></span>
                </div>
            <form action = "javascript:; " method="post"> 
                
                <br>
                <input type="text" name="typechat" placeholder = "Type here" size="100"
                       style = "position: relative;"/>
                
                <input type="submit" value="Submit" style = "float: bottom;" onclick ="changetoPop();"/>
                
                
                <br>
                <?php
                
                
                ?>

            </form>

        </div>

    </body>
</html>
