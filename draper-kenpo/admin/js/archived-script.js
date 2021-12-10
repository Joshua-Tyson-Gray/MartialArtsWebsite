//JavaScript

let x = new XMLHttpRequest();

//Add Event Listeners
let belts = document.querySelectorAll("div.rank > p.rank-title");
belts.forEach((belt, index) => {
	belt.addEventListener('mousedown', toggleCatagories);
});

let catagories = document.querySelectorAll('p.catagory-title');
catagories.forEach((catagory, index) => {
	catagory.addEventListener('mousedown', toggleTechniques);
});

let technique = document.querySelectorAll('p.technique-title');
technique.forEach((catagory, index) => {
	catagory.addEventListener('mousedown', displayDescription);
});

//let select = document.


//Event Handeling
function toggleCatagories()
{
	//Captures event source
	let belt = event.srcElement.attributes['id'].nodeValue;
	let catWin = document.getElementById(belt + '-catagory');
	
	//Toggles coresponding catagory window
	if(catWin.hidden) catWin.hidden = false;
	else catWin.hidden = true;
}

function toggleTechniques()
{
	let cat = event.srcElement.attributes['id'].nodeValue;
	let techWin = document.getElementById(cat + '-technique');
	
	if(techWin.hidden) techWin.hidden = false;
	else techWin.hidden = true;
}

function displayDescription()
{
	let tech = event.srcElement.attributes['id'].nodeValue;
	x.open("GET", "includes/get-technique.php?name=" + tech);
	x.send();
	x.onreadystatechange = updateTech;
	
	function updateTech()
	{
		if(x.readyState == 4 && x.status == 200)
		{
			document.getElementById('main-description').innerHTML = x.responseText;
		}
	}
}




//function toggleTechniques()
//{
//	//Gets belt color source
//	let beltLower = event.srcElement.attributes['id'].nodeValue;
//	let beltUpper = beltLower.charAt(0).toUpperCase() + beltLower.slice(1);
//	
//	x.open("GET", "includes/get-techniques.php?belt=" + beltUpper);
//	x.send();
//	x.onreadystatechange = addTech;
//	
//	function addTech()
//	{
//		if(x.readyState == 4 && x.status == 200)
//		{
//			if(document.getElementById(beltLower + '-tech').innerHTML == '') document.getElementById(beltLower + '-tech').innerHTML = x.responseText; 
//			else document.getElementById(beltLower + '-tech').innerHTML = '';
//		}
//	}
//}

