
//LINHA RETA ENTRE DOIS PONTOS
function linhareta(px1,py1,px2,py2,linha,cor){
	ctx.beginPath();
	ctx.moveTo(px1, py1);
	ctx.lineTo(px2, py2);
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor;
	ctx.stroke();
}

//RETA HORIZONTAL COM TAMANHO
function retahorizontal(x0,y0,tamanho,linha,cor){
	ctx.beginPath();
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0 + tamanho, y0);
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor;
	ctx.stroke();
}

//RETA VERTICAL COM TAMANHO
function retavertical(x0,y0,tamanho,linha,cor){
	ctx.beginPath();
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0, y0 - tamanho);
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor;
	ctx.stroke();
}

//RETA COM TAMANHO E ÂNGULO
function retaangulo(x0,y0,tamanho,linha,cor,rotacao){
	var dx = tamanho*Math.cos(rotacao*Math.PI/180);
	var dy = tamanho*Math.sin(rotacao*Math.PI/180);
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0 + dx, y0 + dy);
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor;
	ctx.stroke();
}	

//LINHA PONTILHADA
function linhapontilhada(x0,y0,comprimento,rotacao){
	var passo = 5;
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	for (i = 0; i<=comprimento; i++){
		ctx.moveTo(x0 + 10*i, y0)
		ctx.lineTo (x0+10*i+passo, y0)
	}
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'rgba(150,150,150,1)';
	ctx.stroke();
	//
	ctx.restore();
}

//LINHA PONTILHADA
function linhapontilhada2(x0,y0,comprimento,cor,rotacao){
	var passo = 5;
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	for (i = 0; i<=comprimento; i++){
		ctx.moveTo(x0 + 10*i, y0)
		ctx.lineTo (x0+10*i+passo, y0)
	}
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor;
	ctx.stroke();
	//
	ctx.restore();
}




//ESCALA
function escala(x0,y0,tamanho,cor,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0+tamanho,y0);
	ctx.moveTo(x0,y0-5);
	ctx.lineTo(x0,y0+5);
	ctx.moveTo(x0+tamanho,y0-5);
	ctx.lineTo(x0+tamanho,y0+5);
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor;
	ctx.stroke();
	//
	ctx.restore();
}

//ESCALA GRADUADA
function escalagraduada(x0,y0,tamanho,escala,lado,cor,rotacao){	
	var passo = 0
	var i;
	var N = 1 + tamanho/escala
	//
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	ctx.beginPath()
	ctx.moveTo(x0,y0)
	ctx.lineTo(x0 + tamanho,y0);
	for(i=1;i<=N;i++){
		ctx.moveTo(x0 + passo,y0)
		ctx.lineTo(x0 + passo,y0+7*lado);
		passo = passo + escala
	}	
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor;
	ctx.stroke();
	//
	ctx.restore();
}

//ESCALA GRADUADA NO EIXO X
function escalagraduadaX(x0,y0,tamanho,escala,cor){
	var valor = 0;
	var passo = 0;
	var i;	
	var dx;
	for (i=0;i<=tamanho;i++){
		if(valor < 10){
			dx = 5;
		}else{
			dx = 8;
		}				
		escrever8(valor,x0 - dx + passo,y0,cor);	
		passo = passo + 40;	
		valor = valor + escala;
	}
}

//ESCALA GRADUADA NO EIXO X (02)
function escalagraduadaX2(x0,y0,tamanho,escala,cor){
	var valor = -tamanho;
	var passo = escala;
	var i;	
	var dx;
	for (i=0;i<=2*tamanho;i++){
		if(valor >= 0 && valor < 10){
			dx = 5;
		}
		if(valor >= 10){
			dx = 8;
		}	
		if(valor < 0 && valor > -10){
			dx = 14;
		}
		if(valor <= -10){
			dx = 14;
		}		
		escrever8(valor,x0 - dx + passo,y0,cor);	
		passo = passo + 40;	
		valor = valor + escala;
	}
}

//ESCALA GRADUADA NO EIXO Y
function escalagraduadaY(x0,y0,tamanho, escala,cor){
	var valor = 0;
	var passo = 0;
	var i;	
	var dy = 5;			
	for (i=0;i<=tamanho;i++){
		if(valor < 10){
			dx = 0;
		}else{
			dx = 5;
		}				
		escrever8(valor,x0 - dx,y0 + passo, cor);	
		passo = passo - 40;	
		valor = valor + escala;
	}
}

//ESCALA GRADUADA NO EIXO Y (02)
function escalagraduadaY2(x0,y0,tamanho,escala,cor){
	var valor = -tamanho;
	var passo = escala;
	var i;
	var dy = 5;	
	//var ex = 0;
	for (i=0;i<=2*tamanho;i++){
		if(valor>0){
			ex = -6;
		}else{
			ex = 0;
		}
		escrever8(-valor,x0 + ex,y0 - dy + passo, cor);	
		passo = passo + 40;	
		valor = valor + escala;
	}
}

//ESCALA GRADUADA NO EIXO Y (03)
function escalagraduadaY3(x0,y0,tamanho,escala,cor){
	var valor = 0;
	var passo = 0;
	var i;
	var dy = 5;	
	var ex;	
	for (i=0;i <= tamanho;i++){
		if(valor>=0){
			ex = -6;
		}else{
			ex = 0;
		}
		escrever8(valor,x0 + ex,y0 - dy + passo, cor);	
		passo = passo + 40;	
		valor = valor + escala;
	}
}

//CHAVE
function chaves(x0,y0,tamanho,linha,cor,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0 + 5, y0 - 5);
	ctx.lineTo(x0 + 5,y0 - tamanho);
	ctx.lineTo(x0 + 10,y0 - tamanho - 5);
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0 + 5, y0 + 5);
	ctx.lineTo(x0 + 5, y0 + tamanho);
	ctx.lineTo(x0 + 10, y0 + tamanho + 5);
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor;
	ctx.stroke();	
	//
	ctx.restore();	
}

//RETICULADO
function reticulado(x0,y0,N1,N2,linha){
	var passo = 20;
	var largura = passo*(N1-1);
	var altura = passo*(N2-1);
	var passograde = 0;
	var i;
	// Desenhando retas verticais
	for(i=1;i<=N1;i++){
		ctx.beginPath()
		ctx.moveTo(x0 + passograde, y0);
		ctx.lineTo(x0 + passograde,y0+altura);
		ctx.lineWidth = linha;
		ctx.strokeStyle = 'black';
		ctx.stroke();
		passograde = passograde + passo
	}
	// Desenhando retas horizontais
	passograde = 0	
	for(i=1;i<=N2;i++){
		ctx.beginPath()
		ctx.moveTo(x0, y0 + passograde);
		ctx.lineTo(x0 + largura,y0 + passograde);
		ctx.lineWidth = linha;
		ctx.strokeStyle = 'black';
		ctx.stroke();
		passograde = passograde + passo
	}
	passograde = 0
}

//EIXO
function eixo(x0,y0,tamanho,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0-tamanho/2,y0);
	ctx.lineTo(x0 - 2 + tamanho/2,y0);
	ctx.lineWidth = 1;
	ctx.strokeStyle = 'black';
	ctx.stroke()
	seta(x0 + tamanho/2,y0,10,'black',90)
	//
	ctx.restore();
}	
	
//---------------------------------------------------------------------------------------------------
	
//CÍRCULO PREENCHIDO
function circulo(px,py,raio,cor1,cor2){
	ctx.beginPath();
	ctx.arc(px, py, raio, 0, 2*Math.PI, false);
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor2;
	ctx.stroke();
}

//CÍRCULO VAZADO
function circulo_vazado(px,py,raio,cor1){
	ctx.beginPath();
	ctx.arc(px, py, raio, 0, 2*Math.PI, false);	
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor1;
	ctx.stroke();	
}

//ARCO VAZADO
function arco_vazado(x0,y0,raio, angulo, cor){
	var rotacao = angulo*Math.PI/180
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.arc(x0, y0, raio, 0, rotacao, true);
	ctx.lineTo(x0,y0);	
	ctx.fillStyle = cor;
	ctx.fill();	
}

//ARCO DE CIRCUNFERÊNCIA 
function arco(x0,y0,raio,a1,a2,linha,cor){
	var ang1 = a1*Math.PI/180;
	var ang2 = a2*Math.PI/180;
	ctx.beginPath();
	ctx.arc(x0, y0, raio, ang1, ang2, false);
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor;
	ctx.stroke();
}

//RETÂNGULO VAZADO
function retangulovazado(x0,y0,w,h,linha,cor){
	ctx.beginPath();
	ctx.rect(x0, y0, w, h);
	ctx.lineWidth = linha;	
	ctx.strokeStyle = cor;
	ctx.stroke();	
}

//RETÂNGULO PREENCHIDO
function retangulopreenchido(x0,y0,w,h,linha,cor1, cor2){
	ctx.beginPath();
	ctx.rect(x0, y0, w, h);
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.lineWidth = linha;	
	ctx.strokeStyle = cor2;
	ctx.stroke();	
}

//RETÂNGULO ROTACIONÁVEL
function retangulo(x0,y0,w,h,cor1,cor2,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.rect(x0, y0, w, h);
	ctx.lineWidth = 2;
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.strokeStyle = cor2;
	ctx.stroke();
	//
	ctx.restore();
}

//RETÂNGULO ROTACIONÁVEL 02
function retangulo2(x0,y0,w,h,cor1,cor2,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.rect(x0 - 20, y0 - 5, w, h);
	ctx.lineWidth = 2;
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.strokeStyle = cor2;
	ctx.stroke();
	circulo(x0 + w - 20,y0, 3,'red','rgba(0,0,0,0)');
	circulo(x0 + w/2 - 10,y0, 3,'blue','rgba(0,0,0,0)');
	//
	ctx.restore();
}

//RETÂNGULO CENTRO ROTACIONÁVEL
function retangulocentro(xc,yc,w,h,linha,cor1,cor2,rotacao){
	ctx.save();
	ctx.translate(xc,yc);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-xc,-yc);
	//
	var x1 = xc - w/2;
	var y1 = yc - h/2;
	ctx.beginPath();
	ctx.rect(x1, y1, w, h);
	ctx.lineWidth = linha;
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.strokeStyle = cor2;
	ctx.stroke();
	//
	ctx.restore();		
}

//TRAPÉZIO 01
function trapezio1(px,py,d,rotacao){
	ctx.save();
	ctx.translate(px,py);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-px,-py);
	//
	ctx.beginPath()		
	ctx.moveTo(px, py);
	ctx.lineTo(px + d, py - 1.5*d);
	ctx.lineTo(px + 2*d, py - 1.5*d);
	ctx.lineTo(px + 3*d, py);
	//ctx.rect(px, py - 2.6*d, 3*d, 8);
	ctx.closePath();
	ctx.fillStyle= 'rgba(200,200,200,1)';
	ctx.fill();	
	ctx.lineWidth = 1;
	ctx.strokeStyle= 'black';
	ctx.stroke();
	retangulopreenchido(px,py - 2.6*d,3*d,8,1,'rgba(200,200,200,1)', 'black');
	//
	ctx.restore();	
}

//RETÂNGULO BASE
function retangulobase(xb,yb,w,h,linha,cor1,cor2,rotacao){
	ctx.save();
	ctx.translate(xb,yb);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-xb,-yb);
	//
	var cor1;
	var cor2;
	var linha;
	var x1 = xb - w/2;
	var y1 = yb - h;
	ctx.beginPath();
	ctx.rect(x1, y1, w, h);
	ctx.lineWidth = linha;
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.strokeStyle = cor2;
	ctx.stroke();
	//
	ctx.restore();		
}

//OCTÁGONO
 function octagono(x0,y0,dx, dy){
	ctx.beginPath();
	ctx.moveTo(x0 - dx,y0);
	ctx.lineTo(x0 - dx,y0 + dy/2);
	ctx.lineTo(x0 - dx/2, y0 + dy);
	ctx.lineTo(x0 + dx/2, y0 + dy);
	ctx.lineTo(x0 + dx, y0 + dy/2);
	ctx.lineTo(x0 + dx, y0 - dy/2);
	ctx.lineTo(x0 + dx/2, y0 - dy);
	ctx.lineTo(x0 - dx/2, y0 - dy);
	ctx.lineTo(x0-dx,y0 - dy/2);
	ctx.closePath();
	ctx.fillStyle = 'rgba(0,0,200,0.2)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'black';
	ctx.stroke();
 
 }

//BOTÃO TIPO 01
function botao(x0,y0,w,h,dx,dy,texto){
	retangulo(x0,y0,w,h,'rgba(0,0,100,0.2)','blue',0);
	escrever8(texto,x0 + dx,y0 + dy,'black');		
};


//---------------------------------------------------------------------------------------------------

//SETA ROTACIONÁVEL
function seta(x0,y0,b,cor,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0-b/2,y0+b);
	ctx.lineTo(x0+b/2,y0+b);
	ctx.closePath();
	ctx.fillStyle= cor;
	ctx.fill();		
	//
	ctx.restore();
}

//RELAÇÃO
function relacao(x0, y0, H, L, linha, cor){
	linhareta(x0,y0,x0,y0 + H,linha,cor);
	linhareta(x0 - 1, y0 + H, x0 + L, y0 + H, linha, cor);
	seta(x0 + L + 2,y0 + H,10,cor,90);
}

//TRIÂNGULO BASE E ÂNGULO
function trianguloteta(x0,y0,base,angulo,linha,cor1,cor2){		
	altura = base*Math.tan(angulo*Math.PI/180);//angulo em graus
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0 + base, y0);
	ctx.lineTo(x0 + base, y0 + altura);
	ctx.closePath();
	ctx.fillStyle = cor1;
	ctx.fill();
	ctx.lineWidth = linha;
	ctx.strokeStyle = cor2;
	ctx.stroke();	
}

//TRIÂNGULO ISÔSCELES
function trianguloisosceles(x0,y0,b,h,rotacao,cor){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0-b/2,y0+h);
	ctx.lineTo(x0+b/2,y0+h);
	ctx.closePath();
	ctx.fillStyle = cor;
	ctx.fill();	
	//
	ctx.restore();
}

//APOIO TRIÂNGULAR
function apoiotriangular(x0,y0,b,h){
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0-b/2,y0+h);
	ctx.lineTo(x0+b/2,y0+h);
	ctx.closePath();
	ctx.fillStyle = 'rgba(150,150,150,1)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'black';
	ctx.stroke();
}

//BASE TRIANGULAR (TRAPÉZIO)
function basetriangular(x0,y0,b1,b2,h){
	ctx.beginPath()		
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0 + b1, y0 - h);
	ctx.lineTo(x0 + b1 + b2, y0 - h);
	ctx.lineTo(x0+b1+b2,y0)
	ctx.closePath();
	ctx.fillStyle= 'rgba(200,200,200,1)';
	ctx.fill();	
	ctx.lineWidth = 2;
	ctx.strokeStyle = '#000000';
	ctx.stroke();			 			
}

//PLANO INCLINADO E BASE
function planoInclinadoBase(x0,y0,H,d,B){
	var b = Math.sqrt(d*d - H*H);
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0+b,y0-H);
	ctx.lineTo(x0+b+B,y0-H);
	ctx.lineTo(x0+b+B,y0);
	ctx.closePath();
	ctx.fillStyle = 'rgba(220,220,220,1)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'black';
	ctx.stroke();	
}

//VETOR
function vetor(x0,y0,modulo,cor,rotacao,mult){
	var setaw = 10*mult;
	var setah = 10*mult;
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//Linha
	ctx.beginPath()
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0 + modulo-2, y0);
	ctx.lineWidth = 2;
	ctx.strokeStyle= cor;
	ctx.stroke();
	//Seta	
	ctx.beginPath()		
	ctx.moveTo(x0 + modulo, y0);
	ctx.lineTo(x0 + modulo - setaw, y0 - setah/2);
	ctx.lineTo(x0 + modulo - setaw, y0 + setah/2);
	ctx.fillStyle= cor;
	ctx.closePath();
	ctx.fill();	    
	ctx.restore();	
}

//VETOR
function vetor(x0,y0,modulo,cor,rotacao,mult){
	var setaw = 10*mult;
	var setah = 10*mult;
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//Linha
	ctx.beginPath();
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0 + modulo-2, y0);
	ctx.lineWidth = 2;
	ctx.strokeStyle= cor;
	ctx.stroke();
	//Seta	
	ctx.beginPath();		
	ctx.moveTo(x0 + modulo, y0);
	ctx.lineTo(x0 + modulo - setaw, y0 - setah/2);
	ctx.lineTo(x0 + modulo - setaw, y0 + setah/2);
	ctx.fillStyle= cor;
	ctx.closePath();
	ctx.fill();	    
	ctx.restore();	
}

//VETOR 02
function vetor2(x0,y0,modulo,cor,rotacao,mult){
	var setaw = 10*mult;
	var setah = 10*mult;
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//Linha
	ctx.beginPath();
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0 + modulo-2, y0);
	ctx.lineWidth = 2.5;
	ctx.strokeStyle= cor;
	ctx.stroke();
	//Seta	
	ctx.beginPath()		
	ctx.moveTo(x0 + modulo, y0);
	ctx.lineTo(x0 + modulo - setaw, y0 - setah/2);
	ctx.lineTo(x0 + modulo - setaw, y0 + setah/2);
	ctx.fillStyle= cor;
	ctx.closePath();
	ctx.fill();	    
	ctx.restore();	
}		

//EIXO HORIZONTAL
function eixohorizontal(x0,y0,modulo,cor){
	//Linha
	ctx.beginPath()
	ctx.moveTo(x0 - modulo/2, y0);
	ctx.lineTo(x0 + modulo/2 - 2, y0);
	ctx.lineWidth = 2;
	ctx.strokeStyle= cor;
	ctx.stroke();
	//Seta	
	ctx.beginPath()		
	ctx.moveTo(x0 + modulo/2, y0);
	ctx.lineTo(x0 + modulo/2 - 10, y0 - 5);
	ctx.lineTo(x0 + modulo/2 - 10, y0 + 5);
	ctx.fillStyle= cor;
	ctx.closePath();
	ctx.fill();		
}

//EIXO VERTICAL
function eixovertical(x0,y0,modulo,cor){
	//Linha
	ctx.beginPath()
	ctx.moveTo(x0, y0 - modulo/2 + 2);
	ctx.lineTo(x0, y0 + modulo/2);
	ctx.lineWidth = 2;
	ctx.strokeStyle= cor;
	ctx.stroke();
	//Seta	
	ctx.beginPath()		
	ctx.moveTo(x0, y0 - modulo/2);
	ctx.lineTo(x0 + 5, y0 - modulo/2 + 10);
	ctx.lineTo(x0 - 5, y0 - modulo/2 + 10);
	ctx.fillStyle= cor;
	ctx.closePath();
	ctx.fill();		
}		

//ESCREVER TEXTO -------------------------------------------------------------
function escrever(texto,tamanho,fonte,x0,y0,cor){
	ctx.font = 'bold ' + tamanho + 'pt ' +  fonte;
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);

}

function escrever8(texto,x0,y0,cor){
	ctx.font = 'bold 10pt Verdana';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}

function escrever10(texto,x0,y0,cor){
	ctx.font = 'bold 10pt Verdana';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}

function escrever12sp(texto,x0,y0,cor){
	ctx.font = 'bold 12pt Segoe Print';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}

function escrever14ab(texto,x0,y0,cor){
	ctx.font = 'bold 14pt Arial Black';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}
		
function escrever12(texto,x0,y0,cor){
	ctx.font = 'bold 12pt Verdana';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}

function escreversimbolo(texto,x0,y0,cor){
	ctx.font = 'bold 14pt Symbol';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}	

function nomevetor(texto,x0,y0,cor){
	var h = 16
	var b = 3
	ctx.beginPath();
	ctx.moveTo(x0-1, y0-h);
	ctx.lineTo(x0+12, y0-h);
	ctx.lineTo(x0+8, y0-h-b);
	ctx.moveTo(x0+12, y0-h);
	ctx.lineTo(x0+8, y0-h+b);
	ctx.lineWidth = 1.5;
	ctx.strokeStyle = cor;
	ctx.stroke();
	//
	ctx.font = 'bold 10pt Verdana';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
}	

function nomevetor2(texto,indice,x0,y0,cor){
	var h = 16
	var b = 3
	ctx.beginPath();
	ctx.moveTo(x0-1, y0-h);
	ctx.lineTo(x0+12, y0-h);
	ctx.lineTo(x0+8, y0-h-b);
	ctx.moveTo(x0+12, y0-h);
	ctx.lineTo(x0+8, y0-h+b);
	ctx.lineWidth = 1.5;
	ctx.strokeStyle = cor;
	ctx.stroke();
	//
	ctx.font = 'bold 10pt Verdana';
	ctx.fillStyle = cor;
	ctx.fillText(texto, x0, y0);
	
	ctx.font = 'bold 8pt Verdana';
	ctx.fillStyle = cor;
	ctx.fillText(indice, x0 + 10, y0 + 2);
}	



//---------------------------------------------------------------------------------------------------

//CARRINHO 01
function carrinho1(x0,y0,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//	
	ctx.beginPath();
	ctx.rect(x0, y0-25,35,20);
	ctx.lineWidth = 2;
	ctx.fillStyle = 'rgba(100,100,100,1)';
	ctx.fill();
	ctx.strokeStyle = 'black';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0 + 8, y0-5, 5, 0, 2*Math.PI, false);
	ctx.lineWidth = 1.5;
	ctx.fillStyle = 'rgba(100,100,100,1)';
	ctx.fill();
	ctx.strokeStyle = 'black';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0 + 26, y0+-5, 5, 0, 2*Math.PI, false);
	ctx.lineWidth = 1.5;
	ctx.fillStyle = 'rgba(100,100,100,1)';
	ctx.fill();
	ctx.strokeStyle = 'black';
	ctx.stroke();
	//
	ctx.restore();
}

function carrinho2(x0,y0,rotacao, cor1,cor2){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	var h = 10;
	var L1 = 10;
	var L2 = 40;
	ctx.beginPath();
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0 - L1, y0 - h);
	ctx.lineTo(x0 - L2, y0 - h);
	ctx.lineTo(x0 - L2, y0 + h);
	ctx.lineTo(x0 - L1, y0 + h);
	ctx.closePath();			
	ctx.fillStyle = cor2;
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor1;
	ctx.stroke();			
	//
	ctx.beginPath();
	ctx.moveTo(x0 - 12, y0 - h - 3);
	ctx.lineTo(x0 - 22, y0 - h - 3);
	ctx.moveTo(x0 - 28, y0 - h - 3);
	ctx.lineTo(x0 - 38, y0 - h - 3);
	ctx.moveTo(x0 - 12, y0 + h + 3);
	ctx.lineTo(x0 - 22, y0 + h + 3);
	ctx.moveTo(x0 - 28, y0 + h + 3);
	ctx.lineTo(x0 - 38, y0 + h + 3);			
	ctx.lineWidth = 2.5;
	ctx.strokeStyle = cor1;
	ctx.stroke();
	//
	ctx.restore();		
}

//CARRINHO 03
function carrinho3(x0, y0, L, h, cor){
	ctx.beginPath();
	ctx.rect(x0, y0 - h - 6,L,h);
	ctx.lineWidth = 2;
	ctx.fillStyle = cor;
	ctx.fill();
	ctx.strokeStyle = 'black';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0 + 12, y0 - 7, 7, 0, 2*Math.PI, false);
	ctx.fillStyle = 'cor';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'black';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0 + L - 12, y0 - 7, 7, 0, 2*Math.PI, false);
	ctx.fillStyle = 'cor';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'black';
	ctx.stroke();
}


//TORQUE NO SENTIDO HORÁRIO
function torque1(x0,y0,cor){
	arco(x0,y0,20,120,-120,3,cor);
	seta(x0-3,y0-21,10,cor,60); 		
}

//TORQUE NO SENTIDO ANTI HORÁRIO
function torque2(x0,y0,cor){
	arco(x0,y0,20,-60,60,3,cor);
	seta(x0+3,y0-21,10,cor,-60); 		
}	

//BONECO PALITO ARTICULADO
function boneco2(px,py,angA1,angB1,angA2,angB2,mult){
	var linha = 3*mult;
	var cor = 'blue';
	var p = 35*mult;
	var t = 30*mult;
	var plinha = 5*mult;
	var b = 20*mult;
	var ab = 15*mult;
	var angA1;
	var angA2;
	var angB1;
	var angB2;
	var xb1 = px + b*Math.cos(angA1*Math.PI/180);
	var yb1 = py - t + b*Math.sin(angA1*Math.PI/180); 
	var xb2 = px + b*Math.cos(angA2*Math.PI/180);
	var yb2 = py - t + b*Math.sin(angA2*Math.PI/180); 
	//
	function retaboneco(x0,y0,tamanho,rotacao){
		ctx.save();
		ctx.translate(x0,y0);
		ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
		ctx.translate(-x0,-y0);
		//
		ctx.beginPath();
		ctx.moveTo(x0, y0);
		ctx.lineTo(x0 + tamanho, y0);
		ctx.lineWidth = linha;
		ctx.strokeStyle = cor;
		ctx.stroke();
		//
		ctx.restore();
	}	
	//Corpo
	retaboneco(px,py,p,70) 				// Perna direita
	retaboneco(px,py,p,110) 			// Perna esquerda
	retaboneco(px,py,t,-90) 			// Torax	
	retaboneco(px,py-t,plinha,-90) 		// Pescoço	
	retaboneco(px,py-t,b,angA1)			// Braço direito
	retaboneco(px,py-t,b,angA2)			// Braço esquerdo	
	retaboneco(xb1,yb1,ab,angB1)		// Antebraço direito
	retaboneco(xb2,yb2,ab,angB2)		// Antebraço esquerdo
	// Cabeça
	ctx.save();
	ctx.translate(px,py);
	ctx.scale(0.7,1)
	ctx.translate(-px,-py);
	ctx.beginPath();			
	ctx.arc(px, py-t-plinha-4*mult, 7*mult, 0, 2*Math.PI, false);
	ctx.fillStyle = cor;
	ctx.fill();
	ctx.restore()	
}

//PESSOA (VISTA SUPERIOR)
function pessoa(px,py,cor,rotacao){
	ctx.save();
	ctx.translate(px,py);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-px,-py);
	//
	circulo(px,py,4,cor,cor);
	retangulopreenchido(px - 2,py - 8,4,16,1,cor,cor);
	//
	ctx.restore();		
}


//POLIA TIPO 01
function polia(x0,y0,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.arc(x0, y0, 20, 0, 2*Math.PI, false);
	ctx.fillStyle = 'rgba(200,200,200,1)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();	
	//
	ctx.beginPath();
	ctx.rect(x0-5, y0-10, 10, 40);
	ctx.lineWidth = 1;
	ctx.fillStyle = 'rgba(150,150,150,1)';
	ctx.fill();
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.moveTo(x0, y0+30);
	ctx.lineTo(x0, y0+35);
	ctx.lineWidth = 3;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0-1, y0+38, 4, -Math.PI/2, 0.8*Math.PI, false);			
	ctx.lineWidth = 3;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();
	//	
	ctx.beginPath();
	ctx.arc(x0, y0, 2, 0, 2*Math.PI, false);
	ctx.fillStyle = 'rgba(100,100,100,1)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();
	//
	ctx.restore();
}	

//ROLDANA
function roldana(x0,y0,raio){
	ctx.beginPath();
	ctx.arc(x0, y0, raio, 0, 2*Math.PI, false);
	ctx.fillStyle = 'rgba(200,200,200,1)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();	
	//				
	ctx.beginPath();
	ctx.arc(x0, y0, raio/2, 0, 2*Math.PI, false);
	ctx.fillStyle = 'rgba(100,100,100,1)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();				
}

//GANCHO
function gancho(x0,y0,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0,y0+7);
	ctx.lineWidth = 3;
	ctx.strokeStyle = 'rgba(0,0,0,1)';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0-2, y0+12, 5, -Math.PI/2, 0.8*Math.PI, false);			
	ctx.lineWidth = 3;
	ctx.strokeStyle = 'rgba(0,0,0,1)';
	ctx.stroke();
	//
	ctx.restore()			
}		

//MASSA TIPO 01
function massa1(x0,y0,mult){
	var b1 = 10*mult;
	var b2 = 15*mult;
	var h = 30*mult;			
	ctx.beginPath();
	ctx.moveTo(x0, y0);
	ctx.lineTo(x0 + b1, y0);
	ctx.lineTo(x0 + b2, y0 + h);
	ctx.lineTo(x0 - b2, y0 + h);
	ctx.lineTo(x0 - b1,y0);
	ctx.closePath();
	ctx.lineWidth = 2;
	ctx.fillStyle = 'rgba(150,150,150,1)';
	ctx.fill();	
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();
	//
	ctx.beginPath();
	ctx.arc(x0, y0, 6, -Math.PI, 0, false);			
	ctx.lineWidth = 3;
	ctx.strokeStyle = 'rgba(50,50,50,1)';
	ctx.stroke();
}

//SUPERFÍCIE
function superficie(x0,y0,tamanho,rotacao){
	var N = tamanho/10;
	var i;
	var passo = 5;
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();
	ctx.moveTo(x0,y0);
	ctx.lineTo(x0 + tamanho,y0);
	//
	for(i=1;i<=N;i++){
		ctx.moveTo(x0 + passo,y0);
		ctx.lineTo(x0 + passo-5,y0+5);
		passo = passo + 10;
	}
	//
	ctx.lineWidth = 1;
	ctx.strokeStyle = 'black';
	ctx.stroke();
	//	
	ctx.restore()
}	

//MOLA COM LINHAS RETAS
function mola(x0,y0,tamanho,cor,rotacao){
	var N = 20;
	var passox = 5;
	var passoy = 10;
	var dx = 20;
	var i;
	ctx.beginPath();
	ctx.moveTo(x0,y0);	
	for(i=1;i<=N;i++){		
		ctx.lineTo(x0+passox,y0+passoy);
		passox = passox + dx;
		passoy = -passoy;	
	}
	ctx.lineTo(x0+passox,y0);
	ctx.lineWidth = 2;
	ctx.strokeStyle = cor;
	ctx.stroke();
}

//MOLA COM ELIPSES
function mola2(x0,y0,N,L,rotacao,cor){
	var i;	
	var passo = 0;
	for(i=1;i<=N;i++){
		ctx.save();
		ctx.translate(x0,y0);
		ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
		ctx.scale(L,1)
		ctx.translate(-x0,-y0);
		//
		ctx.beginPath();
		ctx.arc(x0 + passo, y0, 10, 0, 2*Math.PI, false);
		ctx.lineWidth = 2;
		ctx.strokeStyle = cor;
		ctx.stroke();
		//
		ctx.restore()
		passo = passo + 10
	}	
}

//BONECO ARTICULADO
function boneco2(px,py,angA1,angB1,angA2,angB2,tamanho,cor2){
	var linha = 2;
	var cor = cor2;
	var p = 35*tamanho;
	var t = 30*tamanho;
	var plinha = 5*tamanho;
	var b = 20*tamanho;
	var ab = 15*tamanho;
	var angA1;
	var angA2;
	var angB1;
	var angB2;
	var xb1 = px + b*Math.cos(angA1*Math.PI/180);
	var yb1 = py - t + b*Math.sin(angA1*Math.PI/180); 
	var xb2 = px + b*Math.cos(angA2*Math.PI/180);
	var yb2 = py - t + b*Math.sin(angA2*Math.PI/180); 
	//
	function reta(x0,y0,tamanho,rotacao){
		ctx.save();
		ctx.translate(x0,y0);
		ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus
		ctx.translate(-x0,-y0);
		//
		ctx.beginPath();
		ctx.moveTo(x0, y0);
		ctx.lineTo(x0 + tamanho, y0);
		ctx.lineWidth = linha;
		ctx.strokeStyle = cor;
		ctx.stroke();
		//
		ctx.restore();
	}	
	//
	reta(px,py,p,70) 			// Perna direita
	reta(px,py,p,110) 			// Perna esquerda
	reta(px,py,t,-90) 			// Torax	
	reta(px,py-t,plinha,-90) 	// Pescoço	
	reta(px,py-t,b,angA1)		// Braço direito
	reta(px,py-t,b,angA2)		// Braço esquerdo	
	reta(xb1,yb1,ab,angB1)		// Antebraço direito
	reta(xb2,yb2,ab,angB2)		// Antebraço esquerdo
	//
	ctx.save();
	ctx.translate(px,py);
	ctx.scale(0.7,1)
	ctx.translate(-px,-py);
	ctx.beginPath();			
	ctx.arc(px, py-t-plinha-4*tamanho, 7*tamanho, 0, 2*Math.PI, false);
	ctx.fillStyle = cor;
	ctx.fill();
	ctx.restore()	
}

//CHAMA (SISTEMA DE PROPULSÃO)
function chama(x0,y0,mult,rotacao){	
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	ctx.beginPath();			
	ctx.moveTo(x0,y0);			
	ctx.quadraticCurveTo(x0 + 7*mult, y0 - 50*mult, x0 + 15*mult, y0);
	ctx.closePath();
	ctx.fillStyle = 'rgba(255,0,0,0.5)';
	ctx.fill();
	ctx.lineWidth = 1;
	ctx.strokeStyle = 'red';
	ctx.stroke();
	//
	ctx.restore();
}

//CHAMA2 (FOGO)
function chama2(x0,y0,mult){	
	ctx.beginPath();			
	ctx.moveTo(x0,y0);			
	ctx.quadraticCurveTo(x0 + 7*mult, y0 - 40*mult, x0 + 15*mult, y0);
	ctx.closePath();
	ctx.fillStyle = 'rgba(255,0,0,0.5)';
	ctx.fill();
	ctx.lineWidth = 1;
	ctx.strokeStyle = 'red';
	ctx.stroke();
	//	
}

//LOGOTIPO DO IF
function logotipo(x0,y0){
	var dx1 = 6;
	var dx2 = 10;
	var dx3 = 26;
	var dy1 = 6;
	var dy2 = 11;
	var dy3 = 27;
	var dy4 = 43;
	//	
	circulo(x0,y0,7,'red','red'); //L1
	retangulo(x0+dx2,y0-dy1,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L1
	retangulo(x0+dx3,y0-dy1,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L1			
	retangulo(x0-dx1,y0+dy2,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L2
	retangulo(x0+dx2,y0+dy2,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L2			
	retangulo(x0-dx1,y0+dy3,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L3
	retangulo(x0+dx2,y0+dy3,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L3
	retangulo(x0+dx3,y0+dy3,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L3			
	retangulo(x0-dx1,y0+dy4,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L4
	retangulo(x0+dx2,y0+dy4,12,12,'rgba(0,180,0,1)','rgba(0,180,0,1)',0); //L4
	//
	var dx = 2;
	var dy = 2;
	var cor = 'rgba(220,220,255,1)';
	//escrever12('INSTITUTO FEDERAL',x0 + 50 + dx,y0+35 + dy,cor); 
	//escrever12('DE EDUCAÇÃO CIÊNCIA E TECNOLOGIA',x0 + 50 + dx,y0+55 + dy,cor); 			
	escrever12('INSTITUTO FEDERAL',x0 + 50,y0+35,'rgba(0,0,100,1)'); 
	escrever12('DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA',x0 + 50,y0+55,'rgba(0,0,100,1)'); 
	//
	retangulo(x0-8,y0+65,700,6,'rgba(0,0,180,1','rgba(0,0,180,0)',0);
	escrever8('Prof. Geraldo Felipe / Campus Natal-Central',x0 + 400,y0+90,'rgba(150,150,150,0.5)');
	escrever8('Rio Grande do Norte',x0 + 410,y0+55,'rgba(0,0,100,1)');	
}

//LOGOTIPO 02 (AULA EXPOSITIVA)
function logotipo2(x0,y0,escala){
	var dx1 = 6;
	var dx2 = 10;
	var dx3 = 26;
	var dy1 = 6;
	var dy2 = 11;
	var dy3 = 27;
	var dy4 = 43;	
	ctx.save();
	ctx.translate(x0,y0);
	ctx.scale(escala,escala);
	ctx.translate(-x0,-y0);	
	circulo(x0,y0,7,'red','red'); //L1
	retangulo(x0+dx2,y0-dy1,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L1
	retangulo(x0+dx3,y0-dy1,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L1			
	retangulo(x0-dx1,y0+dy2,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L2
	retangulo(x0+dx2,y0+dy2,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L2			
	retangulo(x0-dx1,y0+dy3,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L3
	retangulo(x0+dx2,y0+dy3,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L3
	retangulo(x0+dx3,y0+dy3,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L3			
	retangulo(x0-dx1,y0+dy4,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L4
	retangulo(x0+dx2,y0+dy4,12,12,'rgba(0,180,0,1','rgba(0,180,0,1)',0); //L4
	ctx.restore();
	//
	var dx = 2;
	var dy = 2;
	var cor = 'rgba(220,220,255,1)';
	escrever8('INSTITUTO FEDERAL',x0 + 30,y0+12,'rgba(0,0,100,1)'); 
	escrever8('DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA',x0 + 30,y0+27,'rgba(0,0,100,1)'); 
	retangulo(x0 - 5,y0+32,800,3,'rgba(0,0,180,1','rgba(0,0,180,0)',0);	
}

//NAVE ESPACIAL TRAJETÓRIA RETILINEA
function nave(x0,y0, esquerda, direita){
	var dx = 40;
	var dy = 20;
	ctx.beginPath()
	ctx.moveTo(x0 - dx,y0 - dy);
	ctx.lineTo(x0 + dx, y0 - dy);
	ctx.lineTo(x0 + dx + 5, y0 - dy + 5);
	ctx.lineTo(x0 + dx + 5, y0 - dy + 35);
	ctx.lineTo(x0 + dx, y0 + dy);			
	ctx.lineTo(x0 - dx, y0 + dy);
	ctx.lineTo(x0 - dx - 5, y0 + dy - 5);
	ctx.lineTo(x0 - dx - 5, y0 - dy + 5);
	ctx.closePath();
	ctx.fillStyle = 'rgba(0,0,200,0.3)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStylle = 'black';
	ctx.stroke();	
	//
	var px1 = 5;
	var px2 = 15;
	var px3 = 25;
	var py = 8;
	ctx.beginPath();
	ctx.moveTo(x0 - dx,y0 - dy);
	ctx.lineTo(x0 - dx + px1, y0 - dy - py);	
	ctx.lineTo(x0 - dx + px2, y0 - dy - py);
	ctx.lineTo(x0 - dx + px3, y0 - dy);
	//
	ctx.moveTo(x0 + dx,y0 - dy);
	ctx.lineTo(x0 + dx - px1, y0 - dy - py);
	ctx.lineTo(x0 + dx - px2, y0 - dy - py);
	ctx.lineTo(x0 + dx - px3, y0 - dy);
	//
	ctx.moveTo(x0 + dx,y0 + dy);
	ctx.lineTo(x0 + dx - px1, y0 + dy + py);
	ctx.lineTo(x0 + dx - px2, y0 + dy + py);
	ctx.lineTo(x0 + dx - px3, y0 + dy);
	//
	ctx.moveTo(x0 - dx,y0 + dy);
	ctx.lineTo(x0 - dx + px1, y0 + dy + py);
	ctx.lineTo(x0 - dx + px2, y0 + dy + py);
	ctx.lineTo(x0 - dx + px3, y0 + dy);
	//
	ctx.fillStyle = 'rgba(0,0,200,0.3)';
	ctx.fill();
	ctx.lineWidth = 2;
	ctx.strokeStylle = 'black';
	ctx.stroke();
	//
	retangulo(x0 - dx - 4,y0 - dy - 16,25,10,'rgba(100,0,200,1)','black',0)
	retangulo(x0 - dx - 4,y0 + dy + 6,25,10,'rgba(100,0,200,1)','black',0)
	retangulo(x0 - dx + 60,y0 - dy - 16,25,10,'rgba(100,0,200,1)','black',0)
	retangulo(x0 - dx + 60,y0 + dy + 6,25,10,'rgba(100,0,200,1)','black',0)
	octagono(x0,y0,15,10);
	//
	if(esquerda == 1){			
		chama(x0 - 46,y0 + 36, 0.7,-90);
		chama(x0 - 46,y0 - 26, 0.7,-90);
	}
	if(direita == 1){				
		chama(x0 + 47,y0 + 26, 0.7,90);
		chama(x0 + 47,y0 - 36, 0.7,90);
	}			
}

// MOLÉCULA DE UM CORPO SÓLIDO
function particulasolido(px0,py0,multiplicador,raio, cor1,cor2){
	valor_sinal1 = Math.random();
	valor_sinal2 = Math.random();
	if(valor_sinal1 > 0.5){
		sinal1 = 1;
	}else{
		sinal1 = -1;
	}			
	if(valor_sinal2 > 0.5){
		sinal2 = 1;
	}else{
		sinal2 = -1;
	}
	//
	ruido1 = Math.random()*multiplicador*sinal1;
	ruido2 = Math.random()*multiplicador*sinal2;
	//
	px = px0 + ruido1;
	py = py0 + ruido2;
	circulo(px,py,raio,cor1,cor2);		
}

// TERMÔMETRO (h é a altura do termômetro e temp é a altura da coluna vermelha)
function termometro(x0,y0,h,temp){
	//
	ctx.beginPath();
	ctx.arc(x0, y0, 10, Math.PI, -Math.PI, false);			
	ctx.fillStyle = 'red';
	ctx.fill();			
	//
	retangulopreenchido(x0-5,y0-9,10,-temp,1,'rgba(255,0,0,1)','rgba(0,0,0,0)');
	//
	ctx.beginPath();
	ctx.arc(x0, y0, 10, -60*Math.PI/180, -120*Math.PI/180, false);
	ctx.moveTo(x0 - 5, y0 - 9);
	ctx.lineTo(x0 - 5, y0 - h);
	ctx.lineTo(x0 + 5, y0 - h);
	ctx.lineTo(x0 + 5, y0 - 9);
	ctx.lineWidth = 2;
	ctx.strokeStyle = 'black';
	ctx.stroke();
}

//PILHA 01
function pilha(x0,y0,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	retangulopreenchido(x0 + 5,y0,70,30,2,'rgba(120,120,250,1)', 'rgba(0,0,100,1)');
	retangulopreenchido(x0 ,y0 + 7,5,15,2,'rgba(120,120,250,1)', 'rgba(0,0,100,1)');
	escrever('1,5 V',10,'verdana',x0 + 18,y0 + 19,'rgba(0,0,50,1)');
	//
	ctx.restore();
}

//PILHA 02
function pilha2(x0,y0,rotacao){
	ctx.save();
	ctx.translate(x0,y0);
	ctx.rotate(rotacao*Math.PI/180); // Entre com o valor em graus		
	ctx.translate(-x0,-y0);
	//
	retangulopreenchido(x0 + 5,y0,70,30,2,'rgba(120,120,250,1)', 'rgba(0,0,100,1)');
	retangulopreenchido(x0 ,y0 + 7,5,15,2,'rgba(120,120,250,1)', 'rgba(0,0,100,1)');
	escrever('+',12,'verdana',x0 + 12,y0 + 19,'rgba(0,0,150,1)');
	escrever('-',12,'verdana',x0 + 60,y0 + 19,'rgba(0,0,150,1)');
	//
	ctx.restore();
}