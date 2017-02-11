

/*------ æ‰©å±•å¯¹è±¡æ–¹æ³•çš„å‡½æ•° ------*/
Object.extend = function(destination,source){
	for (var property in source){
		destination[property] = source[property];
	}
	return destination;
}
/*-- æ‰©å±•documentå¯¹è±¡çš„æ–¹æ³•getElementsByClassNameå‡½æ•° --*/
Object.extend(document,{
getElementsByClassName: function(Name){
	var Nodes = [];	
	var Elements = document.getElementsByTagName("*");
	
	for(var i = 0,theElement,E_Array = []; i < Elements.length; i++){
		theElement = Elements[i].className;
		E_Array    = theElement.split(" ");
		
		if(E_Array.length == 1){
			theElement = E_Array[0];
			if (theElement == Name){
				theElement = Elements[i];
				Nodes.push(theElement);
			}
		}
		else if(E_Array.length > 1){
			
			for(var j = 0; j < E_Array.length; j++){	
				theElement = E_Array[j];
				if (theElement == Name){
					theElement = Elements[i];
					Nodes.push(theElement);
				}
			}
		}
	}
	return Nodes;  //è¿”å›žä¸€ä¸ªèŠ‚ç‚¹æ•°ç»„
	}
})
// æ‰©å±•stringçš„ç”¨æ³•
Object.extend(String.prototype,{
	delcomma: function(e){
	    return this.replace(/(^,*)|(,*$)/g,'');
	},
	strip: function() {
	    return this.replace(/^\s+/,'').replace(/\s+$/,'');
	},
	ellipsis: function(_len){
		var new_str = '';
		var Len     = _len || 16;
		if(this.length > Len){
			new_str = this.substr(0,Len) + '...';
			return new_str;
		}
		return this;
	},
	parseBoolean: function(){
		var flag = true;
		switch(this.toString()){
			case "true":
			case "1":
				flag = true;
				break;
			case "false":
			case "0":
			case "":
				flag = false;
				break;
		}
		return flag;
	}
});
/*------- æ‰©å±•åŽŸç”Ÿå¯¹è±¡ARRAYçš„æ–¹æ³• ---------*/
Array.prototype.append = function(obj,nodup){
	if(nodup){
		this[this.length] = obj;
	}
}

Array.prototype.remove = function(o){
	var i = this.indexOf(o);
	if (i > -1){
		this.splice(i,1);
	}
	return (i > -1);
}
//å¢žåŠ æ•°ç»„çš„æŸ¥è¯¢æ–¹æ³•
Array.prototype.indexOf = function($value){  
	for(var $i=0; $i<this.length; $i++){  
		if(this[$i] == $value)  
		return $i;  
	}  
	return -1;  
}
//æ ¹æ®ä¸‹æ ‡æ¥åˆ é™¤æ•°ç»„
Array.prototype.deleteIndex = function(index){  
	if(isNaN(index) || index > this.length){  
		return false;  
	}  
	this.splice(index,1);  
}
/*-- $å‡½æ•°å…¶å®žgetElementByIdå‡½æ•°çš„ç¼©å†™ï¼ŒåŒæ—¶è¿˜æ‰©å±•å®ƒçš„åŠŸèƒ½ ---*/
function $(){
	var elements = new Array();
	
    for(var i = 0; i < arguments.length; i++){
		var element = arguments[i];
		
		if(typeof element == "string"){
			element = document.getElementById(element);
		}
		elements.push(element);
	}
	
	if(elements.length == 1 && arguments.length > 0){
		return elements[0];
	} else {
		return elements;  // å½“ä¼ å…¥å¤šä¸ªIDï¼Œåˆ™è¿”å›žä¸€ä¸ªèŠ‚ç‚¹æ•°ç»„
	}
}

/*--------å•ä¸ªèµ‹å€¼æ–¹å¼å‡½æ•°ï¼šå¯ä»¥ç»™INPUT/SELECT/TABLE/DIV/SPANç±»åž‹çš„èŠ‚ç‚¹è¿›è¡Œèµ‹å€¼---------*/
function supplyValue(Name,Value){
	var node      = $(Name) || document.getElementsByName(Name);
	var bigType   = node.nodeName || node[0].nodeName;
	
	switch(bigType){
		case 'TD' : {}
		case 'DIV' : {}
		case 'SPAN' : {
			node.innerHTML = Value;
			node.title = Value;
			break;
		}
		case 'SELECT' : {
			node.value = Value;
			break;
		}
		case 'INPUT' : {
			var smallType = node.type || node[0].type;
			
			switch(smallType){
				case 'text': {
					node.value = Value;
					node.title = Value;
					break;
				}
				case 'password': {
					node.value = Value;
					break;
				}
				case 'radio' : {
					node = document.getElementsByName(Name); //è¿™ä¸ªè¦ç‰¹åˆ«æ³¨æ„
					
					for(var i = 0, _len = node.length; i < _len; i++){
						if(node[i] !== undefined && node[i].value == Value){
							node[i].checked = true;
						}
					}
					break;
				}
				case 'checkbox' : {
					node.checked = (Value == 1 ? true : false);
					break;
				}
			}
		}
	}
}

/*-------- supplyValueå‡½æ•°çš„æ‰¹é‡å¤„ç†ç‰ˆ ---------*/
function setJSONValue(array_json){// array_jsonçš„æ ¼å¼æ˜¯JSON
	if(typeof array_json != 'object'){ return false;}
	var element;
	
	for(var i in array_json){
		element = $(i) || document.getElementsByName(i);
		if(element != null){
			supplyValue(i,array_json[i]);
		}
	}
}

function disElement(Nodes){//ç¬¬ä¸€ä¸ªæ˜¯æŽ§åˆ¶çŠ¶æ€çš„èŠ‚ç‚¹ã€‚
	for(var i = 1; i < Nodes.length; i++){
		Nodes[i].disabled = !Nodes[0].checked;
	}
}

/*---------- ç›‘å¬å™¨å‡½æ•° ----------*/
var jsEvent = new Array();

jsEvent.EventRouter = function(el,eventType){
	this.lsnrs = new Array();
	this.el = el;
	el.eventRouter = this;
	el[eventType] = jsEvent.EventRouter.callback;
}
//æ·»åŠ ç›‘å¬äº‹ä»¶
jsEvent.EventRouter.prototype.addListener = function(lsnr){
	this.lsnrs.append(lsnr,true);
}
//åˆ é™¤ç›‘å¬äº‹ä»¶
jsEvent.EventRouter.prototype.removeListener = function(lsnr){
	this.lsnrs.remove(lsnr);
}

jsEvent.EventRouter.prototype.notify = function(e){
	var lsnrs = this.lsnrs;
	for(var i = 0;i<lsnrs.length;i++){
		var lsnr = lsnrs[i];
		lsnr.call(this.el,e);
	}
}
//ç›‘å¬å™¨çš„å›žè°ƒå‡½æ•°
jsEvent.EventRouter.callback=function(event){
	var e = event || window.event;
	var router=this.eventRouter;
	router.notify(e)
}

/*---- å…³äºŽè¡¨å•çš„ç³»åˆ—å‡½æ•° ----*/
var Form = {
	Focus: function(){
		this.style.cssText = "border:1px solid #000; width:131px; height:20px; font-size:12px; padding:3px 5px 0px;";
	},
	Blur: function(){
		this.style.cssText = "border:1px solid #aaa; width:131px; height:20px; font-size:12px; padding:3px 5px 0px;";
	},
	Checkbox: function(Id,xValue){
		var _node = $(Id);
		
		switch(xValue){
			case undefined : {
				return (_node.checked == true) ? 1 : 0;
			}
			case '1' : {
				_node.checked = true;
				break;
			}
			case '0' : {
				_node.checked = false;
				break;
			}
		}
		return xValue;
	},
	Radio: function(Name,xValue){
		var _node = document.getElementsByName(Name);
		
		if(xValue == undefined){
			for(var i = 0; i < _node.length; i++){
				if(_node[i].checked == true){
					return _node[i].value;
				}
			}
		} else {
			for(var j = 0; j < _node.length; j++){
				if(_node[j] !== undefined && _node[j].value == xValue){
					_node[j].checked = true;
				}
			}
		}
		return xValue;
	},
	Select: function(Id,xValue){
		var _node = $(Id);
		
		if(xValue == undefined){
			return _node.value;
		} else {
			_node.value = xValue;
		}
		return xValue;
	},
	Action: function(){
		var Input_Array = document.getElementsByTagName("input");
	
		if(Input_Array.length == 0) return false;
		
		for(var i = 0; i < Input_Array.length; i++){
			if(Input_Array[i].type == "text" || Input_Array[i].type == "password"){
				Input_Array[i].onfocus   = Form.Focus;
				Input_Array[i].onblur    = Form.Blur;
			}
		}
	},
	//åˆ é™¤äº†å¾ˆå°‘ç”¨çš„Disabled/Enableå‡½æ•°
	Selected: function(node,element){ // Select --> Selected
		var Node    = $(node),S_Index;
		var Element = document.getElementsByClassName(element); 
		if(arguments[2] != null){Node.selectedIndex = arguments[2];}  // if you need to appoint the selectedIndex of option.
		S_Index = Node.selectedIndex;
		
		for(var i = 0; i < Element.length; i++ ){
			Element[i].style.display = "none";
		}
		Node.options[S_Index].selected = "true";
		Element[S_Index].style.display = "block";
	},
	Clear: function(form_name){
		var _form;
		var _inputs;
		
		if (form_name != undefined && form_name != '')
			_form = $(form_name);
		else
			_form = document.forms[0];
			
		_inputs = _form.getElementsByTagName('input');
			
		for(var i = _inputs.length; 0 < i; i--){
			_form.removeChild(_inputs[i-1]);
		}
	},
	AddElements: function(Name,Value, form_name){
		var _form;
		var new_element = document.createElement('input');
		
		if (form_name != undefined && form_name != '')
			_form = $(form_name);
		else
			_form = document.forms[0];
		
		new_element.type = "hidden";
		new_element.name = Name;
		new_element.value = Value;
		_form.appendChild(new_element);
	},
	CreateOptions: function(nodeName,optionValue,valueArray){
		var Node = $(nodeName),valueOptions;
		
		Node.options.length = 0;
		if(valueArray == undefined){
			valueOptions = optionValue;
		} else {
			valueOptions = valueArray;
		}
		
		for(var i = 0; i < optionValue.length; i++){
			Node.options[i] = new Option(optionValue[i]);
			Node.options[i].value = valueOptions[i];
		}
	},
	SendJSONValue: function(array_input, clear_form, form_name){
		if(typeof array_input != 'object') return false;
		if(clear_form){ //å½“ç”¨æˆ·éœ€è¦åœ¨æäº¤è¡¨å•å‰æ¸…é™¤æ—§è¡¨å•ï¼Œåªéœ€è¦ä¼ å…¥ä¸€ä¸ªtrueçš„å‚æ•°å³å¯;
			Form.Clear(form_name);
		}
		for(var i in array_input){
			if(typeof i == 'string' && i.length > 2 && array_input[i] !== undefined){
				Form.AddElements(i,array_input[i], form_name);
			}
		}
	}
}

/*-- å‡½æ•°ç¼©å†™  --*/
var $F = Form.AddElements;   
var $H = Form.SendJSONValue; 
var $S = Form.CreateOptions;

/*----- about Table --------*/
var getValue = {}
var Table = {
	Mousemove: function(){
		this.style.background = "#eee";
	},
	Mouseout: function(){
		this.style.background = "#fff";
	},
	Action: function(){
		var Tr = document.getElementsByTagName("tr");
	
		if(Tr.length == 0) return false;
		for(var i = 1; i < Tr.length; i++){
			Tr[i].onmousemove = Table.Mousemove;
			Tr[i].onmouseout  = Table.Mouseout;
			Tr[i].onclick     = getValue;     // å¦‚æžœè¿™ä¸ªå‡½æ•°è¦æƒ³ä½¿ç”¨ï¼Œåˆ™è¦å…ˆå®šä¹‰
			if(arguments[0] == null) Tr[i].style.cursor = "pointer";
		}
	},
	Clear: function(Node, Num){ // æ¸…ç©ºè¡¨æ ¼å†…å®¹, è¿™ä¸ªå‡½æ•°å­˜åœ¨é—®é¢˜
		var _num  = Num || 0; //ä»Žç¬¬Numä¸ªå¼€å§‹ä¿ç•™
		var Table = $(Node);
		var Tr    = Table.getElementsByTagName('tr');
		
		for(var i = Tr.length - 1; i -_num > 0; i--){
			Table.deleteRow(i);
		}		
	},
	Create: function(Node,Value){ // ä¼ å…¥çš„Valueå¿…é¡»æ˜¯ç¬¦åˆè¦æ±‚çš„æ•°ç»„
		var Table = $(Node);
		var Tbody = Table.getElementsByTagName('tbody')[0];
		//å¦‚æžœæ²¡æœ‰Tbody,å°±åˆ›å»ºä¸€ä¸ª; å¦‚æžœæœ‰,å°±å…±ç”¨ä¸€ä¸ª;
		if(Tbody == null){
			Tbody = document.createElement('tbody');
		}
		//ç»„æˆTD
		for(var i = 0; i < Value.length; i++){
			var Tr = [];
			Tr[i]  = document.createElement('tr');
			
			//é˜²æ­¢ç©ºæ•°ç»„
			if(Value[i] == undefined) continue;
			for(var j = 0; j < Value[i].length; j++){
				var Td = [];
				Td[j]  = document.createElement('td');
				
				Td[j].innerHTML = Value[i][j];
				Td[j].id        = Node + "_" + i.toString() + j.toString();
				Tr[i].appendChild(Td[j]);
			}
			Tbody.appendChild(Tr[i]);
		}
		Table.appendChild(Tbody);
	}
}
var $T = Table.Create;

function evalJSON(json){
	var obj = null;
	try {
		obj = eval("(" + json + ")");
	} catch(E){}
	
  	return obj ;
}

/*------   è¯­è¨€è½¬æ¢å‡½æ•°    -----*/
function chg_language(obj){
	for (var attr in obj){
		try{
			switch (attr){
				case "title":
					$('lang_title').innerHTML = obj[attr];
					break;
				case "innerHTML":
					var o_arr = obj[attr];
					for (var k in o_arr){
						try{
							$(k).innerHTML = o_arr[k];
						} catch(E){
//							alert(k + ":" + E);
						}
					}
					break;
				case "value":
					var o_arr = obj[attr];
					for (var k in o_arr){
						try{
							$(k).value = o_arr[k];
						} catch(E){
//							alert(k + ":" + E);
						}
					}
					break;				
				case "option_title":
					var o_arr = obj[attr];
					for (var k in o_arr){
						try{
							for (var i=0; i<o_arr[k].length; i++){
								try{
									$(k).options[i].title = o_arr[k][i];
								} catch(E){
//									alert(o_arr[k][i] + ":" + E);
								}
							}
						} catch(E){
//							alert(k + ":" + E);
						}
					}
					break;
				case "option_text":
					var o_arr = obj[attr];
					for (var k in o_arr){
						try{
							for (var i=0; i<o_arr[k].length; i++){
								try{
									$(k).options[i].text = o_arr[k][i];
								} catch(E){
//									alert(o_arr[k][i] + ":" + E);
								}
							}
						} catch(E){
//							alert(k + ":" + E);
						}
					}
					break;
				default:
//					alert("unkown cmd: " + attr);	
			}
		} catch(E){
//			alert(obj + ":" + E);
		}
	}
}

/* Cookie æ“ä½œç›¸å…³å‡½æ•° */
var Cookie = {
	//èŽ·å–Cookie
    Get : function(name){
        var arrStr = document.cookie.split("; ");
        for(var i = 0;i < arrStr.length;i ++){
            var temp = arrStr[i].split("=");
            if(temp[0] == name) 
                return unescape(temp[1]);
        }
        return null;
    },
     
    //æ·»åŠ Cookie
    Set : function(name, value, hours, path){//if value > 4095 will be wrong
        var str = name + "=" + escape(value);
//        alert(value.length);
        //ä¸º0æ—¶ä¸è®¾å®šè¿‡æœŸæ—¶é—´ï¼Œæµè§ˆå™¨å…³é—­æ—¶cookieè‡ªåŠ¨æ¶ˆå¤±
        if(hours != undefined && hours > 0){
            var date = new Date();
            var ms = hours * 3600 * 1000;
            date.setTime(date.getTime() + ms);
            str += "; expires=" + date.toGMTString();
        }
		 
        //è·¯å¾„é»˜è®¤è®¾ç½®ä¸ºæ ¹ç›®å½•
        if(path == undefined){
			path = "/";
		}
        str += "; path=" + path;
        
        document.cookie = str;
    },
    
    //åˆ é™¤Cookie
    Delete :function(name, path){
        var date = new Date();
		var str;
        date.setTime(date.getTime() - 10000);
		
		//è·¯å¾„é»˜è®¤è®¾ç½®ä¸ºæ ¹ç›®å½•
        if(path == undefined){
            path = "/";
		}
        str += "; path=" + path;
        document.cookie = name + "=; expires=" + date.toGMTString() + str;
    }
}