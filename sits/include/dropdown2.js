// Roshan's Ajax dropdown code with php
// This notice must stay intact for legal use
// Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
// If you have any problem contact me at http://roshanbh.com.np
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp2=false;	
		try{
			xmlhttp2=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp2= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp2=false;
				}
			}
		}
		 	
		return xmlhttp2;
    }

	
	function getParlimen_pemilik(negeri_pemilik) {		
		
		var strURL2="findParlimen_pemilik.php?negeri_pemilik="+negeri_pemilik;
		var req2 = getXMLHTTP();
		
		if (req2) {
			
			req2.onreadystatechange = function() {
				if (req2.readyState == 4) {
					// only if "OK"
					if (req2.status == 200) {						
						document.getElementById('getParlimen_pemilik').innerHTML=req2.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req2.statusText);
					}
				}				
			}			
			req2.open("GET", strURL2, true);
			req2.send(null);
		}
		 
	}
 