<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <title>Calculadora</title>

    </head>
    <body >
        <div class="container-fluid vh-100">
            <div class="row">
                <div class="col-lg-12 border p-1 h-100px border-primary" id="textArea">
                    <div class="row d-flex flex-row">
                        <div class="col-lg-1" id="x-1">

                        </div>
                        <div class="col-lg-1" id="sign-1">
                            
                        </div>
                        <div class="col-lg-1" id="y-1">

                        </div>
                        
                        <div class="col-lg-1" id="igual-1">
                            
                        </div>
                        <div class="col-lg-1" id="valor-1">
                            
                        </div>
                    </div>
                    <div class="row d-flex flex-row">
                        <div class="col-lg-1" id="x-2">

                        </div>
                        <div class="col-lg-1" id="sign-2">
                            
                        </div>
                        <div class="col-lg-1" id="y-2">

                        </div>
                        <div class="col-lg-1" id="igual-2">
                            
                        </div>
                        <div class="col-lg-1" id="valor-2">
                            
                        </div>
                    </div>
                    <div class="row d-flex flex-row">
                        <div class="col-lg-4" id="x_result">
                            
                        </div>
                        <div class="col-lg-4" id="y_result">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-around">
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">1</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">2</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">3</div>
                <div class="bg-secondary buttons border buttons-sh d-flex justify-content-center align-items-center shadow text-white font-weight-bold" onclick="add(this)">+</div>
            </div>
            <div class="row mt-4 d-flex justify-content-around">
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">4</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">5</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">6</div>
                <div class="bg-secondary buttons buttons-sh border d-flex justify-content-center align-items-center shadow text-white font-weight-bold" onclick="add(this)">-</div>
            </div>
            <div class="row mt-4 d-flex justify-content-around">
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">7</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">8</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">9</div>
                <div class="bg-secondary buttons-sh buttons border d-flex justify-content-center align-items-center shadow text-white font-weight-bold" onclick="add(this)">x</div>
            </div>
            <div class="row mt-4 d-flex justify-content-around">
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">+/-</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">0</div>
                <div class="buttons buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">.</div>
                <div class="bg-secondary buttons buttons-sh border d-flex justify-content-center align-items-center shadow text-white font-weight-bold" onclick="add(this)">y</div>
            </div>
            <div class="row mt-4 d-flex justify-content-around">
                <div class="enter buttons-white border d-flex justify-content-center align-items-center shadow" onclick="add(this)">ENTER</div>
                <div class="button-igual border d-flex justify-content-center align-items-center shadow" onclick="add(this)">=</div>
            </div>
            <div class="row mt-4 d-flex justify-content-around">
                <div class="resolver buttons-white border d-flex justify-content-center align-items-center shadow" onclick="calculate()">RESOLVER</div>
                <div class="button-igual border d-flex justify-content-center align-items-center shadow" onclick="add(this)">M</div>
                <div class="button-igual border d-flex justify-content-center align-items-center shadow" onclick="add(this)">C</div>
            </div>
            @csrf
        </div>
    </body>
    <style>
        .h-100px{
            height:100px;
        }

        .buttons{
            height:80px;
            width:20%;
        }

        .enter{
            height:80px;
            width:60%;
        }

        .resolver{
            height:80px;
            width:40%;
        }

        .buttons:hover ,.enter:hover{background-color:#e1ebe9}

        .buttons-sh:hover{
            background-color:#babfbe !important;
        }

        .buttons:active ,.enter:hover{
            background-color: #adbab8;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .buttons-sh:active{
            background-color: #adbab8;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

       .button-igual{
            background-color:#b568d9;
            height:80px;
            width:20%;
       }

       .button-igual:hover {
            background-color: #cb82ed;
        }

        .button-igual:active{
            background-color: #ac61cf;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

    </style>
    <script>
        let textArea = null;
        let x1,x2,sign1,igual1,valor1,y1,y2,igual2,valor2 = null;
        let xResult = null;
        let yResult = null;

        let x1typed,y1Typed,sign1Typed,igual1Typed,valor1Typed = false;
            let x2typed,y2Typed,sign2Typed,igual2Typed,valor2Typed = false;
            let enter = false;

        const memoryUrl = "{{url('memory')}}";
        const calculateUrl = "{{url('calculate')}}";
        const numbers = ["1","2","3","4","5","6","7","8","9","0","."];

        document.addEventListener("DOMContentLoaded",(event)=>{
            textArea = document.getElementById("textArea");
            x1 = document.getElementById("x-1");
            x2 = document.getElementById("x-2");
            sign1 =  document.getElementById("sign-1");
            sign2 =  document.getElementById("sign-2");
            y1 = document.getElementById("y-1");
            y2 = document.getElementById("y-2");
            igual1 = document.getElementById("igual-1");
            igual2 = document.getElementById("igual-2");
            valor1  = document.getElementById("valor-1");
            valor2  = document.getElementById("valor-2");
            xResult = document.getElementById("x_result");
            yResult = document.getElementById("y_result");

        });

        function add(tecla){
            let value = tecla.innerHTML;
          

            if(numbers.includes(value)){
                if(!x1typed){
                    
                    let valueX1 = x1.innerText;
                    if(value != "."){
                        x1.innerHTML = valueX1 + value;
                    }else{
                        x1.innerHTML = valueX1.includes(".") ? valueX1 : valueX1 + "."; 
                    }
                }

                if(sign1Typed && !y1Typed){
                    let valueX2 = y1.innerText;
                    if(value != "."){
                        y1.innerHTML = valueX2 + value;
                    }else{
                        y1.innerHTML = valueX2.includes(".") ? valueX2 : valueX2 + "."; 
                    }
                }

                if(x1typed && enter && !x2typed){
                    let valueX1 = x2.innerText;
                    if(value != "."){
                        x2.innerHTML = valueX1 + value;
                    }else{
                        x2.innerHTML = valueX1.includes(".") ? valueX1 : valueX1 + "."; 
                    }
                }

                if(sign2Typed && enter && !y2Typed){
                    let valueX2 = y2.innerText;
                    if(value != "."){
                        y2.innerHTML = valueX2 + value;
                    }else{
                        y2.innerHTML = valueX2.includes(".") ? valueX2 : valueX2 + "."; 
                    }
                }

                if(igual1Typed && !enter){
                    valor1.innerHTML = value;
                }

                if(igual2Typed){
                    valor2.innerHTML = value;
                }
            }

            if(value == "x"){
                if(!x1typed){
                    let valueX1 = x1.innerText;
                    x1.innerHTML = valueX1 + value;
                    x1typed = true;
                }

                if(x1typed && enter && !x2typed){
                    let valueX1 = x2.innerText;
                    x2.innerHTML = valueX1 + value;
                    x2typed = true;
                }
            }

            if(value == "+" || value == "-"){
                if(x1typed && !sign1Typed){
                    sign1.innerHTML = value;
                    sign1Typed = true;
                }

                if(x2typed && !sign2Typed){
                    sign2.innerHTML = value;
                    sign2Typed = true;
                }
            }

            if(value == "y"){
                if(sign1Typed && !y1Typed){
                    let valueY1 = y1.innerText;
                    y1.innerHTML = valueY1 + value;
                    y1Typed = true;
                }

                if(sign2Typed && enter && !y2Typed){
                    let valueY1 = y2.innerText;
                    y2.innerHTML = valueY1 + value;
                    y2Typed = true;
                }
            }

            if(value == "="){
                if(!igual1Typed && y1Typed){
                    igual1.innerHTML= value;
                    igual1Typed = true;
                }

                if(igual1Typed && y2Typed && !igual2Typed){
                    igual2.innerHTML= value;
                    igual2Typed = true;
                }
            }

            if(value == "ENTER") {
                enter = true;
                save();
            }

            if(value == "C"){
                limpiar();
            }

            if(value == "M"){
                save();
            }
        }

        function limpiar(){
            x1.innerHTML = "";                 
            x2.innerHTML = "";                 
            sign1.innerHTML =  "";                    
            sign2.innerHTML =  "";                    
            y1.innerHTML = "";                 
            y2.innerHTML = "";                 
            igual1.innerHTML = "";
            igual2.innerHTML = "";
            valor1.innerHTML  = "";
            valor2.innerHTML  = "";
            xResult.innerHTML = "";
            yResult.innerHTML = "";
            x1typed = false;
            y1Typed = false;
            sign1Typed = false;
            igual1Typed = false;
            valor1Typed = false;
            x2typed = false;
            y2Typed = false;
            sign2Typed = false;
            igual2Typed = false;
            valor2Typed = false;
            enter = false;
        }

        function save(){
            const token = document.querySelector('[name="_token"]');
            let texto = formula();
                let data = {
                    texto
                }

                fetch(memoryUrl,{
                    headers:{
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token.value
                    },
                    method:'POST',
                    body: JSON.stringify(data)
                })
        }

        function formula(){
            let x1value = x1.innerText;                 
            let x2value = x2.innerText;                 
            let sign1value = sign1.innerText;                    
            let sign2value = sign2.innerText;                    
            let y1value = y1.innerText;                 
            let y2value = y2.innerText; 
            let valor1Value = valor1.innerText ;
            let valor2Value = valor2.innerText ;
            let formula = {
                x1value,
                x2value,
                sign1value,
                sign2value,
                y1value,
                y2value,
                valor1Value,
                valor2Value
            };
            return formula;
        }

        function calculate(){
            const token = document.querySelector('[name="_token"]');
            let texto = formula();
            let data = {
                texto
            };

            let x1 = parseFloat(texto.x1value.replace("x",""));
            let x2 = parseFloat(texto.x2value.replace("x",""));
            let y1 = parseFloat(texto.y1value.replace("y","")) * (texto.sign1value == "+" ? 1 : -1);
            let y2 = parseFloat(texto.y2value.replace("y","")) * (texto.sign2value == "+" ? 1 : -1);
            let valor1 = parseFloat(texto.valor1Value);
            let valor2 = parseFloat(texto.valor2Value);

            let contrario = x2 * -1;

            x1 = x1 * contrario;
            y1 = y1 * contrario;
            x2 = x2 * x1;
            y2 = y2 * x1;
            let x_res = x1 + x2;
            let y_res = y1 + y2;

            let x, y = 0;
            if(x_res != 0){
                x = valor1 / x_res;
            }else{
                contrario = y2 * -1;

                x1 = x1 * contrario;
                y1 = y1 * contrario;
                x2 = x2 * y1;
                y2 = y2 * y1;
                let x_res = x1 + x2;
                let y_res = y1 + y2;
                x = valor1 / x_res;
            }

            if(y_res != 0){
                y = valor2/ y_res;
            }

            xResult.innerHTML = "X = " + x;
            yResult.innerHTML = "Y = " + y;

            data.resultado = {x,y};
            fetch(calculateUrl,{
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token.value
                },
                method:'POST',
                body: JSON.stringify(data)
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
