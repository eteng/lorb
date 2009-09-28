/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function buildMenu(jsoncontent)
{
	var data=eval("(" + jsoncontent + ")");
	document.getElementById("zone").innerHTML = data.menu + "<br>";
	for(i = 0; i < 3; i++)
	{
	var line = "&nbsp;<a href='" + data.commands[i].href + "'>";
	line += data.commands[i].title + "</a><br/>";
	//alert(line);
	document.getElementById("zone").innerHTML += line;
	}
	document.getElementById("zone").innerHTML += "<br>";
	document.getElementById("zone").innerHTML += data.blog + "<br>";
	for(i = 0; i < 1; i++)
	{
	var line = "&nbsp;<a href='" + data.menu2[i].href + "'>";
	line += data.menu2[i].title + "</a><br/>";
	//alert(line);
	document.getElementById("zone").innerHTML += line;
	}

}

var fname = 'dynamic-menu.json';
function loadJSON()
{
	var xhr=createXHR();
	xhr.open("GET", fname,true);
	xhr.onreadystatechange=function()
	{
		if (xhr.readyState == 4)
		{
			if (xhr.status != 404)
			{
				document.getElementById("zone").innerHTML = "found";
				buildMenu(xhr.responseText);
			}
			else
			{
				document.getElementById("zone").innerHTML = fname + " not found";
			}
		}
	}
	xhr.send(null);
}
window.onload = loadJSON;

