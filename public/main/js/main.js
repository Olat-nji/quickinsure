function formdisp(){
    document.getElementById('forms').style.display = 'block';
    document.getElementById('addbtn').style.display = 'none';
}
function insure(){
  var insure =  document.getElementById('insureType').value;
      switch (insure) {
          case '2':
            document.getElementById('Car').style.display = 'none';
              document.getElementById('life').style.display = 'block';
              document.getElementById('Property').style.display = 'none';
              document.getElementById('Medical').style.display = 'none';
              break;
          case '3':
            document.getElementById('life').style.display = 'none';
            document.getElementById('Car').style.display = 'none';
            document.getElementById('Property').style.display = 'none';
            document.getElementById('Medical').style.display = 'block';
                break;
          case '4':
            document.getElementById('life').style.display = 'none';
            document.getElementById('Medical').style.display = 'none';
            document.getElementById('Car').style.display = 'none';
            document.getElementById('Property').style.display = 'block';
                    break;
          case '5':
            document.getElementById('Property').style.display = 'none';
            document.getElementById('Medical').style.display = 'none';
            document.getElementById('life').style.display = 'none';
            document.getElementById('Car').style.display = 'block';
                        break;
          
      }
  
}

function mobileNav(){
  if(document.getElementById('mobileBtn').innerHTML == "☲"){
    document.getElementById('mobileNav').style.display= "flex";
    document.getElementById('mobileBtn').innerHTML = "⛌";
  }
  else{
    document.getElementById('mobileNav').style.display= "none";
    document.getElementById('mobileBtn').innerHTML = "☲";
    
  }
}
function label(){
  document.getElementById('label').classList.remove('hidden');
}
function labelR(){
  document.getElementById('label').classList.add('hidden');
}
function label1(){
  document.getElementById('label1').classList.remove('hidden');
}
function labelR1(){
  document.getElementById('label1').classList.add('hidden');
}
function label2(){
  document.getElementById('label2').classList.remove('hidden');
}
function labelR2(){
  document.getElementById('label2').classList.add('hidden');
}
function label3(){
  document.getElementById('label3').classList.remove('hidden');
}
function labelR3(){
  document.getElementById('label3').classList.add('hidden');
}
function safelock(){
  document.getElementById('safelock').classList.remove('hidden');
}

function insureDisp(){
  document.getElementById('forms').classList.remove('hidden');
}
function safelock(){
  document.getElementById('safelockk').classList.remove('hidden');
  document.getElementById('forms').classList.add('hidden');
  document.getElementById('overview').classList.add('hidden');
}
function addInsure(){
  document.getElementById('safelockk').classList.add('hidden');
  document.getElementById('forms').classList.remove('hidden');
  document.getElementById('overview').classList.add('hidden');
}
function addInsure(){
  document.getElementById('safelockk').classList.add('hidden');
  document.getElementById('forms').classList.remove('hidden');
  document.getElementById('overview').classList.add('hidden');
}
function claims(){
  document.getElementById('safelockk').classList.add('hidden');
  document.getElementById('forms').classList.add('hidden');
  document.getElementById('overview').classList.remove('hidden');
}
function pass(){
  document.getElementById('forgotPassword').classList.remove('hidden');
}
function clsPass(){
  document.getElementById('forgotPassword').classList.add('hidden');
}
function withdraw(){
  document.getElementById('withdraw').classList.remove('hidden');
}
function clsWithdraw(){
  document.getElementById('withdraw').classList.add('hidden');
}
function claim(){
  document.getElementById('claim').classList.remove('hidden');
}
function clsClaim(){
  document.getElementById('claim').classList.add('hidden');
}
function info(){
  document.getElementById('claim').classList.remove('hidden');
}
function clsInfo(){
  document.getElementById('claim').classList.add('hidden');
}