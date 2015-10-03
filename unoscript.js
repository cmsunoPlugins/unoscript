//
// CMSUno
// Plugin Uno Script
//
function f_save_unoscript(){
	jQuery(document).ready(function(){
		jQuery.post('uno/plugins/unoscript/unoscript.php',{
			'action':'save','unox':Unox,
			's':document.getElementById('scri').value
			},function(r){f_alert(r);}
		);
	});
}
//
function f_load_unoscript(){
	jQuery(document).ready(function(){
		jQuery.getJSON("uno/data/"+Ubusy+"/unoscript.json",function(data){
			x = data.tex.replace(/\\/g,'');
			document.getElementById('scri').value=x;
		});
	});
}
//
f_load_unoscript();