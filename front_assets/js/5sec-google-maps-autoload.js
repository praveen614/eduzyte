/*
 * 5sec Google Maps Standalone v1.0
 * (c) 2013 Web factory Ltd
 * www.webfactoryltd.com
 */

var scripts=document.getElementsByTagName('script');var thisScript=scripts[scripts.length-1];var proxyUrl=thisScript.src.replace(/\/script\.js$/, '/').split('/');proxyUrl.pop();proxyUrl = proxyUrl.join('/') + '/';(function($){$.fn.googleMaps=function(){var protocol='http:';if(document.location.protocol==='https:'){protocol='https:'}return this.each(function(){var gmap=$(this),debug=false,output='iframe',description='',language,width,height,type,bubble,pin_color,zoom=10,out='',addr='',ll='';if(!gmap.data('address')||gmap.data('address').length<4){return}if(String(gmap.data('debug'))==='1'||String(gmap.data('debug')).toLowerCase()==='true'){debug=true}if(String(gmap.data('output')).toLowerCase()==='img'||String(gmap.data('output')).toLowerCase()==='image'){output='image'}else{output='iframe'}zoom=parseInt(gmap.data('zoom'),10);if(isNaN(zoom)||zoom<0||zoom>21){zoom=10}if(!gmap.data('lang')||String(gmap.data('lang')).toLowerCase()==='auto'){language=window.navigator.userLanguage||window.navigator.language}else{language=$.trim(gmap.data('lang'))}if(output==='image'){width=parseInt(gmap.data('width'),10);if(isNaN(width)||width<10||width>3000){width=500}height=parseInt(gmap.data('height'),10);if(isNaN(height)||height<10||height>2000){height=300}switch(String(gmap.data('type')).toLowerCase()){case'road':case'roadmap':type='roadmap';break;case'satellite':case'sat':type='satellite';break;case'terrain':case'terr':case'ter':type='terrain';break;case'hybrid':case'hy':type='hybrid';break;default:type='roadmap'}switch(String(gmap.data('pin-size')).toLowerCase()){case't':case'tiny':pin_size='tiny';break;case'm':case'medium':pin_size='small';break;case'l':case'large':pin_size='mid';break;default:pin_size='small'}pin_color=$.trim(gmap.data('pin-color'));if(!pin_color){pin_color='red'}addr+=protocol+'//maps.googleapis.com/maps/api/staticmap?scale=2&amp;sensor=true&amp;center='+encodeURIComponent(gmap.data('address'));addr+='&amp;zoom='+zoom+'&amp;size='+parseInt(width/2,10)+'x'+parseInt(height/2,10)+'&amp;maptype='+type;addr+='&amp;markers=size:'+pin_size+'%7Ccolor:'+pin_color+'%7Clabel:%7C'+encodeURIComponent(gmap.data('address'));addr+='&amp;language='+language;out+='<img alt="'+gmap.data('address')+'" title="'+gmap.data('address')+'" src="'+addr+'" />';if(debug){out+='<pre>';out+='<strong>Debug info</strong>\n';out+=' Output: '+output+'\n';out+=' Address: '+gmap.data('address')+'\n';out+=' Zoom: '+zoom+'\n';out+=' Width: '+width+'px\n';out+=' Height: '+height+'px\n';out+=' Map type: '+type+'\n';out+=' Pin color: '+pin_color+'\n';out+=' Language: '+language+'\n';out+='</pre>'}gmap.html(out)}else{width=$.trim(gmap.data('width'));if(!width){width='500px'}if(parseInt(width,10)===width){width+='px'}height=$.trim(gmap.data('height'));if(!height){height='300px'}if(parseInt(height,10)===height){height+='px'}switch(String(gmap.data('type')).toLowerCase()){case'road':case'roadmap':type='m';break;case'satellite':case'sat':type='k';break;case'terrain':case'terr':case'ter':type='p';break;case'hybrid':case'hy':type='h';break;default:type='m'}if(String(gmap.data('bubble'))==='0'||String(gmap.data('bubble')).toLowerCase()==='false'){bubble='near'}else{bubble='addr'}if(gmap.data('description')){description='('+gmap.data('description')+')'}else{description=''}if(zoom>14){$.get(proxyUrl+'proxy.php?url='+protocol+'//maps.googleapis.com/maps/api/geocode/json?address='+encodeURIComponent(gmap.data('address'))+'&sensor=false',function(data){if(data.status==='OK'){ll=data.results[0].geometry.location.lat+','+data.results[0].geometry.location.lng}else{ll=''}addr+=protocol+'//maps.google.com/maps?hl='+language+'&amp;ie=utf8&amp;output=embed&amp;q='+encodeURIComponent(gmap.data('address')+description);addr+='&amp;z='+zoom+'&amp;t='+type+'&amp;iwd=1&amp;mrt=loc&amp;iwloc='+bubble+'&amp;ll='+ll;out+='<iframe style="border: none;" width="'+width+'" height="'+height+'" src="'+addr+'"></iframe>';if(debug){out+='<pre>';out+='<strong>Debug info</strong>\n';out+=' Output: '+output+'\n';out+=' Address: '+gmap.data('address')+'\n';out+=' Description: '+description+'\n';out+=' Info bubble: '+(bubble==='addr'?'true':'false')+'\n';out+=' Zoom: '+zoom+'\n';out+=' Width: '+width+'\n';out+=' Height: '+height+'\n';out+=' Map type: '+type+'\n';out+=' Language: '+language+'\n';out+=' Coordinates: '+ll+'\n';out+='</pre>'}gmap.html(out)},'json')}else{addr+=protocol+'//maps.google.com/maps?hl='+language+'&amp;ie=utf8&amp;output=embed&amp;q='+encodeURIComponent(gmap.data('address')+description);addr+='&amp;z='+zoom+'&amp;t='+type+'&amp;iwd=1&amp;mrt=loc&amp;iwloc='+bubble+'&amp;ll='+ll;out+='<iframe style="border: none;" width="'+width+'" height="'+height+'" src="'+addr+'"></iframe>';if(debug){out+='<pre>';out+='<strong>Debug info</strong>\n';out+=' Output: '+output+'\n';out+=' Address: '+gmap.data('address')+'\n';out+=' Description: '+description+'\n';out+=' Info bubble: '+(bubble==='addr'?'true':'false')+'\n';out+=' Zoom: '+zoom+'\n';out+=' Width: '+width+'\n';out+=' Height: '+height+'\n';out+=' Map type: '+type+'\n';out+=' Language: '+language+'\n';out+='</pre>'}gmap.html(out)}}})}}(jQuery));

// autoload maps
jQuery(function($) { $('.gmap').googleMaps(); });