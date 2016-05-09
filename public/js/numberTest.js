var numFilledIn = false;

function testNumberInput(){
    var testNum = document.getElementById('card-number').value;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
                obj = JSON.parse(xmlhttp.responseText);

                document.body.innerHTML = obj;   
        }       
    }
    xmlhttp.open("POST", "../../Control/jsControl.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            var return_data = xmlhttp.responseText;
            if(return_data == 'true'){
                document.getElementById('card-input').style.background = '#5ECC39';
                document.getElementById('card-input').style.borderColor = '#4BA32E';
                document.getElementById('card-number').style.borderColor = '#4BA32E';
                document.getElementById('card-alert').style.display = 'none';
                document.getElementById('card-number-input').value = testNum;
                numFilledIn = true;
            }else{
                numFilledIn = false;
                document.getElementById('card-input').style.background = '#FF3333';
                document.getElementById('card-input').style.borderColor = '#CC2929';
                document.getElementById('card-number').style.borderColor = '#CC2929';
                document.getElementById('card-alert').style.display = 'block';
                document.getElementById('card-alert').innerHTML = 'Dit kaart nummer is niet bij ons geregistreerd';
            }
        }
    }
    xmlhttp.send('cardNumber='+testNum);   
}

function testFormFull(){
    if(numFilledIn){
        document.getElementById('mainform').submit();   
    }
}