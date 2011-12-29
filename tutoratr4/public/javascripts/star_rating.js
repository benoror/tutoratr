/* AJAX Star Rating : v1.0.3 : 2008/05/06 */
/* http://www.nofunc.com/AJAX_Star_Rating/ */

function $O(v,o) { return((typeof(o)=='object'?o:document).getElementById(v)); }
function $S(o) { return((typeof(o)=='object'?o:$O(o)).style); }
function agent(v) { return(Math.max(navigator.userAgent.toLowerCase().indexOf(v),0)); }
function abPos(o) { var o=(typeof(o)=='object'?o:$O(o)), z={X:0,Y:0}; while(o!=null) { z.X+=o.offsetLeft; z.Y+=o.offsetTop; o=o.offsetParent; }; return(z); }
function XY(e,v) { var o=agent('msie')?{'X':event.clientX+document.documentElement.scrollLeft,'Y':event.clientY+document.documentElement.scrollTop}:{'X':e.pageX,'Y':e.pageY}; return(v?o[v]:o); }

star={};

star.mouse=function(e,o) { if(star.stop || isNaN(star.stop)) { star.stop=0;
	
	document.onmousemove=function(e) { var n=star.num;
    
		var p=abPos($O('star'+n)), x=XY(e), oX=x.X-p.X, oY=x.Y-p.Y; star.num=o.id.substr(4);
		
		if(oX<1 || oX>84 || oY<0 || oY>19) { star.stop=1; star.revert(); }
		
		else {
			
			$S('starCur'+n).width=oX+'px';
			$S('starUser'+n).color='#111';
			$O('starUser'+n).innerHTML=Math.round(oX/84*100);
		}
	};
} };

star.update=function(e,o) { var n=star.num, v=parseInt($O('starUser'+n).innerHTML);
	
	n=o.id.substr(4); $O('starCur'+n).title=v;
	$O('rating_rating').value=$O('starUser'+n).innerHTML;//Math.round(oX/84*100);
	
	//req=new XMLHttpRequest(); req.open('GET','?vote='+(v/100),false); req.send(null);    
	
};

star.revert=function() { var n=star.num, v=parseInt($O('starCur'+n).title);
	
	$S('starCur'+n).width=Math.round(v*84/100)+'px';
	$O('starUser'+n).innerHTML=(v>0?Math.round(v):'');
	$O('starUser'+n).style.color='#888';
	
	document.onmousemove='';
	
};

star.num=0;