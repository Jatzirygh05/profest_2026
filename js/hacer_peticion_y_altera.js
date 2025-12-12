function hacerPeticion(url) {
								http_request = false;
				                if (window.XMLHttpRequest) { // Mozilla, Safari,...
	                			    http_request = new XMLHttpRequest();
    				                if (http_request.overrideMimeType) {
                    				    http_request.overrideMimeType('text/xml');
				                        // See note below about this line
										
                				    }
				                } else if (window.ActiveXObject || "ActiveXObject" in window) { // IE
								
								//console.log('entro por IE');
								
                				    try {
                        				http_request = new ActiveXObject("Msxml2.XMLHTTP");
                    					} catch (e) {
                       				try {
			                            http_request = new ActiveXObject("Microsoft.XMLHTTP");
            			            	} catch (e) {
                        				}
                    			}
               			 	}

               				if (!http_request) {
								alert('No se puede crear una instancia de XMLHTTP ');
                    			return false;
                			}

			                http_request.onreadystatechange = alteraContenido;
            			    http_request.open('GET', url, true);
			                http_request.send(null);
						}


			            function alteraContenido() {
							if (http_request.readyState == 4) {
                    			if (http_request.status == 200) {
                            		var xmldoc = http_request.responseText;
                        			console.log(xmldoc);
                    			}
                			}
			            }