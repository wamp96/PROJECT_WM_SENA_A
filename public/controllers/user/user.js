const formId = 'my-form';
const modalId = 'my-modal';
const model = 'users';
const tableId = 'table-index';
const preloadId = 'preloadId';
const classEdit = 'edit-input';
const textConfirm = 'Press a button!\nEither OK or Cancel.';
const btnSubmit = document.getElementById('btnSubmit');
const mainApp = new Main(modalId, formId, classEdit, preloadId);

var insertUpdate = true;
var url = "";
var method = "";
var data = "";
var resultFetch = null;

function show(id) {
    mainApp.disabledFormAll();
    mainApp.resetForm();
    btnEnabled(true);
    getDataId(id);
}
    
function add() {
    mainApp.enableFormAll();
    mainApp.resetForm();
    insertUpdate = true;
    btnEnabled(false);
    debugger
    mainApp.showModal();
}

 function edit(id) {
    mainApp.disabledFormEdit();
    mainApp.resetForm();
    insertUpdate = false;
    btnEnabled(false);
    getDataId(id);
}

async function delete_(id) {
    method = 'GET';
    url = URI_USER + LIST_CRUD[3] + '/' + id;
    data = "";
    if (confirm(textConfirm) == true) {
        resultFetch = getData(data, method, url);
        resultFetch.then(response => response.json())
        .then(data => {
            //console.log(data);
            //Reload View
            reloadPage();
        })
        .catch(error => {
            console.error(error);
            //hidden Preload
            mainApp.hiddenPreload();
        })
        .finally();
    } else {
    }
}


async function getDataId(id) {
    method = 'GET';
    url = URI_USER + LIST_CRUD[1] + '/' + id;
    data = mainApp.getDataFormJson();
    resultFetch = getData(data, method, url);
    resultFetch.then(response => response.json())
    .then(data => {
        //console.log(data);
        ///Set data form
        mainApp.setDataFormJson(data[model]);
        //show Modal
        mainApp.showModal();
        //hidden Preload
        mainApp.hiddenPreload();
    })
    .catch(error => {
        console.error(error);
        //hidden Preload
        mainApp.hiddenPreload();
    })
    .finally();
}
        

function btnEnabled(type) {
 btnSubmit.disabled = type;
}

async function getData(data, method, url) {
    var parameters;
    //Show Preload
    debugger
    mainApp.showPreload();
    if (method == "GET") {
        parameters = {
            method: method,
            headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
            }
        }
    } else {
        parameters = {
            method: method,
            body: JSON.stringify(data),
            headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
            }
        }
    debugger
    }
    return await fetch(url, parameters);
    debugger
}


$(document).ready(function(){
    $('#'+tableId).DataTable();
});


mainApp.getForm().addEventListener('submit', async function (event) {
    event.preventDefault();
    if (mainApp.setValidateForm()) {
        //Show Preload
        mainApp.showPreload();
        
    if (insertUpdate) {
        method = 'POST';
        url = URI_USER + LIST_CRUD[0];
        data = mainApp.getDataFormJson();
        resultFetch = getData(data, method, url);

        debugger
        resultFetch.then(response => response.json())
    .then(data => {
        //show Modal
        mainApp.hiddenModal();
        //Reload View
        debugger
        reloadPage();
    })
    .catch(error => {
        console.error(error);
        //hidden Preload
        mainApp.hiddenPreload();
    })
    .finally();
    }else {
        method = 'POST';
        url = URI_USER + LIST_CRUD[2];
        data = mainApp.getDataFormJson();
        //console.log(data);
        resultFetch = getData(data, method, url);
        resultFetch.then(response => response.json())
        .then(data => {
            //console.log(data);
            //show Modal
            mainApp.hiddenModal();
            //Reload View
            debugger
            reloadPage();
        })
        .catch(error => {
            console.error(error);
            //hidden Preload
            mainApp.hiddenPreload();
        })
            
        }
    } else {
        alert("Data Validate");
        mainApp.resetForm();
    }
    });
    
function reloadPage() {
    setTimeout(function () {
        //hidden Preload
        mainApp.hiddenPreload();
        location.reload();
    }, 500);
}        