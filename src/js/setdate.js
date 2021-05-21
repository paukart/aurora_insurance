function setDate() {
    var date = new Date();
    date.setMinutes(date.getMinutes() - date.getTimezoneOffset());
    var datestr = date.toISOString().substring(0, 10);
    document.getElementById('date').value = datestr;
}