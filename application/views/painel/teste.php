
<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->
          <div class="card" >
            <div class="card-header mg-b-30" id="dash-professor-card-title">
              
            </div>

            <div class="card-body">
             
              <div class="row mg-b-30">
                <div class="col-lg-10 col-lg-offset-1 ">
                  <div class="titulo-pergunta" >
                    <canvas onmousedown="cliqueMouse" id="myCanvas" width="650" height="470"></canvas>
  
    <script>
    window.requestAnimFrame = (function(callback) {
      return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 1);
      };
    })();
    //--------------------------------------------------------------------------------------------------
    var canvas = document.getElementById('myCanvas');
    var ctx = canvas.getContext('2d');
    var px = 270;
    var py = 230;
    var dx = 410;
    var px1 = 120;
    var py1 =  -80;
    var valorx = 3;
    var valory = 2;
    var angx;
    var angy;
    //retangulovazado(5,5,640,460,2,'rgba(0,0,100,1)'); 
    //retangulovazado(0,0,canvas.width,canvas.height,4,'red');    
    //TECLADO (setas) ---------------------------------------------------------------------------
    function whichButton(event){
      if(event.keyCode == 65){
        if(px1 > -190){
          px1 = px1 - 20;
          valorx = valorx - 0.5;
        }
      }
      if(event.keyCode == 68){
        if(px1 < 190){
          px1 = px1 + 20;
          valorx = valorx + 0.5;
        }
      }
      if(event.keyCode == 87){
        if(py1 > -180){
          py1 = py1 - 20;
          valory = valory + 0.5;
        }
      }
      if(event.keyCode == 83){
        if(py1 < 180){
          py1 = py1 + 20;
          valory = valory - 0.5;
        }
      }
    }
    
    //BOTÕES ------------------------------------------------------------------------------------
    var b = 7   
    function cliqueMouse(e){
      //Aumentar y
      if(e.pageX > 550 + b && e.pageX < 580 + b && e.pageY > 100 + b && e.pageY < 130 + b){
        if(py1 > -180){
          py1 = py1 - 20;
          valory = valory + 0.5;
        }
      }
      // Diminuir y
      if(e.pageX > 550 + b && e.pageX < 580 + b && e.pageY > 150 + b && e.pageY < 180 + b){ 
        if(py1 < 180){
          py1 = py1 + 20;
          valory = valory - 0.5;
        }       
      } 
      // Aumentar x
      if(e.pageX > 590 + b && e.pageX < 620 + b && e.pageY > 125 + b && e.pageY < 155 + b){ 
        if(px1 < 190){
          px1 = px1 + 20;
          valorx = valorx + 0.5;
        }
      } 
      // Diminuir x     
      if(e.pageX > 510 + b && e.pageX < 540 + b && e.pageY > 125 + b && e.pageY < 155 + b){ 
        if(px1 > -190){
          px1 = px1 - 20;
          valorx = valorx - 0.5;
        }
      } 
    } 
    //canvas.onmousedown = cliqueMouse; 
    
    
    
    // FUNÇÃO RESPONSÁVEL PELA ANIMAÇÃO ---------------------------------------------------------   
    function animate(canvas) {
      ctx.clearRect(10, 10, 630, 450);      
      vetor(px - 200,py,430,'black',0,1);//eixo horizontal
      vetor(px,py + 180,380,'black',-90,1);//eixo vertical      
      reticulado(px - 200,py - 180,21,19,0.2);
      escrever('x',10,'verdana',px + 225,py - 10,'black');
      escrever('y',10,'verdana',px + 10,py - 200,'black');
      escrever('Controle',10,'verdana',px + 265,py - 150,'rgba(0,0,150,1)');
      escrever('Coordenadas',10,'verdana',px + 250,py + 70,'rgba(0,0,150,1)');
      //
      if(px1 > 0){
        angx = 0;
      }else{
        angx = 180;
      }     
      linhapontilhada2(px,py + py1,Math.abs(px1)/10,'rgba(100,100,100,1)',angx);
      //
      if(py1>0){
        angy = 90;
      }else{
        angy = -90;
      }     
      linhapontilhada2(px + px1, py, Math.abs(py1)/10,'rgba(100,100,100,1)',angy);
      //
      circulo(px + px1,py + py1,4,'blue','blue');//PONTO
      //
      escalagraduadaX2(px-200,py + 205,5,1,'blue');
      escalagraduadaY2(px-225,py - 150,4,1,'red');    
      //
      retangulovazado(550,100,30,30,2,'black');// para cima (550,580 - 100,130)
      retangulovazado(550,150,30,30,2,'black');// para baixo (550, 580 - 150,180)
      retangulovazado(590,125,30,30,2,'black');// para direita (590,620 - 125,155)
      retangulovazado(510,125,30,30,2,'black');// para esquerda (510,540 - 125,155)
      trianguloisosceles(565,105,20,20,0,'blue');
      trianguloisosceles(565,175,20,20,180,'blue');
      trianguloisosceles(615,140,20,20,90,'blue');
      trianguloisosceles(515,140,20,20,-90,'blue');
      //
      retangulovazado(505,280,128,100,1,'rgba(100,100,100,1');
      escrever('x =  ' + valorx.toFixed(1),10,'verdana',540,330,'black');
      escrever('y =  ' + valory.toFixed(1),10,'verdana',540,360,'black');
      
      //Redesenhar tudo -----------------------------------------------------------------------------
      requestAnimFrame(function() {
        animate(canvas);
      });
    }         
    animate(canvas); 
    // ------------------------------------------------------------------------------------------ 
    </script>
                    <input type="hidden" name="id[]" value="<?php echo $linha['act_id'];?>">
                    </div>
                  <div class="img-pergunta">
                    
                  </div>
                  
                  <div class="sub-pergunta" style="text-align: right;">
                    <button type="submit" class="btn btn-custon-four btn-lg btn-success">Salvar</button>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
