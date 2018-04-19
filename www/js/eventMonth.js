var btnSubsCount = document.querySelectorAll('.event-infos-subsCount');
var btnSubscribe= document.querySelectorAll('.event-infos-subscribe');
var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];

// Event listener used to swap the subscribe image and to update the display of number of subscribers
for (var i = 0; i<btnSubscribe.length; i++) {
    btnSubscribe[i].addEventListener('click', function() {
        var icone = document.getElementById("subsCount" + this.id.replace('subscribe', ''));
        if (this.value == "S'inscrire") {
            icone.style.backgroundImage = "url(site_picture/subscribe_full.svg)";
            icone.setAttribute('value', parseInt(icone.getAttribute('value')) + 1);
            this.value = "Se désinscrire";
        } else {
            icone.style.backgroundImage = "url(site_picture/subscribe_empty.svg)";
            icone.setAttribute('value', parseInt(icone.getAttribute('value')) - 1);
            this.value = "S'inscrire";
        }
    });
}

var list = document.querySelectorAll('.event-infos-subsCount-list');
for (var u = 0; u< list.length; u++) {
    list[u].style.maxWidth = window.innerWidth - 80 + 'px';
}


// Event listener used to delete the event who has been reported
var btnReport = document.querySelectorAll('[class*=event-report]');
if (btnReport.length > 0) {
    for (var i=0; i<btnReport.length; i++) {
        btnReport[i].addEventListener('click', function() {
            var that = this;
            setTimeout(function() {that.parentElement.parentElement.parentElement.remove();}, 20);
        });
    }
}



/* ///////////// Modal //////////// */

if (document.getElementById('fileImgModal')) {
    var inputImgModal = document.getElementById('fileImgModal');
    var eventAdmin = document.querySelectorAll('[class*=event-admin]');
    var backgroundModal = document.querySelector('.backgroundModal');
    var btnDelete = document.querySelector('.modal-infos-delete');


    // Display modal to administrate the suggestion
    for (var i = 0; i<eventAdmin.length; i++) {
        eventAdmin[i].addEventListener('click', function() {
            backgroundModal.style.display = "flex";
    //        document.querySelector('.wrapper').style.filter = "grayscale(100%) blur(3px)";
            document.querySelector('.wrapper').style.filter = "blur(5px)";
            var id = this.classList[1].replace('event-admin', '');
            document.querySelector('.modal-infos-id').value = this.id;
            document.querySelector('.modal-infos-id-delete').value = this.id;
            document.querySelector('.modal-img').style.backgroundImage = document.getElementById('event-img' + id).style.backgroundImage;
            document.querySelector('.modal-infos-title').value = document.getElementById('event-infos-title' + id).innerHTML;
            document.querySelector('.modal-infos-place').value = document.getElementById('event-infos-place' + id).innerHTML;
            document.querySelector('.modal-infos-price').value = document.getElementById('event-infos-price' + id).innerHTML;
            document.querySelector('.modal-infos-date').value = document.getElementById('event-infos-date' + id).innerHTML;
            document.querySelector('.modal-infos-club').value = document.getElementById('event-infos-club' + id).innerHTML;
            document.querySelector('.modal-infos-description').value = document.getElementById('event-infos-description' + id).innerHTML;
        });
    }

    inputImgModal.addEventListener('change', function(e) {
        var files = this.files[0];
        var imgType = files.name.split('.');
        imgType = imgType[imgType.length - 1].toLowerCase();

        if (allowedTypes.indexOf(imgType) != -1) {
            var path = URL.createObjectURL(this.files[0]);
            this.parentElement.style.backgroundImage = 'url(' + path + ')';
        }
    });



    function closeModal() {
        backgroundModal.style.display = "none";
        document.querySelector('.wrapper').style.filter = "none";
    }

    document.querySelector('.modal-close').addEventListener('click', function() {
        closeModal();
    });

    backgroundModal.addEventListener('click', function(e) {
        if (e.clientX < this.children[0].offsetLeft || e.clientX > this.children[0].offsetLeft + this.children[0].offsetWidth || e.clientY < this.children[0].offsetTop || e.clientY > this.children[0].offsetTop + this.children[0].offsetHeight) {
            closeModal();
        }
    });

    btnDelete.addEventListener('click', function(e) {
        closeModal();
        document.getElementById('event' + document.querySelector('.modal-infos-id-delete').value).remove();
    });
}



/* /////////////////// HTML to CSV /////////////////// */

var btnTables = document.querySelectorAll('[class*=dlToCsv]');
for (var t = 0; t<btnTables.length; t++) {
    btnTables[t].addEventListener('click', function() {
        var id = this.classList[1].replace('dlToCsv', '');
        var filename = document.getElementById('event-infos-title' + id).innerHTML;
        htmlToCsv(filename, this.parentElement);
    });
}




function htmlToCsv(filename, element) {
    filename += ' liste.csv';
    var csv = [];
    var rows = element.querySelectorAll("table tr");
    
    for (var i = 0; i<rows.length; i++){
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j<cols.length; j++) {
            row.push(cols[j].innerHTML);
        }
        csv.push(row.join(";"));
    }
    downloadCSV(csv.join("\n"), filename);
}


function downloadCSV(csv, filename) {
    var csvFile = new Blob([csv], {type: "text/csv"});
    var downloadLink;
    
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
    downloadLink.remove();
}