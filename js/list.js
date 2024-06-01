
function time() {
    var d = new Date();
    var s = d.getSeconds();
    var m = d.getMinutes();
    var h = d.getHours();
    var date = d.getDate();
    var day = d.getDay();
    var mon = d.getMonth();
    var yr = d.getFullYear();
    var ampm = 'AM';
    var hr = h;

    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    var str2 = date + ' ' + months[mon] + ' ' + yr + ' ' + ', ' + days[day];
    var str = yr + '-' + mon + '-' + date + ' ' + hr + ':' + m + ':' + s;

    document.getElementById("today_date").innerHTML = str2;

    if (h == 12) {
        ampm = 'PM';
    }
    else if (h > 12) {
        h -= 12;
        ampm = 'PM';
    }
    else {
        ampm = 'AM';
    }

    document.getElementById("today_hrs").innerHTML = h;
    document.getElementById("today_min").innerHTML = m;
    document.getElementById("today_sec").innerHTML = s;
    document.getElementById("today_ampm").innerHTML = ampm;

    document.getElementById('today').value = str;
    document.getElementById('edit_today').value = str;

}

setInterval(time, 1000);

function toModal(id, title, desc, ddline, ctgry) {
    var modal = document.getElementById('editModal');
    modal.style.display = 'block';
    document.getElementById('editID').value = id;
    document.getElementById('editTaskTitle').value = title;
    document.getElementById('editTaskDescription').value = desc;
    document.getElementById('editTaskDeadline').value = ddline;
    document.getElementById('editFloatingSelect').value = ctgry;
}

function toviewModal(id, title, desc, ddline, ctgry) {
    var modal = document.getElementById('viewModal');
    modal.style.display = 'block';

    document.getElementById('TaskTitle').innerHTML = title;
    document.getElementById('TaskDescription').innerHTML = desc;
    document.getElementById('FloatingSelect').innerHTML = ctgry;
}

