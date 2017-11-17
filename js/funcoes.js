/*
 * FUNCOES GERAIS PARA USO NOS SISTEMAS
 * DESENOLVIMENTO DPIE
 * 
 * VERSAO 1.5
 * 
 */

/*-----------------------------------FUNCOES GERAIS-----------------------------------------------*/
function FormatoCPF(campo)
{
    var valor = campo.value;
    
    if(valor.length != 14)
    {
        //123.456.789-01
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{3})(\d)/,"$1.$2"); //coloca . apos tres digitos
        valor = valor.replace(/(\d{3})(\d)/,"$1.$2"); //coloca . apos + tres digitos
        valor = valor.replace(/(\d{3})(\d)/,"$1-$2"); //coloca - apos + tres digitos
        
        if(valor.length > 14) valor = valor.substring(0, 14);
        
        campo.value = valor;
    }
}

function FormatoCNPJ(campo)
{
    var valor = campo.value;
    
    if(valor.length != 18)
    {
        //12.345.678/9012-34
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{2})(\d)/,"$1.$2"); //coloca . apos dois digitos
        valor = valor.replace(/(\d{3})(\d)/,"$1.$2"); //coloca . apos + tres digitos
        valor = valor.replace(/(\d{3})(\d)/,"$1/$2"); //coloca / apos + tres digitos
        valor = valor.replace(/(\d{4})(\d)/,"$1-$2"); //coloca - apos + tres digitos
        
        if(valor.length > 18) valor = valor.substring(0, 18);
        
        campo.value = valor;
    }
}

function FormatoCEP(campo)
{
    var valor = campo.value;

    if(valor.length != 9)
    {
        //12345-678
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{5})(\d)/,"$1-$2"); //coloca - apos tres digitos
        
        if(valor.length > 9) valor = valor.substring(0, 9);
        
        campo.value = valor;
    }
}

function FormatoData(campo)
{
    var valor = campo.value;
    
    if(valor.length != 10)
    {
        //12/34/5678
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{2})(\d)/,"$1/$2"); //coloca / apos 2 digitos
        valor = valor.replace(/(\d{2})(\d)/,"$1/$2"); //coloca / apos + 2 digitos
        
        if (valor.length > 10) valor = valor.substring(0, 10);
        
        campo.value = valor;
    }
}

function FormatoHora(campo)
{
    var valor = campo.value;
    
    if(valor.length != 5)
    {
        //12/34/5678
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{2})(\d)/,"$1:$2");
        
        if(valor.length > 5) valor = valor.substring(0, 5);
        
        campo.value = valor;
    }
}

function FormatoTelefoneComum(campo)
{
    var valor = campo.value;

    if(valor.length != 14)
    {
        //(12) 3456-7890 = (23) 6789-1234
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{0})(\d)/,"$1($2"); //coloca "(" apos tres digitos
        valor = valor.replace(/(\d{2})(\d)/,"$1) $2"); //coloca ") " apos tres digitos
        valor = valor.replace(/(\d{4})(\d)/,"$1-$2"); //coloca "-" apos + tres digitos
        
        if(valor.length > 14) valor = valor.substring(0, 14);
        
        campo.value = valor;      
    }      
}


function FormatoCelularComum(campo)
{
    var valor = campo.value;

    if(valor.length != 15)
    {
        //(12) 93456-7890 = (23) 96789-1234
        valor = valor.replace(/\D/g,"");
        valor = valor.replace(/(\d{0})(\d)/,"$1($2"); //coloca "(" apos tres digitos
        valor = valor.replace(/(\d{2})(\d)/,"$1) $2"); //coloca ") " apos tres digitos
        valor = valor.replace(/(\d{4})(\d)/,"$1-$2"); //coloca "-" apos + tres digitos
        
        if(valor.length > 15) valor = valor.substring(0, 15);
        
        campo.value = valor;      
    }      
}

function FormatoTelefoneZeroOitocentos(campo)
{
    var valor = campo.value;

    if(valor.length != 13)
    {
        //0800 728 4499 = 1234 678 0123 = 1234 123 1234
        valor = valor.replace(/\D/g,"")                    
        if (valor.length > 7)
            valor = valor.replace(/(\d{7})(\d)/,"$1 $2");
        
        if (valor.length > 4)
            valor = valor.replace(/(\d{4})(\d)/,"$1 $2");
        
        if(valor.length > 13) valor = valor.substring(0, 13);
        
        campo.value = valor;      
    }       
}

function SoDigito(campo)
{
    campo.value = campo.value.replace(/\D/g,"");
}

function SoNumero(campo)
{
    SoDigito(campo);
}

//Mascara número decimal/quebrado/fracionado
function FormatoDecimal(campo)
{            
    var valor = campo.value;
    
    valor = valor.replace(/[.]/g,",");
    
    // \D = [^0-9], ^ é negado
    // /g é percorrida a cadeia de caracteres toda
    valor = valor.replace(/((\D)+([^,]+\D))/g,""); 
            
    //retorna novo valor para o campo
    campo.value = valor;
}

//funcao para mostrar caracteres restantes da Objeto
function RestamCaracteres(campo, restam, maximo)
{
    digitados = campo.value.length;
    str = "";
    str = str + digitados;
    restam.innerHTML = maximo - str;
    if (digitados > maximo)
    {
        aux = campo.value;
        campo.value = aux.substring(0, maximo);
    }
}

function Teste(campo)
{
    var e = event;
    if (e.keyCode) code = e.keyCode;    //internet explorer
    else if (e.which) code = e.which;     // Netscape 4.?
    else if (e.charCode) code = e.charCode; // Mozilla 
        
    var oEvent = (oEvent) ? oEvent : e;
    var oTarget = (oEvent.target) ? oEvent.target : oEvent.srcElement;
    oEvent.keyCode = 13;
    if (oTarget.type == "text") oEvent.keyCode = 13;
    if (oTarget.type == "radio") oEvent.keyCode = 13;
}

//Mascara dinheiro
function MascaraNumeroMilharDecimal(campo)
{            
    var valor = campo.value;
    
    if(valor.length <= 18)
    {
        //numero do protocolo / ano = n/aaaa
        valor = valor.replace(/\D/g,"");
        
        if (valor.length > 11)
            valor = valor.replace(/(\d)(\d{1,11})$/,"$1.$2");
        
        if (valor.length > 8)
            valor = valor.replace(/(\d)(\d{1,8})$/,"$1.$2");
        
        if (valor.length > 5)
            valor = valor.replace(/(\d)(\d{1,5})$/,"$1.$2");
        
        valor = valor.replace(/(\d)(\d{1,2})$/,"$1,$2");
        
        //se atingiu maximo de caracteres permitido, limpar caracteres extras
        if(valor.length > 18) valor = valor.substring(0, 18); //123.567.901.345,78
        
        //retorna novo valor para o campo
        campo.value = valor;
    }
}

/*Função que padroniza valor monetário*/
function Valor(v)
{
    v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
    v=v.replace(/^([0-9]{3}\.?){3}-[0-9]{2}$/,"$1,$2");
    //v=v.replace(/(\d{3})(\d)/g,"$1,$2")
    v=v.replace(/(\d)(\d{2})$/,"$1,$2") //Coloca ponto antes dos 2 últimos digitos
    return v
}

function Data(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/(\d{2})(\d)/,"$1/$2")
    v=v.replace(/(\d{2})(\d)/,"$1/$2")                                 
    return v
}
        
function Hora(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/(\d{2})(\d)/,"$1:$2")
    return v
}
function DataHora(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/(\d{2})(\d)/,"$1/$2")
    v=v.replace(/(\d{2})(\d)/,"$1/$2")
    v=v.replace(/(\d{6})(\d)/,"$1:$2")
    v=v.replace(/(\d{4})(\d)/,"$1 $2")
    
    return v
}

/*Função Pai de Mascaras*/
function Mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

/*Função que Executa os objetos*/
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

/*Função que Determina as expressões regulares dos objetos*/
function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}



function validarCampos(campo)
{
    // DD/MM/AAAA
    if (campo.value.length == 2 || campo.value.length == 5)
        campo.value = campo.value + "/";
}

function verificarCaracter(e,campo)
{
    if (e.keyCode) code = e.keyCode;        //internet explorer
    else if (e.which) code = e.which;         // Netscape 4.?
    else if (e.charCode) code = e.charCode; // Mozilla 

    if(((code > 47) && (code < 59)) || (code == 8) || (code == 9))
        return true;
    else
        return false;
}

//FUNÇÃO PARA BLOQUEAR CTRL+C
function BloquearCopiar(e)
{
    /*if(navigator.appName == "Netscape") {code = e.which;}
    else {code = e.keyCode;}*/    
    if (e.keyCode) code = e.keyCode;    //internet explorer
    else if (e.which) code = e.which;     // Netscape 4.?
    else if (e.charCode) code = e.charCode; // Mozilla 

    if (e.ctrlKey && code==67) {return false;}
}

//FUNÇÃO PARA BLOQUEAR CTRL+V
function BloquearColar(e)
{
    /*if(navigator.appName == "Netscape") {code = e.which;}
    else {code = e.keyCode;}*/    
    if (e.keyCode) code = e.keyCode;    //internet explorer
    else if (e.which) code = e.which;     // Netscape 4.?
    else if (e.charCode) code = e.charCode; // Mozilla 

    if (e.ctrlKey && code==86) {return false;}
}

//função alterar tecla acionada
function SubstituirTeclaPressionada(acionada, substituta)
{
    var e = event;
    if (e.keyCode) code = e.keyCode;    //internet explorer
    else if (e.which) code = e.which;     // Netscape 4.?
    else if (e.charCode) code = e.charCode; // Mozilla 
        
    var oEvent = (oEvent) ? oEvent : e;
    var oTarget = (oEvent.target) ? oEvent.target : oEvent.srcElement;
    if (oEvent.keyCode == acionada) oEvent.keyCode = substituta;
    if (oTarget.type == "text" && oEvent.keyCode == acionada) oEvent.keyCode = substituta;
    if (oTarget.type == "radio" && oEvent.keyCode == acionada) oEvent.keyCode = substituta;
}

//Verifica se CPF é válido
function testaCPF(strCPF) {
    var Soma;
    var Resto;
    
    Soma = 0;   
    
    if (strCPF == "00000000000")
    	return false;
    
    for (i=1; i<=9; i++)
    	Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i); 
    
    Resto = (Soma * 10) % 11;
    
    if ((Resto == 10) || (Resto == 11)) 
    	Resto = 0;
    
    if (Resto != parseInt(strCPF.substring(9, 10)) )
    	return false;
	
    Soma = 0;
    
    for (i = 1; i <= 10; i++)
       Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    
    Resto = (Soma * 10) % 11;
    
    if ((Resto == 10) || (Resto == 11)) 
    	Resto = 0;
    
    if (Resto != parseInt(strCPF.substring(10, 11) ) )
        return false;
    
    return true;
}

function EntradaNumerico(evt) {

    var key_code = evt.keyCode  ? evt.keyCode  :
                   evt.charCode ? evt.charCode :
                   evt.which    ? evt.which    : void 0;

                   
        // Habilita teclas <BACKSPACE>, <TAB>, <ENTER> e <ESC> 
        if (key_code == 8  ||  key_code == 9  ||  key_code == 13  ||  key_code == 27) {
            return true;
        }
        // Habilita teclas <HOME>, <END>, mais as quatros setas de navegação (cima, baixo, direta, esquerda)
        else if ((key_code >= 35)  &&  (key_code <= 40)) {
            return true
        }
        // Habilita números de 0 a 9
        // 48 a 57 são os códigos para números
        else if ((key_code >= 48)  &&  (key_code <= 57)) {
            return true
        }
        return false;
}

/*Verificação para campo vazio
 * 
 * */
function vazio(id){
	var qtd = document.getElementsByName(id).length;
	var texto = document.getElementById(id).value;
	if (texto == '' && qtd == 1) {
		return true;
	}
	else {
		return false;
	}
}

//Retorna parametro da url via javascript
function urlDecode(string, overwrite){
    if(!string || !string.length){
        return {};
    }
    var obj = {};
    var pairs = string.split('&');
    var pair, name, value;
    var lsRegExp = /\+/g;
    for(var i = 0, len = pairs.length; i < len; i++){
        pair = pairs[i].split('=');
        name = unescape(pair[0]);
        value = unescape(pair[1]).replace(lsRegExp, " ");
        //value = decodeURIComponent(pair[1]).replace(lsRegExp, " ");
        if(overwrite !== true){
            if(typeof obj[name] == "undefined"){
                obj[name] = value;
            }else if(typeof obj[name] == "string"){
                obj[name] = [obj[name]];
                obj[name].push(value);
            }else{
                obj[name].push(value);
            }
        }else{
            obj[name] = value;
        }
    }
    return obj;
}

/*Retorna parametro da url via javascript
 * USO
 * 
 * URL: www.teste.com.br?param1=abc 
 * 
 * jsGet("param1") => retorno "abc"
 * 
*/
function jsGet(param)
{
	var wl = window.location.href;
	var params = urlDecode(wl.substring(wl.indexOf("?")+1));
	return(params[param]);
}