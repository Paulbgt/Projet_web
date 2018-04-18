

 var getJSON2 = function(url)
 {
  return new Promise(function (data,err){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    console.log(xhr);
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        data(xhr.response);
      } else {
        err(status, xhr.response);
      }
    }
    xhr.send();
  });
};


var getUrl = function(url,category,min,max)
{                       url,null,
  if((category==null || category=="") && (min==null || min=="") && (max==null || max=="") )
  {
    return url;
  }
  else if((category==null || category=="") && (min!=null || min!="") && (max!=null || max!="") )
  {
    return url+"?min="+min+"&max="+max;
  }
  else if((category!=null || category!="") && (min!=null || min!="") && (max!=null || max!="") )
  {
    return url+"category="+category+"&min="+min+"&max="+max;
  }
  else {
    return url;
  }
}


const auteurId = function(data){
 for (var i = 0; i < data.length; i++) {
 console.log(data[i].id);
 }
 return data;
}

const name = function(data){
 for (var i = 0; i < data.length; i++) {
document.getElementById('auteur'+i).innerHTML = data[i].name;
 //console.log(data[i].name);
 }
 return data;
}
const avatar_urls = function(data){
 for (var i = 0; i < data.length; i++) {
 document.getElementById('avatar'+i).src = data[i].avatar_urls[96];
 }
 return data;
}

getJSON2(url+nbUser).then(auteurId).then(name).then(avatar_urls);
