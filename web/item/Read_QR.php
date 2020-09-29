<!DOCTYPE html>

<html>

<head>
    <title>QR Reader</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="stylesheet.css">

    <style type="text/css">
        #header-nav {
            width: 450px;
            position: relative;
        }
        
        li {
            text-align: center;
            margin-left: 10px;
            margin-right: 10px;
            list-style: none;
        }
        
        ul {
            display: flex;
        }
    </style>
</head>

<body>
    <div id="header" class="min">
        <div id="body-header">
            <div id="header-logo">
            <img src="web_assets\e.png" style="height: 95px; width: 180px">
            </div>
            <div id="header-nav">
                <ul>
                    <li>
                        <a href="https://e-lock.herokuapp.com/item/Home.php">Home</a>
                    </li>
                    <li>
                        <a href="https://e-lock.herokuapp.com/item/Profile.php">Company Profile</a>
                    </li>
                    <li>
                        <a href="https://e-lock.herokuapp.com/item/Get_Locker.php">Get Locker</a>
                    </li>
                    <li>
                        <a href="https://e-lock.herokuapp.com/item/Read_QR.php">Read Locker</a>
                    </li>
                    <li>
                        <a href="https://e-lock.herokuapp.com/item/Register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content" class="min">
        <div style="margin: auto; width: 250px;">
             
            <form action="updateTransact.php" method="COOKIE">
                <input type='file' id="readerQR" accept='image/*' onchange='openFile(event)'><br>
                <button onclick="decoder()">Decode</button>
            </form>
            
            <script type="text/javascript" src="./srcJava/grid.js"></script>
            <script type="text/javascript" src="./srcJava/version.js"></script>
            <script type="text/javascript" src="./srcJava/detector.js"></script>
            <script type="text/javascript" src="./srcJava/formatinf.js"></script>
            <script type="text/javascript" src="./srcJava/errorlevel.js"></script>
            <script type="text/javascript" src="./srcJava/bitmat.js"></script>
            <script type="text/javascript" src="./srcJava/datablock.js"></script>
            <script type="text/javascript" src="./srcJava/bmparser.js"></script>
            <script type="text/javascript" src="./srcJava/datamask.js"></script>
            <script type="text/javascript" src="./srcJava/rsdecoder.js"></script>
            <script type="text/javascript" src="./srcJava/gf256poly.js"></script>
            <script type="text/javascript" src="./srcJava/gf256.js"></script>
            <script type="text/javascript" src="./srcJava/decoder.js"></script>
            <script type="text/javascript" src="./srcJava/qrcode.js"></script>
            <script type="text/javascript" src="./srcJava/findpat.js"></script>
            <script type="text/javascript" src="./srcJava/alignpat.js"></script>
            <script type="text/javascript" src="./srcJava/databr.js"></script>
            <script>
                var dataURL;
                var passQR;
                function decodeImageFromBase64(data, callback){
                    qrcode.callback = callback;
                    qrcode.decode(data)
                }

                var openFile = function(file) {
                    var readerQR = document.getElementById("readerQR").Value;
                    var input = file.target;

                    var reader = new FileReader();
                    reader.onload = function(){
                    dataURL = reader.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                };

                function createCookie(name, value) { 
                    document.cookie = escape(name) + "=" +  
                        escape(value) + "; path=/"; 
                } 

                function decoder() {
                    decodeImageFromBase64(dataURL,function(decodedInformation){
                        passQR = decodedInformation;
                        createCookie("passQR",passQR); 
                    });
                }              
            </script>

        </div>
    </div>
    <div id="footer" class="min">
        <div id="body-footer">
            <h2 style="margin-left: 60px;">E-Lock</h2>
            <ul>
                <li>
                    <a href=" https://www.instagram.com/elock_official " target="_blank">
                        <img src="web_assets\instagram.svg " alt=" ">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/Elock92961347 " target="_blank">
                        <img src="web_assets\twitter.svg " alt=" ">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/elockofficial/ " target="_blank">
                        <img src="web_assets\facebook.svg " alt=" ">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>