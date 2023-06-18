document.getElementById('btn').addEventListener('click', VerifTel);
        
function validation(){
    let name = document.getElementById('name').value;
    let mail = document.getElementById('mail').value;
    let tel = document.getElementById('tel').value;
    let type = document.getElementById('type').value;
    if(name=="" || mail=="" || tel=="" || type=="type"){
        alert("tout les champs son obligatoire")
    }
}

function VerifTel(e){
    e.preventDefault();
    let tel = document.getElementById('tel').value;
    let telPattern = /^\d{10}$/;
    let veriTel = telPattern.test(tel);
        if(veriTel == false){
            alert("nn");
        }else{
            alert('numero good');
        }
}

document.getElementById('vider').addEventListener('click', vider)
function vider(){
    document.getElementsByTagName('form')[0].reset();
}

