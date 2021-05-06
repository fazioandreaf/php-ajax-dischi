<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesame -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>
    <style>
        body {
            background: purple;
            color: white;
        }
        .allCard{
            display: flex;
            flex-wrap: wrap;
        }
        .card{
            flex-basis:20%;
            margin:1%;
            background-color:green;
            text-align:center;
        }
    </style>
    <script>
        function init() {
            new Vue({
                el: "#app",
                data: {
                    cdArr:[],
                },
                mounted() {
                    axios.get('data.php')
                        .then(r => {
                            this.cdArr=r.data;
                            console.log(this.cdArr);
                        })
                        .catch(e => {
                            console.log(e);
                        })
                }
            });
        }
        document.addEventListener("DOMContentLoaded",init);
    </script>
    <title>PHP</title>
</head>
<body>
        <!--  Attraverso l'utilizzo di Axios: al caricamento
        della pagina axios chiederà attraverso una
        chiamata API i dischi a php e li stamperà
        attraverso vue. 
        OPZIONALE
        - Attraverso un'altra chiamata API, ﬁltrare gli
        album per genere-->
    <div id="app" class="container">
        <div class="row">
                <h1>Dischi</h1>
                <div class="allCard">
                    <div 
                    class="card"
                    v-for="(elem,index) in cdArr">
                        <h2>{{elem.title}}</h2>
                        <div><img :src="elem.poster" alt="" style="width:100px"></div>
                        <h3>{{elem.author}}</h3>
                        <h3>{{elem.genre}}</h3>
                        <h3>{{elem.year}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div></body>    
</html>