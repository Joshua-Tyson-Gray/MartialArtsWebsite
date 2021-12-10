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




//Event Handeling
function toggleTechniques()
{
	let cat = event.srcElement.attributes['id'].nodeValue;
	let techWin = document.getElementById(cat + '-technique');
	
	if(techWin.hidden) techWin.hidden = false;
	else techWin.hidden = true;
}

function toggleCatagories()
{
	//Captures event source
	let belt = event.srcElement.attributes['id'].nodeValue;
	let catWin = document.getElementById(belt + '-catagory');
	let catWins = document.querySelectorAll("div[id$='-catagory']");
	
	for(i = 0; i < catWins.length; i++)
	{
		if(catWins[i] == catWin)
		{
			if(catWins[i].hidden) catWins[i].hidden = false;
			else 
			{
				catWins[i].hidden = true;
				//document.getElementById('main-description').innerHTML = "<img src='img/kenpo-crest.jpg'>";
				let techs = document.querySelectorAll(".technique");
				for(j = 0; j < techs.length; j++)
				{
					techs[j].hidden = true;
				}
			}
		}
		else
		{
			catWins[i].hidden = true;
		}
	}
}

function toggleSingleCatagory()
{
	//Captures event source
	let belt = event.srcElement.attributes['id'].nodeValue;
	let catWin = document.getElementById(belt + '-catagory');
	
	//Toggles coresponding catagory window
	if(catWin.hidden) catWin.hidden = false;
	else catWin.hidden = true;
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

function goBack()
{
	document.getElementById('main-description').innerHTML = "<img src='img/kenpo-crest.jpg'>";
}