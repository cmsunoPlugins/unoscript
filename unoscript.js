//
// CMSUno
// Plugin Uno Script
//
function f_save_unoscript(){
	let x=new FormData();
	x.set('action','save');
	x.set('unox',Unox);
	x.set('s',document.getElementById('scri').value);
	fetch('uno/plugins/unoscript/unoscript.php',{method:'post',body:x})
	.then(r=>r.text())
	.then(r=>f_alert(r));
}
//
function f_load_unoscript(){
	fetch("uno/data/"+Ubusy+"/unoscript.json?r="+Math.random())
	.then(r=>r.json())
	.then(function(data){
		if(data.tex)document.getElementById('scri').value=data.tex.replace(/\\/g,'');
	});
}
//
f_load_unoscript();
