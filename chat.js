<script type="text/javascript">
//Set up some variables to be used by the timer
var c=0;
var t;
var timer_is_on=0;  //timer status 0=off 1=on

//Timer functions
function timedCount(){
loadXMLDoc(); //each time this function is called the dynamic content is updated
c=c+1;
if (timer_is_on)
	{
	t=setTimeout("timedCount()",1000);  //Sets the interval of the timer
	}
}
	
function doTimer()  { //Start timer
if (!timer_is_on)
  {
  timer_is_on=1;
  timedCount();
  }
}

function stopTimer() { //Stop timer
	timer_is_on=0;
}

function loadXMLDoc(){

//Set up some variables
// req: handle for the request object
var req;

// urlToFetch: URL of the dynamic content 
// Note the randNum variable being added to make the request unique
// this is required to overcome caching at the browser
var urlToFetch = 'http://localhost:8080/AJAX/LECT/message.php?randNum=' + new Date().getTime();


//Create the appropriate request object for the browser being used: 
if (window.XMLHttpRequest)  //The XMLHttpRequest property is available on the window object. 
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  req=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  req=new ActiveXObject("Msxml2.XMLHTTP");
  }
 
 
req.onreadystatechange=function()  
  {
  if (req.readyState==4 && req.status==200)
    {
	//document.getElementById("myContent").innerHTML='urlToFetch:='+urlToFetch+'<p>'+req.responseText;
	
	document.getElementById("myContent").innerHTML=req.responseText;
    }
  }
req.open("GET",urlToFetch,true);  //open(): Assigns method, destination URL, and other optional attributes of a pending request.
req.send(); //Sends an HTTP request to the server and receives a response.

//The following notes will help to understand the code
//
//Note:onreadystatechange: 
//		Sets or retrieves the event handler for asynchronous requests.
//		See http://msdn.microsoft.com/en-us/library/aa741328%28v=vs.85%29.aspx
//
//
//Note :req.readyState
// 		Is an integer that receives one of the following values:
// 0:   The object has been created, but not initialized (the open method 
//      has not been called).
// 1:   A request has been opened, but the send method has not been called. 
// 2:   The send method has been called. No data is available yet. 
// 3:   Some data has been received; however, neither responseText 
//      nor responseBody is available. 
// 4:    All the data has been received. 
//
//Note :req.status
// 200: "OK"
// 404: Page not found
//
// When readyState=4 and status=200 the response is ready
}
</script>